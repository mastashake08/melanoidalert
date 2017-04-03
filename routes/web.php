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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('/missing-person','MissingPersonController');

Route::get('/about',function(){
return view('about');
});

Route::get('/support', function(){

  return view('support');
});

Route::post('/charge','StripeController@charge');
