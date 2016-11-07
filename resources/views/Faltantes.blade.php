
@extends('layouts.app')

@section('content')

<br>
<div class="container" align="center" id="reporte">

    <div class="row">

        <?php
        date_default_timezone_set('America/Costa_Rica');
        ?>

        <h2 align="center">Universidad de Costa Rica, Sede Occidente</h2>
        <h2 align="center">Oficina de Servicios Generales</h2>
        <h2 align="center">Faltantes</h2>

        <h3 align="center"><?= date('m/d/Y g:ia'); ?></h3>

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

    <input name="Imprimir" id="Imprimir"  class="btn btn-success btn-m" type="submit" onclick="DescargarPDF('reporte', 'Archivo')" value="Descargar PDF"></input>
    <input type="button" name="imprimir" value="Imprimir" class="btn btn-primary btn-m" onclick="window.print();">
</div>

<script>

    function DescargarPDF(ContenidoID, nombre) {

        var pdf = new jsPDF('p', 'pt', 'letter');

        html = $('#' + ContenidoID).html();

        specialElementHandlers = {};

        margins = {top: 10, bottom: 20, left: 20, wigth: 522};

        pdf.fromHTML(
                html, margins.left, margins.top, {'width': margins.width},
                function (dispose) {
                    pdf.save(nombre + '.pdf');
                }, margins
                );
    }

</script>
@endsection