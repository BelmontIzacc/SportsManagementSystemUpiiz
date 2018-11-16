@extends('User.layout')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
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
<h5 class="m-t-lg with-border">Usuario: {{$user}}</h5> 
    <div class="form-group">
        <label class="form-label" for="exampleInputDisabled">Nombre</label>
        <input type="text" class="form-control" readonly placeholder="" value="{{$user->nombre}}"/>
    </div>
    <div class="form-group">
        <label class="form-label" for="exampleInputDisabled2">apellido paterno</label>
        <input type="text" class="form-control" readonly placeholder="" value="{{$user->apellidoPaterno}}"/>
    </div>
    <div class="form-group">
        <label class="form-label" for="exampleInputDisabled2">apellido materno</label>
        <input type="text" class="form-control" readonly placeholder="" value="{{$user->apellidoMaterno}}"/>
    </div>
    <div class="form-group">
        <label class="form-label" for="exampleInputDisabled2">boleta</label>
        <input type="text" class="form-control" readonly placeholder="" value="{{$user->boleta}}"/>
    </div>
    <div class="form-group">
        <label class="form-label" for="exampleInputDisabled2">email</label>
        <input type="text" class="form-control" readonly placeholder="" value="{{$user->email}}"/>
    </div>
    <button type="button" class="btn btn-rounded btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm">Editar perfíl</button>
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