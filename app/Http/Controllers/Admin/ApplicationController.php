<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Classes\EGuard;
use App\University;
use App\Language;
use App\Application;
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
      $this->middleware(function ($request, $next) {
          if(EGuard::user()->type != 'Administrator')
            abort(403, 'Access denied');
          return $next($request);
      });
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */



    public function unconfirmed()
    {
      $applications = Application::whereYear('created_at', '=', date('Y'))->where('confirmed',false)->get();

      $universities = University::pluck('name', 'id');
      $languages = Language::pluck('name', 'id');

      $langlevel = [
        1 => "B1",
        2 => "B2",
        3 => "C1",
        4 => "C2"
      ];



      return view('admin.application.index')->with('applications',$applications)
                                            ->with('universities',$universities)
                                            ->with('languages',$languages)
                                            ->with('langlevel',$langlevel);
    }

    public function confirmed()
    {
      $universities = University::pluck('name', 'id');
      $languages = Language::pluck('name', 'id');

      $langlevel = [
        1 => "B1",
        2 => "B2",
        3 => "C1",
        4 => "C2"
      ];

      $applications = Application::whereYear('created_at', '=', date('Y'))->where('confirmed',true)->get();

      return view('admin.application.index')->with('applications',$applications)
                                            ->with('universities',$universities)
                                            ->with('languages',$languages)
                                            ->with('langlevel',$langlevel);
    }



    public function verify(Request $request)
    {
      $application = Application::findOrFail($request->input('id'));
      $application -> additional_pts = $request->input('additional_pts');
      $application -> confirmed = true;
      $application -> save();

      return redirect()->back();
    }

	    public function unverify(Request $request)
    {
      $application = Application::findOrFail($request->input('id'));
      $application -> additional_pts = $request->input('additional_pts');
      $application -> confirmed = false;
      $application -> save();

      return redirect()->back();
    }



}
