<?php

namespace App\Http\Controllers;

use App\revisa;
use App\vehiculo;
use Illuminate\Http\Request;

use App\Http\Requests;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

class vehiculoController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        $vehiculos = vehiculo::where('habilitado','=',1)->get();

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
        $vehiculo = Vehiculo::find($id);
        return \View::make('ActualizarVehiculo',compact('vehiculo'));

    }

    public function buscar(Request $request){

        $vehiculos = Vehiculo::where('placa','like','%'.$request->placa.'%')->get();
        return \View::make('Vehiculos', compact('vehiculos'));

    }

    public function update ($placa, Request $request){

        $vehiculo = vehiculo::find($placa);
        $vehiculo->habilitado = 1;
        $vehiculo->placa = $request->placa;
        $vehiculo->modelo = $request->modelo;
        $vehiculo->marca = $request->marca;
        $vehiculo->km_total = $request->km_total;

        $vehiculo->save();

        $vehiculos = vehiculo::all();

        return view('Vehiculos', compact('vehiculos'));

    }
    
    public function reportar ( Request $request){
        $vehiculo = vehiculo::find($request->placa);

        $id = $request->id;
        $ante = $vehiculo->km_total;
        $placa = $request->placa;
        
        $vehiculo->km_total = $request->km_total;
        
        $vehiculo->save();

        $revisa =  new revisa();
        $revisa->id_usuario = $id;
        $revisa->placa_vehiculo = $placa;
        $revisa->km_anterior= $ante;
        $revisa->save();

        Return redirect('home/exit');
        
    }
}
