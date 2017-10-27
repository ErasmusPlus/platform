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
      		'departmentID' => 604,
      	];

      	return (object)($user);
    }

    public static function logout()
    {
    	 Session()->forget('current_user');
    }

    public static function authenticated()
    {
        if(Session()->has('current_user'))
            return true;

        return false;
    }

    /*
      Fetch data from API & merge them
    */
    public static function getApiDetails()
    {
      $client = new \GuzzleHttp\Client();
      //Get results from view1
      $response1 = $client->get(route('view1',['aem'=>EGuard::user()->id,'depID'=>EGuard::user()->departmentID]));
      $body1 = $response1->getBody()->getContents();
      //Get results from view2
      $response2 = $client->get(route('view2',['aem'=>EGuard::user()->id,'depID'=>EGuard::user()->departmentID]));
      $body2 = $response2->getBody()->getContents();
      
      //Merge results & return object
      $stdata = array_merge(json_decode($body1,true), json_decode($body2,true));
      //dd($stdata);
      return (object)$stdata;
    }

    /*
      Check if currently logged-in user is eligible to make an application for Erasmus+
    */
    public static function isEligible()
    {
      $stdata = EGuard::getApiDetails();

      if($stdata->curr_semester == 2 && $stdata->cources_passed_num < 4) return false;
      if($stdata->curr_semester > 2 && $stdata->cources_passed_num < 8) return false;
      if($stdata->Avg < 6) return false;

      return true;
    }
}

?>
