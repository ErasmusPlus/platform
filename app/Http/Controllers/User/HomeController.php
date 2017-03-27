<?php

namespace App\Http\Controllers\User;

use App\news;
use Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('user');
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

	public function postnews()
	{
		$input = Request::all();
		$new = new news();
		$new->title = $input['title'];
		$new->body = $input['body'];
		$new-> save();
		 return redirect('home');

	}
}
