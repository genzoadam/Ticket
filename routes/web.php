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

Route::get('/', 'TamuController@index');
Route::get('/cari', 'TamuController@cari');

Route::post('/cari', [
	'as' => 'tickets.cari',
	'uses' => 'TicketsController@cari'
]);

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix'=>'admin', 'middleware'=>['auth', 'role:admin']], function(){
	Route::resource('pesawats', 'PesawatsController');
	Route::resource('tickets', 'TicketsController');
});