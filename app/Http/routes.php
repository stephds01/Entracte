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
	//page Home
	Route::get('/', 'HomeController@index');

	//Historique de commandes  (page commandes / histo.blade)
		Route::get('/historique', 'CommandesController@index');


	//Détails de commandes
	Route::get('/commande/{order_id}', 'DetailsController@commande');
	Route::post('/commande/{order_id}', ['as' => 'valid_status', 'uses' => 'DetailsController@update']);

	//Statistiques
	Route::get('/statistiques', 'StatistiquesController@index');
	Route::post('/statistiques', 'StatistiquesController@datePicker');

	//Facture
	Route::get('/factures', 'FacturesController@index');
});


//Authentification
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
