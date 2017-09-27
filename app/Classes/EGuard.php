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
    }

    public static function authenticated()
    {
        if(Session()->get('current_user') || Auth::user())
            return true;

        return false;
    }

    public static function admin_authenticated()
    {
        if(Session()->get('current_user') || Auth::user())
            return true;

        return false;
    }

    public static function getApiDetails()
    {
      $client = new \GuzzleHttp\Client();
      //Get results from view1
      $response1 = $client->get(route('view1',EGuard::user()->id));
      $body1 = $response1->getBody()->getContents();

      //Get results from view2
      $response2 = $client->get(route('view2',EGuard::user()->id));
      $body2 = $response2->getBody()->getContents();

      //Merge results & return object
      $stdata = array_merge(json_decode($body1,true), json_decode($body2,true));
      return (object)$stdata;
    }
}

?>
