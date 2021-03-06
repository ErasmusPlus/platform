<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\Auth;
use Auth;
use View;
use Session;
use Request;
use App\User;
use App\Classes\EGuard;
use Cas;
use Cookie;



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
        cas()->authenticate();
        $user = cas()->getAttributes();
        //cas()->logout();
        /*
        $cas_protocol  = "S1";
        $cas_sso_server  = "sso.uowm.gr";
        $cas_port  = 443;
        $cas_cert  = base_path()."/public/certs/AddTrustExternalRoot.pem";
        $cas_logout_app_redirect_url = "http://83.212.103.229/erasmus";

        phpCAS::client($cas_protocol, $cas_sso_server, $cas_port, '');
        phpCAS::setCasServerCACert($cas_cert);
        phpCAS::handleLogoutRequests(true , array($cas_sso_server));
        phpCAS::forceAuthentication();

        $user = phpCAS::getAttributes();
        */

        Session()->put('current_user', $user);


      }
//Cookie::queue(Cookie::forget('laravel_session'));
      if(EGuard::authenticated())
        return redirect()->route('home');
      else
        return view('auth.login');
    }


    public function admin_login()
    {
      //No CAS login for administrator

      if(Session::has('current_user'))
        return redirect()->route('home');
      else
        return view('auth.login_admin');
    }

    public function admin_authenticate()
    {
      $email = Request::input('email');
      $password = Request::input('password');

      if (Auth::attempt(['email' => $email, 'password' => $password]))
      {
        if(Auth::user()->role == 2)
        {
          //Simulate SSO attributes
          $user = [
            "uid" => Auth::user()->email,
            "mail" => Auth::user()->email,
            "eduPersonAffiliation" => "",
            "sn" => "",
            "eduPersonPrimaryAffiliation" => "",
            "eduPersonOrgUnitDN" => "",
            "cn" => Auth::user()->name,
            "GUStudentSemester" => "12",
            "GUStudentDepartmentID" => "371",
            "ou" => "ΜΗΧΑΝΙΚΩΝ ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ",
            "GUStudentType" => "administrator",
            "GUStudentID" => "",
            "GUPersonID" => "",
            "givenName" => "",
            "authenticationMethod" => "localdb",
            "samlAuthenticationStatementAuthMethod" => "localdb",
          ];

          Session()->put('current_user', $user);
          return redirect()->route('home');
        }
        elseif(Auth::user()->role == 3)
        {
          //Simulate SSO attributes
          $user = [
            "uid" => Auth::user()->email,
            "mail" => Auth::user()->email,
            "eduPersonAffiliation" => "",
            "sn" => "",
            "eduPersonPrimaryAffiliation" => "",
            "eduPersonOrgUnitDN" => "",
            "cn" => Auth::user()->name,
            "GUStudentSemester" => "12",
            "GUStudentDepartmentID" => "371",
            "ou" => "ΜΗΧΑΝΙΚΩΝ ΠΛΗΡΟΦΟΡΙΚΗΣ ΚΑΙ ΤΗΛΕΠΙΚΟΙΝΩΝΙΩΝ",
            "GUStudentType" => "superadmin",
            "GUStudentID" => "",
            "GUPersonID" => "",
            "givenName" => "",
            "authenticationMethod" => "localdb",
            "samlAuthenticationStatementAuthMethod" => "localdb",
          ];

          Session()->put('current_user', $user);
          return redirect()->route('home');
        }
        else
        {
          Auth::logout();
          return redirect()->route('admin_login');
        }
      }
      else
        return redirect()->route('admin_login');
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
      EGuard::logout();

      return redirect()->route('/');
	  }

}
