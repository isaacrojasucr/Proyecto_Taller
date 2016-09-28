@extends('layouts.app')

@section('content')

                @if(Auth::user()->puesto == 1)
                    <script type="text/javascript">
                        window.location="/Proyecto_Taller/public/Oficina";
                    </script>
                @else
                    PUTASO
                @endif

@endsection
