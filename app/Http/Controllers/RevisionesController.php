<?php

namespace App\Http\Controllers;

use App\revision_calendarizada;
use Illuminate\Http\Request;
use App\vehiculo;
use App\somete;
use App\Http\Requests;
use App\repuesto;
use App\pertenece;
use Illuminate\Support\Facades\Redirect;


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
            ->select('revision_calendarizadas.id', 'revision_calendarizadas.estado' ,'revision_calendarizadas.nombre','revision_calendarizadas.km_revision', 'revision_calendarizadas.detalle')
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
        $revision->detalle = $request->detalle;
        $revision->km_revision = $request->km_revision;
        $revision->km_inicial = $vehiculo->km_total;
        $revision->estado = 1;
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
            ->select('revision_calendarizadas.estado','revision_calendarizadas.id','revision_calendarizadas.nombre','revision_calendarizadas.km_revision', 'revision_calendarizadas.detalle')
            ->get();

        return view('VerRevisiones', compact('placa','revisiones'));
    }
    
    public function borrar ($placa,$id) {
        $somete = somete::where('id_revision','=',$id);
        $somete->delete();

        $revision = revision_calendarizada::find($id);
        $revision->delete();

        $revisiones = \DB::table('vehiculos')
            ->join('sometes','vehiculos.placa','=','sometes.placa_vehiculo')
            ->join('revision_calendarizadas','sometes.id_revision','=','revision_calendarizadas.id')
            ->where('vehiculos.placa','=',$placa)
            ->select('revision_calendarizadas.id', 'revision_calendarizadas.estado' ,'revision_calendarizadas.nombre','revision_calendarizadas.km_revision', 'revision_calendarizadas.detalle')
            ->get();
        return view('VerRevisiones', compact('placa','revisiones'));

    }

    public function edit ($id, $placa) {
        $revision = revision_calendarizada::find($id);

        return view('ActualizarRevision',compact('revision', 'placa'));

    }
    
    public function update ($id,Request $request) {
        $revision = revision_calendarizada::find($id);

        $placa = $request->id;

        $revision->nombre = $request->nombre;
        $revision->km_revision = $request->km_revision;
        $revision->detalle = $request->detalle;
        
        $revision->save();

        return Redirect('Vehiculos/'. $placa .'/edit');
        
    }
    
    public function ver ($id,$placa){
        
        $revision = revision_calendarizada::find($id);
        
        $vehiculo = vehiculo::find($placa);
        
        return view('VerRevision', compact('revision', 'vehiculo'));
        
    }
    
    public function existente ($placa) {
        $revisiones = revision_calendarizada::all();
        
        return view('RevisionesExistentes', compact('placa','revisiones'));
    }
    
    public function tomar ($placa, $id) {
        $revision =  new revision_calendarizada();

        $temp = revision_calendarizada::find($id);

        $vehiculo = vehiculo::find($placa);

        $revision->nombre = $temp->nombre;
        $revision->detalle = $temp->detalle;
        $revision->km_revision = $temp->km_revision;
        $revision->km_inicial = $vehiculo->km_total;
        $revision->estado = 1;
        $revision->save();

        $id = \DB::table('revision_calendarizadas')->max('id');

        $somete = new somete();
        $somete->placa_vehiculo = $placa;
        $somete->id_revision = $id;
        $somete->save();

        return redirect('Revisiones/todas/'.$placa);
    }

    public function finalizar($id){

        $revision = revision_calendarizada::find($id);

        if ($revision->estado == 1){

            $revision->estado = 2;

        }else{
            $revision->estado = 4;
        }

        $revision->save();

        return back();


    }

    public function almacenar(Request $request){
        $revision =  new revision_calendarizada();

        $vehiculo = vehiculo::find($request->placa);

        $revision->nombre = $request->nombre;
        $revision->detalle = $request->detalle;
        $revision->km_revision = $request->km_revision;
        $revision->km_inicial = $vehiculo->km_total;
        $revision->estado = 3;
        $revision->save();

        $id = \DB::table('revision_calendarizadas')->max('id');

        $somete = new somete();
        $somete->placa_vehiculo = $vehiculo->placa;
        $somete->id_revision = $id;
        $somete->save();



        return redirect('Taller');
    }
    
}
