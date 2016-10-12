@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <h1 align="center"> <span class="label label-info">Revisiones existentes en el sistema </span></h1>
            <br>
            <br>
            <table class="table table-condensed table-striped table-bordered">
                <thead>
                <tr>
                    <th>Descripcion</th>
                    <th>Km de Revision</th>
                    <th>Detalle</th>
                    <th>Estado</th>
                    <th>Acción</th>
                </tr>
                </thead>
                <tbody>
                @foreach($revisiones as $revision)
                    @if($revision->estado != 3)
                        <tr>
                            <td>{{ $revision->nombre }}</td>
                            <td>{{ $revision->km_revision}}</td>
                            <td>{{ $revision->detalle}}</td>
                            @if($revision->estado == 1)
                                <td>Pendiente</td>
                            @else
                                <td>Finalizada</td>
                            @endif
                            <td>
                                <a class="btn btn-success btn-xs" href="{{ route('Revisiones/tomar',['id' => $revision->id,'placa' => $placa ] )}}" >Agregar al vehiculo</a>

                            </td>


                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection