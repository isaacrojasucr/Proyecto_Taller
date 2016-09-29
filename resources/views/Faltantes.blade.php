
@extends('layouts.app')

@section('content')
<br>
<div class="container">
    <div class="row">

        <br>
        <br>
        <br>

        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Vida Util</th>
                <th>Cantidad</th>

            </tr>
            </thead>
            <tbody>
            @foreach($faltantes as $faltante)
                <tr>
                    <td>{{ $faltante->nombre }}</td>
                    <td>{{ $faltante->vida_util }}</td>
                    <td>{{ $faltante->cantidad }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection