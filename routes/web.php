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

  Route::get('student_details', function () {
      return view('profile.details');
  })->name('details');

  Route::get('/profile/ects', function () {
      return view('profile.ects')->with("stdata",EGuard::getApiDetails());
  })->name('profile.ects');

  Route::get('/erasmus/success', 'HomeController@success')->name('erasmus.success');

  Route::get('/erasmus/application2', 'ApplicationController@index')->name('erasmus.application2');
  Route::post('/erasmus/application2', 'ApplicationController@store');

  Route::get('/erasmus/view_applications','ApplicationController@view')->name('erasmus.viewapplication');
  Route::get('/erasmus/view_application/{id}','ApplicationController@view_appid')->name('erasmus.viewappid');

  Route::get('/erasmus/getpdf','ViewApplicationController@getPDF');

  Route::get('/profile', function () {
      return view('profile1');
  })->name('profile1');

  Route::get('/settings', function () {
      return view('settings');
  })->name('settings');


  Route::get('/upload','UploadImageController@index');
  Route::post('/upload','UploadImageController@upload');
  Route::post('/home','HomeController@postnews');
  Route::post('/erasmus/application','ApplicationController@index');

  Route::get('/applications/unconfirmed','Admin\ApplicationController@unconfirmed')->name('admin.applications.unconfirmed');
  Route::get('/applications/confirmed','Admin\ApplicationController@confirmed')->name('admin.applications.confirmed');
  Route::post('/applications/verify','Admin\ApplicationController@verify');
  //UNVERIFY TEST
  Route::post('/applications/unverify','Admin\ApplicationController@unverify');

  Route::get('/users/index','Superadmin\UserController@index')->name('superadmin.settings.users_index');
  Route::get('/ranking/settings','Superadmin\RankingController@index')->name('superadmin.settings.ranking');
  Route::get('/statistics','Superadmin\StatisticsController@index')->name('superadmin.statistics');


  Route::get('/universities','UniversityController@index')->name('admin.university.index');
  Route::get('/universities/new','UniversityController@new')->name('admin.university.new');
  Route::post('/universities/new','UniversityController@create');
  Route::get('/universities/edit/{id}','UniversityController@edit')->name('admin.university.edit');
  Route::post('/universities/edit','UniversityController@update');
  Route::get('/universities/delete/{id}','UniversityController@delete')->name('admin.university.delete');

	Route::get('/users/edit_users/{id}','Superadmin\UserController@edit')->name('superadmin.settings.edit_user');
	Route::post('/users/edit_users','Superadmin\UserController@update');
	
	Route::get('/users/new','Superadmin\UserController@newuser')->name('superadmin.settings.add_user');
	Route::post('/users/new','Superadmin\UserController@create');
	Route::get('/users/delete/{id}','Superadmin\UserController@delete')->name('superadmin.users.delete');
	
	//EDIT Application
	Route::get('/erasmus/view_application/edit/{id}','ApplicationController@edit')->name('application.edit');
	Route::post('/erasmus/view_application/edit/','ApplicationController@updateapplication');
	//EDIT Apllication
	
  Route::get('/ranking','RankingController@index')->name('admin.ranking.index');
});
