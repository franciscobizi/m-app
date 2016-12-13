<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
 *Auth routes
 * 
*/
Route::get('reset', 'UserController@showReset');
Route::post('reset', 'UserController@resetPass');
Route::post('autorization', 'UserController@auth')->name('authentication');
Route::get('home', 'UserController@profile');
Route::get('logout', 'UserController@loGOut');
/*
 *Business routes
 * 
*/

Route::get('usuarios', 'AController@AUsers')->name('all-users');
Route::post('usuarios', 'UserController@newUser')->name('signup-user');
Route::post('militantes', 'AController@MSearch')->name('search-m');
Route::get('militantes', 'AController@AClients')->name('all-militants');
Route::get('eventos', 'AController@AEvents')->name('all-events');
