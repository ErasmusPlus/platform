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

Route::get('test', function () {
  $tasks = collect([
      ['name' => 'Task1', 'progress' => 40, 'color'=>'red'],
      ['name' => 'Task2', 'progress' => 80, 'color'=>'green'],
  ]);
    return View::make('test')->with('tasks', $tasks);
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout');
