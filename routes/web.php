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

Route::get('/', function () {
    return view('auth.login');
});


//Profile routes for students
Route::get('/profile/grades', function () {
    return view('profile.grades');
})->name('profile.grades');

Route::get('/profile/details', function () {
    return view('profile.details');
})->name('profile.details');

Route::get('/profile/ects', function () {
    return view('profile.ects');
})->name('profile.ects');


//Erasmus routes for students
Route::get('/erasmus/application', function () {
    return view('erasmus.application');
})->name('erasmus.application');


//Generic routes
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'Auth\LoginController@register')->name('register');
Route::post('/register', 'Auth\LoginController@adduser')->name('adduser');
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@authenticate')->name('authenticate');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');


Route::get('/upload','UploadImageController@index');
Route::post('/upload','UploadImageController@upload');
Route::post('/home','HomeController@postnews');
Route::post('/application','ApplicationController@index');
