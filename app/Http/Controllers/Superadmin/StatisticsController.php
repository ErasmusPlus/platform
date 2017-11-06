<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Classes\EGuard;
use App\User;
use Illuminate\Support\Facades\Validator;


class StatisticsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware(function ($request, $next) {
          if(EGuard::user()->type != 'Superadmin')
            abort(403, 'Access denied');
          return $next($request);
      });
    }

    public function index()
    {
        return view('superadmin.statistics');
    }

}
