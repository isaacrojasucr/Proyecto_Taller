
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6" >
            <div class="panel-group">

                <div class="panel panel-primary">
                    <div class="panel-heading"align="center">Datos generales</div>
                    <div class="panel-body">
            {!! Form::model($vehiculo,['method' => 'PATCH', 'action' => ['vehiculoController@update', $vehiculo->placa]]) !!}

            {!! Form::hidden('id', $vehiculo->placa) !!}

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
                {!! Form::label('km_total', 'Kilometraje') !!}
                {!! Form::number('km_total', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Guardar', ['class' => 'btn btn-success ' ] ) !!}
            </div>
            {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6" >
            <style>

            </style>

            <div class="panel-group">

                <div class="panel panel-primary">
                    <div class="panel-heading"align="center">Repuestos </div>
                    <div class="panel-body">
                        {!! Form::open(['route' => 'Vehiculos/buscarRep', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
                        {!! Form::hidden('id', $vehiculo->placa) !!}
                        <div class="form-group">
                            <input type="text" class="form-control" name = "buscar" placeholder="Nombre de repuesto" >
                        </div>
                        <button type="submit" class="btn btn-default">Buscar</button>
                        <a class="btn btn-primary" href="{{ route('Vehiculos.edit',['id' => $vehiculo->placa] )}}" >Todos</a>
                        <a href="{{ route('Vehiculo/nuevo', ['Placa' =>$vehiculo->placa]) }}" class="btn btn-primary">Nuevo</a>
                        <a href="{{ route('Vehiculo/asignar', ['Placa' =>$vehiculo->placa]) }}" class="btn btn-primary">Existente</a>
                        {!! Form::close() !!}
                        <br><br>
                        <div style="height:272px;overflow:scroll;">
                        <table class="table table-condensed table-striped table-bordered " >
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Vida Util</th>
                                <th>Cantidad</th>
                                <th>Acción</th>

                            </tr>
                            </thead>
                            <tbody >
                            @foreach($repuestos as $respuesto)
                                <tr>
                                    <td>{{ $respuesto->nombre }}</td>
                                    <td >{{ $respuesto->vida_util + $respuesto->km_inicial}}</td>
                                    <td >{{ $respuesto->cantidad  }}</td>
                                    <td >
                                        <a class="btn btn-primary btn-xs" href="{{ route('Vehiculos/Cambiar',['placa' => $vehiculo->placa,'id' => $respuesto->id ] )}}" onclick="return confirmar('{{$respuesto->nombre}}')" >Cambiar</a>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12" >
            <div class="panel-group">

                <div class="panel panel-primary">
                    <div class="panel-heading"align="center">Revisiones</div>
                    <div class="panel-body">
                        <a href="{{ route('Revisiones/nuevo', ['Placa' =>$vehiculo->placa]) }}" class="btn btn-primary">Nuevo</a>
                        <a href="{{ route('Revisiones/existente', ['Placa' =>$vehiculo->placa]) }}" class="btn btn-primary">Existente</a>
                        <br><br><br>
                        <table class="table table-condensed table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Descripcion</th>
                                <th>Km de Revision</th>
                                <th>Detalle</th>
                                <th>Fecha</th>
                                <th>Estado</th>
                                <th>Acción</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($revisiones as $revision)
                                @if($revision->estado == 1 || $revision->estado == 3)
                                    <tr>
                                        <td>{{ $revision->nombre }}</td>
                                        <td>{{ $revision->km_revision}}</td>
                                        <td>{{ $revision->detalle}}</td>

                                        @if($revision->km_revision <= $vehiculo->km_total)
                                            @if($revision->estado == 3)
                                                <td>{{$revision->updated_at}}</td>
                                                <td>Pendiente (Correcion)</td>
                                                @else
                                                <td>{{$revision->updated_at}}</td>
                                                <td>Pendiente</td>
                                            @endif

                                        @elseif($revision->km_revision > $vehiculo->km_total)
                                            <td>{{$revision->updated_at}}</td>
                                            <td>Programada</td>
                                        @endif
                                        <td>
                                                <a class="btn btn-primary btn-xs" href="{{ route('Revisiones/edit',['id' => $revision->id, 'placa' => $vehiculo->placa ] )}}" >Editar</a>

                                                <a class="btn btn-danger btn-xs" href="{{ route('Revisiones/deleted',['placa' => $vehiculo->placa, 'id' => $revision->id] )}}" >Eliminar</a>

                                        </td>


                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
    function confirmar( nombre )
    {
        if(confirm('¿Esta seguro de cambiar el siguiente respuesto ('+ nombre +')?'))
            return true;
        else
            return false;
    }
</script>

<br><br><br>

@endsection