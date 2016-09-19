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
    return view('welcome');
});


Route::get('Usuarios','usuarioController@index');

Route::get('Vehiculos','vehiculoController@index');

Route::get('Repuestos','RepuestosController@index');


//acceso a los recursos usuarios
Route::resource('Usuarios','usuarioController');
//una nueva ruta para eliminar registros con el metodo get
Route::get('Usuarios/eliminar/{cedula}', ['as' => 'Usuarios/eliminar', 'uses'=>'usuarioController@eliminar']);
//ruta para realizar busqueda de registros.
Route::post('Usuarios/buscar', ['as' => 'Usuarios/buscar', 'uses'=>'usuarioController@buscar']);

//acceso a los recursos vehiculos
Route::resource('Vehiculos','vehiculoController');
//una nueva ruta para eliminar registros con el metodo get
Route::get('Vehiculos/eliminar/{placa}', ['as' => 'Vehiculos/eliminar', 'uses'=>'vehiculoController@eliminar']);
//ruta para realizar busqueda de registros.
Route::post('Vehiculos/buscar', ['as' => 'Vehiculos/buscar', 'uses'=>'vehiculoController@buscar']);

//acceso a los recursos vehiculos
Route::resource('Repuestos','RepuestosController');
//una nueva ruta para eliminar registros con el metodo get
Route::get('Repuestos/eliminar/{placa}', ['as' => 'Repuestos/eliminar', 'uses'=>'RepuestosController@eliminar']);
//ruta para realizar busqueda de registros.
Route::post('Repuestos/buscar', ['as' => 'Repuestos/buscar', 'uses'=>'RepuestosController@buscar']);