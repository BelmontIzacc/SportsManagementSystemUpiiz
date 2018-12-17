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
<div class="box-typical box-typical-padding">

    <h5 class="m-t-lg with-border">Informacion</h5>

    <div class="row">
        @unless($user->nombre == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Nombre</label>
                <input type="text" readonly class="form-control" value="{{$user->nombre}}">
            </fieldset>
        </div>
        
        @endunless($user->apellidoPaterno == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Apellido Paterno</label>
                <input type="text" readonly class="form-control" value="{{$user->apellidoPaterno}}">    
            </fieldset>
        </div>
         @unless($user->apellidoMaterno == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Apellido Materno</label>
                <input type="text" readonly class="form-control" value="{{$user->apellidoMaterno}}">
            </fieldset>
        </div>
        @endunless
    </div>
    <div class="row">
        @unless($user->boleta == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">boleta</label>
                <input type="text" readonly class="form-control" value="{{$user->boleta}}">
            </fieldset>
        </div>
         @endunless
        @unless($user->email == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">email</label>
                <input type="text" readonly class="form-control" value="{{$user->email}}">
            </fieldset>
        </div>
        @endunless
        @unless($student->telefono == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Teléfono</label>
                <input type="text" readonly class="form-control" value="{{$student->telefono}}">
            </fieldset>
        </div>
        
       
                
        @endunless
    </div>
</div>

<div class="box-typical box-typical-padding">
	<div class="row text-center">
        <a href="/user/Info">
		<div class="col-lg-3 col-md-3">
		    <button type="button" class="btn btn-rounded btn-inline btn-success" data-toggle="modal" data-target=".bd-example-modal-sm">Informacion completa</button>
		</div>
        </a>
        <a href="/user/EditProfile">
        <div class="col-lg-3 col-md-3">
            <button type="button" class="btn btn-rounded btn-warning patata" data-toggle="modal" data-target=".bd-example-modal-sm">Editar perfíl</button>
        </div>
        </a>
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