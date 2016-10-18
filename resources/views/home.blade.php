@extends('layouts.app')

@section('content')

                @if(Auth::user()->puesto == 1)
                    <script type="text/javascript">
                        window.location="/Proyecto_Taller/public/Oficina";
                    </script>
                @elseif(Auth::user()->puesto == 2)
                    <script type="text/javascript">
                        window.location="/Proyecto_Taller/public/Taller";
                    </script>
                @else
                    <div class="container">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel panel-primary">
                                <div class="panel-heading" align="center">Ingrese los datos del vehiculo correspondiente </div>
                                    <div class="panel-body" align="center">

                                        {!! Form::open(['route' => 'Vehiculos/reportar', 'method' => 'post', 'validate', 'class' => 'form-inline']) !!}

                                        {!! Form::hidden('id', Auth::user()->id) !!}

                                        <div class="form-group">
                                            {!! Form::label('placa', 'Placa') !!}
                                            <br>
                                            {!! Form::select('placa', $placas ,null, ['class' => 'form-control']) !!}
                                        </div>
                                         <br><br>
                                        <div class="form-group">
                                            {!! Form::label('modelo', 'Kilometraje') !!}
                                            <br>
                                            {!! Form::number('km_total', null, ['class' => 'form-control' , 'required' => 'required']) !!}
                                            </div>
                                                <br>
                                                <br>
                                        <div class="form-group">
                                            {!! Form::submit('Reportar', ['class' => 'btn btn-success ' ] ) !!}
                                        </div>

                                        {!! Form::close() !!}
                                    </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                @endif

@endsection
