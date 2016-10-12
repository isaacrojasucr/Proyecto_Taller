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
        $vehiculos = \DB::select('call pendiente');


        return view('Taller', compact('vehiculos'));

    }       
    
    
    
}
