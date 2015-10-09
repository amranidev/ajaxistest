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

/*
 |
 | Ajaxis by bootstrap 
 |
 | 
 */ 
Route::get('ContactBt','ContactBtController@index');
Route::get('ContactBt/{id}/edit','ContactBtController@edit');
Route::post('ContactBt/{id}/update','ContactBtController@update');
Route::get('ContactBt/create','ContactBtController@create');
Route::post('ContactBt/store','ContactBtController@store');
Route::get('ContactBt/{id}/show','ContactBtController@show');
Route::get('ContactBt/{id}/delete','ContactBtController@delete');
Route::get('ContactBt/{id}/destroy','ContactBtController@destroy');

/*
 |
 | Ajaxis by Materialize
 |
 |
*/
Route::get('ContactMt','ContactMtController@index');
Route::get('ContactMt/{id}/edit','ContactMtController@edit');
Route::post('ContactMt/{id}/update','ContactMtController@update');
Route::get('ContactMt/create','ContactMtController@create');
Route::post('ContactMt/store','ContactMtController@store');
Route::get('ContactMt/{id}/show','ContactMtController@show');
Route::get('ContactMt/{id}/delete','ContactMtController@delete');
Route::get('ContactMt/{id}/destroy','ContactMtController@destroy');


Route::get('/', function () {
    return view('index');
});
