<html>
<head>
    <meta charset="UTF-8">
    <title>Actualizar Datos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            {!! Form::model($vehiculo,['route' => 'Usuarios.update', 'method' => 'put', 'novalidate']) !!}

            {!! Form::hidden('id', $vehiculo->placa) !!}

            <div class="form-group">
                {!! Form::label('placa', 'Placa') !!}
                {!! Form::text('placa', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('marca', 'Marca') !!}
                {!! Form::text('marca', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('modelo', 'Modelo') !!}
                {!! Form::text('modelo', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('modelo', 'Kilometraje') !!}
                {!! Form::number('km_total', null, ['class' => 'form-control' , 'required' => 'required']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Enviar', ['class' => 'btn btn-success ' ] ) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
</body>
</html>