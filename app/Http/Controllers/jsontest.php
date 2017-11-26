<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class jsontest extends Controller
{
     public function index()
    {
		
		$json = file_get_contents('https://intrelations.uowm.gr/bilaterals_json.php');
		$obj = json_decode($json);
		
		foreach ( $obj as $univer)
		{
		
			
			//echo $univer['university']."<br>";
			$test1 = $univer->university;
			$test2 = $univer->out_students;
			//print_r($univer->out_students.study_circle);
				echo $test1 . "<br>";
			foreach ( $test2 as $obj2)
			{
				
			echo $obj2->students_number . " ";
			echo $obj2->department[0] . " ";
			echo $obj2->study_circle[0] . " ";
			echo $obj2->language_level . " ";
			echo $obj2->subject_area . "<br>";
			//var_dump($test2);
			
			}
			
			echo "<hr>";
		

			
			//$test2 = $univer->out_students->students_number;
		
		//echo $obj[0]['university'];
		}
		
		// return view('json');
	}
	
	
}
