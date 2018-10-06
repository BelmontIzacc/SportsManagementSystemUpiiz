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
                        <header class="sign-title">Añadir Taller a {{$user->usuario->nombre}}</header>
                        </br>
                        <div class="form-group">
                            {!!Form::select('taller',$taller, -1, ['class'=>'select2 form-control', 'placeholder'=>'Selecciona un Taller'])!!}
                        </div>
                        </br>
                        <button type="submit" class="btn btn-rounded">Agregar</button>
                        
                        <a href="{{asset('/admin/lists/')}}/{{$id}}"><button type="button" class="close">
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
    <script src="{{asset('/Template/js/lib/bootstrap-sweetalert/sweetalert.min.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>
@stop