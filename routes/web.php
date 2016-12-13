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
Route::get('reset', 'UserController@showReset');
Route::post('reset', 'UserController@resetPass');
Route::post('autorization', 'UserController@auth');
Route::get('home', 'UserController@profile');
Route::get('logout', 'UserController@loGOut');
/*
 *Admin routes
 * 
*/

Route::get('usuarios', 'AController@AUsers');
Route::get('militantes', 'AController@AClients');
Route::get('eventos', 'AController@AEvents');
Route::post('search', 'AController@MSearch');