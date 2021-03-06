<?php

namespace App\Http\Controllers\Superadmin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Classes\EGuard;
use App\User;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
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
    		$users = User::paginate(15);
        return view('superadmin.settings.users_index')->with('users',$users);
    }

	    public function delete($id)
    {
        $user = user::findOrFail($id);
        $user -> delete();

        return redirect()->route('superadmin.settings.users_index');
    }

	 public function newuser()
    {

        return view('superadmin.settings.add_user');
    }


	    public function create(Request $request)
    {

	$validator = Validator::make($request->all(), [
		 'name' => 'required',
		 'password' => 'required|min:6',
		 'email' => 'required|email',
	 ]);

	 if ($validator->fails()){
		  return redirect()->back()->withErrors($validator)->withInput();
	  }


      $user = new user();
      $user -> name = $request->input('name');
      $user -> password= $request->input('password');
      $user -> email = $request->input('email');

	  $role = $request->input('role');
	  $role++;

	  $user -> role = $role;

      //TODO: Handle failures here
      $user -> save();

      return redirect()->route('superadmin.settings.users_index');
    }



   public function edit($id)
    {
        $user = user::findOrFail($id);
       // return view('university.edit')->with('languages',$languages)->with('university',$university);
        return view('superadmin.settings.edit_users')->with('user',$user);
    }


	public function update(Request $request)
	{
			$validator = Validator::make($request->all(), [
		 'name' => 'required',
		 'password' => 'required|min:6',
	 ]);

	 if ($validator->fails()){
		  return redirect()->back()->withErrors($validator)->withInput();
	  }

		$user = user::findOrFail($request->input('id'));
			$user -> name = $request->input('name');
			$user -> password = $request->input('pass');
			//$user -> password = $request->input('password');
		    $user -> save();
	    return redirect()->route('superadmin.settings.users_index');
	}

}
