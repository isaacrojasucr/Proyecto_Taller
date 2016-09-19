<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Usuarios</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<br>
<div class="container">
    <div class="row">
        {!! Form::open(['route' => 'Vehiculos/buscar', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
        <div class="form-group">
            <label for="exampleInputName2">Placa</label>
            <input type="text" class="form-control" name = "placa" >
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        <a href="{{ route('Vehiculos.index') }}" class="btn btn-primary">Todos</a>
        <a href="{{ route('Vehiculos.create') }}" class="btn btn-primary">Nuevo</a>
        {!! Form::close() !!}
        <br>
        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
                <th>Placa</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Kilometraje</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($vehiculos as $vehiculo)
                @if($vehiculo->habilitado == 1)
                    <tr>
                        <td>{{ $vehiculo->placa }}</td>
                        <td>{{ $vehiculo->marca }}</td>
                        <td>{{ $vehiculo->modelo }}</td>
                        <td>{{ $vehiculo->km_total }}</td>

                        <td>
                            <a class="btn btn-primary btn-xs" href="{{ route('Vehiculos.edit',['id' => $usuario->placa] )}}" >Editar</a>
                            <a class="btn btn-danger btn-xs" href="{{ route('Vehiculos/eliminar',['id' => $usuario->placa] )}}" >Eliminar</a>
                        </td>

                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>