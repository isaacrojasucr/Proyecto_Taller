
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {!! Form::open(['route' => 'Vehiculos.store', 'method' => 'post', 'novalidate']) !!}
            <div class="form-group">
                {!! Form::label('placa', 'Placa') !!}
                {!! Form::text('placa', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('marca', 'Marca') !!}
                {!! Form::text('marca', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('modelo', 'Modelo') !!}
                {!! Form::text('modelo', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('modelo', 'Kilometraje') !!}
                {!! Form::number('km_total', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Enviar', ['class' => 'btn btn-success ' ] ) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection