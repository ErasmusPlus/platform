<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use View;
use Session;
use Request;
use Cas;
use App\User;
use App\Classes\EGuard;
use Illuminate\Auth\GenericUser;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserProviderInterface;

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
        //cas()->authenticate();
        cas()->client("S1", "sso.uowm.gr", "443", '');
        cas()->setCasServerCACert(asset("certs/AddTrustExternalRoot.pem"));
        cas()->forceAuthentication();

        $user = cas()->getAttributes();
        dd($user);
        Session()->put('current_user', $user);
      }

      if(EGuard::authenticated())
        return redirect()->route('home');
      else
        return view('auth.login');
    }

    public function authenticate()
    {
      $email = Request::input('email');
      $password = Request::input('password');

      if (Auth::attempt(['email' => $email, 'password' => $password]))
      {
        //Simulate SSO attributes
        $user = [
          "uid" => "st0551@icte.uowm.gr",
          "mail" => "st0551@icte.uowm.gr",
          "eduPersonAffiliation" => "student",
          "sn" => "ΤΣΙΚΤΣΙΡΗΣ",
          "eduPersonPrimaryAffiliation" => "student",
          "eduPersonOrgUnitDN" => "ou=371,ou=units,dc=uowm,dc=gr",
          "cn" => "ΔΗΜΗΤΡΙΟΣ ΤΣΙΚΤΣΙΡΗΣ",
          "GUStudentSemester" => "12",
          "GUStudentDepartmentID" => "371",
          "ou" => "ΜΗΧΑΝΙΚΩΝ ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ",
          "GUStudentType" => "undergraduate",
          "GUStudentID" => "551",
          "GUPersonID" => "0371/551",
          "givenName" => "ΔΗΜΗΤΡΙΟΣ",
          "authenticationMethod" => "gr.uoa.devel.cas.adaptors.ldap.BindLdapAuthenticationHandler",
          "samlAuthenticationStatementAuthMethod" => "urn:oasis:names:tc:SAML:1.0:am:password",
        ];

        Session()->put('current_user', $user);

        return redirect()->route('home');
      }
      else
        return redirect()->route('login');
    }

    public function logout()
    {
      Session::flush();
      EGuard::logout();
      Auth::logout();

      //If we are CAS authenticated logout!
      if(env('AUTH_CAS', false))
        cas()->logout();

      return redirect()->route('login');
    }
}
