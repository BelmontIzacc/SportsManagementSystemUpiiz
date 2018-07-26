@extends('barra.layout2')

@section('title')
<title>Login Servicio Becas</title>
@stop

@section('css')

@stop

@section('popUp')
<div class="page-center">
    <div class="page-center-in">
        <div class="container-fluid">
            {!!Form::open(array('url'=>'/login', 'class'=>'sign-box', 'method'=>'post'))!!}
                <div class="sign-avatar">
                    <img src="{{asset('Template/img/circular.svg')}}" alt="" style="height:100px;width:auto;">
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

                
                <header class="sign-title">Iniciar sesión</header>
                <div class="form-group">
                    {!!Form::text('boleta', null, ['class'=>'form-control', 'placeholder'=>'Identificación', 'id'=>'boleta'])!!}
                </div>
                <div class="form-group">
                    {!!Form::password('password', ['class'=>'form-control', 'placeholder'=>'Contraseña', 'id'=>'password'])!!}
                </div>
                
                <div class="form-group">
                    <div class="float-right reset">
                        <a href="{{asset('/password/email')}}">¡Olvide mi Contraseña!</a>
                    </div>
                </div>
                <button type="submit" class="btn btn-rounded">Entrar</button>
                
                <a href="{{asset('/')}}"><button type="button" class="close">
                    <span aria-hidden="true">&times;</span>
                </button></a>
            {!!Form::close()!!}
        </div>
    </div>
</div>
@stop

@section('scripts')

@stop