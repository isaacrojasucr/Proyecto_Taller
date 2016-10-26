@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        {!! Form::open(['route' => 'Vehiculos/buscar', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
        <div class="form-group">
            <label for="exampleInputName2">Placa</label>
            <input type="text" class="form-control" name = "placa" >
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        <a href="{{ route('Vehiculos.index') }}" class="btn btn-primary">Todos</a>
        <a href="{{ route('Vehiculos.create') }}" class="btn btn-primary">Nuevo</a>
        {!! Form::close() !!}
        <br>

        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Kilometraje</th>
                <th>Acción</th>

            </tr>
            </thead>
            <tbody>
            @foreach($vehiculos as $vehiculo)
                @if($vehiculo->habilitado == 1)
                    <tr>
                        <td>{{ $vehiculo->placa }}</td>
                        <td>{{ $vehiculo->marca }}</td>
                        <td>{{ $vehiculo->modelo }}</td>
                        <td>{{ $vehiculo->km_total }}</td>

                        <td>
                            <a class="btn btn-primary btn-xs" href="{{ route('Vehiculos.edit',['id' => $vehiculo->placa] )}}" >Editar</a>
                            <a class="btn btn-warning btn-xs" href="{{ route('Revisiones/todas',['id' => $vehiculo->placa] )}}" >Ver revisiones</a>
                            <a class="btn btn-danger btn-xs" href="{{ route('Vehiculos/eliminar',['id' => $vehiculo->placa] )}}" >Eliminar</a>
                            @if(Auth::user()->puesto == 1)
                                <a class="btn btn-info btn-xs" href="{{ route('Vehiculos/reporte',['id' => $vehiculo->placa] )}}" >Reportes de km</a>
                            @endif
                        </td>

                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>
@stop