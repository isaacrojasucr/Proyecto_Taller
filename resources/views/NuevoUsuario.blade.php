
@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                {!! Form::open(['route' => 'Usuarios.store', 'method' => 'post']) !!}
                @if(Session::has('message'))
                    <p class="alert alert-danger">{{ Session::get('message') }}</p>
                @endif
                <div class="form-group">
                    {!! Form::label('cedula', 'Cedula') !!}
                    {!! Form::number('cedula', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('contraseña', 'Contraseña') !!}
                    {!! Form::password('contrasena',['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('full_name', 'Correo Institucional') !!}
                    {!! Form::email('correo', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('full_name', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Apellidos', 'Apellidos') !!}
                    {!! Form::text('apellido', null, ['class' => 'form-control' , 'required' => 'required']) !!}
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
        <br><br>
    </div>
@endsection