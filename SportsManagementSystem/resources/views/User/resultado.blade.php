@extends('User.layout')

@section('title')
<title>inicio usuario</title>
@stop

@section('popUp')
@stop

@section('content')
{{$mensaje}}
<div >
    <a href="{{asset('/user')}}" class="btn btn-rounded">Regresar al inicio</a>
</div>
@stop

@section('scripts')
@stop
