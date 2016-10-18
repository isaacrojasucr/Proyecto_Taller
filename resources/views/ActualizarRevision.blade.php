@extends('layouts.app')

@section('content')
    <div class="container" xmlns="http://www.w3.org/1999/html">
        <div class="row">

            <h1 align="center"> <span class="label label-info">Editando revision pendiente </span></h1>
            <br>

            <div class="col-md-10 col-md-offset-1">
                {!! Form::model($revision, ['method' => 'PATCH', 'action' => ['RevisionesController@update', $revision->id]]) !!}

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
        </br></br></br>
    </div>
@endsection