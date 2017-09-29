<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\EGuard;
use App\University;
use App\Language;

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

        return view('erasmus.application2') ->with("stdata",EGuard::getApiDetails())
                                            ->with('universities',$universities)
                                            ->with('languages',$languages);
    }

}
