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

    $dia = array(
        'Lunes',
        'Martes',
        'Miercoles',
        'Jueves',
        'Viernes',
    );

?>

@section('title')
<title>Registro Taller</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>

<style>
#nombreTaller{
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

{!!Form::open(array('url'=>'/admin/registerStudio', 'method'=>'post'))!!}
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
                            {!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Nombre del taller', 'id'=>'nombreTaller'])!!} 
                        </fieldset>
                        
                    </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            {!!Form::number('duracion', null, ['class'=>'form-control', 'placeholder'=>'Duracion en horas (total)', 'id'=>'duracion'])!!} 
                        </fieldset>
                        </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            <label class="form-label"></label>
        				    {!!Form::select('tipo',$tilista, 0, ['class'=>'select2 form-control', 'placeholder'=>'Selecciona un tipo'])!!}		
        			     </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            <label class="form-label">Dias de Imparticion</label>
                            {!!Form::select('dia[]',$dia,0, ['class'=>'select2 remove-example', 'multiple'])!!}
                        </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            {!!Form::text('lugar', null, ['class'=>'form-control', 'placeholder'=>'Lugar', 'id'=>'lugar'])!!}
                        </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                          <label class="form-label">Inicio del Taller</label>
                            <div class='input-group date'>
                                  {!!Form::text('Date1', null, ['class'=>'form-control', 'id'=>'date_box', 'placeholder'=>'00/00/0000'])!!}
                                  <span class="input-group-addon">
                                      <i class="font-icon font-icon-calend"></i>
                                  </span>
                            </div>
                        </fieldset>
                    </div>
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                          <label class="form-label">Fin del Taller</label>
                            <div class='input-group date'>
                                  {!!Form::text('Date2', null, ['class'=>'form-control', 'id'=>'date_box2', 'placeholder'=>'00/00/0000'])!!}
                                  <span class="input-group-addon">
                                      <i class="font-icon font-icon-calend"></i>
                                  </span>
                            </div>
                        </fieldset>
                    </div>

                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            <label class="form-label"></label>
                            <div class="form-group">
                              <label class="col-sm-12">¿Esta Registrado el Coordinador?</label>
                              <div class="col-sm-12">
                                <div class="rdio rdio-primary">
                                  <input type="radio" name="taller" value="si" id="tlist" onclick="mostrar();">
                                  <label>Si</label>
                                </div>
                                <div class="rdio rdio-primary">
                                  <input type="radio" name="taller" value="no" id="tlistt" onclick="mostrar();">
                                  <label>No</label>
                                </div>
                              </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            <label class="form-label"</label>
                              <!--Bloque Oculto-->
                              <div id="tlistF" style="display:none;">
                                <label>¿Quien?</label>
                                <div>
                                      <fieldset class="form-group">
                                          <label class="form-label"></br></label>
                                            {!!Form::select('coordinador',$coord, -1, ['class'=>'select2 form-control', 'placeholder'=>'Selecciona un taller'])!!}
                                      </fieldset>
                                </div>
                              </div>
                              <!--Bloque Oculto-->
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

    function mostrar(){
      e = document.getElementById("tlistF");
      c = document.getElementById("tlist");

      a = document.getElementById("tlistM");
      l = document.getElementById("tlistt");

      if (c.checked) {
        e.style.display = 'block';
      }
      else{
        e.style.display = 'none';
      }

      if(l.checked){
        a.style.display = 'block';
      }else{
        a.style.display = 'none';
      }
    }

    </script>

@stop