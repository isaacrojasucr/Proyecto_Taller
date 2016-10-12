@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <h1 >Ejemplo del taller</h1>
    <br>
    <div class="row">
        <div class="col-sm-6" > <div class="panel-group">

                <div class="panel panel-primary">
                    <div class="panel-heading">Autos a Pendientes</div>
                    <div class="panel-body">placa 666<br>placa 555<br>placa 444 </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6" > <div class="panel-group">

                <div class="panel panel-info">
                    <div class="panel-heading">repuestos a cambiar del vehiculo placa 666</div>
                    <div class="panel-body">Repuesto 1 <br>Repuesto 2 <br>Repuesto 3 </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection