<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Faltantes</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
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
                <th>Km Inicial</th>
                <th>Cantidad</th>

            </tr>
            </thead>
            <tbody>
            @foreach($faltantes as $faltante)
                <tr>
                    <td>{{ $faltante->nombre }}</td>
                    <td>{{ $faltante->vida_util }}</td>
                    <td>{{ $faltante->km_inicial }}</td>
                    <td>{{ $faltante->cantidad }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>