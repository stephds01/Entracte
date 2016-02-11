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



//page Home
Route::get('/', 'HomeController@index');
//Route::get('home', 'HomeController@index');
////Route::get('home', 'HomeController@contact');

//Historique de commandes  (page commandes / histo.blade)
	Route::get('/historique', 'CommandesController@index');


//Commandes en attente (page commandes / index.blade)
//Route::get('/commandes', 'CommandesController@waitCom');


//Détails de commandes
//Route::get('/details', 'DetailsController@index');
//Route::get('/details/{order_id}', 'DetailsController@details');
Route::get('/commande/{order_id}', 'DetailsController@commande');
Route::post('/commande/{order_id}', ['as' => 'valid_status', 'uses' => 'DetailsController@update']);
//Route::get('/details', 'DetailsController@index');
//Route::get('/details/{orderitem_id}', 'DetailsController@orderDetail');

//Statistiques
Route::get('/statistiques', 'StatistiquesController@index');
Route::post('/statistiques', 'StatistiquesController@datePicker');

//Facture
Route::get('/factures', 'FacturesController@index');




//Ancienne route
//Route::get('home', 'WelcomeController@index');
//Route::get('commandes', 'OrdersController@create');
//Route::get('commandes', 'J2storeAddressController@index');




//Authentification
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
