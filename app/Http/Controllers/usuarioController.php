<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\User;
use Mockery\CountValidator\Exception;

class usuarioController extends Controller
{
    //


    public function store(Request $request) {


        $usuario = new User();
        $usuario->habilitado = 1;
        $usuario->cedula= $request->cedula;
        $usuario->email= $request->correo;
        $usuario->name = $request->nombre;
        $usuario->apellidos = $request->apellido;
        $usuario->puesto = $request->puesto;
        $contrasena = $request->contrasena;
        $usuario->password = Hash::make($contrasena);


        $usu = User::all();

        foreach ($usu as  $us){

            if ($us->cedula == $usuario->cedula){

                \Session::flash('message', 'El numero de cedula ingresado ya se encuentra registrado');
                return back();

            }

            if ($us->email == $usuario->email){

                \Session::flash('message', 'El correo eletronico ingresado ya se encuentra registrado');
                return back();

            }

        }


        $usuario->save();

        return redirect('Usuarios');
    }

    public function __construct()
    {
        $this->middleware('auth');
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

        $usuario->save();

        return redirect('Usuarios');
        
    }

    public function edit($id){
        $usuario = User::find($id);
        return view('ActualizarUsuario',compact('usuario'));

    }

    public function buscar(Request $request){

            $usuarios = User::where('name','like','%'.$request->nombre.'%')->get();
            return \View::make('Usuarios', compact('usuarios'));

    }

    public function update ($id, Request $request){

            $usuario = User::find($id);
            $usuario->habilitado = 1;
            $usuario->email= $request->email;
            $usuario->name = $request->name;
            $usuario->apellidos = $request->apellidos;
            $usuario->puesto = $request->puesto;
            $usuario->password = Hash::make($request->password);

            $usuario->save();

            return redirect('Usuarios');

    }

}
