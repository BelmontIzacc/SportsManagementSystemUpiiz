@extends('Admin.layout3')
<?php
$index=4;
?>
@section('title')
<title>Agregar Taller</title>
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
                    {!!Form::open(array( 'class'=>'sign-box', 'method'=>'post'))!!}
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
                        <header class="sign-title">Funciones Especiales</header>
                        </br>
                            <section class="widget widget-simple-sm">
                                <div class="widget-simple-sm-statistic">
                                    <div class="row">
                                        <div class="col-lg-12 col-lg-offset-1 col-md-12 col-md-offset-1">
                                            <div class="checkbox-toggle">
                                                    <input type="checkbox" id="check-toggle-1" name="check-toggle-1" onclick="getValue();">
                                                    <label for="check-toggle-1">Borrar inscritos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-lg-offset-1 col-md-12 col-md-offset-1">
                                            <div class="checkbox-toggle">
                                                <input type="checkbox" id="check-toggle-2" name="check-toggle-2" onclick="getValue2();">
                                                <label for="check-toggle-2">Borrar estadisticas</label>
                                            </div>
                                        </div>                        
                                        <div class="col-lg-12 col-lg-offset-1 col-md-12 col-md-offset-1">
                                            <div class="checkbox-toggle">
                                                <input type="checkbox" id="check-toggle-3" name="check-toggle-3" onclick="getValue3();">
                                                <label for="check-toggle-3">Borrar asistencias </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                    
                            </section>
                        </br>
                        <input type="hidden" id="stats" name="stats"></input>
                        <input type="hidden" id="perm" name="perm"></input>
                        <input type="hidden" id="coord" name="coord"></input>
                        <button type="submit" class="btn btn-rounded">Aceptar</button>
                        <a href="{{asset('/admin/student/')}}/{{$variable}}/studio"><button type="button" class="close">
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
    <script type="text/javascript">
        function getValue() {
           var isChecked = document.getElementById('check-toggle-1').checked;
           var the_value = isChecked ? 1 : 0;
           //alert('status :'+the_value);
           document.getElementById('stats').value = the_value;
        }

        function getValue2() {
           var isChecked = document.getElementById('check-toggle-2').checked;
           var the_value = isChecked ? 1 : 0;
           //alert('permisos :'+the_value);
           document.getElementById('perm').value = the_value;
        }

        function getValue3() {
           var isChecked = document.getElementById('check-toggle-3').checked;
           var the_value = isChecked ? 1 : 0;
           //alert('permisos :'+the_value);
           document.getElementById('coord').value = the_value;
        }
    </script>
    <script src="{{asset('/Template/js/lib/bootstrap-sweetalert/sweetalert.min.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>
@stop