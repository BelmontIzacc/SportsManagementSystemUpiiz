@extends('Coord.layout')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
  $classSize = "col-lg-4 col-md-4 col-sm-6";
  $classSizeModal = "col-lg-6 col-md-6";

?>

@section('title')
<title>Información del usuario</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>
@stop
@section('popUp')
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

<div class="box-typical box-typical-padding">

    <h5 class="m-t-lg with-border">Datos personales</h5>

    <div class="row">
        @unless($info->sexo == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Sexo</label>
                    @if($info->sexo == 0)
                    	 <input type="text" readonly class="form-control" value="Masculino">
                   	@else
                   		 <input type="text" readonly class="form-control" value="Femenino">
                    @endif
            </fieldset>
        </div>
        @endunless
        @unless($info->telefono == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Teléfono</label>
                <input type="text" readonly class="form-control" value="{{$info->telefono}}">
            </fieldset>
        </div>
         @endunless

        @unless($info->edad == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Edad</label>
                <input type="text" readonly class="form-control" value="{{$info->edad}}">
            </fieldset>
        </div>
        @endunless
        @unless($user->email == null)
    	<div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Correo</label>
                <input type="text" readonly class="form-control" value="{{$user->email}}">
            </fieldset>
        </div>
        @endunless
    </div>

    <h5 class="m-t-lg with-border">Datos de escolares</h5>

    <div class="row">
    	<div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Boleta</label>
                <input type="text" readonly class="form-control" value="{{$user->boleta}}">
            </fieldset>
        </div>
        @unless($info->institucion->nombre == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Platel</label>
                <input type="text" readonly class="form-control" value="{{$info->institucion->nombre}}">
            </fieldset>
        </div>
        @endunless
        @unless($info->carrera->nombre == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Carrera</label>
                <input type="text" readonly class="form-control" value="{{$info->carrera->nombre}}">
            </fieldset>
        </div>
        @endunless
        @unless($info->semestre == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Semestre</label>
                <input type="text" readonly class="form-control" value="{{$info->semestre}}">
            </fieldset>
        </div>
        @endunless
        @unless($info->grupo == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Grupo</label>
                <input type="text" readonly class="form-control" value="{{$info->grupo}}">
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
                <input type="text" readonly class="form-control" value="{{$info->calle}}">
            </fieldset>
        </div>
        @endunless
        @unless($info->numExterior == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Número exterior</label>
                <input type="text" readonly class="form-control" value="{{$info->numExterior}}">
            </fieldset>
        </div>
        @endunless
        @unless($info->numInterior == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Número interior</label>
                <input type="text" readonly class="form-control" value="{{$info->numInterior}}">
            </fieldset>
        </div>
        @endunless
        @unless($info->colonia == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Colonia</label>
                <input type="text" readonly class="form-control" value="{{$info->colonia}}">
            </fieldset>
        </div>
        @endunless
        @unless($info->codigoPostal == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Código postal</label>
                <input type="text" readonly class="form-control" value="{{$info->codigoPostal}}">
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
                @if($info->alergias == null)
                    <input type="text" readonly class="form-control" value="Ninguna">
                @else
                    <input type="text" readonly class="form-control" value="{{$info->alergias}}">
                @endif
            </fieldset>
        </div>
        @endunless

        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form->group">
                <label class="fomr-label" for="exampleInputDisabled2">Estatura</label>
                <input type="text" readonly class="form-control" value="{{$info->estatura}}m">
            </fieldset>
        </div>
        @endunless

        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Peso</label>
                <input type="text" readonly class="form-control" value="{{$info->peso}}kg">
            </fieldset>
        </div>
        @endunless

        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Tipo de Sangre</label>
                <input type="text" readonly class="form-control" value="{{$info->sangre}}">
            </fieldset>
        </div>
        @endunless

        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">¿Cuentas con seguro médico?</label>
                @if($info->segMed == 1)
                    <input type="text" readonly class="form-control" value="Sí">
                @else
                    <input type="text" readonly class="form-control" value="No">
                @endif
            </fieldset>
        </div>
        @endunless

        @unless($info->usuario_id == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">¿Cuentas con seguro de vida institucioal?</label>
                @if($info->segIns == 1)
                    <input type="text" readonly class="form-control" value="Sí">
                @else
                    <input type="text" readonly class="form-control" value="No">
                @endif
            </fieldset>
        </div>
        @endunless
    </div>

    <h5 class="m-t-lg with-border">Contactos de emergencia</h5>

    <div class="row">
        @foreach($cont as $c)
            @unless($c->usuario_id == null)
                <div class="{{$classSize}}">
                    <fieldset class="form-group">
                        <label class="form-label" for="exampleInputDisabled2">{{$c->nombre}}</label>
                        <input type="text" readonly class="form-control" value="{{$c->telefono}}">
                    </fieldset>
                </div>
                @endunless
        @endforeach
    </div>
</div> <!--End box typical-->

<!-- end profile -->

<div class="box-typical box-typical-padding">

    <br/>

    <div class="row text-center">
        <div class="col-lg-12 col-md-12">
            <a href="{{asset('/coord/user/EditInfo')}}" class="btn btn-rounded btn-inline btn-warning">Editar info</a>
        </div>
    </div>
</div>
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

@stop
