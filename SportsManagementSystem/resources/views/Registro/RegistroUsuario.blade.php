@extends('barra.layout')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
  $classSize = "col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1";

?>

@section('title')
<title>Registro Usuario</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>

<style>
#nombre,#ap,#am{
  text-transform: capitalize;
}
</style>

@stop

@section('popUp')
<div class="page-center">
    <div class="page-center-in">
        <div class="container-fluid">
            {!!Form::open(array('url'=>'/registro/RegistroUsuario', 'class'=>'sign-box', 'method'=>'post'))!!}

                @if(count($errors) > 0)
    <div class="alert alert-danger alert-fill alert-close alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <form class="sign-box">
                    <div class="sign-avatar no-photo">+</div>
                    <header class="sign-title">Registro</header>
                    <div class="form-group">
                        <fieldset class="form-group">
        				    {!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'id'=>'nombre'])!!}
        			     </fieldset>
                    </div>
                    <div class="form-group">
                        <fieldset class="form-group">
        				    {!!Form::text('apellidoPaterno', null, ['class'=>'form-control', 'placeholder'=>'Apellido paterno', 'id'=>'ap'])!!}
        			 </fieldset>
                    </div>
                    <div class="form-group">
                        <fieldset class="form-group">
        				    {!!Form::text('apellidoMaterno', null, ['class'=>'form-control', 'placeholder'=>'Apellido materno', 'id'=>'am'])!!}
        			 </fieldset>
                    </div>
                    <div class="form-group">
                        <fieldset class="form-group">
        				    {!!Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'ejemplo_registro@gmail.com', 'id'=>'email'])!!}
        			 </fieldset>
                    </div>
                    <div class="form-group">
                        <fieldset class="form-group">
        				    {!!Form::text('boleta', null, ['class'=>'form-control', 'placeholder'=>'Boleta/No. de empleado o Nombre de usuario (solo para personas fuera del IPN)', 'id'=>'bo'])!!}
        			 </fieldset>
                    </div>
                    <div class="form-group">
                        <fieldset class="form-group">
        				    {!!Form::password('password', ['class'=>'form-control', 'placeholder'=>'contraseña', 'id'=>'contra'])!!}
        			 </fieldset>
                    </div>
                    <div class="form-group">
                        <fieldset class="form-group">
        				    {!!Form::password('password2', ['class'=>'form-control', 'placeholder'=>'confirmar contraseña', 'id'=>'contra2'])!!}
        			 </fieldset>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-success sign-up">Registrarse</button>
                    <p class="sign-note">Ya tienes una cuenta? <a href="/login">entra aquí</a></p>
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>

        </div>
    </div>
</div>
@stop
@section('scripts')

    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('/Template/js/custom/completeProfileToggle.js')}}"></script>

    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
    <script src="{{asset('/Template/js/lib/daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{asset('/Template/js/lib/input-mask/jquery.mask.min.js')}}"></script>

    <script src="{{asset('/Template/js/lib/hide-show-password/bootstrap-show-password.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/hide-show-password/bootstrap-show-password-init.js')}}"></script>

    <script>
    $(document).ready(function() {
        String.prototype.capitalizar = function(){
            return this.toLowerCase().replace( /^.|\s\S/g, function (m) {
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
