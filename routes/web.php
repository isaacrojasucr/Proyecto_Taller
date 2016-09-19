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

//Route::get('Usuarios/crear','usuarioController@crear');

//Route::get('Usuarios/buscar/{cedula}', 'usuarioController@buscar');

//Route::get('Usuarios/guardar', 'usuarioController@guardar');


//Route::get('Usuarios/editar/{cedula}', 'usuarioController@Editar');


Route::resource('Usuarios','usuarioController');
//una nueva ruta para eliminar registros con el metodo get
Route::get('Usuarios/eliminar/{cedula}', ['as' => 'Usuarios/eliminar', 'uses'=>'usuarioController@eliminar']);
//ruta para realizar busqueda de registros.
Route::post('Usuarios/buscar', ['as' => 'Usuarios/buscar', 'uses'=>'usuarioController@buscar']);
