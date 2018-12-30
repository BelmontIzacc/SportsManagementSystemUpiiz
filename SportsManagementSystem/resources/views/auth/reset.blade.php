@extends('Admin.layout')
<?php
$index=4;
?>
@section('title')
<title>Servicio Deporte</title>
@stop

@section('css')
<style type="text/css">
    .page-center-in {
        display: table-cell;
        vertical-align: middle;
        padding: 160px 0;
    }
    .sign-avatar {
        display:block;
        margin:auto;
        margin-left: auto;
        margin-right: auto;
    }
</style>
@stop

@section('popUp')
<div class="page-center">
    <div class="page-center-in">
        <div class="container-fluid">
            {!!Form::open(array('url'=>'/password/reset', 'class'=>'sign-box', 'method'=>'post'))!!}
            {!! csrf_field() !!}
                <div class="sign-avatar">
                    <img src="{{asset('Template/img/Stickmen/LogoSRDpng2.svg')}}" alt="" style="height:120px;width:auto;">
                </div>
                </br>
                <input type="hidden" name="token" value="{{ $token }}">
                @if(count($errors) > 0)
                <div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
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
                <header class="sign-title">Cambiar Contraseña</header>
                <div class="form-group">
                    {!!Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Correo', 'id'=>'email'])!!}
                </div>
                <div class="form-group">
                    {!!Form::password('password', ['class'=>'form-control', 'placeholder'=>'Contraseña', 'id'=>'password'])!!}
                </div>
                <div class="form-group">
                    {!!Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Nueva Contraseña', 'id'=>'password_confirmation'])!!}
                </div>
                <button type="submit" class="btn btn-rounded">Reset Password</button>
                
                <a href="{{asset('/')}}"><button type="button" class="close">
                    <span aria-hidden="true">&times;</span>
                </button></a>
            {!!Form::close()!!}
        </div>
    </div>
</div><!--.page-center-->
@stop

@section('subHead')

@stop

@section('content')

@stop

@section('scripts')

@stop