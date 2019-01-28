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
                    {!!Form::open(array( 'class'=>'sign-box', 'id'=>'Form','method'=>'post'))!!}
                    {!! csrf_field() !!}
                        <div class="sign-avatar">
                            <img src="{{asset('Template/img/upiiz4.svg')}}" alt="" style="height:100px;width:auto;">
                        </div>
                        @if(count($errors) > 0)
                         <div class="alert alert-danger alert-fill alert-close alert-dismissible fade in" role="alert">
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
                        <div class="alert alert-info alert-icon alert-close alert-dismissible fade in" role="alert">
                            <i class="font-icon font-icon-warning"></i>
                            Nota: Sera borrada toda la información relacionada con los usuarios 
                            ( asistencias, inscripciones, información, etc... ).
                        </div>
                            <section class="widget widget-simple-sm">
                                <div class="widget-simple-sm-statistic">
                                    <div class="row">
                                        <div class="col-lg-12 col-lg-offset-1 col-md-12 col-md-offset-1 center-block">
                                            <div class="checkbox-toggle">
                                                    <input type="checkbox" id="check-toggle-1" name="check-toggle-1" onclick="getValue();">
                                                    <label for="check-toggle-1">Borrar solo Usuarios&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-lg-offset-1 col-md-12 col-md-offset-1 center-block">
                                            <div class="checkbox-toggle">
                                                <input type="checkbox" id="check-toggle-2" name="check-toggle-2" onclick="getValue2();">
                                                <label for="check-toggle-2">Borrar solo Coordinadores&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            </div>
                                        </div>                        
                                        <div class="col-lg-12 col-lg-offset-1 col-md-12 col-md-offset-1 center-block">
                                            <div class="checkbox-toggle">
                                                <input type="checkbox" id="check-toggle-3" name="check-toggle-3" onclick="getValue3();">
                                                <label for="check-toggle-3">Borrar Usuarios con permisos</label>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-lg-offset-1 col-md-12 col-md-offset-1 center-block">
                                            <div class="checkbox-toggle">
                                                <input type="checkbox" id="check-toggle-4" name="check-toggle-4" onclick="getValue4();">
                                                <label for="check-toggle-4">Borrar Todo lo anterior&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>                                    
                            </section>
                        <input type="hidden" id="usuarios" name="usuarios"></input>
                        <input type="hidden" id="coordinador" name="coordinador"></input>
                        <input type="hidden" id="usuariosP" name="usuariosP"></input>
                        <input type="hidden" id="todo" name="todo"></input>
                        <button type="submit" class="btn btn-rounded swal-btn-cancel" id="formButton" name="formButton">Aceptar</button>
                        <a href="{{asset('/admin/controlPanel')}}"><button type="button" class="close">
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
           document.getElementById('usuarios').value = the_value;
        }

        function getValue2() {
           var isChecked = document.getElementById('check-toggle-2').checked;
           var the_value = isChecked ? 1 : 0;
           //alert('permisos :'+the_value);
           document.getElementById('coordinador').value = the_value;
        }

        function getValue3() {
           var isChecked = document.getElementById('check-toggle-3').checked;
           var the_value = isChecked ? 1 : 0;
           //alert('permisos :'+the_value);
           document.getElementById('usuariosP').value = the_value;
        }

        function getValue4() {
           var isChecked = document.getElementById('check-toggle-4').checked;
           var the_value = isChecked ? 1 : 0;
           //alert('permisos :'+the_value);
           document.getElementById('todo').value = the_value;
        }
    </script>
    <script src="{{asset('/Template/js/lib/bootstrap-sweetalert/sweetalert.min.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>
    <script type="text/javascript">

        $('.swal-btn-cancel').click(function(e){
                e.preventDefault();
                swal({
                            title: "Estas seguro?",
                            text: "No podras recobrar la informacion despues de esto!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonClass: "btn-danger",
                            confirmButtonText: "Si, Eliminar!",
                            cancelButtonText: "No, cancelar!",
                            closeOnConfirm: false,
                            closeOnCancel: false
                        },
                        function(isConfirm) {
                            if (isConfirm) {
                                swal({
                                    title: "Eliminando!",
                                    text: "Tu informacion va a ser eliminada.",
                                    type: "success",
                                    confirmButtonClass: "btn-success"
                                },function() {
                                    $('#Form').submit();
                                });
                            } else {
                                swal({
                                    title: "Cancelado",
                                    text: "Tu informacion esta segura :)",
                                    type: "error",
                                    confirmButtonClass: "btn-danger"
                                });
                            }
                        });
            });
    </script>
@stop