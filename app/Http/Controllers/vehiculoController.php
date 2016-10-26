<?php

namespace App\Http\Controllers;

use App\pertenece;
use App\repuesto;
use App\revisa;
use App\User;
use App\vehiculo;
use Illuminate\Http\Request;
use App\revision_calendarizada;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
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

        $repuestos = \DB::table('vehiculos')
            ->join('perteneces','vehiculos.placa','=','perteneces.placa_vehiculo')
            ->join('repuestos','perteneces.id_repuesto','=','repuestos.id')
            ->where('vehiculos.placa','=',$vehiculo->placa)
            ->select('repuestos.vida_util', 'repuestos.nombre', 'repuestos.cantidad', 'perteneces.id', 'perteneces.km_inicial')
            ->get();

        $revisiones = \DB::table('vehiculos')
            ->join('sometes','vehiculos.placa','=','sometes.placa_vehiculo')
            ->join('revision_calendarizadas','sometes.id_revision','=','revision_calendarizadas.id')
            ->where('vehiculos.placa','=',$vehiculo->placa)
            ->select('revision_calendarizadas.id', 'revision_calendarizadas.estado' ,'revision_calendarizadas.nombre','revision_calendarizadas.km_revision', 'revision_calendarizadas.detalle')
            ->get();

        return \View::make('ActualizarVehiculo',compact('vehiculo','repuestos', 'revisiones'));

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

        return back();

    }

    public function finalizar($id, $placa){

        $revision = revision_calendarizada::find($id);

        if ($revision->estado == 1){

            $revision->estado = 2;

        }else{
            $revision->estado = 4;
        }

        $revision->save();

        return Redirect('Vehiculos/'. $placa .'/edit');


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
    
    public function repuestos($placa){

        $repuestos = \DB::table('vehiculos')
            ->join('perteneces','vehiculos.placa','=','perteneces.placa_vehiculo')
            ->join('repuestos','perteneces.id_repuesto','=','repuestos.id')
            ->where('vehiculos.placa','=',$placa)
            ->select('repuestos.vida_util', 'repuestos.nombre', 'repuestos.cantidad', 'perteneces.id', 'perteneces.km_inicial')
            ->get();
        return view('VehiRepuesto', compact('placa','repuestos'));
        
    }

    public function cambiar ($placa, $id){


        $act = pertenece::find($id);



        $ve = vehiculo::find($placa);

        $act->km_inicial = $ve->km_total;
        
        $re = repuesto::find($act->id_repuesto);
        
        $re->cantidad = ($re->cantidad) - 1;


        $re->save();
        $act->save();
        return back();
    }

    public function reportes($placa){

        $reportes = revisa::where('placa_vehiculo','=',$placa)
                            ->orderBy('created_at', 'DESC')
                            ->get();

        $usuarios = User::all();
        
        return view('Reportes', compact('placa', 'reportes', 'usuarios')); 

    }

    public function buscarReportes(Request $request){
        $usuarios = User::where('name','like','%'.$request->nombre.'%')->get();

        $placa = $request->id;

        $reportes =  null;
        foreach ($usuarios as $usu){

            $reportes = revisa::where('placa_vehiculo','=',$placa)
                ->where('id_usuario','=',$usu->id)
                ->orderBy('created_at', 'DESC')
                ->get();
        }


        return view('Reportes', compact('placa', 'reportes', 'usuarios'));

    }

    public function retornar ($placa, $ante, $usu){
        
        $vehiculo = vehiculo::find($placa);


        $ulti= $vehiculo->km_total;

        $vehiculo->km_total = $ante;

        $vehiculo->save();

        $revisa =  new revisa();
        $revisa->id_usuario = $usu;
        $revisa->placa_vehiculo = $vehiculo->placa;
        $revisa->km_anterior= $ulti;
        $revisa->save();
        
        return back();
        
        
    }




}
