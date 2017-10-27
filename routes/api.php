<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//TODO: Implement authentication
Route::get('/view1/{aem}/{depID}', function ($aem,$depID) {
  $client = new GuzzleHttp\Client();
  $res = $client->get(env('API_HOST')."view1.php?aem=$aem&depID=$depID");

  if($res->getStatusCode() == 200)
    echo $res->getBody(); // { "type": "User", ....
})->name('view1');

//TODO: Implement authentication
Route::get('/view2/{aem}/{depID}', function ($aem,$depID) {
  $client = new GuzzleHttp\Client();
  $res = $client->get(env('API_HOST')."view2.php?aem=$aem&depID=$depID");

  if($res->getStatusCode() == 200)
    echo $res->getBody(); // { "type": "User", ....
})->name('view2');
