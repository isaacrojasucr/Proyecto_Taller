<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class usuarioController extends Controller
{
    //


    public function store(Request $request) {
        $usuario = new User();
        $usuario->habilitado = 1;
        $usuario->email= 'nothing';
        $usuario->name = $request->nombre;
        $usuario->apellidos = $request->apellido;
        $usuario->puesto = $request->puesto;
        $usuario->password = $request->contrasena;

        $usuario->save();

        return redirect(Usuarios);
    }

    public function index(){
        $usuarios = User::all();

        return view('Usuarios', compact('usuarios'));

    }

    public function create()
    {
        return \View::make('NuevoUsuario');
    }

    public function eliminar($id){
        $usuario = User::find($id);
        $usuario->habilitado = 0;

        $usuario.save();

        return redirect('Usuarios');
        
    }

    public function edit($id){
        $usuario = User::find($id);
        return \View::make('ActualizarUsuario',compact('usuario'));

    }

    public function buscar(Request $request){

            $usuarios = User::where('name','like','%'.$request->nombre.'%')->get();
            return \View::make('Usuarios', compact('usuarios'));

    }

    public function update (Request $request){

            $usuario= User::find($request->id);
            $usuario->habilitado = 1;
            $usuario->email= 'nothing';
            $usuario->name = $request->nombre;
            $usuario->apellidos = $request->apellido;
            $usuario->puesto = $request->puesto;
            $usuario->password = $request->contrasena;

        $usuario->save();

            return redirect('Usuarios');

    }

}
