@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h1 align="center"> <span class="label label-info">Revisiones correspondientes a la placa {{$placa}} </span></h1>
            <br>

            <a href="{{ route('Revisiones/nuevo', ['Placa' =>$placa]) }}" class="btn btn-primary">Nuevo</a>

            <br>

            <table class="table table-condensed table-striped table-bordered">
                <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>Km de Revision</th>
                    <th>Detalle</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($revisiones as $revision)
                    <tr>
                        <td>{{ $revision->nombre }}</td>
                        <td>{{ $revision->km_revision}}</td>
                        <td>{{ $revision->detalle}}</td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{ route('Revisiones/editar',['placa' => $placa, 'id' => $revision->id ] )}}" >Editar</a>
                            <a class="btn btn-danger btn-xs" href="{{ route('Revisiones/deleted',['placa' => $placa, 'id' => $revision->id] )}}" >Eliminar</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection