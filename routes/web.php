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

Auth::routes();

Route::group(['middleware' => 'role:admin'], function () {
	Route::resource('role', 'Laratrust\RoleController');
	Route::resource('permission', 'Laratrust\PermissionController');
	Route::get('/roles/ajustar/{iduser}', 'Laratrust\RoleController@listaajustar');
	Route::post('/roles/ajustar', 'Laratrust\RoleController@ajustar');
	Route::get('/permission/ajustar/{iduser}','Laratrust\PermissionController@listaajustar');
	Route::post('/permission/ajustar', 'Laratrust\PermissionController@ajustar');
	//Route::get('/permission/ajustar/{iduser}', ['middleware' => ['permission:participante'], 'uses' => 'Laratrust\PermissionController@listaajustar']);
	});


Route::group(['middleware' => 'role:admin|participante-user'], function () {	
	Route::resource('usuario', 'UsuarioController');
	Route::get('usuario/create', ['middleware' => ['permission:create-user'], 'uses' => 'UsuarioController@create']);
	
	});

Route::group(['middleware' => 'auth'], function () {
	Route::get('/', 'HomeController@index');
	Route::get('/home', 'HomeController@index');
	Route::get('/perfil/edit', 'Perfil\PerfilController@edit');
	Route::resource('perfil', 'Perfil\PerfilController');
	Route::post('/perfil/update', 'Perfil\PerfilController@update');
	
});