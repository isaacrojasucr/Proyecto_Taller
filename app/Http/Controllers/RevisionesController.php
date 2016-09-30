<?php

namespace App\Http\Controllers;

use App\revision_calendarizada;
use Illuminate\Http\Request;
use App\vehiculo;
use App\somete;
use App\Http\Requests;

class RevisionesController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index (){

        $vehiculos = vehiculo::where('habilitado','=',1)->get();

        return view('Revisiones', compact('vehiculos'));
    }
    
    public function todas ($placa) {
        $revisiones = \DB::table('vehiculos')
            ->join('sometes','vehiculos.placa','=','sometes.placa_vehiculo')
            ->join('revision_calendarizadas','sometes.id_revision','=','revision_calendarizadas.id')
            ->where('vehiculos.placa','=',$placa)
            ->select('revision_calendarizadas.id','revision_calendarizadas.nombre','revision_calendarizadas.km_revision', 'revision_calendarizadas.detalle')
            ->get();

        return view('VerRevisiones', compact('placa','revisiones'));
    }

    public function buscar (Request $request) {
        $vehiculos = vehiculo::where('placa','like','%'.$request->placa.'%')->get();
        return \View::make('Revisiones', compact('vehiculos'));

    }

    public function nuevo($placa){
        return view('NuevaRevision',compact('placa'));

    }


    public function guardar (Request $request ) {
        $revision =  new revision_calendarizada();

        $vehiculo = vehiculo::find($request->placa);

        $revision->nombre = $request->nombre;
        $revision->detalle = $request->datalle;
        $revision->km_revision = $request->km_revision;
        $revision->km_inicial = $vehiculo->km_total;

        $revision->save();

        $id = \DB::table('revision_calendarizadas')->max('id');

        $somete = new somete();
        $somete->placa_vehiculo = $vehiculo->placa;
        $somete->id_revision = $id;
        
        $somete->save();

        $placa = $vehiculo->placa;
        
        $revisiones = \DB::table('vehiculos')
            ->join('sometes','vehiculos.placa','=','sometes.placa_vehiculo')
            ->join('revision_calendarizadas','sometes.id_revision','=','revision_calendarizadas.id')
            ->where('vehiculos.placa','=',$placa)
            ->select('revision_calendarizadas.id','revision_calendarizadas.nombre','revision_calendarizadas.km_revision', 'revision_calendarizadas.detalle')
            ->get();

        return view('VerRevisiones', compact('placa','revisiones'));
    }
    
    
}
