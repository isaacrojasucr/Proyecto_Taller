@extends('layouts.app')

@section('content')



    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
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

            </div>
        </div>
@endsection
