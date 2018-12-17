@extends('barra.layout')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
  $classSize = "col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1";

  $Personales = '
    <div class="icon">
        <i class="font-icon font-icon-user"></i>
    </div>
    <div class="caption hidden-md-up">-1-</div>
    <div class="caption hidden-sm-down">Personal</div>
  ';

  $Domicilio = '
    <div class="icon">
        <i class="font-icon font-icon-server"></i>
    </div>
    <div class="caption hidden-md-up">-2-</div>
    <div class="caption hidden-sm-down">Domicilio</div>
  ';

  $Academicos = '
    <div class="icon">
        <i class="font-icon font-icon-fire"></i>
    </div>
    <div class="caption hidden-md-up">-3-</div>
    <div class="caption hidden-sm-down">Académico</div>
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
#nombre,#apellidoPaterno,#apellidoMaterno,#nombreTaller{
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

{!!Form::open(array('url'=>'/registro/InfoCompleta', 'method'=>'post'))!!}
<a href="{{asset('/user')}}"><button type="button" class="close"><span aria-hidden="true">&times;</span></button></a>
    <div class="row details1 text-center" style="display:block">
        <div class="{{$classSize}}">
        <a href="{{asset('/admin')}}"><button type="button" class="close"><span aria-hidden="true">&nbsp;&times;&nbsp;</span></button></a>
            <section class="box-typical">
                <div class="steps-icon-progress" style="padding:30px">
                    <ul>
                        <li class="active">
                            {!!$Personales!!}
                        </li>
                        <li>
                            {!!$Domicilio!!}
                        </li>
                        <li>
                            {!!$Academicos!!}
                        </li>
                    </ul>
                </div>

                <h5 class="m-t-lg with-border">Llenado de información personal</h5>
                <div class="row">
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                      <label class="form-label">Sexo</label>
                        {!!Form::select('sexo',$sexos, 0, ['class'=>'bootstrap-select bootstrap-select-arrow form-control','id'=>'sexo'])!!}   
                    </fieldset>
                  </div>
                </div>
                
                <div class="row">
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                        <label class="form-label">Edad</label>
        				{!!Form::number('edad', null, ['class'=>'form-control','placeholder'=>'Edad', 'id'=>'edad'])!!}
                    </fieldset>
                  </div>
                </div>
                <div class="row">
                <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                      <label class="form-label">Sexo</label>
                       {!!Form::text('telefono', null, ['class'=>'form-control','placeholder'=>'Telefono', 'id'=>'telefono'])!!}
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
                          {!!$Personales!!}
                      </li>
                      <li class="active">
                          {!!$Domicilio!!}
                      </li>
                      <li>
                          {!!$Academicos!!}
                      </li>
                    </ul>
                </div>

                <h5 class="m-t-lg with-border">Llenado de información del Domicilio</h5>
                <div class="row">
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                    <label class="form-label">Calle</label>
                      {!!Form::text('calle', null, ['class'=>'form-control','placeholder'=>'Calle', 'id'=>'calle'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                    <label class="form-label">Número exterior</label>
                      {!!Form::number('ext', null, ['class'=>'form-control', 'placeholder'=>'Número exterior', 'id'=>'exterior'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                        <label class="form-label">Número interior</label>
                      {!!Form::number('inter', null, ['class'=>'form-control', 'placeholder'=>'Número interior', 'id'=>'interior'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}} immsOnly">
                    <fieldset class="form-group">
                        <label class="form-label">Colonia</label>
                      {!!Form::text('colonia', null, ['class'=>'form-control','placeholder'=>'Colonia','id'=>'colonia'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                        <label class="form-label">Código postal</label>
                      {!!Form::text('cp', null, ['class'=>'form-control','placeholder'=>'Código Postal', 'id'=>'cp'])!!}
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
                            {!!$Personales!!}
                        </li>
                        <li class="active">
                            {!!$Domicilio!!}
                        </li>
                        <li class="active">
                            {!!$Academicos!!}
                        </li>
                    </ul>
                </div>

                <h5 class="m-t-lg with-border">Llenado de información Académica</h5>
                <div class="row">
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            <label class="form-label"></label>
                            <div class="form-group">
                              <label class="col-sm-12">Pertenece a: </label>
                              <div class="col-sm-12">
                                <div class="rdio rdio-primary">
                                  <input type="radio" name="insti" value="UPIIZ" id="tlist" onclick="mostrar();">
                                  <label>UPIIZ</label>
                                </div>
                                <div class="rdio rdio-primary">
                                  <input type="radio" name="insti" value="Cecyt" id="tlistt" onclick="mostrar();">
                                  <label>CECyT</label>
                                </div>
                              </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                              <!--Bloque Oculto-->
                              <div id="tlistF" style="display:none;">
                                <h5 class="m-t-lg with-border">UPIIZ</h5>
                                <div>
                                      <fieldset class="form-group">
                                          <label class="form-label">Carrera</label>
                                           {!!Form::select('tlista',$tlista, 0, ['class'=>'bootstrap-select bootstrap-select-arrow form-control', 'placeholder'=>'Seleccionar carrera','id'=>'tlista'])!!}
                                      </fieldset>
                                </div>
                              </div>
                              <!--Bloque Oculto-->
                        
                              <!--Bloque Oculto-->
                              <div id="tlistM" class="col-sm-12" style="display:none;">
                                <h5 class="m-t-lg with-border">CECyT</h5>
                                  <div>
                                      <fieldset class="form-group">
                                          <label class="form-label">Carrera</label>
                                           {!!Form::select('tlistac',$tlistac, 0, ['class'=>'bootstrap-select bootstrap-select-arrow form-control', 'placeholder'=>'Seleccionar carrera','id'=>'tlistac'])!!}
                                      </fieldset>
                                </div>
                                
                              </div>
                              <!--Bloque Oculto-->
                        </fieldset>
                        
                        <div>
                            <fieldset class="form-group">
                                <label class="form-label">Semestre</label>   
                                    {!!Form::number('semestre', null, ['class'=>'form-control','placeholder'=>'Semestre','id'=>'semestre'])!!}
                            </fieldset>
                        </div>
                        <div>
                            <fieldset class="form-group">
                                <label class="form-label">Grupo</label>   
                                    {!!Form::text('grupo', null, ['class'=>'form-control','placeholder'=>'1CM1','id'=>'grupo'])!!}
                            </fieldset>
                        </div>
                         <div>
                            <fieldset class="form-group">
                                  <label class="form-label">Confirmación de Boleta</label>
                                   {!!Form::select('user',$user, 0, ['class'=>'bootstrap-select bootstrap-select-arrow form-control', 'id'=>'user'])!!}
                              </fieldset>
                        </div>
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
        String.prototype.firstUpper = function(){
                    return this.charAt(0).toUpperCase() + this.slice(1).toLowerCase();
        };
        //--- Datos Personales
        $('#edad').mask('00', {placeholder: "Edad"});
        $('#edad').mask('000 000 0000', {placeholder: "Edad"});
        
        
        //--- Datos de domicilio
        var calle = $(document.getElementById('calle'));  
        var colonia = $(document.getElementById('colonia'));  

        calle.focusout(function(){
                    $(this).val($(this).val().firstUpper());
                });
        $('#interior').mask('000', {placeholder: "Numero Interior"});
        $('#exterior').mask('000', {placeholder: "Numero Exterior"});
         colonia.focusout(function(){
                    $(this).val($(this).val().firstUpper());
                });
        $('#cp').mask('00000', {placeholder: "Código Postal"});
        
        //--- Datos de Academia
        var grupo = $(document.getElementById('grupo'));  
        $('#semestre').mask('00', {placeholder: "Semestre:"});
        grupo.focusout(function(){
                    $(this).val($(this).val().toUpperCase());
                });
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