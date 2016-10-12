
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
                <h1>Editando credenciales de {{$usuario->name}}</h1>
                <br>
                <br>
                {!! Form::model($usuario, ['method' => 'PATCH', 'action' => ['usuarioController@update', $usuario->id]]) !!}
                <div class="form-group">
                    {!! Form::label('cedula', 'Cedula') !!}
                    {!! Form::number('cedula', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('contraseña', 'Contraseña') !!}
                    {!! Form::password('password', ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('full_name', 'Correo Institucional') !!}
                    {!! Form::email('email', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('full_name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Apellidos', 'Apellidos') !!}
                    {!! Form::text('apellidos', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('puesto', 'Puesto') !!}
                    {!! Form::select('puesto', array('2' => 'Mecanico(a)', '3' => 'Chofer'),null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success ' ] ) !!}
                </div>
                {!! Form::close() !!}
                </div>
        </div>
    </div>
@endsection