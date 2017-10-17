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
        //$this->middleware('auth.cas');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function unconfirmed()
    {
      $applications = Application::whereYear('created_at', '=', date('Y'))->where('confirmed',false)->get();

      return view('admin.application.index')->with('applications',$applications);
    }

    public function confirmed()
    {
      $applications = Application::whereYear('created_at', '=', date('Y'))->where('confirmed',true)->get();

      return view('admin.application.index')->with('applications',$applications);
    }

}
