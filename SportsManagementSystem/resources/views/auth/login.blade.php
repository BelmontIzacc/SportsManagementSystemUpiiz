@extends('barra.layout2')

@section('title')
<title>Login</title>
@stop

@section('css')

@stop

@section('popUp')
<div class="page-center">
    <div class="page-center-in">
        <div class="container-fluid">
            {!!Form::open(array('url'=>'/login', 'class'=>'sign-box', 'method'=>'post'))!!}
                <div class="sign-avatar">
                    <img src="{{asset('Template/img/Stickmen/LogoSRDpng2.png')}}" alt="" style="height:125px;width:auto;">
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

                <p class="sign-note">¿Nuevo en el sitio? <a
                    @if($valor == 2)
                        disabled=""
                    @elseif($valor == 1)
                        href="/registro/RegistroUsuario"
                    @endif
                >Registrarme</a></p>
                @if($valor == 2)
                    <div class="alert alert-danger alert-icon alert-close alert-dismissible fade in" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <i class="font-icon font-icon-warning"></i>
                            Se a pasado el tiempo de registro al sistema, para mas informacion ir con el encargado del area de deportes.
                    </div>
                @elseif($valor == 1)

                @endif
            {!!Form::close()!!}
        </div>
    </div>
</div>
@stop

@section('scripts')

@stop
