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



Route::get('/', function () {
    return redirect('login');
});



    Route::get('Oficina', 'oficinaController@index');

    Route::get('Usuarios', 'usuarioController@index');

    Route::get('Vehiculos', 'vehiculoController@index');

    Route::get('Repuestos', 'RepuestosController@index');

    Route::get('Faltantes', 'RepuestosController@faltantes');

    Route::get('Revisiones', 'RevisionesController@index');

    Route::resource('Oficina', 'HomeController@oficina');


//acceso a los recursos usuarios
    Route::resource('Usuarios', 'usuarioController');
//una nueva ruta para eliminar registros con el metodo get
    Route::get('Usuarios/eliminar/{cedula}', ['as' => 'Usuarios/eliminar', 'uses' => 'usuarioController@eliminar']);
//ruta para realizar busqueda de registros.
    Route::post('Usuarios/buscar', ['as' => 'Usuarios/buscar', 'uses' => 'usuarioController@buscar']);

//acceso a los recursos vehiculos
    Route::resource('Vehiculos', 'vehiculoController');
//una nueva ruta para eliminar registros con el metodo get
    Route::get('Vehiculos/eliminar/{placa}', ['as' => 'Vehiculos/eliminar', 'uses' => 'vehiculoController@eliminar']);
//ruta para realizar busqueda de registros.
    Route::post('Vehiculos/buscar', ['as' => 'Vehiculos/buscar', 'uses' => 'vehiculoController@buscar']);

    Route::post('Vehiculos/reportar', ['as' => 'Vehiculos/reportar', 'uses' => 'vehiculoController@reportar']);

//acceso a los recursos vehiculos
    Route::resource('Repuestos', 'RepuestosController');
//una nueva ruta para eliminar registros con el metodo get
    Route::get('Repuestos/eliminar/{placa}', ['as' => 'Repuestos/eliminar', 'uses' => 'RepuestosController@eliminar']);
//ruta para realizar busqueda de registros.
    Route::post('Repuestos/buscar', ['as' => 'Repuestos/buscar', 'uses' => 'RepuestosController@buscar']);

//acceso a los recursos vehiculos
Route::resource('Revisiones', 'RevisionesController');

Route::get('Revisiones/deleted/{placa}/{id}', ['as' => 'Revisiones/deleted', 'uses' => 'RevisionesController@borrar']);

Route::get('Revisiones/todas/{id}', ['as'=> 'Revisiones/todas','uses' => 'RevisionesController@todas']);
//ruta para realizar busqueda de registros.
Route::post('Revisiones/buscar', ['as' => 'Revisiones/buscar', 'uses' => 'RevisionesController@buscar']);

Route::get('Revisiones/index',['as' => 'Revisiones/index', 'uses' => 'RevisionesController@inicio']);

Route::get('Revisiones/editar/{placa}/{id}',['as'=>'Revisiones/editar','uses' => 'RevisionesController@editar']);

Route::get('Revisiones/nuevo/{placa}',['as'=>'Revisiones/nuevo', 'uses' => 'RevisionesController@nuevo']);

Route::post('Revisiones/guardar', ['as' => 'Revisiones/guardar', 'uses' => 'RevisionesController@guardar']);

Route::get('Revisiones/ver/{id}/{placa}', ['as' => 'Revisiones/ver', 'uses' => 'RevisionesController@ver']);


Auth::routes();

Route::get('home', 'HomeController@index');
Route::get('home/exit', 'homeController@salida');

Route::get('otro', 'HomeController@otros');
