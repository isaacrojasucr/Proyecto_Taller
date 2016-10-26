<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vehiculo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
            $vehiculos = vehiculo::all();
            $placas = collect([]);
            foreach ($vehiculos as $vehiculo){
                $placas->put($vehiculo->placa, $vehiculo->placa);
            }
            return view('home', compact('placas'));
        
        

    }

    public function oficina()
    {

        return view('welcome');

    }
    
    public function salida (){
        return view('salida');
    }

    public function preasignacion(){

        $temp = vehiculo::all();

        $placas = collect([]);
        foreach ($temp as $vehiculo){
            if ($vehiculo->habilitado==1){
                $str = $vehiculo->marca. ', '. $vehiculo->modelo. ', Placa: '. $vehiculo->placa;

                $placas->put($vehiculo->placa, $str);


            }
        }

        return view('sele', compact('placas'));
    }

    public function nuevaCorrectiva(Request $request){

        $ve = vehiculo::find($request->placa);

        $placa = $request->placa;

        return view('RevisionCorreccion',compact('placa', 've'));

    }
}
