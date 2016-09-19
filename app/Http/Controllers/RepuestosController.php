<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\repuesto;
use App\Http\Requests;

class RepuestosController extends Controller
{
    //
    public function store(Request $request) {
        $repuesto = new repuesto();
        $repuesto->cantidad = $request->cantidad;
        $repuesto->vida_util= $request->vida_util;
        $repuesto->nombre = $request->nombre;
        $repuesto->km_inicial = $request->apellido;
        $repuesto->placa_vehiculo = $request->placa;

        $repuesto->save();

        return redirect(Repuestos);
    }

    public function index(){
        $respuestos = repuesto::all();

        return view('Repuestos', compact('respuestos'));

    }

    public function create()
    {
        return \View::make('NuevoRespuesto');
    }

    public function eliminar($id){
        $repuesto = repuesto::find($id);

        $repuesto.delete();

        return redirect('Usuarios');

    }

    public function edit($id){
        $repuesto = repuesto::find($id);
        return \View::make('ActualizarRepuesto',compact('repuesto'));

    }

    public function buscar(Request $request){

        $repuestos = repuesto::where('name','like','%'.$request->nombre.'%')->get();
        return \View::make('Repuestos', compact('repuestos'));

    }

    public function update (Request $request){

        $repuesto= repuesto::find($request->id);
        $repuesto->cantidad = $request->cantidad;
        $repuesto->vida_util= $request->vida_util;
        $repuesto->nombre = $request->nombre;
        $repuesto->km_inicial = $request->apellido;
        $repuesto->placa_vehiculo = $request->placa;

        $repuesto->save();

        return redirect('Usuarios');

    }
}
