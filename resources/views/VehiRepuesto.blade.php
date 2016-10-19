
@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">

            <h1>Repuestos asignados al vehiculo placa: {{ $placa }}</h1>


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
                            <a class="btn btn-primary btn-xs" href="{{ route('Repuestos/eliminar',['id' => $respuesto->id] )}}" >Cambiar</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection