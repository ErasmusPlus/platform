<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Routing\Redirector;

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
   
     
	$name1=Auth::user()->email;
      //Move Uploaded File
      $destinationPath = 'uploads';
      $file->move($destinationPath, $name1  );
	  
	  $photo_path = $destinationPath . "/" . $name1;
	  
	  Auth::user() -> photo = $photo_path ;
	  Auth::user() -> save();
	  return redirect()->route('profile');
    }
}
