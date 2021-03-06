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
    if (Auth::guest()){
        return redirect('login');
    }else{
        if(Auth::user()->puesto == 1){
            return redirect('Oficina');
        }elseif (Auth::user()->puesto == 2){
            return redirect('Taller');
        }else{
            return redirect('home');
        }

    }

});






    Route::get('Oficina', 'oficinaController@index');

    Route::get('Usuarios', 'usuarioController@index');

    Route::get('Vehiculos', 'vehiculoController@index');

    Route::get('Repuestos', 'RepuestosController@index');

    Route::get('Faltantes', 'RepuestosController@faltantes');

    Route::get('Revisiones', 'RevisionesController@index');

    Route ::get('Taller', 'tallerController@index');

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

    Route::post('Vehiculo/buscarReportes',  ['as'=>'Vehiculo/buscarReportes', 'uses'=>'vehiculoController@buscarReportes']);

    Route::post('Vehiculos/reportar', ['as' => 'Vehiculos/reportar', 'uses' => 'vehiculoController@reportar']);

    Route::get('Vehiculos/repuesto/{id}', ['as' => 'Vehiculos/repuesto', 'uses'=> 'vehiculoController@repuestos']);

    Route::get('Vehiculos/reporte/{id}', ['as'=> 'Vehiculos/reporte', 'uses'=>'vehiculoController@reportes']);

    Route::get('Vehiculos/Cambiar/{placa}/{id}', ['as'=>'Vehiculos/Cambiar', 'uses'=>'vehiculoController@cambiar']);

    Route::post('Vehiculos/buscarRep',['as'=>'Vehiculos/buscarRep', 'uses'=>'vehiculoController@buscarEdit']);

    Route::get('Vehiculo/asignar/{placa}',['as'=>'Vehiculo/asignar', 'uses'=>'vehiculoController@existente']);

    Route::get('Vehiculo/nuevo/{placa}', ['as'=>'Vehiculo/nuevo', 'uses'=>'vehiculoController@nuevo']);
//acceso a los recursos vehiculos
    Route::resource('Repuestos', 'RepuestosController');
//una nueva ruta para eliminar registros con el metodo get
    Route::get('Repuestos/eliminar/{placa}', ['as' => 'Repuestos/eliminar', 'uses' => 'RepuestosController@eliminar']);
//ruta para realizar busqueda de registros.
    Route::post('Repuestos/buscar', ['as' => 'Repuestos/buscar', 'uses' => 'RepuestosController@buscar']);

Route::resource('Revisiones', 'RevisionesController');

Route::get('Revisiones/deleted/{placa}/{id}', ['as' => 'Revisiones/deleted', 'uses' => 'RevisionesController@borrar']);

Route::get('Revisiones/eliminar/{id}', ['as' => 'Revisiones/eliminar', 'uses' => 'RevisionesController@eliminar']);

Route::get('Revisiones/todas/{id}', ['as'=> 'Revisiones/todas','uses' => 'RevisionesController@todas']);
//ruta para realizar busqueda de registros.
Route::post('Revisiones/buscar', ['as' => 'Revisiones/buscar', 'uses' => 'RevisionesController@buscar']);

Route::get('Revisiones/index',['as' => 'Revisiones/index', 'uses' => 'RevisionesController@inicio']);

Route::get('Revisiones/editar/{placa}/{id}',['as'=>'Revisiones/editar','uses' => 'RevisionesController@editar']);

Route::get('Revisiones/nuevo/{placa}',['as'=>'Revisiones/nuevo', 'uses' => 'RevisionesController@nuevo']);

Route::post('Revisiones/guardar', ['as' => 'Revisiones/guardar', 'uses' => 'RevisionesController@guardar']);

Route::post('Revisiones/almacenar', ['as'=> 'Revisiones/almacenar', 'uses'=>'RevisionesController@almacenar']);

Route::get('Revisiones/ver/{id}/{placa}', ['as' => 'Revisiones/ver', 'uses' => 'RevisionesController@ver']);

Route::get('Revisiones/view/{id}', ['as' => 'Revisiones/view', 'uses' => 'RevisionesController@view']);

Route::get('Revisiones/existente/{placa}',['as'=> 'Revisiones/existente', 'uses'=>'RevisionesController@existente']);

Route::get('Revisiones/finalizar/{id}', ['as'=>'Revisiones/finalizar', 'uses'=>'RevisionesController@finalizar']);

Route::get('Revisiones/finalizar/{id}/{placa}', ['as'=>'Revisiones/finalizar', 'uses'=>'vehiculoController@finalizar']);

Route::get('Revisiones/edit/{id}/{placa}', ['as'=>'Revisiones/edit', 'uses'=>'RevisionesController@edit']);

Route::get('Revisiones/editar/{id}', ['as'=>'Revisiones/editar', 'uses'=>'RevisionesController@editar']);

Route::post('Revisiones/actualizar',['as'=>'Revisiones/actualizar', 'uses'=>'RevisionesController@actualizar']);

Route::get('Revisiones/tomar/{placa}/{id}',['as'=>'Revisiones/tomar', 'uses'=>'RevisionesController@tomar']);

Route::get('Taller/Revisiones/{id}',['as'=>'Taller/Revisiones', 'uses'=>'tallerController@revisiones']);

Route::get('Taller/Repuestos/{id}',['as'=>'Taller/Repuestos', 'uses'=>'tallerController@repuestos']);

Route::get('Taller/Cambiar/{placa}/{id}', ['as'=>'Taller/Cambiar', 'uses'=> 'tallerController@cambiar']);

Route::get('Taller/asignar', ['as'=>'Taller/asignar', 'uses'=>'tallerController@preasignacion']);

Route::post('Taller/continuar',['as'=>'Taller/continuar', 'uses'=>'tallerController@continuar']);

Route::get('Taller/asignado/{id}/{placa}', ['as'=>'Taller/asignado', 'uses'=>'tallerController@asignado']);

Route::post('Taller/almacenar',['as'=>'Taller/almacenar', 'uses' => 'tallerController@almacenar']);

Route::get('retornar/{placa}/{ante}/{usu}', ['as'=>'retornar', 'uses'=>'vehiculoController@retornar']);

Auth::routes();

Route::get('home', 'HomeController@index');

Route::get('home/exit', 'HomeController@salida');

Route::get('home/asignar', ['as'=>'home/asignar', 'uses'=>'HomeController@preasignacion']);

Route::post('home/Correcion',['as'=>'home/Correcion', 'uses'=>'HomeController@nuevaCorrectiva']);

