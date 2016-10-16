<!DOCTYPE html>
<html >
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Oficina</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->

    </head>
    <body>



    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway';
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
        <div class="flex-center position-ref full-height">


            <div class="content">
                <div class="title m-b-md">
                    <img src="http://www.so.ucr.ac.cr/ucrfm/sites/default/files/logo-ucrso.png">

                   <br>

                    <h1>Bienvenido(a) {{ Auth::user()->name }} {{Auth::user()->apellidos}}</h1>

                    Oficina de Servicios Generales




                </div>
                <br><br>
                    <a href="Usuarios" class="btn btn-primary btn-lg active">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                         Usuarios</a>
                    <a href="Vehiculos" class="btn btn-primary btn-lg active">
                        <span class="glyphicon glyphicon-bed" aria-hidden="true"></span>
                         Vehiculos</a>
                    <a href="Repuestos" class="btn btn-primary btn-lg active">
                        <span class="glyphicon glyphicon-wrench" aria-hidden="true"></span>
                         Inventario</a>
                    <a href="Faltantes" class="btn btn-primary btn-lg active">
                        <span class="glyphicon glyphicon-alert" aria-hidden="true"></span>
                         faltantes</a>
                    <a href="Revisiones"class="btn btn-primary btn-lg active">
                        <span class="glyphicon glyphicon-transfer" aria-hidden="true"></span>
                         Revisiones</a>
                    <a href="{{ url('/logout') }}" class="btn btn-primary btn-lg active"
                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                         Cerrar Sesión
                    </a>
                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

            </div>
        </div>
    </body>
</html>
