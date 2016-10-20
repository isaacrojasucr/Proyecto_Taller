
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
                    <th>Usuario</th>
                    <th>Km anterior</th>
                    <th>Fecha</th>
                    <th>Acción</th>

                </tr>
                </thead>
                <tbody>
                @foreach($reportes as $reporte)
                    @foreach($usuarios as $usu)
                        @if($usu->id == $reporte->id_usuario)
                    <tr>
                        <td>{{ $usu->name . ' ' . $usu->apellidos }}</td>
                        <td>{{ $reporte->km_anterior}}</td>
                        <td>{{ $reporte->created_at}}</td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="#" onclick="return confirmar()" >Retornar km</a>
                        </td>

                    </tr>
                            @break
                    @endif
                        @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmar()
        {
            if(confirm('¿Esta seguro de cambiar el siguiente respuesto?'))
                return true;
            else
                return false;
        }
    </script>
@endsection