<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Request;
use App\application;
use PDF;
class ViewApplicationController extends Controller
{ 
 public function index()
    {
    		$usern =Auth::User()->name;
			$appls = application::where('emailacc',$usern)->first();
			//$usern = 1;	
		return view('erasmus.viewapplication')->with('appls',$appls);;
	}
	
	    public function getPDF(){
		
		$pdf=PDF::loadView('pdftest');
		return $pdf->download('pdftest.pdf');
	}
	
}
