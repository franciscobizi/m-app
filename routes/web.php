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
Route::get('reset', 'AuthController@resetPage');
Route::post('reset', 'AuthController@resetPass');
Route::post('autorization', 'AuthController@auth')->name('authentication');
Route::get('home', 'AuthController@userAcount')->name('user-profile');
Route::get('logout', 'AuthController@logOut');
/*
 * Users routes
 * 
*/
Route::get('usuarios', 'UserController@listUsers')->name('all-users');
Route::post('usuarios', 'UserController@addUser')->name('signup-user');
/*
 * Guest routes
 * 
*/
Route::post('search', 'GuestController@searchGuest');
Route::get('militantes', 'GuestController@listGuest')->name('all-militants');
Route::post('add-guest', 'GuestController@addGuest');
Route::post('militantes', 'GuestController@updateGuest')->name('edit-guest');
Route::post('delete-guest', 'GuestController@removeGuest');
/*
 * Events routes
 * 
*/
Route::get('eventos', 'EventsController@listEvents');
Route::post('eventos', 'EventsController@addEvents')->name('add-events');
/*
 * Reports routes
 * 
*/
Route::get('relatorios', 'ReportsController@listReports')->name('reports');



