@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">


            <div class="col-md-10 col-md-offset-1">
                {!! Form::open(['route' => 'Taller/almacenar', 'method' => 'post']) !!}
                {!! Form::hidden('placa', $placa) !!}
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre') !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('cantidad', 'Cantidad') !!}
                    {!! Form::number('cantidad', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('full_name', 'Vida Util') !!}
                    {!! Form::number('vida_util', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Guardar', ['class' => 'btn btn-success ' ] ) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection