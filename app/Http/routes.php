<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

Route::get('/commandes', 'CommandesController@index');


Route::get('/details', 'DetailsController@index');
Route::get('/statistiques', 'StatistiquesController@index');

Route::get('/factures', 'FacturesController@index');


//Route::get('home', 'WelcomeController@index');
//Route::get('commandes', 'OrdersController@create');
//Route::get('commandes', 'J2storeAddressController@index');





Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
