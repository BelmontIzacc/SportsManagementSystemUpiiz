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

  $Académicos = '
    <div class="icon">
        <i class="font-icon font-icon-fire"></i>
    </div>
    <div class="caption hidden-md-up">-3-</div>
    <div class="caption hidden-sm-down">Académico</div>
  ';

  $Salud = '
      <div class="icon">
          <i class="font-icon font-icon-heart"></i>
      </div>
      <div class="caption hidden-md-up">-4-</div>
      <div class="caption hidden-sm-down">Salud</div>
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
                            {!!$Académicos!!}
                        </li>
                        <li>
                            {!!$Salud!!}
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
                        <label class="form-label">Fecha de nacimieto</label>
                        <div class="input-group date">
                            {!!Form::text('edad', null, ['class'=>'form-control','placeholder'=>'00/00/0000', 'id'=>'date_box'])!!}
                            <span class="input-group-addon">
                                <i class="font-incon font-icon-calend"></i>
                            </span>
                        </div>
                    </fieldset>
                  </div>
                </div>

                <div class="row">
                <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                      <label class="form-label">Teléfono</label>
                       {!!Form::text('telefono', null, ['class'=>'form-control','placeholder'=>'Teléfono', 'id'=>'telefono'])!!}
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
                          {!!$Académicos!!}
                      </li>
                      <li>
                          {!!$Salud!!}
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
                            {!!$Académicos!!}
                        </li>
                        <li>
                            {!!$Salud!!}
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
                              <label>Si vienes de fuera del IPN selecciona Otro, de lo contrario selecciona UPIIZ o CECyT</label>
                              <div class="col-sm-12">
                                <div class="rdio rdio-primary">
                                  <input type="radio" name="insti" value="UPIIZ" id="tlist" onclick="mostrar();">
                                  <label>UPIIZ</label>
                                </div>
                                <div class="rdio rdio-primary">
                                  <input type="radio" name="insti" value="CECyT" id="tlistt" onclick="mostrar();">
                                  <label>CECyT</label>
                                </div>
                                <div class="rdio rdio-primary">
                                    <input type="radio" name="insti" value="Otro" id="otro" onclick="mostrar();">
                                    <label>Otro</label>
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

                        <div id="academico">
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
                        </div>
                         <div>
                            <fieldset class="form-group">
                                  <label class="form-label">Confirmación de Boleta o Usuario</label>
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
                    <button type="button" class="btn btn-rounded btn-inline" onclick="toggle1();">
                        Siguiente →
                    </button>
                </div>

            </section><!--.steps-icon-block-->
        </div>
    </div><!--.row-->

    <div class="row">
        <div class="row details4 text-center" style="display:none;">
            <div class="{{$classSize}}">
                <a href="{{asset('/admin')}}"><button type="button" class="close"><span aria-hidden="true">&nbsp;&times;&nbsp;</span></button></a>
                <section class="box-typical">
                    <div class="steps-icon-progress" style="padding:30px;">
                        <ul>
                            <li class="active">
                                {!!$Personales!!}
                            </li>
                            <li class="active">
                                {!!$Domicilio!!}
                            </li>
                            <li class="active">
                                {!!$Académicos!!}
                            </li>
                            <li class="active">
                                {!!$Salud!!}
                            </li>
                        </ul>
                    </div>

                    <h5 class="m-t-lg with-border">Llenado de información de salud</h5>
                    <div class="row">
                        <div class="{{$classSizeForms}}">
                            <fieldset class="form-group">
                                <label class="form-label"></label>
                                <div class="form-group">
                                    <label class="col-sm-12">¿Tienes alguna alergia?</label>
                                    <div class="col-sm-12">
                                        <div class="rdio rdio-primary">
                                            <input type="radio" name="alergia" value="1" id="alergiaSi" onclick="mostrar();">
                                            <label>Sí</label>
                                        </div>
                                        <div class="rdio rdio-primary">
                                            <input type="radio" name="alergia" value="0" id="alergiaNo" onclick="mostrar();">
                                            <label>No</label>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <!--Bloque Oculto-->
                        <div id="alg" class="{{$classSizeForms}}" style="display:none">
                            <fieldset class="form-group">
                                <div>
                                    <h5>¿Cuál? o ¿Cuáles?</h5>
                                    <div>
                                        <fieldset class="form-group">
                                            {!!Form::text('alergias',null,['class'=>'form-control','placeholder'=>'Alergias','id'=>'alergias'])!!}
                                        </fieldset>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <div class="{{$classSizeForms}}">
                            <fieldset class="form-group">
                                <label class="form-label">Estatura </br> (escriba únicamente el número)</label>
                                {!!Form::text('estatura',null,['class'=>'form-control','placeholder'=>'Ejemplo: 1.64','id'=>'estatura'])!!}
                            </fieldset>
                        </div>

                        <div class="{{$classSizeForms}}">
                            <fieldset class="form-group">
                                <label class="form-label">Peso <br> (escriba únicamente el número)</label>
                                {!!Form::text('peso',null,['class'=>'form-control','placeholder'=>'Ejemplo: 54','id'=>'peso'])!!}
                            </fieldset>
                        </div>

                        <div class="{{$classSizeForms}}">
                            <fieldset class="form-group">
                                <label class="form-label">Tipo de sangre</label>
                                {!!Form::text('sangre',null,['class'=>'form-control','placeholder'=>'Tipo de sangre','id'=>'sangre'])!!}
                            </fieldset>
                        </div>

                        <div class="{{$classSizeForms}}">
                            <fieldset class="form-group">
                                <label class="col-sm-12">¿Cuentas con seguro médico?</label>
                                <div class="rdio rdio-primary">
                                    <input type="radio" name="segMed" value="1" id="segMedSi">
                                    <label>Sí</label>
                                </div>
                                <div class="rdio rdio-primary">
                                    <input type="radio" name="segMed" value="0" id="segMedNo">
                                    <label>No</label>
                                </div>
                            </fieldset>
                        </div>

                        <div class="{{$classSizeForms}}">
                            <fieldset class="form-group">
                                <label class="col-sm-12">¿Cuentas con seguro de vida institucional?</label>
                                <div class="rdio rdio-primary">
                                    <input type="radio" name="segIns" value="1" id="segInsSi">
                                    <label>Sí</label>
                                </div>
                                <div class="rdio rdio-primary">
                                    <input type="radio" name="segIns" value="0" id="segInsNo">
                                    <label>No</label>
                                </div>
                            </fieldset>
                        </div>

                        <div class="{{$classSizeForms}}">
                            <h5>Contactos de emergencia <br> (minimo 1) </h5>
                            <label>Contacto 1</label>
                            <div>
                                <fieldset class="form-group">
                                    <label class="form-label">Nombre</label>
                                    {!!Form::text('nomCon1',null,['class'=>'form-control','placeholder'=>'Nombre del primer contacto','id'=>'nomCon1'])!!}
                                    <label class="form-label">Teléfono</label>
                                    {!!Form::text('telCon1',null,['class'=>'form-control','placeholder'=>'Teléfono del primer contacto','id'=>'telCon1'])!!}
                                </fieldset>
                            </div>

                            <div>
                                <label>Contacto 2</label>
                                <fieldset class="fomr-group">
                                    <label class="form-label">Nombre</label>
                                    {!!Form::text('nomCon2',null,['class'=>'form-control','placeholder'=>'Nombre del segundo contacto','id'=>'nomCon2'])!!}
                                    <label class="form-label">Teléfono</label>
                                    {!!Form::text('telCon2',null,['class'=>'form-control','placeholder'=>'Teléfono del segundo contacto','id'=>'telCon2'])!!}
                                </fieldset>
                            </div>
                        </div>

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

                    </div>
                </section>
            </div>
        </div>
    </div><!--.row-->
{!!Form::close()!!}

</div><!--.container-fluid-->
@stop
@section('content')
Registro
@stop
@section('scripts')

    <script src="{{asset('/Template/js/lib/hide-show-password/bootstrap-show-password.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/hide-show-password/bootstrap-show-password-init.js')}}"></script>

    <script src="{{asset('/Template/js/custom/completeProfileToggle.js')}}"></script>
    <script src="{{asset('/Template/js/plugins.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>
    
    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
    <script src="{{asset('/Template/js/lib/daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{asset('/Template/js/lib/input-mask/jquery.mask.min.js')}}"></script>
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

      d = document.getElementById("academico");
      o = document.getElementById("otro");

      b = document.getElementById("alg");
      f = document.getElementById("alergiaSi");

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

      if(o.checked) {
          d.style.display = 'none';
      } else {
          d.style.display = 'block';
      }

      if(f.checked) {
          b.style.display = 'block';
      } else {
          b.style.display = 'none';
      }
    }

    </script>

@stop
