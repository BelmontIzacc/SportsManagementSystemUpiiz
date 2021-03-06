@extends('User.layout')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
  $classSize = "col-lg-4 col-md-4 col-sm-6";
  $classSizeModal = "col-lg-6 col-md-6";

  $sexos = array(
        'Seleccionar',
        'Masculino',
        'Femenino',
    );

?>

@section('title')
<title>Información del usuario</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>

@stop
@section('popUp')
<div class="container-fluid">
  <div class="row">
    <div class="{{$classSize}}">
      @include('alerts.formError')
    </div>
  </div>
@stop
@section('content')

<!-- start profile -->

<section class="widget widget-user">
    <div class="widget-user-bg" style="background-image: url('{{asset('/Template/img/backgroundUser.svg')}}')"></div>
    <div class="widget-user-photo">
        <img src="{{asset('/Template/img/Stickmen/LogoSRDpng2.png')}}" alt="" style="height:130px;width:auto;">
    </div>
    <div class="widget-user-name">
        {{$info->usuario}}
        <i class="font-icon font-icon-award"></i>
    </div>
    @unless($info->carrera->nombre == null)
    <div>{{$info->carrera->nombre}}</div>
    @endunless

    <div class="widget-user-stat hidden-md-down">
    	@unless($info->institucion->nombre == null)
        <div class="item">
            <div class="number">{{$info->institucion->nombre}}</div>
            <div class="caption">Plantel</div>
        </div>
        @endunless
        @unless($user->email == null)
        <div class="item">
            <div class="number">{{$user->email}}</div>
            <div class="caption">Correo</div>
        </div>
         @endunless
        <div class="item">
            <div class="number">{{$user->boleta}}</div>
            <div class="caption">Boleta</div>
        </div>

    </div>
</section>
{!!Form::open(array('url'=>'/user/EditInfo', 'class'=>'patata', 'method'=>'post'))!!}
<div class="box-typical box-typical-padding">

    <h5 class="m-t-lg with-border">Datos personales</h5>
    <form class="patata">
    <div class="row">
        <div class="{{$classSize}}">
            <fieldset class="form-group">
              <label class="form-label">Nombre</label>
              <?php $n = $user->nombre; ?>
              {!!Form::text('nombre', $user->nombre, ['class'=>'form-control', 'id'=>'nombre','placeholder'=>''.$n])!!}
            </fieldset>
        </div>
        <div class="{{$classSize}}">
            <fieldset class="form-group">
              <label class="form-label">Apelldo paterno</label>
              <?php $ap = $user->apellidoPaterno; ?>
              {!!Form::text('apellidoP', $user->apellidoPaterno, ['class'=>'form-control', 'id'=>'nombre','placeholder'=>''.$ap])!!}
            </fieldset>
        </div>
        <div class="{{$classSize}}">
            <fieldset class="form-group">
              <label class="form-label">Apellido materno</label>
              <?php $am = $user->apellidoMaterno; ?>
              {!!Form::text('apellidoM', $user->apellidoMaterno, ['class'=>'form-control', 'id'=>'nombre','placeholder'=>''.$am])!!}
            </fieldset>
        </div>
        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
              <label class="form-label">Sexo</label>
              {!!Form::select('sexo',$sexos, $info->sexo +1, ['class'=>'bootstrap-select bootstrap-select-arrow form-control','id'=>'sexo'])!!}
            </fieldset>
        </div>
        @endunless
        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Teléfono</label>
                {!!Form::text('telefono', $info->telefono, ['class'=>'form-control', 'id'=>'telefono'])!!}
            </fieldset>
        </div>
         @endunless

        @unless($info->usuario_id == null)
         <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label">Fecha de nacimieto</label>
                <div class="input-group date">
                    {!!Form::text('edad', $info->edad, ['class'=>'form-control', 'id'=>'date_box','placeholder'=>'00/00/0000'])!!}
                    <span class="input-group-addon">
                        <i class="font-incon font-icon-calend"></i>
                    </span>
                </div>
            </fieldset>
        </div>
        @endunless
    </div>

    <div class="row">
    	<div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Correo</label>
                {!!Form::email('email', $user->email, ['class'=>'form-control', 'id'=>'email','placeholder'=>''.$user->email])!!}
            </fieldset>
        </div>
    </div>

    @unless($info->institucion_id == 3)
    <h5 class="m-t-lg with-border">Datos de escolares</h5>

    <div class="row">
    	<div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Boleta</label>
                 {!!Form::text('boleta', $user->boleta, ['class'=>'form-control', 'id'=>'bo','placeholder'=>''.$user->boleta])!!}
            </fieldset>
        </div>
        @unless($info->institucion->nombre == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Platel</label>
                <div class="rdio rdio-primary">
                    <?php $inst = $info->institucion_id ?>
                    <input type="radio" name="insti" value="UPIIZ" id="tlist" onclick="mostrar();"
                        @if($inst == 1)
                            checked=""
                        @else

                        @endif
                    > UPIIZ
                </div>
                <div class="rdio rdio-primary">
                      <input type="radio" name="insti" value="CECyT" id="tlistt" onclick="mostrar();"
                        @if($inst == 2)
                            checked=""
                        @else

                        @endif
                      > CECyT
                </div>
                <div class="rdio rdio-primary">
                      <input type="radio" name="insti" value="otro" id="tlisttt" onclick="mostrar();"
                        @if($inst == 2)
                            checked=""
                        @else

                        @endif
                      > Otro
                </div>
            </fieldset>
        </div>
        @endunless
        @unless($info->carrera->nombre == null)

         <!--Bloque Oculto-->
        <?php $ins = $info->carrera_id ?>
        <div id="tlistF" class="{{$classSize}}" style="display:none;">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Carrera</label>
                {!!Form::select('Carrera',$tlista, $ins, ['class'=>'bootstrap-select bootstrap-select-arrow form-control', 'placeholder'=>'Seleccionar carrera','id'=>'tlista'])!!}
            </fieldset>
        </div>
                              <!--Bloque Oculto-->
        <div id="tlistM" class="{{$classSize}}" style="display:none;">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Carrera</label>
                {!!Form::select('Bachiller',$tlistac, $ins, ['class'=>'bootstrap-select bootstrap-select-arrow form-control', 'placeholder'=>'Seleccionar carrera','id'=>'tlistac'])!!}
            </fieldset>
        </div>
                              <!--Bloque Oculto-->

        @endunless
    </div>
    <div class="row">
        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Semestre</label>
                <?php $sem = $info->semestre ?>
                {!!Form::number('semestre', $sem, ['class'=>'form-control', 'placeholder'=>$info->semestre, 'id'=>'semestre'])!!}
            </fieldset>
        </div>
        @endunless
        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Grupo</label>
                <?php $g = $info->grupo ?>
                {!!Form::text('grupo', $g, ['class'=>'form-control', 'placeholder'=>$info->grupo, 'id'=>'grupo'])!!}
            </fieldset>
        </div>
        @endunless
    </div>
    @endunless

    <h5 class="m-t-lg with-border">Datos de geográficos</h5>

    <div class="row">
    	@unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Calle</label>
                {!!Form::text('calle', $info->calle, ['class'=>'form-control', 'id'=>'calle','placeholder'=>''.$user->informacion->calle])!!}
            </fieldset>
        </div>
        @endunless
        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Número exterior</label>
                {!!Form::text('ext', $info->numExterior, ['class'=>'form-control', 'id'=>'exterior','placeholder'=>''.$user->informacion->numExterior])!!}
            </fieldset>
        </div>
        @endunless
        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Número interior</label>
                @if($info->numInterior == null)
                    {!!Form::text('inter',null, ['class'=>'form-control', 'placeholder'=>'-', 'id'=>'interior'])!!}
                @else
                    {!!Form::text('inter', $info->numInterior, ['class'=>'form-control', 'id'=>'interior','placeholder'=>''.$user->informacion->numInterior])!!}
                @endif
            </fieldset>
        </div>
        @endunless

        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Colonia</label>
                 {!!Form::text('colonia', $info->colonia, ['class'=>'form-control','id'=>'colonia','placeholder'=>''.$user->informacion->colonia])!!}
            </fieldset>
        </div>
        @endunless
        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Código postal</label>
                 {!!Form::text('cp', $info->codigoPostal, ['class'=>'form-control', 'id'=>'cp','placeholder'=>''.$user->informacion->codigoPostal])!!}
            </fieldset>
        </div>
        @endunless
    </div>

    <h5 class="m-t-lg with-border">Datos de salud</h5>

    <div class="row">
        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Alergias</label>
                {!!Form::text('alergias',$info->alergias,['class'=>'form-control', 'placeholder'=>'Alergias', 'id'=>'alergias'])!!}
            </fieldset>
        </div>
        @endunless

        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form->group">
                <label class="fomr-label" for="exampleInputDisabled2">Estatura</label>
                {!!Form::text('estatura',$info->estatura,['class'=>'form-control', 'id'=>'Estatura','placeholder'=>''.$user->informacion->estatura])!!}
            </fieldset>
        </div>
        @endunless

        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Peso</label>
                {!!Form::text('peso',$info->peso,['class'=>'form-control', 'id'=>'peso','placeholder'=>''.$user->informacion->peso])!!}
            </fieldset>
        </div>
        @endunless

        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Tipo de Sangre</label>
                {!!Form::text('sangre',$info->sangre,['class'=>'form-control', 'id'=>'sangre','placeholder'=>''.$user->informacion->sangre])!!}
            </fieldset>
        </div>
        @endunless

        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">¿Cuentas con seguro médico?</label>
                <div class="rdio rdio-primary">
                    <?php $segMed = $info->segMed ?>
                    <input type="radio" name="segMed" value="1" id="segMedSi"
                        @if($segMed == 1)
                            checked=""
                        @else

                        @endif
                    > Sí
                </div>
                <div class="rdio rdio-primary">
                      <input type="radio" name="segMed" value="0" id="segMedNo"
                        @if($segMed == 0)
                            checked=""
                        @else

                        @endif
                      > No
                </div>
            </fieldset>
        </div>
        @endunless

        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <?php $segIns = $info->segIns; ?>
                <label class="form-label" for="exampleInputDisabled2">¿Cuentas con seguro de vida institucioal?</label>
                <div class="rdio rdio-primary">
                    <input type="radio" name="segIns" value="1" id="segInsSi"
                    @if($segIns == 1)
                        checked=""
                    @else
                    @endif
                    > Sí
                </div>
                <div class="rdio rdio-primary">
                    <input type="radio" name="segIns" value="0" id="segInsNo"
                    @if($segIns == 0)
                        checked=""
                    @else
                    @endif
                    > No
                </div>
            </fieldset>
        </div>
        @endunless
    </div>

</div> <!--End box typical-->
</div>

<!-- end profile -->

<div class="box-typical box-typical-padding">

    <div class="row text-center">
        <div class="col-lg-12 col-md-12">
            <button type="submit" class="btn btn-rounded btn-correct sign-up">Confirmar</button>
        </div>
    </div>
</div>

{!!Form::close()!!}
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
        $('#telefono').mask('0000000000', {placeholder: "Telefono"});

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
</script>

<script>
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
