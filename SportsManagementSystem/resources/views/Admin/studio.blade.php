@extends('Admin.layout')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
  $classSize = "col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1";

  $taller = '
    <div class="icon">
        <i class="font-icon font-icon-fire"></i>
    </div>
    <div class="caption hidden-md-up">-1-</div>
    <div class="caption hidden-sm-down">Taller</div>
  ';
?>

@section('title')
<title>Registro Taller</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>

<style>
#nombre,#apellidoPaterno,#apellidoMaterno{
  text-transform: capitalize;
} 
</style>

@stop

@section('popUp')
<div class="container-fluid">
  <div class="row">
    <div class="{{$classSize}}">
      @include('alerts.formError')
    </div>
  </div>

{!!Form::open(array('url'=>'#', 'method'=>'post'))!!}
<a href="{{asset('/admin')}}"><button type="button" class="close"><span aria-hidden="true">&times;</span></button></a>
    <div class="row details1 text-center" style="display:block">
        <div class="{{$classSize}}">
        <a href="{{asset('/admin')}}"><button type="button" class="close"><span aria-hidden="true">&nbsp;&times;&nbsp;</span></button></a>
            <section class="box-typical">
                <div class="steps-icon-progress" style="padding:30px">
                    <ul>
                        <li class="active" style="left:40%">
                            {!!$taller!!}
                        </li>
                    </ul>
                </div>

                <h5 class="m-t-lg with-border">Registro de Talleres</h5>
                <div class="row">
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
        				    {!!Form::text('coord', null, ['class'=>'form-control', 'placeholder'=>'Coordinador', 'id'=>'coord'])!!}			
                        </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            {!!Form::text('taller', null, ['class'=>'form-control', 'placeholder'=>'Nombre del taller', 'id'=>'taller'])!!}
                        </fieldset>
                        
                    </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            {!!Form::number('limite', null, ['class'=>'form-control', 'placeholder'=>'Cupo Limite (Opcional)', 'id'=>'limite'])!!}
                        </fieldset>
                        </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            <label class="form-label">Horario</label>
        				    {!!Form::time('hora', null, ['class'=>'form-control', 'id'=>'hora'])!!}		
        			     </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            {!!Form::text('dias', null, ['class'=>'form-control', 'placeholder'=>'Dias de Impartición', 'id'=>'dias'])!!}
                        </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            {!!Form::text('lugar', null, ['class'=>'form-control', 'placeholder'=>'Lugar', 'id'=>'lugar'])!!}
                        </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            <label class="form-label">Fecha de Inicio</label>
                            {!!Form::date('inicio', null, ['class'=>'form-control', 'id'=>'inicio'])!!}
                        </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            <label class="form-label">Fecha de Cierre (Opcional)</label>
                            {!!Form::date('cierre', null, ['class'=>'form-control', 'id'=>'cierre'])!!}
                        </fieldset>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <button type="submit" class="btn btn-rounded btn-inline btn-warning">
                            Finalizar
                        </button>
                    </div>
                </div>

            </section><!--.steps-icon-block-->
        </div>
    </div><!--.row-->

{!!Form::close()!!}

</div><!--.container-fluid-->
@stop
