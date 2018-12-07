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
Route::get('/admin/student/add/studio/{id}', 'adminController@addTallerUser');
Route::post('/admin/student/add/studio/{id}', 'adminController@addTaller');

Route::get('/admin/list/{id}/addTaller', 'adminController@showTallerAdd');
Route::post('/admin/list/{id}/addTaller', 'adminController@showTallerAddGet');

Route::get('/admin/student/{id}/studio', 'adminController@showInfoUserTaller');
Route::post('/admin/student/{id}/studio', 'adminController@checkPassword2');
Route::get('/admin/student/{id}/studio/special', 'adminController@showSpecial');
Route::post('/admin/student/{id}/studio/special', 'adminController@special');

Route::get('/admin/student/{id}/studio/add/User', 'adminController@addUserTaller');
Route::post('/admin/student/{id}/studio/add/User', 'adminController@addUserTallerGet');

Route::get('/admin/student/{id}/studio/delete/User', 'adminController@deleteUserTaller');
Route::post('/admin/student/{id}/studio/delete/User', 'adminController@deleteUserTallerGet');

Route::get('/admin/student/{id}/studio/list', 'adminController@showInfoList');
Route::get('/admin/student/{id}/studio/list/date/{date}', 'adminController@showDate');
Route::post('/admin/student/{id}/studio/list/date/{date}', 'adminController@showDatePost');

Route::get('/admin/lists/taller/{id}', 'adminController@showTaller');
Route::post('/admin/search/list/taller/{id}/getInf', 'adminController@getInf');
Route::get('/admin/search/list/taller/{id}/getInf', 'adminController@showInf');

Route::get('/admin/controlPanel', 'adminController@control');
Route::post('/admin/controlPanel', 'adminController@checkControl');
Route::post('/admin/controlPanel/{variable}', 'adminController@checkPassword');
Route::get('/admin/controlPanel/insert/{variable}', 'adminController@getRegisterWindow');
Route::post('/admin/controlPanel/insert/{variable}', 'adminController@insertRegister');
Route::patch('/admin/controlPanel/insert/{variable}', 'adminController@updateRegister');
Route::delete('/admin/controlPanel/insert/{variable}', 'adminController@deleteRegister');

Route::get('/admin/controlPanel/special/select', 'adminController@controlspecial');
Route::post('/admin/controlPanel/special/select', 'adminController@controlSpecialGet');

Route::get('/admin/controlPanel/control/register', 'adminController@controlRegister');
Route::post('/admin/controlPanel/control/register', 'adminController@controlRegisterPost');

Route::get('/admin/Register/userList', 'adminController@pagination');

Route::get('/admin/Register/userList/ExportExcelAll','ExcelController@All');
Route::get('/admin/profile', 'adminController@profile');
Route::post('/admin/profile', 'adminController@profilePassword');
Route::patch('/admin/profile', 'adminController@editProfile');

Route::get('/admin/{idT}/{idU}/reporte', 'adminController@Reportes');
Route::get('admin/reporte', 'adminController@pruebaReporte');
Route::get('admin/{idT}/{idU}/pdf', 'adminController@htmlView');
//-----------------------------------------------------------------------------------//
Route::get('/user','UserController@index');
Route::get('/user/RegistroUsuario','UserController@getRegister');
Route::post('/user/RegistroUsuario','UserController@postRegister');
Route::get('/user/InfoCompleta','UserController@getCompleto');

Route::get('/user/Profile','UserController@getProfile');
Route::get('/user/EditProfile','UserController@getEdit');
Route::post('/user/EditProfile','UserController@postEdit');

Route::get('/user/Info','UserController@getInfo');

Route::get('/user/search','UserController@getSearch');
Route::post('/user/search','UserController@postSearch');
Route::get('/user/inscripcion/taller/{id}', 'UserController@showTaller');
//-----------------------------------------------------------------------------------//
Route::get('/registro','SignupController@index');
Route::get('/registro/RegistroUsuario','SignupController@getRegister');
Route::post('/registro/RegistroUsuario','SignupController@postRegister');
Route::get('/registro/InfoCompleta','SignupController@getCompleto');
//-----------------------------------------------------------------------------------//
Route::get('/coord','CoordController@index');
