@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <h1 align="center"> <span class="label label-info">Seleccione el vehiculo para ver sus revisiones</span></h1>
            <br>
            <br>
            {!! Form::open(['route' => 'Revisiones/buscar', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}

            <div class="form-group">
                <label for="exampleInputName2">Placa</label>
                <input type="text" class="form-control" name = "placa" >
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
            <a href="{{ route('Revisiones.index') }}" class="btn btn-primary">Todos</a>
            {!! Form::close() !!}
            <br>

            <table class="table table-condensed table-striped table-bordered">
                <thead>
                <tr>
                    <th>Placa</th>
                    <th>Modelo</th>
                    <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach($vehiculos as $vehiculo)
                    <tr>
                        <td>{{ $vehiculo->placa }}</td>
                        <td>{{ $vehiculo->modelo }}</td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{ route('Revisiones/todas',['id' => $vehiculo->placa] )}}" >Ver revisiones</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection