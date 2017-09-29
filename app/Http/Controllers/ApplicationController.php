<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\EGuard;
use App\University;
use App\Language;
use App\Application;
class ApplicationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth.cas');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = University::pluck('name', 'id');
        $languages = Language::pluck('name', 'id');

        $langlevel = [
          1 => "A1",
          2 => "A2",
          3 => "B1",
          4 => "B2",
          5 => "C1",
          6 => "C2"
        ];

        return view('erasmus.application2') ->with("stdata",EGuard::getApiDetails())
                                            ->with('universities',$universities)
                                            ->with('languages',$languages)
                                            ->with('langlevel',$langlevel);
    }


    public function store(Request $request)
    {
      //TODO: Validation

      $application = new Application();
      //1st tab
      $application -> surname_el = $request ->input('surname_el');
      $application -> name_el = $request ->input('name_el');
      $application -> surname_en = $request ->input('surname_en');
      $application -> name_en = $request ->input('name_en');
      $application -> fathersname = $request ->input('fathersname');
      $application -> mothersname = $request ->input('mothersname');
      $application -> age = $request ->input('age');
      $application -> idno = $request ->input('idno');
      $application -> birthplace = $request ->input('birthplace');
      $application -> birthdate = $request ->input('birthdate');
      $application -> prefecture = $request ->input('prefecture');
      $application -> citizenship = $request ->input('citizenship');
      $application -> address_el = $request ->input('address_el');
      $application -> address_en = $request ->input('address_en');
      $application -> nο_el = $request ->input('nο_el');
      $application -> city_el = $request ->input('city_el');
      $application -> city_en = $request ->input('city_en');
      $application -> tk = $request ->input('tk');
      $application -> tel = $request ->input('tel');
      $application -> mobtel = $request ->input('mobtel');
      $application -> email = $request ->input('email');
      $application -> publictel = ($request->input('publictel') == true ? 0:1);
      $application -> insurance = $request->input('insurance');

      //2nd tab
      $application -> department = $request->input('department');
      $application -> semester = $request->input('semester');
      $application -> stlevel = $request->input('stlevel');
      $application -> lang_id1 = $request->input('lang_id1');
      $application -> langlevel1 = $request->input('langlevel1');
      $application -> lang_id2 = $request->input('lang_id2');
      $application -> langlevel2 = $request->input('langlevel2');
      $application -> lang_id3 = $request->input('lang_id3');
      $application -> langlevel3 = $request->input('langlevel3');

      $application -> u1_id = $request->input('u1_id');
      $application -> u1_studies = $request->input('u1_studies');
      $application -> u1_semester = $request->input('u1_semester');
      $application -> u1_months = $request->input('u1_months');

      $application -> u2_id = $request->input('u2_id');
      $application -> u2_studies = $request->input('u2_studies');
      $application -> u2_semester = $request->input('u2_semester');
      $application -> u2_months = $request->input('u2_months');

      $application -> u3_id = $request->input('u3_id');
      $application -> u3_studies = $request->input('u3_studies');
      $application -> u3_semester = $request->input('u3_semester');
      $application -> u3_months = $request->input('u3_months');

      $application -> l1 = ($request->input('l1') == true ? 0:1);
      $application -> l2 = ($request->input('l2') == true ? 0:1);
      $application -> l3 = ($request->input('l3') == true ? 0:1);
      $application -> l4 = ($request->input('l4') == true ? 0:1);
      $application -> l5 = ($request->input('l5') == true ? 0:1);
      $application -> l6 = ($request->input('l6') == true ? 0:1);

      //Fill API info
      $stdata = EGuard::getApiDetails();

      $application -> spec_aem = $stdata -> spec_aem;
      $application -> depID = $stdata -> depID;
      $application -> depname = $stdata -> depname;
      $application -> ects_passed_total = $stdata -> ects_passed_total;
      $application -> cources_passed_num = $stdata -> cources_passed_num;
      $application -> curr_semester = $stdata -> curr_semester;
      $application -> Avg = $stdata -> Avg;


      $application ->save();
      //TODO: Check result here

      return redirect()->route('home');
    }


    public function view()
    {
      $applications = Application::where('spec_aem',EGuard::user()->id)->get();

      return
    }

}
