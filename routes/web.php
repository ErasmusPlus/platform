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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/register', 'Auth\LoginController@register')->name('register');
Route::post('/register', 'Auth\LoginController@adduser')->name('adduser');
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@authenticate')->name('authenticate');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/upload','UploadImageController@index');
Route::post('/upload','UploadImageController@upload');
Route::post('/home','HomeController@postnews');

