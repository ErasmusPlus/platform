<?php

namespace App\Http\Controllers;

use App\Classes\EGuard;
use App\Application;
use App\Rank;
use App\University;

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
        $ranks = Rank::groupBy('app_id')->having('year', date('Y'))->get();
        $universities = University::all();
        return view('erasmus.ranking')->with('ranks', $ranks)->with('universities',$universities);
    }

}
