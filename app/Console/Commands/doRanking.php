<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Application;
use App\university;
use App\Rank;
use Illuminate\Database\Eloquent\Collection;

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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //TODO: Schedule this as cronjob

        $this->info("do:Ranking job started");

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
              //$rank -> save();
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
              //$rank -> save();
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
              $rank -> pts = $current_pts;
              $rank -> year = $current_year;
              $rank -> priority = 3;
              //$rank -> save();
            }

        }

        /*$this->info('Displaying results...');
        $final_ranking = array(0,0);

        $applications = Application::whereYear('created_at', $current_year)->get();
        foreach($applications as $application)
        {
          $ranks = Rank::where('app_id', $application->id)->where('priority', 1)->get();

        }

        $ranks = Rank::where('priority', 1)->get();
        */

        $ranks = [];

        /*
          === Sorting (1st pass) ===
          Foreach university we sort applications by rank according to their first priority selection
        */
        foreach($universities as $university)
        {
          $ranks[$university->id] = Rank::whereYear('created_at', $current_year)->where('uni_id',$university->id)->where('priority',1)->orderBy('pts','DESC')->get();
          Rank::whereYear('created_at', $current_year)->where('uni_id',$university->id)->where('priority',1)->orderBy('pts','DESC')->update(['sorted' => 1]);
        }

        /*
          === Sorting (2nd pass) ===
          According to the previous results we limit the list to the university cap (sorted by ranking), then we move the rest to unsorted
        */

        $unsorted = new Collection();

        foreach($universities as $university)
        {
          $university->cap = 1;
          $total = count($ranks[$university->id]);

          if($university->cap < $total);
          {
            $ranks[$university->id] = Rank::whereYear('created_at', $current_year)->where('uni_id',$university->id)->where('priority',1)->orderBy('pts','DESC')->take($university->cap)->get();
            Rank::whereYear('created_at', $current_year)->where('uni_id',$university->id)->where('priority',1)->orderBy('pts','DESC')->take($university->cap)->update(['sorted' => true]);
            //Rank::whereYear('created_at', $current_year)->where('app_id',$ranks[$university->id]->app_id)->update(['sorted' => true]);

            $unsorted = Rank::whereYear('created_at', $current_year)->where('uni_id',$university->id)->where('priority',1)->orderBy('pts','DESC')->skip($university->cap)->take($total)->get();
            foreach($unsorted as $u)
            {
              $u -> sorted = false;
              $u -> save();
            }

          }
        }

        /*
          === Sorting (3rd pass) ===
          Foreach unsorted we repeat the same procedure with increased priority
        */

        $unsorted = Rank::where('sorted',false)->get();



        dd($unsorted);

        //echo $ranks[1];
        /*
        foreach($universities as $university)
        {
            $this->info("Displaying results for $university->name");

            $l1ranks = Rank::where('year',2017)->where('uni_id',$university->id)->where('priority',1)->orderBy('pts','DESC')->take($university->cap)->get();
            if($l1ranks->count() < $university->cap)
            {
              $l2ranks = Rank::where('year',2017)->where('uni_id',$university->id)->where('priority',2)->orderBy('pts','DESC')->take($university->cap - $l1ranks->count())->get();
              $l1ranks->merge($l2ranks);
            }
            elseif($l1ranks->count() >= $university->cap)
            {
             Rank::where('year',2017)->where('uni_id',$university->id)->where('priority',1)->orderBy('pts','DESC')->skip($l1ranks->count())->take(18446744073709551615)->update(['priority' => 0]);
            }

            if($l1ranks->count() < $university->cap)
            {
              $l3ranks = Rank::where('year',2017)->where('uni_id',$university->id)->where('priority',3)->orderBy('pts','DESC')->take($university->cap - $l1ranks->count())->get();
              $l1ranks->merge($l3ranks);
            }

            $ranks = $l1ranks;

            foreach($ranks as $rank)
              $this->info($rank->pts);
        }
        */

    }
}
