<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\EGuard;
use App\University;
use App\Language;
use App\Application;
use App\Setting;
use Illuminate\Support\Facades\Validator;

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
		//API INFO
		$stdata = EGuard::getApiDetails();
        if(Setting::find('appl_status')->value == 'closed')
        return redirect()->route('erasmus.closed');

        if(EGuard::isEligible())
        {
			
			/*
			 if ($stdata -> depID == 604)
	  {
		  $depname = "icte";
	  }
	  
	  $universities = University::where($depname,'tmhma')->pluck('name', 'id');
      $languages = Language::pluck('name', 'id');
			
			
			*/
			
			 if ($stdata -> depID == 604)
	  {
		  $depname = "icte";
	  }
	  
          $universities = University::where('tmhma',$depname)->pluck('name', 'id');
		   //mia where pou tha emfanizei sthn lista MONO TA PANEPISTHMIA TOU TMHMATOS
          $languages = Language::pluck('name', 'id');

          $langlevel = [
            1 => "B1",
            2 => "B2",
            3 => "C1",
            4 => "C2"
          ];

          return view('erasmus.application2') ->with("stdata",EGuard::getApiDetails())
                                              ->with('universities',$universities) 
											  //mia where pou tha emfanizei sthn lista MONO TA PANEPISTHMIA TOU TMHMATOS
                                              ->with('languages',$languages)
                                              ->with('langlevel',$langlevel);
        }
        else
        {
          //return "NOT ELIGIBLE
          return view('erasmus.noteligible');
        }
    }


    public function store(Request $request)
    {
      //TODO: Validation
	  $validator = Validator::make($request->all(), [
	  'surname_el' => 'required',
	  'name_el' => 'required',
	  'surname_en' => 'required',
	  'name_en' => 'required',
	  'fathersname'  => 'required',
	  'mothersname'  => 'required',
	  'age'  => 'required|numeric',
	  'idno' => 'required',
	  'birthplace' => 'required',
	  // birthdate ?
	  'prefecture' => 'required',
	  'citizenship' => 'required',
	  'address_el' =>'required',
	  'address_en' => 'required',
	  'nο_el' => 'required',
	  'city_el' =>'required',
	  'city_en' =>'required',
	  'tk' => 'numeric|required',
	  'tel' => 'required',
	  'mobtel' => 'required',
	  'email' => 'required',
    'iddate' => 'required',
    'idloc' => 'required',
    'amka' => 'required',
		'documents' => 'required|mimes:zip|max:8192',
	  ]);
 //'certficatelang' => 'required|mimes:jpeg,jpg,pdf|max:2048',
	  if ($validator->fails()){
		  return redirect()->back()->withErrors($validator)->withInput();
	  }


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
      $application -> iddate = $request ->input('iddate');
      $application -> idloc = $request ->input('idloc');
      $application -> amka = $request ->input('amka');
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

      $request->file('documents')->storeAs('documents', $application->id.".zip");

      //TODO: Check result here

      return redirect()->route('erasmus.success');
    }


    public function view()
    {
      $applications = Application::where('spec_aem',EGuard::user()->id)->get();

      $universities = University::pluck('name', 'id');
      $languages = Language::pluck('name', 'id');

      $langlevel = [
        1 => "B1",
        2 => "B2",
        3 => "C1",
        4 => "C2"
      ];

      return view('erasmus.viewapplication') ->with("stdata",EGuard::getApiDetails())
                                          ->with('universities',$universities)
                                          ->with('languages',$languages)
                                          ->with('langlevel',$langlevel)
                                          ->with('applications',$applications);
    }


    public function view_appid($id)
    {

				  $application = Application::findOrFail($id);


	if (  $application->spec_aem != EGuard::user()->id && EGuard::user()-> type == 'Undergraduate' )
		{
			return redirect('home');
		}

      $universities = University::pluck('name', 'id');
      $languages = Language::pluck('name', 'id');
      $langlevel = [
        1 => "B1",
        2 => "B2",
        3 => "C1",
        4 => "C2"
      ];





      return view('erasmus.viewapplicationid')->with('application',$application)
                                              ->with('universities',$universities)
                                              ->with('languages',$languages)
                                              ->with('langlevel',$langlevel);
    }

		 public function edit($id)
    {
        $application = Application::findOrFail($id);

	if (  $application->spec_aem != EGuard::user()->id && EGuard::user()-> type == 'Undergraduate' )
		{
			return redirect('home');
		}


       // return view('university.edit')->with('languages',$languages)->with('university',$university);
      if ($stdata -> depID == 604)
	  {
		  $depname = "icte";
	  }
	  
	  $universities = University::where($depname,'tmhma')->pluck('name', 'id');
      $languages = Language::pluck('name', 'id');

      $langlevel = [
        1 => "B1",
        2 => "B2",
        3 => "C1",
        4 => "C2"
      ];

	 return view('erasmus.edit')->with('application',$application)
                                           ->with('universities',$universities)
                                           ->with('languages',$languages)
                                           ->with('langlevel',$langlevel);

   }

   public function updateapplication (Request $request)
   {
	   //TODO VALIDATOR
	   //TODO: Validation
	  $validator = Validator::make($request->all(), [
	  'surname_en' => 'required',
	  'name_en' => 'required',
	  'fathersname'  => 'required',
	  'mothersname'  => 'required',
	  'age'  => 'required|numeric',
	  'idno' => 'required',
	  'birthplace' => 'required',
	  // birthdate ?
	  'prefecture' => 'required',
	  'citizenship' => 'required',
	  'address_el' =>'required',
	  'address_en' => 'required',
	  'nο_el' => 'required|numeric',
	  'city_el' =>'required',
	  'city_en' =>'required',
	  'tk' => 'numeric|required',
	  'tel' => 'required',
	  'mobtel' => 'required',
	  'email' => 'required',
    'iddate' => 'required',
    'idloc' => 'required',
    'amka' => 'required',
		'documents' => 'mimes:zip|max:8192',
	  ]);
 //'certficatelang' => 'required|mimes:jpeg,jpg,pdf|max:2048',
	  if ($validator->fails()){
		  return redirect()->back()->withErrors($validator)->withInput();
	  }







	   $application = application::findOrFail($request->input('id'));


	   //EDIT TAB 1
	  $application -> surname_el = $request ->input('surname_el');
      $application -> name_el = $request ->input('name_el');
      $application -> surname_en = $request ->input('surname_en');
      $application -> name_en = $request ->input('name_en');
      $application -> fathersname = $request ->input('fathersname');
      $application -> mothersname = $request ->input('mothersname');
      $application -> age = $request ->input('age');
      $application -> idno = $request ->input('idno');
      $application -> iddate = $request ->input('iddate');
      $application -> idloc = $request ->input('idloc');
      $application -> amka = $request ->input('amka');
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


      $application -> l1 = ($request->input('l1') == true ? 0:1);
      $application -> l2 = ($request->input('l2') == true ? 0:1);
      $application -> l3 = ($request->input('l3') == true ? 0:1);
      $application -> l4 = ($request->input('l4') == true ? 0:1);
      $application -> l5 = ($request->input('l5') == true ? 0:1);
      $application -> l6 = ($request->input('l6') == true ? 0:1);

	   //EDIT TAB 3
	   if ( $request->file('documents') != null)
	   {
			$request->file('documents')->storeAs('documents', $application->id.".zip");
	   }
	  $application -> save();
	  return redirect()->route('erasmus.success');
   }

}
