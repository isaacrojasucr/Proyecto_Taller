@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading" align="center">Seleccione el vehiculo para asignar el repuesto</div>
                <div class="panel-body" align="center">

                    {!! Form::open(['route' => 'Taller/continuar', 'method' => 'post', 'validate', 'class' => 'form-inline']) !!}

                    {!! Form::hidden('id', Auth::user()->id) !!}

                    <div class="form-group">
                        {!! Form::label('placa', 'Vehículo') !!}
                        <br>
                        {!! Form::select('placa', $placas ,null, ['class' => 'form-control']) !!}
                    </div>
                    <br><br>
                    <div class="form-group">
                        {!! Form::label('modelo', 'Repuesto') !!}
                        <br>
                        {!! Form::select('opcion', array('0' => 'Nuevo', '1' => 'Existente') ,null, ['class' => 'form-control']) !!}
                    </div>
                    <br>
                    <br>
                    <div class="form-group">
                        {!! Form::submit('continuar', ['class' => 'btn btn-success ' ] ) !!}
                    </div>

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection