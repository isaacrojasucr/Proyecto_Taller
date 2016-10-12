@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h1 >Ejemplo del taller</h1>
    <br>
    <div class="row">
        <div class="col-sm-6" > <div class="panel-group">

                <div class="panel panel-primary">
                    <div class="panel-heading">Autos con pendientes </div>
                    <div class="panel-body">

                            <table class="table table-condensed table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Información</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($vehiculos as $vehiculo)
                                    <tr>
                                        <td>{{ $vehiculo->marca }}, {{$vehiculo->modelo}}, placa: {{$vehiculo->placa}}</td>

                                        <td>
                                            <a class="btn btn-primary btn-xs" href="{{ route('Usuarios.edit',['id' => $vehiculo->placa] )}}" >
                                                <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                                    Repuestos</a>
                                            <a class="btn btn-danger btn-xs" href="{{ route('Usuarios/eliminar',['id' => $vehiculo->placa] )}}" >
                                                <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
                                                Revisones</a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6" > <div class="panel-group">

                <div class="panel panel-info">
                    <div class="panel-heading">ALGO VA AQUI</div>
                    <div class="panel-body">ESTO NO ESTA LISTO</div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection