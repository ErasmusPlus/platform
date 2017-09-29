<?php

namespace App\Http\Controllers;

use App\Classes\EGuard;
use App\Application;

class RankingController extends Controller
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
        return view('erasmus.ranking');
    }

}
