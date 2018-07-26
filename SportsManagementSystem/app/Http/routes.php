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

//-----------------------------------------------------------------------------------//
Route::get('/', 'Auth\AuthController@getLogin');
Route::post('/', 'Auth\AuthController@postLogin');
Route::get('/logout','Auth\AuthController@getLogout');
//-----------------------------------------------------------------------------------//
Route::get('/admin', 'adminController@index');
//-----------------------------------------------------------------------------------//
Route::get('/user','UserController@index');