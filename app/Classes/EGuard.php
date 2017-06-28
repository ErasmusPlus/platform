<?php

namespace App\Classes;

use Session;


class EGuard
{

    public static function user()
    {
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
}

?>