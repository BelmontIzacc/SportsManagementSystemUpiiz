@extends('Admin.layout')
<?php
$index=4;
?>
@section('title')
<title>Control de Registros</title>
@stop

@section('css')
<style type="text/css">
    .padre {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
}
</style>
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
@stop

@section('popUp')

<div class="padre">
        <div class="page-center">
            <div class="page-center-in">
                <div class="container-fluid">
                    {!!Form::open(array( 'class'=>'sign-box', 'id'=>'Form','method'=>'post'))!!}
                    {!! csrf_field() !!}
                        <div class="sign-avatar">
                            <img src="{{asset('Template/img/upiiz4.svg')}}" alt="" style="height:100px;width:auto;">
                        </div>
                        @if(count($errors) > 0)
                         <div class="alert alert-success alert-icon alert-close alert-dismissible fade in" role="alert">
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
                        <header class="sign-title">Control de Registros</header>
                        <div class="alert alert-info alert-icon alert-close alert-dismissible fade in" role="alert">
                            <i class="font-icon font-icon-warning"></i>
                            Nota: Se puede manjear las fechas para el control de registro y actualizacion de datos.
                        </div>
                        <section class="widget widget-accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <article class="panel">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                        Registro al Sistema
                                        <i class="font-icon font-icon-arrow-down"></i>
                                    </a>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                    <div class="panel-collapse-in">
                                        <div class="user-card-row">
                                            <div class="tbl-row">
                                                <div class="tbl-cell">
                                                    <p class="user-card-row-location">Ingresar fechas para permitir el registro al Sistema.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <fieldset class="form-group">
                                              <label class="form-label">Inicio del Registro al sistema</label>
                                                <div class='input-group date'>
                                                      {!!Form::text('DateRS1', "{{$RS1}}" , ['class'=>'form-control', 'id'=>'date_box', 'placeholder'=>'00/00/0000'])!!}
                                                      <span class="input-group-addon">
                                                          <i class="font-icon font-icon-calend"></i>
                                                      </span>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div>
                                            <fieldset class="form-group">
                                              <label class="form-label">Fin del Registro al sistema</label>
                                                <div class='input-group date'>
                                                      {!!Form::text('DateRS2', "{{$RS2}}" , ['class'=>'form-control', 'id'=>'date_box2', 'placeholder'=>'00/00/0000'])!!}
                                                      <span class="input-group-addon">
                                                          <i class="font-icon font-icon-calend"></i>
                                                      </span>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="panel">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Registro a Talleres
                                        <i class="font-icon font-icon-arrow-down"></i>
                                    </a>
                                </div>
                                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
                                    <div class="panel-collapse-in">
                                        <div class="user-card-row">
                                            <div class="tbl-row">
                                                <div class="tbl-cell">
                                                    <p class="user-card-row-location">Ingresar fechas para permitir el registro a Talleres.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <fieldset class="form-group">
                                              <label class="form-label">Inicio del Registro a Talleres</label>
                                                <div class='input-group date'>
                                                      {!!Form::text('DateRT1', "{{$RT1}}" , ['class'=>'form-control', 'id'=>'date_box3', 'placeholder'=>'00/00/0000'])!!}
                                                      <span class="input-group-addon">
                                                          <i class="font-icon font-icon-calend"></i>
                                                      </span>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div>
                                            <fieldset class="form-group">
                                              <label class="form-label">Fin del Registro a Talleres</label>
                                                <div class='input-group date'>
                                                      {!!Form::text('DateRT2', "{{$RT2}}" , ['class'=>'form-control', 'id'=>'date_box4', 'placeholder'=>'00/00/0000'])!!}
                                                      <span class="input-group-addon">
                                                          <i class="font-icon font-icon-calend"></i>
                                                      </span>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <article class="panel">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Proceso de actualización
                                        <i class="font-icon font-icon-arrow-down"></i>
                                    </a>
                                </div>
                                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                                    <div class="panel-collapse-in">
                                        <div class="user-card-row">
                                            <div class="tbl-row">
                                                <div class="tbl-cell">
                                                    <p class="user-card-row-name">Estatus de los estudiantes</p>
                                                    <p class="user-card-row-location">Se puede cambiar el estatus de los estudiantes para la actualización de información.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-lg-offset-1 col-md-12 col-md-offset-1 center-block">
                                            </br>
                                                <div class="checkbox-toggle">
                                                        <input type="checkbox" id="check-toggle-1" name="check-toggle-1" onclick="getValue();">
                                                        <label for="check-toggle-1">Incompleto</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 col-lg-offset-1 col-md-12 col-md-offset-1 center-block">
                                                <div class="checkbox-toggle">
                                                        <input type="checkbox" id="check-toggle-2" name="check-toggle-2" onclick="getValue2();">
                                                        <label for="check-toggle-2">Completado</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </section>
                        <input type="hidden" id="usuarios" name="usuarios"></input>
                        <input type="hidden" id="usuarios2" name="usuarios2"></input>
                        <button type="submit" class="btn btn-rounded swal-btn-cancel" id="formButton" name="formButton">Aceptar</button>
                        <a href="{{asset('/admin/controlPanel')}}"><button type="button" class="close">
                            <span aria-hidden="true">&times;</span>
                        </button></a>
                    {!!Form::close()!!}
                </div>
            </div>
        </div><!--.page-center-->
</div>
@stop

@section('subHead')

@stop

@section('content')

@stop

@section('scripts')

    <script src="{{asset('/Template/js/lib/hide-show-password/bootstrap-show-password.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/hide-show-password/bootstrap-show-password-init.js')}}"></script>

    <script src="{{asset('/Template/js/custom/completeProfileToggle.js')}}"></script>
    <script src="{{asset('/Template/js/plugins.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('/Template/js/custom/desabilitar.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>

    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
    <script src="{{asset('/Template/js/lib/daterangepicker/daterangepicker.js')}}"></script>

    <script type="text/javascript">
        function getValue() {
           var isChecked = document.getElementById('check-toggle-1').checked;
           var the_value = isChecked ? 1 : 0;
           //alert('status :'+the_value);
           document.getElementById('usuarios').value = the_value;
        }
        function getValue2() {
           var isChecked = document.getElementById('check-toggle-2').checked;
           var the_value = isChecked ? 1 : 0;
           //alert('status :'+the_value);
           document.getElementById('usuarios2').value = the_value;
        }
    </script>
@stop
