@extends('Admin.layout')

@section('title')
<title>Perfil servicio Deportes</title>
<meta name="csrf-token" content="{{ csrf_token() }}" /> <!--cabecera para que se puedan enviar peticiones POST desde javascript-->
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link  href="{{asset('/Template/css/lib/cropper/cropper.css')}}" rel="stylesheet">
<style>
  img {
    max-width: 120%;
  }
</style>
<style type="text/css">
    .padre {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
}
</style>
@stop

@section('popUp')

@unless(isset($edit))
<div class="modal fade bd-example-modal-sm"
      tabindex="-1"
      role="dialog"
      aria-labelledby="mySmallModalLabel"
      aria-hidden="true">
  <div class="modal-dialog modal-sm">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                  <i class="font-icon-close-2"></i>
              </button>
              <h4 class="modal-title" id="myModalLabel">¿Desea editar el perfil de administrador?</h4>
          </div>
          {!!Form::open(array('method'=>'post'))!!}
          <div class="modal-body">
              <div class="form-group">
                  <label class="form-label" for="hide-show-password">Contraseña</label>
                  <input id="hide-show-password" type="password" class="form-control" value="" name="clave">
              </div>
          </div>
          <div class="modal-footer">
              <div class="text-center">
                  <button type="submit" class="btn btn-rounded btn-primary btn-danger">Editar datos</button>
              </div>
          </div>
          {!!Form::close()!!}
      </div>
  </div>
</div><!--.modal-->
@else
@endunless

 <div class="page-center">
  <div class="page-center-in">
      <div class="container-fluid">
          @if(isset($edit))
          {!!Form::model($user, array('method'=>'patch', 'class'=>'sign-box'))!!}
              <div class="sign-avatar">
                  <a data-toggle="modal" data-target="#photoModal"><img src="{{asset('/Template/img/Stickmen/LogoSRDpng2.png')}}" alt="" ></a>
              </div>
              <small class="text-muted">Actualiza tu información</small>
              <br/>

              @include('alerts.formError')

              <div class="form-group">
                  <label class="form-label" for="exampleInputDisabled2">Nombre(s)</label>
                  {!!Form::text('nombre', null, ['class'=>'form-control', 'placeholder'=>'Ej: Nombre1  Nombre2'])!!}
              </div>
              <div class="form-group">
                  <label class="form-label" for="exampleInputDisabled2">Apellido paterno</label>
                  {!!Form::text('apellidoPaterno', null, ['class'=>'form-control', 'placeholder'=>'Ej: Apellido'])!!}
              </div>
              <div class="form-group">
                  <label class="form-label" for="exampleInputDisabled2">Apellido materno</label>
                  {!!Form::text('apellidoMaterno', null, ['class'=>'form-control', 'placeholder'=>'Ej: Apellido'])!!}
              </div>
              <div class="form-group">
                  <label class="form-label" for="exampleInputDisabled2">Correo</label>
                  {!!Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Ej: Email'])!!}
              </div>
              <div class="form-group">
                  <label class="form-label" for="exampleInputDisabled2">Identificación</label>
                  {!!Form::text('boleta', null, ['class'=>'form-control', 'placeholder'=>'Ej: xxxxxxxx'])!!}
              </div>

              <div class="form-group text-center">
                  <fieldset class="form-group">
                      <label class="form-label"></label>
                      <div class="form-group">
                        <label class="col-sm-12">¿Cambiar Contraseña?</label>
                        <div class="col-sm-12">
                          <div class="rdio rdio-primary">
                            </br>
                            <input type="radio" name="pass" value="1" id="tlist" onclick="mostrar();">
                            <label>Si</label>
                          </div>
                          <div class="rdio rdio-primary">
                            <input type="radio" checked="" name="pass" value="0" id="tlistt" onclick="mostrar();">
                            <label>No</label>
                          </div>
                        </div>
                      </div>
                  </fieldset>
              </div>

                <div class="form-group">
                  <fieldset class="form-group">
                      <label class="form-label"></label>
                        <!--Bloque Oculto-->
                        <div id="tlistF" style="display:none;">
                          <label>Escriba la nueva contraseña:</label> </br>
                          <div>
                                <fieldset class="form-group">
                  <label class="form-label" for="exampleInputDisabled2">Contraseña</label>
                  {!!Form::text('clave', null, ['class'=>'form-control', 'placeholder'=>'Ej: xxxxx'])!!}
                                </fieldset>

                                <fieldset class="form-group">
                  <label class="form-label" for="exampleInputDisabled2">Repetir Constraseña</label>
                  {!!Form::text('clave2', null, ['class'=>'form-control', 'placeholder'=>'Ej: xxxxx'])!!}
                                </fieldset>
                          </div>
                      </div>
                        <!--Bloque Oculto-->
                  </fieldset>
              </div>

              <button type="submit" class="btn btn-rounded btn-danger" data-toggle="modal" data-target=".bd-example-modal-sm">Actualizar perfil</button>

              <a href="{{asset('/admin/profile')}}"><button type="button" class="close">
                  <span aria-hidden="true">&times;</span>
              </button></a>
          {!!Form::close()!!}
          @else
            <div class="padre">
              <form class="sign-box">
                <div class="sign-avatar">
                    <img src="{{asset('/Template/img/Stickmen/LogoSRDpng2.png')}}" alt="" style="height:120px;width:auto;">
                </div>
                </br>
                <header class="sign-title">{{$user}}</header>

                @include('alerts.formError')
                @include('alerts.sessionAlert')

                <div class="form-group">
                    <label class="form-label" for="exampleInputDisabled2">Tipo de usuario</label>
                    <input type="text" class="form-control" readonly placeholder="" value="Administrador"/>
                </div>
                <div class="form-group">
                    <label class="form-label" for="exampleInputDisabled2">Identificación</label>
                    <input type="text" class="form-control" readonly placeholder="" value="{{$user->boleta}}"/>
                </div>

                <header class="sign-title"></header>

                <button type="button" class="btn btn-rounded btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm">Editar perfil</button>

                <a href="{{asset('/admin')}}"><button type="button" class="close">
                    <span aria-hidden="true">&times;</span>
                </button></a>
            </form>
            </div>
          @endif
      </div>
  </div>

</div><!--.page-center-->


@stop

@section('subHead')
@stop

@section('content')
Hola
@stop

@section('scripts')
    <script src="{{asset('/Template/js/lib/hide-show-password/bootstrap-show-password.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/hide-show-password/bootstrap-show-password-init.js')}}"></script>
    <script src="{{asset('/Template/js/lib/bootstrap-sweetalert/sweetalert.min.js')}}"></script>

    <script src="{{asset('/Template/js/lib/cropper/cropper.js')}}"></script>
    <script src="{{asset('/Template/js/custom/shared.js')}}"></script>


    <script> /*script para que se puedan enviar peticiones POST desde javascript*/
        $(document).ready(function(){
            checkPosition();
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function changeModal(){
            //alert('x');
            $('#photoModal').modal('hide');
            $('#photoModalEdit').modal('show');
        }
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
