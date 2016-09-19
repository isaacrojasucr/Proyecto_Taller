<?php

namespace App\Http\Controllers;

use App\vehiculo;
use Illuminate\Http\Request;

use App\Http\Requests;

class vehiculoController extends Controller
{
    //
    public function store(Request $request) {
        $vehiculo = new vehiculo();
        $vehiculo->habilitado = 1;
        $vehiculo->placa = $request->placa;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->marca = $request->marca;
        $vehiculo->km_total = $request->km_total;

        $vehiculo->save();

        return redirect(Vehiculos);
    }

    public function index(){
        $vehiculos = vehiculo::all();

        return view('Vehiculos', compact('vehiculos'));

    }

    public function create()
    {
        return \View::make('NuevoVehiculo');
    }

    public function eliminar($placa){
        $vehiculo = vehiculo::find($placa);
        $vehiculo->habilitado = 0;

        $vehiculo.save();

        return redirect('Vehiculos');

    }

    public function edit($id){
        $vehiculo = User::find($id);
        return \View::make('ActualizarVehiculo',compact('vehiculo'));

    }

    public function buscar(Request $request){

        $vehiculos = Vehiculo::where('placa','like','%'.$request->placa.'%')->get();
        return \View::make('Vehiculos', compact('vehiculos'));

    }

    public function update (Request $request){

        $vehiculo = vehiculo::find($request->placa);
        $vehiculo->habilitado = 1;
        $vehiculo->placa = $request->placa;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->marca = $request->marca;
        $vehiculo->km_total = $request->km_total;

        $vehiculo->save();

        return redirect(Vehiculos);

    }
}
