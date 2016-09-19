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
        {!! Form::open(['route' => 'Repuestos/buscar', 'method' => 'post', 'novalidate', 'class' => 'form-inline']) !!}
        <div class="form-group">
            <label for="exampleInputName2">Nombre</label>
            <input type="text" class="form-control" name = "nombre" >
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
        <a href="{{ route('Repuestos.index') }}" class="btn btn-primary">Todos</a>
        <a href="{{ route('Repuestos.create') }}" class="btn btn-primary">Nuevo</a>
        {!! Form::close() !!}
        <br>
        <table class="table table-condensed table-striped table-bordered">
            <thead>
            <tr>
                <th>Vehiculo</th>
                <th>Nombre</th>
                <th>Vida Util</th>
                <th>Km Inicial</th>
                <th>Cantidad</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>
            @foreach($respuestos as $respuesto)
                    <tr>
                        <td>{{ $respuesto->placa_vehiculo }}</td>
                        <td>{{ $respuesto->nombre }}</td>
                        <td>{{ $respuesto->vida_util }}</td>
                        <td>{{ $respuesto->km_inicial }}</td>
                        <td>{{ $respuesto->cantidad }}</td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{ route('Repuestos.edit',['id' => $respuesto->id] )}}" >Editar</a>
                            <a class="btn btn-danger btn-xs" href="{{ route('Repuestos/eliminar',['id' => $respuesto->id] )}}" >Eliminar</a>
                        </td>

                    </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>