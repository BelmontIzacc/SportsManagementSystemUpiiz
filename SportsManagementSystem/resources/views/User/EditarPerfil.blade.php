@extends('User.layout')
<?php
    $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
    $classSize = "col-lg-4 col-md-4 col-sm-6";
	$classSizeModal = "col-lg-6 col-md-6";
?>

@section('title')
<title>Perfil del usuario</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>
@stop
@section('popUp')
@stop
@section('content')
<section class="widget widget-user">
    <div class="widget-user-bg" style="background-image: url('{{asset('/Template/img/backgroundUser.svg')}}')"></div>
    <div class="widget-user-photo">
        <img src="{{asset('/Template/img/avatar.svg')}}">
    </div>
    <div class="widget-user-name">
        {{$user}}
        <i class="font-icon font-icon-award"></i>
    </div>
    @unless($student->carrera->nombre == null)
    <div>{{$student->carrera->nombre}}</div>
    @endunless

    <div class="widget-user-stat hidden-md-down">
    	@unless($student->institucion->nombre == null)
        <div class="item">
            <div class="number">{{$student->institucion->nombre}}</div>
            <div class="caption">Plantel</div>
        </div>
        @endunless
        @unless($student->usuario->email == null)
        <div class="item">
            <div class="number">{{$student->usuario->email}}</div>
            <div class="caption">Correo</div>
        </div>
         @endunless
        <div class="item">
            <div class="number">{{$student->usuario->boleta}}</div>
            <div class="caption">Boleta</div>
        </div>

    </div>
</section>
 {!!Form::open(array('url'=>'/user/EditProfile', 'class'=>'patata', 'method'=>'post'))!!}
<div class="box-typical box-typical-padding">
    <h5 class="m-t-lg with-border">Información</h5>
    <form class="patata">
    <div class="row">
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Nombre</label>
                    {!!Form::text('nombre', $user->nombre, ['class'=>'form-control', 'id'=>'nombre'])!!}
            </fieldset>
        </div>
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Apellido Paterno</label>
                    {!!Form::text('apellidoPaterno', $user->apellidoPaterno, ['class'=>'form-control', 'id'=>'ap'])!!}
            </fieldset>
        </div>
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Apellido Materno</label>
                    {!!Form::text('apellidoMaterno', $user->apellidoMaterno, ['class'=>'form-control', 'id'=>'am'])!!}
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Boleta</label>
                    {!!Form::text('boleta', $user->boleta, ['class'=>'form-control', 'id'=>'bo'])!!}
            </fieldset>
        </div>
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Email</label>
                    {!!Form::email('email', $user->email, ['class'=>'form-control', 'id'=>'email'])!!}
            </fieldset>
        </div>

        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Teléfono</label>
                    {!!Form::text('telefono', $student->telefono, ['class'=>'form-control', 'id'=>'tel'])!!}
            </fieldset>
        </div>
    </div>
        <button type="submit" class="btn btn-rounded btn-correct sign-up">Enviar</button>
    </form>
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

    <script>
    $(document).ready(function() {
        String.prototype.capitalizar = function(){
            return this.toLowerCase().replace( /\b\w/g, function (m) {
                return m.toUpperCase();
            });
        };

        var nombre = $(document.getElementById('nombre'));
        var ap = $(document.getElementById('ap'));
        var am = $(document.getElementById('am'));
        var bo = $(document.getElementById('bo'));

        nombre.focusout(function(){
                    $(this).val($(this).val().capitalizar());
                });
        ap.focusout(function(){
                    $(this).val($(this).val().capitalizar());
                });
        am.focusout(function(){
                    $(this).val($(this).val().capitalizar());
                });
        bo.focusout(function(){
                    $(this).val($(this).val().toUpperCase());
                });
    });
    </script>

@stop
