
@extends('layouts.app')

@section('content')
    <br>
    <div class="container">
        <div class="row">

            <h1>Kilometrajes reportados al vehiculo placa: {{ $placa }}</h1>

            {!! Form::open(['route' => 'Vehiculo/buscarReportes', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
            {!! Form::hidden('id', $placa) !!}
            <div class="form-group">
                <label for="exampleInputName2">Nombre del Usuario</label>
                <input type="text" class="form-control" name = "nombre" >
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
            <a href="{{ route('Vehiculos/reporte', ['id'=>$placa]) }}" class="btn btn-primary">Todos</a>
            {!! Form::close() !!}
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
                            <a class="btn btn-primary btn-xs" href="{{Route('retornar',['placa'=>$placa, 'ante'=>$reporte->km_anterior, 'usu'=>Auth::user()->id])}}" onclick="return confirmar()" >Retornar km</a>
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
            if(confirm('¿Esta seguro que desear regresar el vehiculo a este kilometraje?'))
                return true;
            else
                return false;
        }
    </script>
@endsection