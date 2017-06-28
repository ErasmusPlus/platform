<?php

namespace App\Classes;

use Session;
use Cas;
use Auth;

class EGuard
{

    public static function user()
    {
    	$sso = Session()->get('current_user');

    	if(!$sso) return false;

    	$departmentFull = "";

		switch ($sso["GUStudentDepartmentID"]) {
		    case "371":
		        $departmentFull = "Μηχανικών Πληροφορικής & Τηλεπικοινωνιών";
		        break;
		    default:
		        $departmentFull = "Άγνωστο";
		}

    	$user = 
    	[
    		'email' => $sso["mail"],
    		'id' => $sso["GUStudentID"],
    		'fullname' => $sso["cn"],
    		'firstname' => $sso["givenName"],
    		'lastname' => $sso["sn"],
    		'education' => ucfirst($sso["eduPersonAffiliation"]),
    		'type' => ucfirst($sso["GUStudentType"]),
    		'semester' => $sso["GUStudentSemester"],
    		'departmentID' => $sso["GUStudentDepartmentID"],
    		'departmentFull' => $departmentFull,
    	];

    	return (object)($user);
    }

    public static function logout()
    {
    	Session()->forget('current_user');
        cas()->logout();
    }


    public static function authenticated()
    {
        if(Session()->get('current_user') || Auth::user())
            return true;

        return false; 
    }
}

?>