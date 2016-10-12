<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\repuesto;
use App\vehiculo;
use App\Http\Requests;
use phpDocumentor\Reflection\Types\Array_;

class RepuestosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function store(Request $request) {
        $repuesto = new repuesto();
        $repuesto->cantidad = $request->cantidad;
        $repuesto->vida_util= $request->vida_util;
        $repuesto->nombre = $request->nombre;

        $repuesto->save();

        return redirect('Repuestos');
    }

    public function index(){
        $respuestos = repuesto::all();

        return view('Repuestos', compact('respuestos'));

    }

    public function create()
   {
       $vehiculos = vehiculo::all();
       $placas = collect([]);
       foreach ($vehiculos as $vehiculo){
           $placas->put($vehiculo->placa, $vehiculo->placa);
       }
       
       return \View::make('NuevoRepuesto', compact('placas'));
   }

    public function eliminar($id){
        $repuesto = repuesto::find($id);

        $repuesto->delete();

        return redirect('Repuestos');

    }

    public function edit($id){
        $repuesto = repuesto::find($id);
        return \View::make('ActualizarRepuesto',compact('repuesto'));

    }

    public function buscar(Request $request){

        $repuestos = repuesto::where('name','like','%'.$request->nombre.'%')->get();
        return \View::make('Repuestos', compact('repuestos'));

    }

    public function update ($id, Request $request){

        $repuesto= repuesto::find($id);
        $repuesto->cantidad = $request->cantidad;
        $repuesto->vida_util= $request->vida_util;
        $repuesto->nombre = $request->nombre;

        $repuesto->save();

        return redirect('Repuestos');

    }


    public function faltantes(){

        $faltantes = repuesto::where('cantidad', '=', 0)->get();
        
        return view('Faltantes', compact('faltantes'));

    }

}
