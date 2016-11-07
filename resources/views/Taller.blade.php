@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h1 align="center" class="h1">Taller Universidad de Costa rica</h1>

    <h1 align="center" class="h1">Sede Occidente</h1>
    <br>
    <div class="row">
        <div class="col-sm-6" >
            <div class="panel-group">

                <div class="panel panel-primary">
                    <div class="panel-heading"align="center">VEHÍCULOS  CON PENDIENTES </div>
                    <div class="panel-body"align="center">

                        <table class="table table-condensed table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Información</th>
                                    <th>Km Total</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vehiculos as $vehiculo)
                                <tr>
                                    <td>{{ $vehiculo->marca }}, {{$vehiculo->modelo}}, placa: {{$vehiculo->placa}}</td>
                                    <td>{{$vehiculo->km_total}}</td>
                                    <td>
                                        @foreach($repuestos as $repuesto)
                                        @if($vehiculo->placa == $repuesto->placa)
                                        <a class="btn btn-primary btn-xs" href="{{ route('Taller/Repuestos',['id' => $vehiculo->placa] )}}" >
                                            <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                                            Repuestos</a>
                                        @break
                                        @endif
                                        @endforeach

                                        @foreach($revisiones as $revision)
                                        @if($vehiculo->placa == $revision->placa)
                                        <a class="btn btn-danger btn-xs" href="{{ route('Taller/Revisiones',['id' => $vehiculo->placa] )}}" >
                                            <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
                                            Revisones</a>
                                        @break
                                        @endif
                                        @endforeach
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6" >
            <div class="panel-group">

                <div class="panel panel-info">
                    <div class="panel-heading"align="center"> SELECCIONAR REVISIONES O REPUESTOS DE UN VEHÍCULO </div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@stop