<?php

namespace App\Classes;

use Session;
use Auth;

class EGuard
{

    public static function user()
    {
        


        cas()->client("S1", "https://sso.uowm.gr", "443", '');
        cas()->setCasServerCACert(asset("certs/AddTrustExternalRoot.pem"));
        cas()->forceAuthentication();

        if(cas()->isAuthenticated())
        {
            return dd("Not authorized");
        }

        dd(cas()->getAttributes());
    	$sso = Session()->get('current_user');

    	if(!$sso) return false;

    	$departmentFull = "";

		switch (cas()->getAttribute("GUStudentDepartmentID")) {
		    case "371":
		        $departmentFull = "Μηχανικών Πληροφορικής & Τηλεπικοινωνιών";
		        break;
		    default:
		        $departmentFull = "Άγνωστο";
		}

        //Store SSO attributes
    	$user = 
    	[
    		'email' => cas()->getAttribute("mail"),
    		'id' => cas()->getAttribute("GUStudentID"),
    		'fullname' => cas()->getAttribute("cn"),
    		'firstname' => cas()->getAttribute("givenName"),
    		'lastname' => cas()->getAttribute("sn"),
    		'education' => ucfirst(cas()->getAttribute("eduPersonAffiliation")),
    		'type' => ucfirst(cas()->getAttribute("GUStudentType")),
    		'semester' => cas()->getAttribute("GUStudentSemester"),
    		'departmentID' => cas()->getAttribute("GUStudentDepartmentID"),
    		'departmentFull' => $departmentFull,
    	];

    	return (object)($user);
    }

    public static function logout()
    {
    	Session()->forget('current_user');
    }

    //Returns authentication status
    public static function authenticated()
    {
        if(cas()->isAuthenticated() || Auth::user())
            return true;

        return false; 
    }
}

?>