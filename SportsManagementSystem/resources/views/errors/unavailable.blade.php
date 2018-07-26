@extends('Admin.layout2')
@section('title')
<title>No disponible temporalmente</title>
@stop

@section('css')
@stop

@section('popUp')
<div class="page-center">
    <div class="page-center-in">
        <div class="container-fluid">
            <div class="page-error-box">
                <div class="error-code">;)</div>
                <div class="error-title">No disponible temporalmente</div>
                <a href="{{asset('/')}}" class="btn btn-rounded">Regresar</a>
            </div>
        </div>
    </div>
</div><!--.page-center-->
@stop

@section('subHead')
No disponible temporalmente
@stop

@section('content')
@stop

@section('scripts')
@stop
