@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <br>
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
                    <tr>
                        <td>{{ $revision->nombre }}</td>
                        <td>{{ $revision->km_revision}}</td>
                        <td>{{ $revision->detalle}}</td>


                        @if($revision->estado == 1 || $revision->estado == 3)
                            <td>{{$revision->updated_at}}</td>
                            <td>Pendiente</td>
                        @else
                            <td>{{$revision->created_at}}</td>
                            <td>Finalizada</td>
                        @endif
                        <td>
                            @if($revision->estado == 1 || $revision->estado == 3)
                            <a class="btn btn-primary btn-xs" href="{{ route('Revisiones/editar',['id' => $revision->id ] )}}" >Editar</a>
                            @endif
                            <a class="btn btn-success btn-xs" href="{{ route('Revisiones/view',['id' => $revision->id ] )}}" >Ver</a>
                            @if($revision->estado == 1 || $revision->estado == 3)
                            <a class="btn btn-danger btn-xs" href="{{ route('Revisiones/eliminar',['id' => $revision->id] )}}" >Eliminar</a>
                            @endif
                        </td>


                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection