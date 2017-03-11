<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class UploadImageController extends Controller
{
	
	 public function index(){
      return view('profile');
   }
   
   
   public function upload(Request $request)
    {
		 $file = $request->file('image');
   
      
   
      //Display File Size
      echo 'File Size: '.$file->getSize();
      echo '<br>';
   
     
   
      //Move Uploaded File
      $destinationPath = 'uploads';
      $file->move($destinationPath,$file->getClientOriginalName());
    }
}
