<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="Servicios Generales -Taller">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
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
                            <li class="active"><a href="/Proyecto_Taller/public/Oficina"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Inicio</a></li>
                            <li><a href="/Proyecto_Taller/public/Usuarios"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Usuarios</a></li>
                            @endif
                            <li><a href="/Proyecto_Taller/public/Vehiculos"><span class="glyphicon glyphicon-bed" aria-hidden="true"></span> Vehiculos</a></li>
                            <li><a href="/Proyecto_Taller/public/Repuestos"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span> Respuestos</a> </li>
                            @if(Auth::user()->puesto == 1)
                            <li><a href="/Proyecto_Taller/public/Faltantes"><span class="glyphicon glyphicon-alert" aria-hidden="true"></span> Faltantes</a></li>
                            @endif
                            <li><a href="/Proyecto_Taller/public/Revisiones"><span class="glyphicon glyphicon-transfer" aria-hidden="true"></span> Revisiones</a></li>
                            @endif
                            <li>

                                <a href="{{ url('/logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">

                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                                    Cerrar Sesión


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
    <script src="/js/app.js"></script>
</body>
</html>
