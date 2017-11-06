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

        return view('superadmin.settings.ranking')->with('settings',$settings)
                                                  ->with('appl_finaldate', Setting::find('appl_finaldate')->value)
                                                  ->with('appl_status', Setting::find('appl_status')->value)
                                                  ->with('platform_status', Setting::find('platform_status')->value);
    }


    public function update(Request $request)
    {
      $appl_finaldate = Setting::find('appl_finaldate');
      $appl_finaldate -> value = $request -> appl_finaldate;
      $appl_finaldate -> save();


      $appl_status = Setting::find('appl_status');
      $appl_status -> value = $request -> appl_status;
      $appl_status -> save();

      $platform_status = Setting::find('platform_status');
      $platform_status -> value = $request -> platform_status;
      $platform_status -> save();

      flash()->success('Οι αλλαγές σας αποθηκεύθηκαν με επιτυχία!');
      return redirect()->back();
    }

}
