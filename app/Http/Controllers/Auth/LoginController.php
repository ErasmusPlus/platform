<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use View;
use Session;
use Request;
use Cas;
use App\User;

class LoginController extends Controller
{

    public function register()
    {
      return view('auth.register');
    }

    public function adduser()
    {
      $name = Request::input('name');
      $email = Request::input('email');
      $password = Request::input('password');
      $education = Request::input('education');
      $location = Request::input('location');

      $user = new User();
      $user->name = $name;
      $user->email = $email;
      $user->password = bcrypt($password);
      $user->education = $education;
      $user->location = $location;

      if($user->save())
      {
        Auth::attempt(['email' => $email, 'password' => $password]);
        return redirect()->route('home');
      }
      else
        return redirect()->route('register')->withInput();

    }

    public function login()
    {
      //Redirect to home if user is authenticated

      if(env('AUTH_CAS', false))
      {
        //Implement cas authentication here
        Cas::authenticate();
        $attr = Cas::getAttributes();

        return redirect()->route('home');
      }

      if(Auth::user())
        return redirect()->route('home');
      else
        return view('auth.login');
    }

    public function authenticate()
    {
      $email = Request::input('email');
      $password = Request::input('password');

      if (Auth::attempt(['email' => $email, 'password' => $password]))
        return redirect()->route('home');
      else
        return redirect()->route('login');
    }

    public function logout()
    {
      Session::flush();
      Cas::logout();

      return redirect()->route('login');
    }
}
