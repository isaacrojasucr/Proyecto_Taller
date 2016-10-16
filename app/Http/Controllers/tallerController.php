<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\vehiculo;
use App\pertenece;
use App\Http\Requests;

class tallerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $vehiculos = \DB::select('call pendiente');


        $repuestos = \DB::select('call repuestos');

        $revisiones = \DB::select('call revisiones');

        return view('Taller', compact('vehiculos', 'repuestos', 'revisiones'));

    }


    public function revisiones($id)
    {
        $vehiculos = \DB::select('call pendiente');


        $repuestos = \DB::select('call repuestos');

        $revisiones = \DB::select('call revisiones');
        
        $tipo = 'Revisiones';
        
        $rev = \DB::table('vehiculos')
            ->join('sometes','vehiculos.placa','=','sometes.placa_vehiculo')
            ->join('revision_calendarizadas','sometes.id_revision','=','revision_calendarizadas.id')
            ->where('vehiculos.placa','=',$id)
            ->select('revision_calendarizadas.id', 'revision_calendarizadas.estado' ,'revision_calendarizadas.nombre','revision_calendarizadas.km_revision')
            ->get();

        $ve = vehiculo::find($id);

        return view('TallerTemp', compact('vehiculos', 'repuestos', 'revisiones', 'tipo', 'rev', 've'));
    }

    public  function repuestos ($id) {
        $vehiculos = \DB::select('call pendiente');


        $repuestos = \DB::select('call repuestos');

        $revisiones = \DB::select('call revisiones');

        $tipo = 'Repuestos a cambiar';

        $ve = vehiculo::find($id);

        $rep = \DB::table('vehiculos')
            ->join('perteneces','vehiculos.placa','=','perteneces.placa_vehiculo')
            ->join('repuestos','perteneces.id_repuesto','=','repuestos.id')
            ->where('vehiculos.placa','=',$id)
            ->select('repuestos.id', 'repuestos.nombre' ,'repuestos.vida_util','perteneces.km_inicial')
            ->get();
        return view('TallerTemp2', compact('vehiculos', 'repuestos', 'revisiones', 'tipo', 'rep', 've'));
    }

    public function cambiar ($placa, $id){

        $c = pertenece::where('placa_vehiculo','=',$placa)
                        ->where('id_repuesto', '=', $id)
                        ->get();

        foreach ($c as $cc){

            $id = $cc->id;
            break;

        }


        $act = pertenece::find($id);



        $ve = vehiculo::find($placa);

        $act->km_inicial = $ve->km_total;


        $act->save();
        return back();
    }
    
    
    
}
