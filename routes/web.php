<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Generic routes
Route::get('/','HomeController@logintype')->name('/');

Route::get('/register', 'Auth\LoginController@register')->name('register');
Route::post('/register', 'Auth\LoginController@adduser')->name('adduser');
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@authenticate')->name('authenticate');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/admin_login', 'Auth\LoginController@admin_login')->name('admin_login');
Route::post('/admin_login', 'Auth\LoginController@admin_authenticate')->name('admin_authenticate');


Route::group(['middleware' => ['cas.guard']], function () {
  Route::get('/home', 'HomeController@index')->name('home');

  Route::get('/profile/grades', function () {
    return view('profile.grades')->with("stdata",EGuard::getApiDetails());
  })->name('profile.grades');

  Route::get('/profile/details', function () {
      return view('profile.details');
  })->name('profile.details');

  Route::get('/profile/ects', function () {
      return view('profile.ects')->with("stdata",EGuard::getApiDetails());
  })->name('profile.ects');


  //Erasmus routes for students
  Route::get('/erasmus/application', function () {
      return view('erasmus.application');
  })->name('erasmus.application');

  Route::get('/erasmus/application2', 'ApplicationController@index')->name('erasmus.application2');

  Route::get('/erasmus/viewapplication','ViewApplicationController@index')->name('erasmus.viewapplication');
  Route::get('/erasmus/getpdf','ViewApplicationController@getPDF');

  Route::get('/profile', function () {
      return view('profile');
  })->name('profile');

  Route::get('/settings', function () {
      return view('settings');
  })->name('settings');


  Route::get('/upload','UploadImageController@index');
  Route::post('/upload','UploadImageController@upload');
  Route::post('/home','HomeController@postnews');
  Route::post('/erasmus/application','ApplicationController@index');


  Route::get('/universities','UniversityController@index')->name('admin.university.index');
  Route::get('/universities/new','UniversityController@new')->name('admin.university.new');
  Route::post('/universities/new','UniversityController@create');
  Route::get('/universities/edit/{id}','UniversityController@edit')->name('admin.university.edit');
  Route::post('/universities/edit','UniversityController@update');
  Route::get('/universities/delete/{id}','UniversityController@delete')->name('admin.university.delete');
});
