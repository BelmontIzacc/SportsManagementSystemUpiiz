@extends('Admin.layout')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
  $classSize = "col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1";

  $personales = '
    <div class="icon">
        <i class="font-icon font-icon-user"></i>
    </div>
    <div class="caption hidden-md-up">-1-</div>
    <div class="caption hidden-sm-down">Personal</div>
  ';

  $usuario = '
    <div class="icon">
        <i class="font-icon font-icon-server"></i>
    </div>
    <div class="caption hidden-md-up">-2-</div>
    <div class="caption hidden-sm-down">Usuario</div>
  ';

  $taller = '
    <div class="icon">
        <i class="font-icon font-icon-fire"></i>
    </div>
    <div class="caption hidden-md-up">-3-</div>
    <div class="caption hidden-sm-down">Taller</div>
  ';

  $sexos = array(
        'Seleccionar',
        'Masculino',
        'Femenino',
    );
?>

@section('title')
<title>Registro Coordinador</title>
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
                        <li class="active">
                            {!!$personales!!}
                        </li>
                        <li>
                            {!!$usuario!!}
                        </li>
                        <li>
                            {!!$taller!!}
                        </li>
                    </ul>
                </div>

                <h5 class="m-t-lg with-border">Llenado de información personal</h5>
                <div class="row">
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
        				{!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre(s)', 'id'=>'nombre'])!!}			
        			     </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
        				{!!Form::text('apellidoPaterno', null, ['class'=>'form-control', 'placeholder'=>'Apellido paterno', 'id'=>'apellidoPaterno'])!!}			
        						</fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
        				    {!!Form::text('apellidoMaterno', null, ['class'=>'form-control', 'placeholder'=>'Apellido materno', 'id'=>'apellidoMaterno'])!!}		
        			 </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                      <label class="form-label">Sexo</label>
                {!!Form::select('sexo',$sexos, 0, ['class'=>'bootstrap-select bootstrap-select-arrow form-control'])!!}   
               </fieldset>
                  </div>
                </div>
                <div class="row">
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
        				{!!Form::text('telefono', null, ['class'=>'form-control', 'id'=>'telefono'])!!}
        						</fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                {!!Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'E-Mail', 'id'=>'email'])!!}      
        						</fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                      
        						</fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">

        						</fieldset>
                  </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
                        <button type="button" class="btn btn-rounded btn-inline" onclick="toggle1();">
                            Siguiente →
                        </button>
                    </div>
                </div>

            </section><!--.steps-icon-block-->
        </div>
    </div><!--.row-->

    <div class="row details2 text-center" style="display:none">
        <div class="{{$classSize}}">
          <a href="{{asset('/admin')}}"><button type="button" class="close"><span aria-hidden="true">&nbsp;&times;&nbsp;</span></button></a>
            <section class="box-typical">
                <div class="steps-icon-progress" style="padding:30px">
                    <ul>
                      <li class="active">
                          {!!$personales!!}
                      </li>
                      <li class="active">
                          {!!$usuario!!}
                      </li>
                      <li>
                          {!!$taller!!}
                      </li>
                    </ul>
                </div>

                <h5 class="m-t-lg with-border">Llenado de información Usuario</h5>
                <div class="row">
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                    <label class="form-label">Usuario</label>
                      {!!Form::text('boleta', null, ['class'=>'form-control', 'id'=>'boleta'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                    <label class="form-label">Contraseña</label>
                      {!!Form::password('password', ['class'=>'form-control', 'placeholder'=>'Contraseña', 'id'=>'hide-show-password'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                      {!!Form::password('password2', ['class'=>'form-control', 'placeholder'=>'Repetir contraseña', 'id'=>'password2'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}} immsOnly">
                    <fieldset class="form-group">
                      
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">

                    </fieldset>
                  </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <button type="button" class="btn btn-rounded btn-grey btn-inline" onclick="toggle2();">← Atrás</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <button type="button" class="btn btn-rounded btn-inline" onclick="toggle1();">
                            Siguiente →
                        </button>
                    </div>
                </div>

            </section><!--.steps-icon-block-->
        </div>
    </div><!--.row-->

    <div class="row details3 text-center" style="display:none">
        <div class="{{$classSize}}">
          <a href="{{asset('/admin')}}"><button type="button" class="close"><span aria-hidden="true">&nbsp;&times;&nbsp;</span></button></a>
            <section class="box-typical">
                <div class="steps-icon-progress" style="padding:30px">
                    <ul>
                        <li class="active">
                            {!!$personales!!}
                        </li>
                        <li class="active">
                            {!!$usuario!!}
                        </li>
                        <li class="active">
                            {!!$taller!!}
                        </li>
                    </ul>
                </div>

                <h5 class="m-t-lg with-border">Llenado de información Taller</h5>
                <div class="row">
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            <label class="form-label">Nombre</label>
                             {!!Form::text('nomreTaller', null, ['class'=>'form-control', 'placeholder'=>'Nombre del Taller', 'id'=>'taller'])!!}
                        </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                        {!!Form::number('limite', null, ['class'=>'form-control', 'placeholder'=>'Cupo Limite' ,'id'=>'limte'])!!}
                    </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            <label class="form-label">Horario</label>
                            {!!Form::time('hora', null, ['class'=>'form-control', 'id'=>'hora'])!!}
                        </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            {!!Form::text('dias', null, ['class'=>'form-control', 'placeholder'=>'Dias deImpartición', 'id'=>'dia'])!!}
                        </fieldset>
                    </div><div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            {!!Form::text('lugar', null, ['class'=>'form-control', 'placeholder'=>'Lugar', 'id'=>'lugar'])!!}
                        </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                        <label class="form-label">Fecha de inicio</label>
                        {!!Form::date('inicio', null, ['class'=>'form-control', 'id'=>'inicio'])!!}
                    </div>
                    <div class="{{$classSizeForms}}">
                        <label class="form-label">Fecha de cierre (Opcional)</label>
                        {!!Form::date('cierre', null, ['class'=>'form-control', 'id'=>'cierre'])!!}
                    </div>
                </div>

                <br/>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <button type="button" class="btn btn-rounded btn-grey btn-inline" onclick="toggle2();">← Atrás</button>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
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
@section('content')
Registro
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
        $('#telefono').mask('(000) 000-0000', {placeholder: "Teléfono personal"});
        $('#boleta').mask('0000 00 0000', {placeholder: "Boleta/Numero de Trabajador"});
    });
    </script>

@stop