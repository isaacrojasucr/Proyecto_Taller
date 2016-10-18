
@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">
            <h1 align="center" class="h1">Seleccione el Repuesto para el vehículo</h1>

            <h1 align="center" class="h1">Placa: {{$placa}}</h1>
            <br>
            <table class="table table-condensed table-striped table-bordered">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Vida Util</th>
                    <th>Cantidad</th>
                    <th>Acción</th>

                </tr>
                </thead>
                <tbody>
                @foreach($repuestos as $respuesto)
                    <tr>
                        <td>{{ $respuesto->nombre }}</td>
                        <td>{{ $respuesto->vida_util }}</td>
                        <td>{{ $respuesto->cantidad }}</td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{ route('Taller/asignado',['id' => $respuesto->id, 'placa'=>$placa] )}}" >Asignar</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection