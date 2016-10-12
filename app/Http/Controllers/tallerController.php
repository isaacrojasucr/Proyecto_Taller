<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class tallerController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $usuarios = \DB::table('vehiculos')
            ->join('sometes','vehiculos.placa','=','sometes.placa_vehiculo')
            ->join('pertences','vehiculos.placa','=','pertences.placa_vehiculo')
            ->join('revision_calendarizadas','sometes.id_revision','=','revision_calendarizadas.id')
            ->join('repuestos', 'pertences.id_repuesto','=','repuestos.id')
            ->where('vehiculos.km_total','<=','revision_calendarizadas.km_revision')
            ->('vehiculos.km_total', '<=', 'pertences.km_inicial' ,'+', 'repuestos.vida_util')
            )
            ->groupBy('vehiculos.placa')
            ->select('vehiculos.placa','vehiculos.marca', 'vehiculos.modelo')
            ->get();

        return view('Usuarios', compact('usuarios'));

    }       
    
    
    
}
