<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\Students;
use App\University;
use App\Language;
use Illuminate\Support\Facades\Validator;
use EGuard;

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

      return redirect()->route('superadmin.settings.users_index');
    }

}
