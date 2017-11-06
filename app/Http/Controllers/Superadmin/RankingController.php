<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Classes\EGuard;
use App\User;
use Illuminate\Support\Facades\Validator;
use App\Setting;

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

    public function index()
    {
        $settings = Setting::all();

        $appl_finaldate = Setting::find('appl_finaldate')->value;

        return view('superadmin.settings.ranking')->with('settings',$settings)
                                                  ->with('appl_finaldate',$appl_finaldate);
    }


    public function update(Request $request)
    {
      $appl_finaldate = Setting::find('appl_finaldate');
      $appl_finaldate -> value = $request -> appl_finaldate;
      $appl_finaldate -> save();
      return redirect()->back();
    }

}
