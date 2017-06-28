<?php

namespace App\Classes;

use Session;
use Auth;

class EGuard
{

    public static function user()
    {
        phpCAS::forceAuthentication();

        if(phpCAS::isAuthenticated())
        {
            return dd("Not authorized");
        }


    	$sso = Session()->get('current_user');

    	if(!$sso) return false;

    	$departmentFull = "";

		switch (phpCAS::getAttribute("GUStudentDepartmentID")) {
		    case "371":
		        $departmentFull = "Μηχανικών Πληροφορικής & Τηλεπικοινωνιών";
		        break;
		    default:
		        $departmentFull = "Άγνωστο";
		}

        //Store SSO attributes
    	$user = 
    	[
    		'email' => phpCAS::getAttribute("mail"),
    		'id' => phpCAS::getAttribute("GUStudentID"),
    		'fullname' => phpCAS::getAttribute("cn"),
    		'firstname' => phpCAS::getAttribute("givenName"),
    		'lastname' => phpCAS::getAttribute("sn"),
    		'education' => ucfirst(phpCAS::getAttribute("eduPersonAffiliation")),
    		'type' => ucfirst(phpCAS::getAttribute("GUStudentType")),
    		'semester' => phpCAS::getAttribute("GUStudentSemester"),
    		'departmentID' => phpCAS::getAttribute("GUStudentDepartmentID"),
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