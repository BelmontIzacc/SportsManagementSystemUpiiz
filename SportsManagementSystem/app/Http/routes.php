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
Route::get('/', 'welcomeController@index');
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/login', 'Auth\AuthController@postLogin');
Route::get('/logout','Auth\AuthController@getLogout');
//-----------------------------------------------------------------------------------//
Route::get('/admin', 'adminController@index');
Route::get('/admin/registerCoord', 'adminController@registerCoord');
Route::post('/admin/registerCoord','adminController@postCoord');
Route::get('admin/registerStudio', 'adminController@registerStudio');
Route::post('admin/registerStudio', 'adminController@postStudio');
Route::get('admin/search', 'adminController@search');
Route::post('admin/search', 'adminController@getSearch');
Route::get('/admin/lists/{id}', 'adminController@show');
Route::post('/admin/lists/{id}', 'adminController@edit');
Route::delete('/admin/lists/{id}', 'adminController@destroy');
Route::get('/admin/lists/taller/{id}', 'adminController@showTaller');
Route::get('/admin/controlPanel', 'adminController@control');
//-----------------------------------------------------------------------------------//
Route::get('/user','UserController@index');
Route::get('/user/RegistroUsuario','UserController@getRegister');
Route::post('/user/RegistroUsuario','UserController@postRegister');
Route::get('/user/InfoCompleta','UserController@getCompleto');
//-----------------------------------------------------------------------------------//
Route::get('/coord','CoordController@index');