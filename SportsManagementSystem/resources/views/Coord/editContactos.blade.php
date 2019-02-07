@extends('Coord.layout')
<?php
    $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
    $classSize = "col-lg-4 col-md-4 col-sm-6";
    $classSizeModal = "col-lg-6 col-md-6";
?>
@section('title')
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>
@stop

@section('popUp')
@stop

@section('content')
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

    @foreach($contactos as $c)
    {!!Form::open(array('url'=>'/coord/user/editContactos', 'class'=>'form-control', 'method'=>'post'))!!}
    <div class="box-typical box-typical-padding">
        {!!Form::hidden('contacto_id',$c->id,['class'=>'form-control', 'id'=>'contacto_id'])!!}
        <div class="row text-center">
            <div class="{{$classSize}}">
                <fieldset class="form-group">
                    <label class="form-label">Nombre</label>
                    {!!Form::text('nombre', $c->nombre, ['class'=>'form-control', 'id'=>'nombre'])!!}
                </fieldset>
            </div>
        </div>
        <div class="row text-center">
            <div class="{{$classSize}}">
                <fieldset class="form-group">
                    <label class="form-label">Teléfono</label>
                    {!!Form::text('telefono',$c->telefono,['class'=>'form-control', 'id'=>'telefono'])!!}
                </fieldset>
            </div>
        </div>

    <div class="row">
        <div class="row text-center col-lg-3 col-md-3">
            <div class="{{$classSize}}">
                <fieldset class="form-group">
                    <button type="submit" class="btn btn-rounded btn-warning">Actualizar</button>
                </fieldset>
            </div>
        </div>

        <div class="row text-center col-lg-3 col-md-3">
            <div class="{{$classSize}}">
                <fieldset class="form-group">
                    <a class="btn btn-rounded btn-delete" href="{{asset('/coord/user/elmContacto/'.$c->id)}}">Borrar</a>
                </fieldset>
            </div>
        </div>
    </div>
    </div>
    {!!Form::close()!!}
    @endforeach

    {!!Form::open(array('url'=>'/coord/user/crearContato', 'class'=>'form-control', 'method'=>'post'))!!}
    <div class="box-typical box-typical-padding">
        <div class="row text-center">
            <div class="{{$classSize}}">
                    <fieldset class="form-group">
                        <label class="form-label">Nombre</label>
                        {!!Form::text('nombre',null,['class'=>'form-control', 'placeholder'=>'Nombre', 'id'=>'nombre'])!!}
                    </fieldset>
            </div>
        </div>

        <div class="row text-center">
            <div class="{{$classSize}}">
                <fieldset class="form-group">
                    <label class="form-label">Teléfono</label>
                    {!!Form::text('telefono',null,['class'=>'form-control', 'placeholder'=>'Teléfono', 'id'=>'telefono'])!!}
                </fieldset>
            </div>
        </div>

        <div class="row text-center">
            <div class="{{$classSize}}">
                <fieldset class="form-group">
                    <button type="submit" class="btn btn-rounded btn-submit">Crear contacto</button>
                </fieldset>
            </div>
        </div>

    </div>
    {!!Form::close()!!}
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
