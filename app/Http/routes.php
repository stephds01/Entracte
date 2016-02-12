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


Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'HomeController@index');
	Route::get('/historique', 'CommandesController@index');
	Route::get('/commande/{order_id}', 'DetailsController@commande');
	Route::post('/commande/{order_id}', ['as' => 'valid_status', 'uses' => 'DetailsController@update']);
	Route::get('/statistiques', 'StatistiquesController@index');
	Route::post('/statistiques', 'StatistiquesController@datePicker');
});
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
