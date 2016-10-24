<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="Servicios Generales -Taller">

    <title>Oficina Servicios Generales</title>

    <link rel="shortcut icon" href="http://moodle.fisica.ucr.ac.cr/pluginfile.php/2/course/section/1712/logo_ucr.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="http://moodle.fisica.ucr.ac.cr/pluginfile.php/2/course/section/1712/logo_ucr.png" />
    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.4.js" integrity="sha256-siFczlgw4jULnUICcdm9gjQPZkw/YPDqhQ9+nAOScE4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <link href="sticky-footer.css" rel="stylesheet">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <style> body { font-family: 'Comfortaa', cursive;} </style>
    <nav class="navbar navbar-default navbar-static-top"  >
        <div class="container" >
            <div class="navbar-header">
                <a class="navbar-brand" href="#">
                    @if (Auth::guest())
                        Inicie sesión para ingresar al sistema.
                    @else
                        Bienvenido(a) {{ Auth::user()->name }} {{Auth::user()->apellidos}}
                    @endif
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                    @else

                        <ul class="nav navbar-nav">
                            @if(Auth::user()->puesto != 3)
                            @if(Auth::user()->puesto == 1)
                            <li class="active"><a href="{{url('/Oficina')}}"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>
                            <li><a href="{{url('/Usuarios')}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
                            @endif
                            @if(Auth::user()->puesto == 2)
                                <li class="active"><a href="{{url('/Taller')}} "><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>
                            @endif
                            <li><a href="{{url('/Vehiculos')}}"><span class="glyphicon glyphicon-bed" aria-hidden="true"></span> Vehiculos</a></li>
                            <li><a href="{{url('/Repuestos')}}"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Respuestos</a> </li>
                            @if(Auth::user()->puesto == 1)
                                    <li><a href="{{url('/Faltantes')}}"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Faltantes</a></li>

                                @endif
                            <li><a href="{{url('/Revisiones')}}"><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span> Revisiones</a></li>
                            @endif
                            <li>

                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">

                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>

                                    Cerrar sesión

                                </a>

                                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </li>
                        </ul>






                    @endif


                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Scripts -->

    <footer style="position: fixed;
                    bottom: 0;
                    width: 100%;
  /* Set the fixed height of the footer here */
                    height: 9%;
                    background-color: #f5f5f5;">
        <div class="container">
            <div class="row">

                @if(Auth::guest())
                    <div class="col-sm-12">
                        <h5 align="center">Oficina de Servicios Generales-2016</h5>
                        <h5 align="center">Universidad de Costa Rica, Sede Occidente</h5>
                    </div>
                @elseif(Auth::user()->puesto == 2)
                    <div class="col-sm-4">
                        <h5 align="center">Oficina de Servicios Generales-2016</h5>
                        <h5 align="center">Universidad de Costa Rica, Sede Occidente</h5>
                    </div>
                    <div class="col-sm-8">
                        <nav class="navbar navbar-default">
                            <div class="container-fluid">
                                <!-- Brand and toggle get grouped for better mobile display -->
                                <div class="navbar-header">
                                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                        <span class="sr-only">Toggle navigation</span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                    <a class="navbar-brand" href="#">
                                        Acciones
                                    </a>
                                </div>

                                <!-- Collect the nav links, forms, and other content for toggling -->
                                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                    <ul class="nav navbar-nav">
                                        <li><a href="{{route('Taller/asignar')}}">Asignar repuesto</a></li>
                                        <li><a href="{{ route('Repuestos.create') }}">Agregar repuesto</a></li>
                                        <li><a href="#">Revision de corrección</a></li>
                                    </ul>
                                </div><!-- /.navbar-collapse -->
                            </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                @else
                    <div class="col-sm-12">
                        <h5 align="center">Oficina de Servicios Generales-2016</h5>
                        <h5 align="center">Universidad de Costa Rica, Sede Occidente</h5>
                    </div>
                @endif
            </div>

        </div>
    </footer>


    <script src="/js/app.js"></script>
</body>
</html>
