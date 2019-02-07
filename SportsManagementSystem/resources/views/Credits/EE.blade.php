<?php
	$index = 4;
?>
@extends('barra.layout2')

@section('title')
<title>wop</title>
@stop

@section('css')
@stop

@section('popUp')
<div class="page-center">
    <div class="page-center-in">
        <div class="container-fluid">
            <div class="page-error-box">
                <div class="sign-avatar">
                  <a href="{{asset('/')}}">
                    <img src="{{asset('Template/img/EasterEgg.png')}}" alt="" style="height:160px;width:auto;">
                  </a>
									<p>Thanks and sorry, but you find us. (click on the img)</p>
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
