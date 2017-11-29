<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Students;
use App\University;
use App\Language;
use Illuminate\Support\Facades\Validator;
use EGuard;
use DB;

class UniversityController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(EGuard::user()->type != 'Superadmin')
              abort(403, 'Access denied');
            return $next($request);
        });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $universities = University::paginate(15);
        $languages = Language::pluck('name', 'id');
		/*
		//JSON START
		$json = file_get_contents('https://intrelations.uowm.gr/bilaterals_json.php');
		$obj = json_decode($json);
		
		foreach ( $obj as $univer)
		{
			$test2 = $univer->out_students;
			
			foreach ( $test2 as $obj2)
			{
				
			$caps = $obj2->students_number;
			//echo $obj2->department[0] . " ";
			//echo $obj2->study_circle[0] . " ";
			//$lang_lvl = $obj2->language_level . " ";
			//echo $obj2->subject_area . "<br>";
			//var_dump($test2);
			
			
			$university = new University();
			$university -> name = $univer->university;
			$university -> cap = $caps;
			//$university -> lang_id = 1;
			$university -> tmhma = $obj2->department[0];
			//TODO: Handle failures here
			
			$uni_exist = DB::table('universities')
			->where('name','=', $univer->university)
			->where('cap','=',$obj2->students_number)
			->where('tmhma','=',$obj2->department[0])
			->exists();
			 
		
			if ($uni_exist == null && $obj2->study_circle[0] == "pregrad" )
			{
				
				$university -> save();
			}
			
			}
			

		}
		
		//JSON END
		*/
		
        return view('university.index')->with('universities',$universities)->with('languages',$languages);
    }

    public function new()
    {
        $languages = Language::pluck('name', 'id');
        return view('university.new')->with('languages',$languages);
    }

    public function edit($id)
    {
        $university = University::findOrFail($id);
        $languages = Language::pluck('name', 'id');
        return view('university.edit')->with('languages',$languages)->with('university',$university);
    }

    public function delete($id)
    {
        $university = University::findOrFail($id);
        $university -> delete();

        return redirect()->route('admin.university.index');
    }

    public function create(Request $request)
    {

			$validator = Validator::make($request->all(), [
		 'name' => 'required',
		 'cap' => 'required|numeric',
	 ]);

	 if ($validator->fails()){
		  return redirect()->back()->withErrors($validator)->withInput();
	  }

      $university = new University();
      $university -> name = $request->input('name');
      $university -> cap = $request->input('cap');
      $university -> lang_id = $request->input('lang_id');
      //TODO: Handle failures here
	 
      $university -> save();

      return redirect()->route('admin.university.index');
    }

    public function update(Request $request)
    {

	$validator = Validator::make($request->all(), [
		 'name' => 'required',
		 'cap' => 'required|numeric',
	 ]);

	 if ($validator->fails()){
		  return redirect()->back()->withErrors($validator)->withInput();
	  }

      $university = University::findOrFail($request->input('id'));
      $university -> name = $request->input('name');
      $university -> cap = $request->input('cap');
      $university -> lang_id = $request->input('lang_id');
      //TODO: Handle failures here
      $university -> save();
	  
	  //patenta 
	  //DB::table('universities')->where('name','=',$request->input('name'))->update('lang_id','=',$request->input('lang_id'));
		University::where('name','=',$request->input('name'))->update(['lang_id' => $request->input('lang_id')]);
      return redirect()->route('superadmin.settings.users_index');
    }
	
	 public function jsonget()
    {
		        $universities = University::paginate(15);
        $languages = Language::pluck('name', 'id');
		//JSON START
		$json = file_get_contents('https://intrelations.uowm.gr/bilaterals_json.php');
		$obj = json_decode($json);
		
		foreach ( $obj as $univer)
		{
			$test2 = $univer->out_students;
			
			foreach ( $test2 as $obj2)
			{
				
			$caps = $obj2->students_number;
			//echo $obj2->department[0] . " ";
			//echo $obj2->study_circle[0] . " ";
			//$lang_lvl = $obj2->language_level . " ";
			//echo $obj2->subject_area . "<br>";
			//var_dump($test2);
			
			
			$university = new University();
			$university -> name = $univer->university;
			$university -> cap = $caps;
			//$university -> lang_id = 1;
			$university -> tmhma = $obj2->department[0];
			//TODO: Handle failures here
			
			$uni_exist = DB::table('universities')
			->where('name','=', $univer->university)
			->where('cap','=',$obj2->students_number)
			->where('tmhma','=',$obj2->department[0])
			->exists();
			 
		
			if ($uni_exist == null && $obj2->study_circle[0] == "pregrad" )
			{
				
				$university -> save();
			}
			
			}
			

		}
		 return view('university.index')->with('universities',$universities)->with('languages',$languages);
		//JSON END
	}

}
