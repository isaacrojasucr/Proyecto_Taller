
@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <h1 align="center"> <span class="label label-info">Usuarios</span></h1>
        <br>
        {!! Form::open(['route' => 'Usuarios/buscar', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
        <div class="form-group">
            <label for="exampleInputName2">Nombre</label>
            <input type="text" class="form-control" name = "nombre" >
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        <a href="{{ route('Usuarios.index') }}" class="btn btn-primary">Todos</a>
        <a href="{{ route('Usuarios.create') }}" class="btn btn-primary">Nuevo</a>
        {!! Form::close() !!}
        <br>
        <table class="table table-condensed table-striped table-bordered">
            <thead>
                <tr>
                    <th>Identicación</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Rol</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                @if($usuario->habilitado == 1)
                <tr>
                    <td>{{ $usuario->cedula }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->apellidos }}</td>
                    @if($usuario->puesto == 1)
                    <td>Administrador(a)</td>
                    @elseif($usuario->puesto == 2)
                    <td>Mecanico(a)</td>
                    @else
                    <td>Chofer</td>
                    @endif
                    <td>
                        <a class="btn btn-primary btn-xs" href="{{ route('Usuarios.edit',['id' => $usuario->id] )}}" >Editar</a>
                        <a class="btn btn-danger btn-xs" href="{{ route('Usuarios/eliminar',['id' => $usuario->id] )}}" >Eliminar</a>
                    </td>

                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection