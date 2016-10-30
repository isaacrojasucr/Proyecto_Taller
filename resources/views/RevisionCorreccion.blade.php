
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <?php
            date_default_timezone_set('America/Costa_Rica');

            ?>

            <h1 align="center"> <span>Revision de Corrección correspondiente a la placa {{$placa}} </span></h1>
            <br>

            <div class="col-md-10 col-md-offset-1">
                {!! Form::open(['route' => 'Revisiones/almacenar', 'method' => 'post']) !!}

                {!! Form::hidden('placa', $placa) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'Descripción') !!}
                    {!! Form::text('nombre', 'Revision de correción placa: '.$placa.', '. date('m/d/Y g:ia') , ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('km_revision', 'Kilometro de Revisión') !!}
                    {!! Form::number('km_revision', $ve->km_total, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('detalle', 'Detalles') !!}
                    {{ Form::textarea('detalle', null, ['class' => "form-control"]) }}
                </div>
                <div class="form-group">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success ' ] ) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div><br><br><br>
    </div>
@endsection