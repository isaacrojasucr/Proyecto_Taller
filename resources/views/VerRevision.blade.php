@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <h1 align="center"> <span class="label label-info">Revision del vehiculo placa {{$placa}}  </span></h1>
            <br>

            <div class="col-md-10 col-md-offset-1">
                <div class="form-group">
                    {!! Form::label('nombre', 'Descripción') !!}
                    {!! Form::text('nombre', $revision->nombre, ['class' => 'form-control' , 'required' => 'required', 'readonly' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cantidad', 'Kilometro de Revisión') !!}
                    {!! Form::number('km_revision', $revision->km_revision, ['class' => 'form-control' , 'required' => 'required', 'readonly' => 'true']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('full_name', 'Detalles') !!}
                    {{ Form::textarea('detalle', $revision->detalle, ['class' => "form-control", 'readonly' => 'true']) }}
                </div>
                <div class="form-group">
                    {!! Form::button('Exportar PDF', ['class' => 'btn btn-success ' ] ) !!}

                </div>

            </div>
        </div>
    </div>
@endsection