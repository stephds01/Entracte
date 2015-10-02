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



//Historique de commandes  (page Home)
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

//Commandes en attente (page commandes / index.blade)
Route::get('/commandes', 'CommandesController@index');


//Détails de commandes
Route::get('/details', 'detailsController@index');
Route::get('/details/{order_id}', 'detailsController@details');
//Route::get('/details', 'DetailsController@index');
//Route::get('/details/{orderitem_id}', 'detailsController@orderDetail');

//Statistiques
Route::get('/statistiques', 'StatistiquesController@index');

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
