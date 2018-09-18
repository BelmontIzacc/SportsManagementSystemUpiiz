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
<div class='page-center' style="height: 465px;">
    <div class="page-center-in">
        <div class="container-fluid">
            <div class="row">
                <div class="{{$classSize}}">
                    @include('alerts.formError')
                </div>
            </div>
        <div class="container-fluid">
            <form class="sign-box">
                    {!!Form::open(array('url'=>'/user/RegistroUsuario', 'method'=>'post'))!!}
           
                    <div class="sign-avatar no-photo">+</div>
                    <header class="sign-title">Sign Up</header>
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
        				    {!!Form::text('e-mail', null, ['class'=>'form-control', 'placeholder'=>'ejemplo_registro@gmail.com', 'id'=>'mail'])!!}		
        			 </fieldset>
                    </div>
                    <div class="form-group">
                        <fieldset class="form-group">
        				    {!!Form::password('contraseña', ['class'=>'form-control', 'placeholder'=>'contraseña', 'id'=>'contra'])!!}		
        			 </fieldset>
                    </div>
                    <div class="form-group">
                        <fieldset class="form-group">
        				    {!!Form::password('verContra', ['class'=>'form-control', 'placeholder'=>'confirmar contraseña', 'id'=>'contra2'])!!}		
        			 </fieldset>
                    </div>
                    <button type="submit" class="btn btn-rounded btn-success sign-up">Registrarse</button>
                    <p class="sign-note">Ya tienes una cuenta? <a href="sign-in.html">entra aqui</a></p>
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>

            </div><!--.container-fluid-->
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


@stop