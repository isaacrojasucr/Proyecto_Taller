<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

</head>
<body>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">
            {{-- Preguntamos si hay algún mensaje de error y si hay lo mostramos  --}}
            @if(Session::has('mensaje_error'))
                <div class="alert alert-danger">{{ Session::get('mensaje_error') }}</div>
            @endif
            {{ Form::open(array('url' => '/login')) }}
            <legend>Iniciar sesión</legend>
            <div class="form-group">
                {{ Form::label('cedula', 'Cedula del usuario') }}
                {{ Form::text('cedula', Input::old('cedula'), array('class' => 'form-control')); }}
            </div>
            <div class="form-group">
                {{ Form::label('contraseña', 'Contraseña') }}
                {{ Form::password('password', array('class' => 'form-control')); }}
            </div>
            <div class="checkbox">
                <label>
                    Recordar contraseña
                    {{ Form::checkbox('rememberme', true) }}
                </label>
            </div>
            {{ Form::submit('Enviar', array('class' => 'btn btn-primary')) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery.js"></script>
</body>
</html>