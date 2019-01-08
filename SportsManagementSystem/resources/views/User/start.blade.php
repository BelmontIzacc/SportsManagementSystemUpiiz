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
<h3 class="m-t-lg with-border">Bienvenidos al sistema de talleres de UPIIZ</h3>
<div class="container-fluid" >
    <section class="box-typical box-typical-full-height-with-header">
        @foreach($inscripcion as $I)
        <?php
            $i = 0;
            $num = rand ( 1 , 25 );
            $i = $i +1;
            $url = '/Template/img/Stickmen/StickmenSVG/sports2(	'.$num.').svg';  ?>
        <div class="gallery-col col-md-3">
            <article class="gallery-item" style="height: 188px; width:auto;">
                <font size=4><p style="color:#1B38E3";>{{$I->taller->nombre}}</p></font>
                <img class="gallery-picture" src="{{asset($url)}}" alt="" height="188" >
                <div class="gallery-hover-layout">
                    <div class="gallery-hover-layout-in">
                        <p class="gallery-item-title">{{$I->taller->nombre}}</p>
                        <p>{{$I->taller->nombre}}</p>
                        <div class="btn-group">
                            <a class="btn" href="{{asset('/coord/taller/')}}/{{$I->taller->id}}">
                                <i class="font-icon font-icon-eye"></i>
                            </a>
                        </div>
                        <p>{{$I->taller->tipo->nombre}}</p>
                    </div>
                </div>
            </article>
        </div><!--.gallery-col-->
        @endforeach
    </section>
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
