<?php

namespace App\Http\Controllers;

use App\news;
use Request;
use App\Classes\Students;

class HomeController extends Controller
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
    		$news_get=news::all();
        return view('home')->with('news_get',$news_get);
    }


    public function success()
    {
        return view('erasmus.success');
    }


    public function logintype()
    {

      if(cas()->isAuthenticated())
        cas()->logout();

        return view('logintype');
    }


	public function postnews()
	{
		$input = Request::all();
		$new = new news();
		$new->title = $input['title'];
		$new->body = $input['body'];
		$new-> save();
		 return redirect('home');

	}


  public function time()
	{
		 return \Carbon\Carbon::now('Europe/Athens')->format("H:i:s");
	}
}
