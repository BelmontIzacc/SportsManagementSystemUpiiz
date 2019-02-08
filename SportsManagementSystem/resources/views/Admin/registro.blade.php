@extends('Admin.layout')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-12 col-md-offset-3 col-sm-4 col-sm-offset-3 col-xs-8 col-xs-offset-2";
  $classSize = "col-lg-6 col-lg-offset-3 col-md-12 col-md-offset-2 col-sm-8 col-sm-offset-1";

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

  $extra = '
    <div class="icon">
        <i class="font-icon font-icon-eye"></i>
    </div>
    <div class="caption hidden-md-up">-3-</div>
    <div class="caption hidden-sm-down">Escolar/Localizacion</div>
  ';


  $taller = '
    <div class="icon">
        <i class="font-icon font-icon-fire"></i>
    </div>
    <div class="caption hidden-md-up">-4-</div>
    <div class="caption hidden-sm-down">Taller</div>
  ';

  $sexos = array(
        'Masculino',
        'Femenino',
    );

  $dia = array(
        'Lunes',
        'Martes',
        'Miercoles',
        'Jueves',
        'Viernes',
        'Sabado',
        'Domingo',
    );
  $status = array(
        'Inactivo',
        'Activo',
        'Suspendido temporalmente',
        'Sin Coordinador',
    );
?>

@section('title')
<title>Registro Coordinador</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>

<style>
#nombre,#apellidoPaterno,#apellidoMaterno,#nombreTaller,#col,#cal{
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

{!!Form::open(array('url'=>'/admin/registerCoord', 'method'=>'post'))!!}
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
                            {!!$extra!!}
                        </li>
                        <li>
                            {!!$taller!!}
                        </li>
                    </ul>
                </div>

                <h5 class="m-t-lg with-border">Llenado de información Personal</h5>
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
                {!!Form::select('sexo',$sexos, -1, ['class'=>'bootstrap-select bootstrap-select-arrow form-control','id'=>'sexo','placeholder'=>'Seleccionar'])!!}
                    </fieldset>
                  </div>
                </div>
                <div class="row">
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
        				{!!Form::text('telefono', null, ['class'=>'form-control', 'id'=>'telefono','placeholder'=>'Teléfono personal'])!!}
        						</fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                {!!Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'E-Mail', 'id'=>'email'])!!}
        						</fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                {!!Form::number('edad', null, ['class'=>'form-control', 'placeholder'=>'Edad', 'id'=>'edad'])!!}
        						</fieldset>
                  </div>
                  
                  

                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                      <label class="form-label">Contato de emergencia</label>
                    </fieldset>
                  </div>

                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                      <label class="form-label">Nombre</label>
                      {!!Form::text('nombreE',null,['class'=>'form-control', 'placeholder'=>'Nombre', 'id'=>'nombre'])!!}
        						</fieldset>
                  </div>

                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                      <label class="form-label">Teléfono</label>
                      {!!Form::text('telefonoE',null,['class'=>'form-control', 'placeholder'=>'Teléfono', 'id'=>'telefono'])!!}
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
                            {!!$extra!!}
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
                      {!!Form::text('boleta', null, ['class'=>'form-control', 'id'=>'boleta', 'placeholder'=> 'Boleta/Número de Trabajador'])!!}
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
                          {!!$extra!!}
                      </li>
                      <li>
                          {!!$taller!!}
                      </li>
                    </ul>
                </div>

                <h5 class="m-t-lg with-border">Coordinador</h5>
                <div class="row">
                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            <label class="form-label"></label>
                            <div class="form-group">
                              <label class="col-sm-12">¿El coordinador es externo a la institución?</label>
                              <div class="col-sm-12">
                                <div class="rdio rdio-primary">
                                  <input type="radio" name="plantell" value="no" id="splantel" onclick="mostrar2();">
                                  <label>No</label>
                                </div>
                                <div class="rdio rdio-primary">
                                  <input type="radio" name="plantell" value="si" id="nplantel" onclick="mostrar2();">
                                  <label>Sí</label>
                                </div>
                              </div>
                            </div>
                        </fieldset>
                    </div>

                    <div class="{{$classSizeForms}}">
                        <fieldset class="form-group">
                            <label class="form-label"></label>
                              <!--Bloque Oculto-->
                              <div id="lplantelF" style="display:none;">
                                <div>
                                  <h5 >Llenado de información Escolar</h5>
                                  <div class="row">
                                    <div >
                                      <fieldset class="form-group">
                                      <label class="form-label">Plantel</label>
                                        {!!Form::select('plantel',$inst, 0, ['class'=>'select2 form-control', 'placeholder'=>'Selecciona un Plantel','id'=>'plantel'])!!}
                                      </fieldset>
                                    </div>
                                    <div >
                                      <fieldset class="form-group">
                                      <label class="form-label">Carrera/Bachiller/Cargo</label>
                                        {!!Form::select('carrer',$carrera, 0, ['class'=>'select2 form-control', 'placeholder'=>'Selecciona una Carrera/Bachiller','id'=>'carrera'])!!}
                                      </fieldset>
                                    </div>
                                    <div >
                                      <fieldset class="form-group">
                                        <label class="form-label">Semestre</label>
                                          {!!Form::number('semestre',0, ['class'=>'form-control', 'placeholder'=>'Semestre actual', 'id'=>'semestre'])!!}
                                      </fieldset>
                                    </div>
                                    <div >
                                      <fieldset class="form-group">
                                        <label class="form-label">Grupo</label>
                                          {!!Form::text('grupo',' ', ['class'=>'form-control', 'placeholder'=>'Grupo actual', 'id'=>'grupo'])!!}
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
                              </div>
                            </div>
                              <!--Bloque Oculto-->
                              <!--Bloque Oculto-->
                              <div id="lplantelm" class="col-sm-12" style="display:none;">
                                <h5 class="m-t-lg with-border">Grado de estudios</h5>
                                  <div>
                                      <fieldset class="form-group">
                                      <label class="form-label">Carrera/Bachiller/Cargo</label>
                                        {!!Form::select('carre',$carrera, 0, ['class'=>'select2 form-control', 'placeholder'=>'Selecciona una Carrera/Bachiller','id'=>'carrera'])!!}
                                      </fieldset>
                                  </div>

                              </div>
                              <!--Bloque Oculto-->
                        </fieldset>
                    </div>
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

<div class="row details4 text-center" style="display:none">
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
                          {!!$extra!!}
                      </li>
                      <li>
                          {!!$taller!!}
                      </li>
                    </ul>
                </div>

                <h5 class="m-t-lg with-border">Llenado de información de localización</h5>
                <div class="row">
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                      <label class="form-label">Calle</label>
                        {!!Form::text('cal', null, ['class'=>'form-control', 'placeholder'=>'Ingresa la calle', 'id'=>'cal'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                      <label class="form-label">Colonia</label>
                        {!!Form::text('col', null, ['class'=>'form-control', 'placeholder'=>'Ingresa la colonia', 'id'=>'col'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                      <label class="form-label">Numeración</label>
                      <label class="form-label">Exterior</label>
                      {!!Form::text('numext', 0, ['class'=>'form-control', 'placeholder'=>'Ingresa el número exterior', 'id'=>'numext'])!!}
                      <label class="form-label">Interior</label>
                      {!!Form::text('numin', 0, ['class'=>'form-control', 'placeholder'=>'Ingresa el número interior', 'id'=>'numint'])!!}
                    </fieldset>
                  </div>
                  <div class="{{$classSizeForms}}">
                    <fieldset class="form-group">
                      <label class="form-label">Código Postal</label>
                        {!!Form::text('postal', null, ['class'=>'form-control', 'placeholder'=>'Ingresa Código Postal', 'id'=>'postal'])!!}
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

    <div class="row details5 text-center" style="display:none">
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
                            {!!$extra!!}
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
                            <label class="form-label"></label>
                            <div class="form-group">
                              <label class="col-sm-12">¿Se encuentra registrado el taller?</label>
                              <div class="col-sm-12">
                                <div class="rdio rdio-primary">
                                  <input type="radio" name="taller" value="si" id="tlist" onclick="mostrar();">
                                  <label>Sí</label>
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
                                <label>¿Cuál?</label>
                                <div>
                                      <fieldset class="form-group">
                                          <label class="form-label"></br></label>
                                           {!!Form::select('tlista',$tlista, 0, ['class'=>'select2 form-control', 'placeholder'=>'Selecciona un taller','id'=>'tlista'])!!}
                                      </fieldset>
                                </div>
                              </div>
                              <!--Bloque Oculto-->
                              <!--Bloque Oculto-->
                              <div id="tlistM" class="col-sm-12" style="display:none;">
                                <h5 class="m-t-lg with-border">Registro Taller</h5>
                                  <div>
                                      <fieldset class="form-group">
                                          <label class="form-label"></label>
                                            {!!Form::text('nombreTaller', null, ['class'=>'form-control', 'placeholder'=>'Nombre del taller', 'id'=>'nombreTaller'])!!}
                                      </fieldset>
                                  </div>

                                  <div>
                                    <fieldset class="form-group">
                                      <label class="form-label"></label>
                                        {!!Form::number('duracion', null, ['class'=>'form-control', 'placeholder'=>'Duración en horas (total)', 'id'=>'duracion'])!!}
                                    </fieldset>
                                </div>

                              <div>
                                  <fieldset class="form-group">
                                  <label class="form-label">Días de Impartición</label>
                                  {!!Form::select('dia[]',$dia,0, ['class'=>'select2 remove-example', 'multiple'])!!}
                                  </fieldset>
                              </div>
                              <div>
                                  <fieldset class="form-group">
                                      {!!Form::text('lugar', null, ['class'=>'form-control', 'placeholder'=>'Lugar', 'id'=>'lugar'])!!}
                                  </fieldset>
                              </div>
                              <div>
                                  <fieldset class="form-group">
                                      {!!Form::textArea('descri', null, ['class'=>'form-control','maxlength'=>'255','rows'=>'8','cols'=>31,'placeholder'=>'Descripción del taller', 'id'=>'descri'])!!}
                                  </fieldset>
                              </div>
                                <div>
                                    <fieldset class="form-group">
                                      <label class="form-label"></label>
                                           {!!Form::select('tilista',$tilista, 0, ['class'=>'select2 form-control', 'placeholder'=>'Selecciona un tipo','id'=>'tilista'])!!}
                                    </fieldset>
                                </div>

                                <div>
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

                                <div>
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

                                  <div>
                                    <fieldset class="form-group">
                                      <label class="form-label">Estatus</label>
                                      {!!Form::select('status',$status, -1, ['class'=>'bootstrap-select bootstrap-select-arrow form-control','id'=>'status','placeholder'=>'Seleccionar'])!!}
                                    </fieldset>
                                  </div>

                              </div>
                              <!--Bloque Oculto-->
                        </fieldset>
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

    <script>
    $(document).ready(function() {
        $('#telefono').mask('(000) 000-0000', {placeholder: "Teléfono personal"});
        //$('#boleta').mask('0000 00 0000', {placeholder: "Boleta/Numero de Trabajador"});
    });

    function mostrar2(){
      e = document.getElementById("lplantelF");
      c = document.getElementById("splantel");

      a = document.getElementById("lplantelm");
      l = document.getElementById("nplantel");

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
