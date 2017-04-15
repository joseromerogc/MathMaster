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
	Route::get('usuario/editar','UsuarioController@editar');
	Route::resource('usuario', 'UsuarioController');
	Route::get('usuario/create', ['middleware' => ['permission:create-user'], 'uses' => 'UsuarioController@create']);
	Route::get('usuario/store', ['middleware' => ['permission:create-user'], 'uses' => 'UsuarioController@create']);

	
	});

Route::get('/', function () {
    return view('index');   
	});

Route::post('/enviarmail','MensajeController@mail');

Route::group(['middleware' => 'auth'], function () {
	Route::get('/escritorio', 'HomeController@index');
	Route::get('/home', 'HomeController@index');
	Route::get('/perfil/edit', 'Perfil\PerfilController@edit');
	Route::resource('perfil', 'Perfil\PerfilController');
	Route::post('/perfil/update', 'Perfil\PerfilController@update');
	Route::resource('escenario', 'Desafio\EscenarioController');
	Route::get('escenario/create', ['middleware' => ['permission:create-escenario'], 
		'uses' => 'Desafio\EscenarioController@create']);
	Route::get('escenario/store', ['middleware' => ['permission:create-escenario'], 
		'uses' => 'Desafio\EscenarioController@store']);
	Route::resource('subescenario', 'Desafio\SubEscenarioController');
	Route::get('subescenario/create/{idescenario}', ['middleware' => ['permission:create-escenario'], 
		'uses' => 'Desafio\SubEscenarioController@create']);
	Route::get('subescenario/store', ['middleware' => ['permission:create-escenario'], 
		'uses' => 'Desafio\EscenarioController@store']);
	Route::resource('desafio', 'Desafio\DesafioController');
	Route::get('desafio/create/{idescenario}', ['middleware' => ['permission:create-desafio'], 
		'uses' => 'Desafio\DesafioController@create']);
	Route::get('desafio/store', ['middleware' => ['permission:create-desafio'], 
		'uses' => 'Desafio\DesafioController@store']);
	Route::resource('pregunta', 'Desafio\PreguntaController');
	Route::get('pregunta/create/{idescenario}', ['middleware' => ['permission:create-desafio'], 
		'uses' => 'Desafio\PreguntaController@create']);
	Route::get('pregunta/store', ['middleware' => ['permission:create-desafio'], 
		'uses' => 'Desafio\PreguntaController@store']);
	Route::get('opcion/create/{idescenario}', ['middleware' => ['permission:create-desafio'], 
		'uses' => 'Desafio\OpcionController@create']);
	Route::get('opcion/store', ['middleware' => ['permission:create-desafio'], 
		'uses' => 'Desafio\OpcionController@store']);
	Route::resource('opcion', 'Desafio\OpcionController');
	Route::get('respuesta/validar/{idpregunta}/{respuesta}','Desafio\DesafioUserController@validar');
	Route::get('respuesta/iniciar/{idpregunta}', 'Desafio\DesafioUserController@iniciar');
	Route::resource('mensaje', 'MensajeController');
	Route::resource('titulo', 'TituloController');
});

Route::get('/leido','MensajeController@leido');
Route::get('/notificaciones/historial','NotificacionController@historial');
Route::get('/notificaciones/nivel','NotificacionController@nivel');
Route::get('/notificaciones/desafio','NotificacionController@desafio');
Route::get('/notificaciones/titulo','NotificacionController@titulo');
Route::get('/mensajes/general','MensajeController@general');
Route::get('/tops','HomeController@tops');
Route::get('/matetoon/{url}','Perfil\PerfilController@matetoon');
