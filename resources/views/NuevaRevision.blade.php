
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <h1 align="center"> <span class="label label-info">Nueva Revision correspondiente a la placa {{$placa}} </span></h1>
            <br>

            <div class="col-md-10 col-md-offset-1">
                {!! Form::open(['route' => 'Revisiones/guardar', 'method' => 'post']) !!}

                {!! Form::hidden('placa', $placa) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'Descripción') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cantidad', 'Kilometro de Revisión') !!}
                    {!! Form::number('km_revision', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('full_name', 'Detalles') !!}
                    {{ Form::textarea('detalle', null, ['class' => "form-control"]) }}
                </div>
                <div class="form-group">
                    {!! Form::submit('Enviar', ['class' => 'btn btn-success ' ] ) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection