<?php
	$index = 4;
?>
@extends('barra.layout2')

@section('title')
<title>Error</title>
@stop

@section('css')
@stop

@section('popUp')
<div class="page-center">
    <div class="page-center-in">
        <div class="container-fluid">
            <div class="page-error-box">
                <div class="sign-avatar">
                    <img src="{{asset('Template/img/Stickmen/LogoSRDpng2.png')}}" alt="" style="height:125px;width:auto;">
								</div>
                <div class="error-title" style="color:#303030;"><font face="Broadway" >Cr&eacute;ditos</font></div>
                <div style="color:#404040;">
                    <h4><font face="Britannic" >Encargados del proyecto</font></h4>
                    <center>&nbsp;</center>
                    <p style="color:#a00a0b;"><font size="5">Isaul Ibarra Belmonte:</font></p>
                    <h5>Jefe de proyecto, Programador encargado del "Administrador", ayudante de DB,  Debugger.</h5>
                    <center>&nbsp;</center>
                    <p style="color:#a00a0b;"><font size="5">Orlando Odiseo Belmonte Flores:</font></p>
                    <h5>Programador encargado del "Coordinador", Ayudante del "Administrador", Encargado de DB, Diseñado inicial. </h5>
                    <center>&nbsp;</center>
                    <p style="color:#a00a0b;"><font size="5">Guillermo Ignacio Bautista Garc&iacute;a<a href="{{asset('/Credits/EE')}}">:</a></font></p>
                    <h5>Programador encargado del "Usuario", pequeños ajustes JS, ayudante de DB, Beta-tester. </h5>
                </div>
            </div>
        </div>
    </div>
</div><!--.page-center-->
@stop

@section('subHead')
@stop

@section('content')
Hola
@stop

@section('scripts')
@stop
