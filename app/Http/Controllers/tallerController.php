<?php

namespace App\Http\Controllers;

use App\repuesto;
use Illuminate\Http\Request;
use App\vehiculo;
use App\pertenece;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

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

        $re = repuesto::find($act->id_repuesto);
           

        $re->cantidad = ($re->cantidad) - 1;

        $re->save();

        $act->save();

        return back();
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
        return view('asignar', compact('placas'));
    }
    
    public function continuar(Request $request){
        
        $placa = $request->placa;

        if($request->opcion == 0){

            return view('nuevoRep', compact('placa'));

        }else{

            $repuestos =  repuesto::all();

            return view('existente', compact('placa', 'repuestos'));

        }
        
    }

    public function asignado ($id, $placa){

        $pertenece = new pertenece();

        $ve = vehiculo::find($placa);


        $pertenece->id_repuesto = $id;
        $pertenece->placa_vehiculo = $placa;
        $pertenece->km_inicial = $ve->km_total;

        $pertenece->save();

        return redirect('Taller');

    }

    public function almacenar(Request $request){

        $placa = $request->placa;


        $repuesto = new repuesto();
        $repuesto->cantidad = $request->cantidad;
        $repuesto->vida_util= $request->vida_util;
        $repuesto->nombre = $request->nombre;

        $repuesto->save();



        $ve = vehiculo::find($placa);


        $pertenece = new pertenece();

        $pertenece->id_repuesto = $repuesto->id;
        $pertenece->placa_vehiculo = $placa;
        $pertenece->km_inicial = $ve->km_total;

        $pertenece->save();

        return redirect('Repuestos');

    }
    
    
}
