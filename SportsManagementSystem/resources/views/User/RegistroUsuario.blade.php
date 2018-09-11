@extends('barra.layout')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
?>

@section('title')
<title>Bienvenido Usuario</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>
@stop
@section('popUp')
{!!Form::open(array('url'=>'/user/RegistrarUsuario', 'method'=>'post'))!!}
<body>

    <div class="page-center">
        <div class="page-center-in">
            <div class="container-fluid">
                <form class="sign-box">
                    <div class="sign-avatar no-photo">-</div>
                    <header class="sign-title">Sign Up</header>
                    <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
        				{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre(s)', 'id'=>'nombre'])!!}			
        			     </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
        				{!!Form::text('apellidoP', null, ['class'=>'form-control', 'placeholder'=>'Apellido paterno', 'id'=>'ap'])!!}			
        			     </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
        				{!!Form::text('apellidoM', null, ['class'=>'form-control', 'placeholder'=>'Apellido materno', 'id'=>'am'])!!}			
        			     </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
        				{!!Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Correo Electrónico', 'id'=>'email'])!!}			
        			     </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
        				{!!Form::password('con', ['class'=>'form-control', 'placeholder'=>'contraseña', 'id'=>'password'])!!}			
        			     </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
        				{!!Form::password('con2', ['class'=>'form-control', 'placeholder'=>'Repetir contraseña', 'id'=>'password2'])!!}			
        			     </fieldset>
                    </div>
                    
                    <button type="submit" class="btn btn-rounded btn-success sign-up">Sign up</button>
                    <p class="sign-note">Already have an account? <a href="sign-in.html">Sign in</a></p>
                    <!--<button type="button" class="close">
                        <span aria-hidden="true">&times;</span>
                    </button>-->
                </form>
            </div>
        </div>
    </div><!--.page-center-->
</body>
@stop
@section('content')
Usuario
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
