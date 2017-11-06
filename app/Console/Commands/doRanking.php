<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Application;
use App\University;
use App\Rank;
use Illuminate\Database\Eloquent\Collection;
use DB;
use App\Setting;


class doRanking extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'do:Ranking';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a rank list per university from student applications';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Helper function for mapping language pts
     *
     * @return integer
     */
    public function mapLangPts($level)
    {
      if($level == 1) return 10;
      if($level == 2) return 15;
      if($level == 3) return 20;
      if($level == 4) return 30;

      return 0;
    }

    /**
     * Helper function for mapping English pts
     *
     * @return integer
     */
    public function mapEngPts($level)
    {
      if($level == 1) return 0;
      if($level == 2) return 5;
      if($level == 3) return 10;
      if($level == 4) return 20;

      return 0;
    }


    /**
     * Helper function for mapping grades pts
     *
     * @return integer
     */
    public function mapGradesPts($avg)
    {
      if($avg > 6.0 && $avg <= 6.49) return 0;
      elseif($avg <= 6.99) return 10;
      elseif($avg <= 7.49) return 15;
      elseif($avg <= 7.99) return 20;
      elseif($avg <= 8.49) return 25;
      elseif($avg <= 8.99) return 30;
      elseif($avg <= 9.49) return 35;
      elseif($avg <= 10) return 50;

      return 0;
    }


    public function assign($uni_id, $priority)
    {
      $this->info("Invoked assign($uni_id,$priority)");
      $current_year = date("Y");

      //Check if cap exceeds
      $total_cap = University::findOrFail($uni_id)->first()->cap;

      $current_cap = Rank::whereYear('created_at', $current_year)->where('assigned', $uni_id)->where('uni_id',$uni_id)->where('priority',$priority)->count();
      $this->info("Current cap: $current_cap/$total_cap");
      if($current_cap >= $total_cap)
      {
        $this->info("Cap reached..Abort");
        return 0;
      }

      $ranks = Rank::whereYear('created_at', $current_year)->where('assigned', 0)->where('uni_id',$uni_id)->where('priority',$priority)->orderBy('pts','DESC')->take($total_cap-$current_cap)->get();
      $this->info("Got unassigned ranks: ".$ranks->count());
      foreach($ranks as $rank)
      {

        $current_cap = Rank::whereYear('created_at', $current_year)->where('assigned', $uni_id)->where('uni_id', $uni_id)->where('priority',$priority)->count();

        $this->info("Current ap: $current_cap/$total_cap");
        if($current_cap >= $total_cap)
          return 0;

        $this->info("Assign app ".$rank->app_id." to $uni_id");
        $rank -> assigned = $uni_id;
        $rank -> save();

        $assigned = Rank::where('app_id',$rank->app_id)->get();
        foreach($assigned as $a)
        {
          $a -> assigned = $uni_id;
          $a -> save();
        }
      }

    }
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //TODO: Schedule this as cronjob
        $this->info("do:Ranking job started");

        $this->info("Removing previous final date...");
        $setting = Setting::find('appl_finaldate');
        $setting -> value = '';
        $setting -> save();


        $this->info("Restricting further application submits");
        $setting = Setting::find('appl_status');
        $setting -> value = 'closed';
        $setting -> save();


        $this->info("Resetting table for debugging");
        DB::table('ranks')->delete();


        $current_year = date("Y");

        $this->info("Retrieving all student applications for ".$current_year);
        $applications = Application::whereYear('created_at', '=', $current_year)->get();
        $this->info("Got: ".$applications->count());

        $this->info("Retrieving all active universities...");
        $universities = University::where('active', 1)->get();
        $this->info("Got: ".$universities->count());


        foreach($universities as $university)
        {
            $this->info("Processing ranking for [universityID $university->id]");

            $cap = $university->cap;
            $this->info("Initial university cap set to $cap");

            $this->info("[$university->id] Retrieving all student applications for $current_year (1st pass)");
            $applications = Application::whereYear('created_at', '=', $current_year)->where('u1_id', $university->id)->get();
            $this->info("Got: ".$applications->count());

            $current_pts  = 0;

            foreach($applications as $application)
            {
              //Calculate language level pts from table 1 column 1

              $this->info($application->lang_id1);
              $this->info($university->lang_id);
              $this->info($this->mapLangPts(2));


              if($application->lang_id1 == $university->lang_id)
                  $current_pts += $this->mapLangPts($application->langlevel1);

              if($application->lang_id2 == $university->lang_id)
                  $current_pts += $this->mapLangPts($application->langlevel2);

              if($application->lang_id3 == $university->lang_id)
                  $current_pts += $this->mapLangPts($application->langlevel3);


              //Calculate language level pts from table 1 column 2
              if($application->lang_id1 == 1)
                $current_pts += $this->mapEngPts($application->langlevel1);

              if($application->lang_id2 == 1)
                $current_pts += $this->mapEngPts($application->langlevel2);

              if($application->lang_id3 == 1)
                $current_pts += $this->mapEngPts($application->langlevel3);

              //Calculate grades pts
              $current_pts += $this->mapGradesPts($application->Avg);
              //TODO: Calculate pts from additional documents

              $this->info("Calculated pts from current application: $current_pts");

              $rank = new Rank();
              $rank -> uni_id = $university -> id;
              $rank -> app_id = $application -> id;
              $rank -> pts = $current_pts;
              $rank -> year = $current_year;
              $rank -> priority = 1;
              $rank -> assigned = 0;
              $rank -> save();
            }

            $this->info("[$university->id] Retrieving all student applications for $current_year (2nd pass)");
            $applications = Application::whereYear('created_at', '=', $current_year)->where('u2_id', $university->id)->get();
            $this->info("Got: ".$applications->count());

            $current_pts  = 0;

            foreach($applications as $application)
            {
              //Calculate language level pts from table 1 column 1
              if($application->lang_id1 == $university->lang_id)
                  $current_pts += $this->mapLangPts($application->langlevel1);

              if($application->lang_id2 == $university->lang_id)
                  $current_pts += $this->mapLangPts($application->langlevel2);

              if($application->lang_id3 == $university->lang_id)
                  $current_pts += $this->mapLangPts($application->langlevel3);

              //Calculate language level pts from table 1 column 2
              if($application->lang_id1 == 1)
                $current_pts += $this->mapEngPts($application->langlevel1);

              if($application->lang_id2 == 1)
                $current_pts += $this->mapEngPts($application->langlevel2);

              if($application->lang_id3 == 1)
                $current_pts += $this->mapEngPts($application->langlevel3);

              //Calculate grades pts
              $current_pts += $this->mapGradesPts($application->Avg);

              //TODO: Calculate pts from additional documents

              $this->info("Calculated pts from current application: $current_pts");

              $rank = new Rank();
              $rank -> uni_id = $university -> id;
              $rank -> app_id = $application -> id;
              $rank -> pts = $current_pts;
              $rank -> year = $current_year;
              $rank -> priority = 2;
              $rank -> assigned = 0;
              $rank -> save();
            }

            $this->info("[$university->id] Retrieving all student applications for $current_year (3rd pass)");
            $applications = Application::whereYear('created_at', '=', $current_year)->where('u3_id', $university->id)->get();
            $this->info("Got: ".$applications->count());

            $current_pts  = 0;

            foreach($applications as $application)
            {
              //Calculate language level pts from table 1 column 1
              if($application->lang_id1 == $university->lang_id)
                  $current_pts += $this->mapLangPts($application->langlevel1);

              if($application->lang_id2 == $university->lang_id)
                  $current_pts += $this->mapLangPts($application->langlevel2);

              if($application->lang_id3 == $university->lang_id)
                  $current_pts += $this->mapLangPts($application->langlevel3);

              //Calculate language level pts from table 1 column 2
              if($application->lang_id1 == 1)
                $current_pts += $this->mapEngPts($application->langlevel1);

              if($application->lang_id2 == 1)
                $current_pts += $this->mapEngPts($application->langlevel2);

              if($application->lang_id3 == 1)
                $current_pts += $this->mapEngPts($application->langlevel3);

              //Calculate grades pts
              $current_pts += $this->mapGradesPts($application->Avg);

              //TODO: Calculate pts from additional documents

              $this->info("Calculated pts from current application: $current_pts");

              $rank = new Rank();
              $rank -> uni_id = $university -> id;
              $rank -> app_id = $application -> id;
              $rank -> pts = $current_pts + $application->additional_pts;
              $rank -> year = $current_year;
              $rank -> priority = 3;
              $rank -> assigned = 0;
              $rank -> save();
            }

        }

        foreach($universities as $university)  $this->assign($university->id, 1);
        foreach($universities as $university)  $this->assign($university->id, 2);
        foreach($universities as $university)  $this->assign($university->id, 3);

        return 0;
    }
}
