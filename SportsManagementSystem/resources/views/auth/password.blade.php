@extends('Admin.layout')
<?php
$index=4;
?>
@section('title')
<title>Olvide Contraseña</title>
@stop

@section('css')
<style type="text/css">
    .page-center-in {
        display: table-cell;
        vertical-align: middle;
        padding: 160px 0;
    }
</style>
@stop

@section('popUp')
<div class="page-center">
    <div class="page-center-in">
        <div class="page-center">
            @if(count($errors) > 0)
                 <div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul>
                    <i class="font-icon font-icon-warning"></i>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @include('alerts.sessionAlert')
            <div class="container-fluid">
                        {!!Form::open(array('url'=>'/password/email', 'method'=>'post','class'=>'sign-box reset-password-box'))!!}
                        {!! csrf_field() !!}
                                <a href="{{asset('/')}}">
                                    <button type="button" class="close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </a>
                    <!--<div class="sign-avatar">
                        <img src="img/avatar-sign.png" alt="">
                    </div>-->
                    <header class="sign-title">Resetear Password</header>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Ingresa Tu Correo">
                    </div>
                    <button type="submit" class="btn btn-rounded">Resetear</button>
                    or <a href="{{asset('/')}}">Sign in</a>
                    {!!Form::close()!!}
            </div>
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