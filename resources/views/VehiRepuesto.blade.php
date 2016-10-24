
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
                        <td>{{ $respuesto->vida_util + $respuesto->km_inicial}}</td>
                        <td>{{ $respuesto->cantidad  }}</td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{ route('Vehiculos/Cambiar',['placa' => $placa,'id' => $respuesto->id ] )}}" onclick="return confirmar('{{$respuesto->nombre}}')" >Cambiar</a>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
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
@endsection