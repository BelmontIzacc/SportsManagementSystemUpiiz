@extends('User.layout')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
?>

@section('title')
<title>Inicio Usuario</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>
@stop
@section('popUp')
@stop
@section('content')

<div class="row">
    <div class="container-fluid">
        <section class="card widget widget-user">
            <div class="widget-user-bg" style="background-image: url('{{asset('/Template/img/backgroundUser.svg')}}')"></div>
            <div class="widget-user-photo">
                <img src="{{asset('/Template/img/Stickmen/LogoSRDpng2.png')}}" alt="" style="height:120px;width:auto;">
            </div>
            <div>
                Taller: {{$taller->nombre}}
                <i class="font-icon font-icon-award"></i>
            </div>
            @unless($taller->usuario == null)
            <div>Coordinador {{$taller->usuario}}</div>
            @endunless
            
            <div class="widget-user-stat">
                <div class="item">
                    <div class="number">{{$total}}</div>
                    <div class="caption">Participantes</div>
                </div>
                @unless($taller->lugar == null)
                <div class="item">
                    <div class="number">{{$taller->lugar}}</div>
                    <div class="caption">Lugar</div>
                </div>
                @endunless
                @unless($taller->dias == null)
                    <div class="item hidden-md-down">
                        <div class="number">{{$taller->dias}}</div>
                        <div class="caption">Horario</div>
                    </div>
                @endunless
            </div>
            
            <div class="widget-user-stat">
                <div class="item">
                    <div class="number">{{$fechaI}}</div>
                    <div class="caption">Inicia</div>
                </div>

                <div class="item">
                    <div class="number">{{$fechaF}}</div>
                    <div class="caption">Termina</div>
                </div>

                @unless($taller->dias == null)
                <div class="item hidden-md-down">
                    <div class="number">{{$taller->duracion}} hrs</div>
                    <div class="caption">Duracion total</div>
                </div>
                @endunless
            </div>

            <div class="widget-user-stat">
                @unless($taller->status == null)
                </br>
                    <div class="number">
                        @if($t == 1)
                            Inactivo
                        @elseif($t == 2)
                            Activo
                        @elseif($t == 3)
                            Suspendido temporalmente
                        @elseif($t == 4)
                            Sin Coordinador
                        @endif 
                    </div>
                    <div class="caption">Estatus</div>
                @endunless
            </div>

            <div class="widget-user-stat">
            </br>
                @unless($taller->descripcion == null)
                    <div class="number">{{$taller->descripcion}}</div>
                    <div class="caption">Descripcion</div>
                @endunless
            </div>

        </section>
        <section>
            <div class="box-typical box-typical-padding">

                <div class="row text-center">
                    <div class="col-lg-12 col-md-12">
                        Si deseas salir del taller, favor de ir con el encargado del area de deportes.
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@stop
@section('scripts')

    <script src="{{asset('/Template/js/lib/bootstrap-sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('/Template/js/custom/desabilitar.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>

    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
    <script src="{{asset('/Template/js/lib/daterangepicker/daterangepicker.js')}}"></script>

@stop
