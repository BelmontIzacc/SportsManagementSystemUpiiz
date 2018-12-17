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
<title>Informacion del usuario</title>
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
        @unless($info->sexo == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
              <label class="form-label">Sexo</label>
              {!!Form::select('sexo',$sexos, 0, ['class'=>'bootstrap-select bootstrap-select-arrow form-control','id'=>'sexo'])!!}   
            </fieldset>
        </div>
        @endunless
        @unless($info->telefono == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Teléfono</label>
                {!!Form::text('telefono', null, ['class'=>'form-control','placeholder'=>$info->telefono, 'id'=>'telefono'])!!}
            </fieldset>
        </div>
         @endunless
        
        @unless($info->edad == null)
        <div class="{{$classSize}}">
           <fieldset class="form-group">
                <label class="form-label">Edad</label>
				{!!Form::number('edad', null, ['class'=>'form-control','placeholder'=>$info->edad, 'id'=>'edad'])!!}
            </fieldset>
        </div>
        @endunless
        </div>
    <div class="row">
    @unless($user->email == null)
    	<div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Correo</label>
                {!!Form::email('email', null, ['class'=>'form-control', 'placeholder'=>$user->email, 'id'=>'email'])!!}	
            </fieldset>
        </div>
        @endunless
    </div>

    <h5 class="m-t-lg with-border">Datos de escolares</h5>

    <div class="row">
    	<div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Boleta</label>
                 {!!Form::text('boleta', null, ['class'=>'form-control', 'placeholder'=>$user->boleta, 'id'=>'bo'])!!}
            </fieldset>
        </div>
        @unless($info->institucion->nombre == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Platel</label>
                <div class="rdio rdio-primary">
                                  <input type="radio" name="insti" value="UPIIZ" id="tlist" onclick="mostrar();"> UPIIZ
                                </div>
                                <div class="rdio rdio-primary">
                                  <input type="radio" name="insti" value="Cecyt" id="tlistt" onclick="mostrar();"> CECyT
                                </div>
            </fieldset>
        </div>
        @endunless
        @unless($info->carrera->nombre == null)
        
         <!--Bloque Oculto-->
                            
        <div id="tlistF" class="{{$classSize}}" style="display:none;">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Carrera</label>
                {!!Form::select('tlista',$tlista, 0, ['class'=>'bootstrap-select bootstrap-select-arrow form-control', 'placeholder'=>'Seleccionar carrera','id'=>'tlista'])!!}
            </fieldset>
        </div>    
                              <!--Bloque Oculto-->
        <div id="tlistM" class="{{$classSize}}" style="display:none;">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Carrera</label>
                {!!Form::select('tlistac',$tlistac, 0, ['class'=>'bootstrap-select bootstrap-select-arrow form-control', 'placeholder'=>'Seleccionar carrera','id'=>'tlistac'])!!}
            </fieldset>
        </div>
                              <!--Bloque Oculto-->
        
        @endunless
    </div>
    <div class="row">
        @unless($info->semestre == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Semestre</label>
                {!!Form::number('semestre', null, ['class'=>'form-control','placeholder'=>$info->semestre,'id'=>'semestre'])!!}
            </fieldset>
        </div>
        @endunless
        @unless($info->grupo == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Grupo</label>
                {!!Form::text('grupo', null, ['class'=>'form-control','placeholder'=>$info->grupo,'id'=>'grupo'])!!}
            </fieldset>
        </div>
        @endunless
    </div>

    <h5 class="m-t-lg with-border">Datos de geográficos</h5>

    <div class="row">
    	@unless($info->calle == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Calle</label>
                {!!Form::text('calle', null, ['class'=>'form-control','placeholder'=>$info->calle, 'id'=>'calle'])!!}
            </fieldset>
        </div>
        @endunless
        @unless($info->numExterior == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Número exterior</label>
                {!!Form::number('ext', null, ['class'=>'form-control', 'placeholder'=>$info->numExterior, 'id'=>'exterior'])!!}
            </fieldset>
        </div>
        @endunless
        @unless($info->numInterior == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Número interior</label>
                {!!Form::number('inter', null, ['class'=>'form-control', 'placeholder'=>$info->numInterior, 'id'=>'interior'])!!}
            </fieldset>
        </div>
        @endunless
        @unless($info->colonia == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Colonia</label>
                 {!!Form::text('colonia', null, ['class'=>'form-control','placeholder'=>$info->colonia,'id'=>'colonia'])!!}
            </fieldset>
        </div>
        @endunless
        @unless($info->codigoPostal == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Código postal</label>
                 {!!Form::text('cp', null, ['class'=>'form-control','placeholder'=>$info->codigoPostal, 'id'=>'cp'])!!}
            </fieldset>
        </div>
        @endunless
    </div>
    
    <div class="col-lg-3 col-md-3">
        <button type="submit" class="btn btn-rounded btn-correct sign-up">Enviar</button>
    </div>
        
    </form>
</div> <!--End box typical-->
</div>

<!-- end profile -->


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