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

Route::get('ContactBt','ContactBtController@index');
Route::get('ContactBt/{id}/edit','ContactBtController@edit');
Route::post('ContactBt/{id}/update','ContactBtController@update');
Route::get('/', function () {
    return view('welcome');
});
