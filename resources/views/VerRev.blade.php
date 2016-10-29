@extends('layouts.app')

@section('content')
    <div class="container" >
        <div class="row" id="reporte">

            <?php
            date_default_timezone_set('America/Costa_Rica');

            ?>

            <h2 align="center">Universidad de Costa Rica, Sede Occidente</h2>
            <h2 align="center">Oficina de Servicios Generales</h2>
            <h3 align="center"><?=date('m/d/Y g:ia');?></h3>

                <br>


            <div class="col-md-10 col-md-offset-1">
                <div class="form-group">
                    {!! Form::label('nombre', 'Descripción: ') !!}
                    {!! Form::label('nombre', $revision->nombre, ['class' => 'form-control' , 'readonly' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cantidad', 'Kilometro de Revisión: ') !!}
                    {!! Form::label('km_revision', $revision->km_revision, ['class' => 'form-control' , 'readonly' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('full_name', 'Detalles:') !!}
                    {{ Form::textarea('detalle', $revision->detalle, ['class' => "form-control", 'readonly' => 'true']) }}
                </div>

            </div>
        </div>

    </div>

@endsection