@extends('Admin.layout')

<?php
	$classSize = "col-lg-4 col-md-4 col-sm-6";
	$classSizeModal = "col-lg-6 col-md-6";
    $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";

    $dia = array(
        'Lunes',
        'Martes',
        'Miercoles',
        'Jueves',
        'Viernes',
        'Sabado',
        'Domingo',
    );

    $status = array(
        'Inactivo',
        'Activo',
        'Suspendido temporalmente',
        'Sin Coordinador',
    );
?>

@section('title')
<title>Información</title>
@stop

@section('css')
@stop

@section('popUp')

@stop

@section('subHead')

@stop

@section('content')

<!-- start profile -->

        <section class="card widget widget-user">
            <div class="widget-user-bg" style="background-image: url('{{asset('/Template/img/backgroundUser.svg')}}')"></div>
            <div class="widget-user-photo">
                <img src="{{asset('/Template/img/Stickmen/LogoSRDpng2.png')}}" alt="" style="height:120px;width:auto;">
            </div>
            <div>
                {{$taller->nombre}}
                <i class="font-icon font-icon-award"></i>
            </div>
            @unless($taller->usuario == null)
            <div>Coordinador <a href="{{asset('/admin/lists')}}/{{$taller->usuario_id}}">{{$taller->usuario}}</a></div>
            @endunless
            @unless($taller->usuario == null)
            <div>Boleta <a href="{{asset('/admin/lists')}}/{{$taller->usuario_id}}">{{$taller->usuario->boleta}}</a></div>
            @endunless
            <div class="widget-user-stat hidden-md-down">
                <div class="item">
                    <div class="number">{{$total}}</div>
                    <div class="caption">Participantes</div>
                </div>
                @unless($taller->lugar == null)
                <div class="item">
                    <div class="number">{{$taller->lugar}}</div>
                    <div class="caption">Lugar</div>
                </div>
                @endunless
                @unless($taller->dias == null)
                <div class="item">
                    <div class="number">{{$taller->dias}}</div>
                    <div class="caption">Horario</div>
                </div>
                @endunless
            </div>
            <div class="widget-user-stat">
                @unless($taller->descripcion == null)
                    <div class="number">{{$taller->descripcion}}</div>
                    <div class="caption">Descripción</div>
                @endunless
            </div>
        </section>

<div class="box-typical box-typical-padding">
{!!Form::open(array('method'=>'post','id'=>'passForm'))!!}
    <h5 class="m-t-lg with-border">Editar datos</h5>

    <div class="row">
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label">Nombre del taller</label>
                <?php $nombre = $taller->nombre ?>
                {!!Form::text('nombre',$nombre, ['class'=>'form-control', 'placeholder'=>'Nombre del taller', 'id'=>'nombreTaller'])!!}
            </fieldset>
        </div>

        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label">Duración total (horas)</label>
                <?php $d = $taller->duracion ?>
                {!!Form::text('duracion', $d, ['class'=>'form-control', 'placeholder'=>'Duracion en horas (total)', 'id'=>'duracion'])!!}
            </fieldset>
        </div>

        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label">Tipo</label>
                    <?php $t = $taller->tipo_id ?>
                    {!!Form::select('tipo',$tilista, $t, ['class'=>'select2 form-control', 'placeholder'=>'Selecciona un tipo'])!!}
            </fieldset>
        </div>

        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label">Días de Impartición</label>
                {!!Form::select('dia[]',$dia,$tDi, ['class'=>'select2 remove-example', 'multiple'])!!}
            </fieldset>
        </div>

        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label">Lugar</label>
                <?php $l = $taller->lugar ?>
                {!!Form::text('lugar', $l, ['class'=>'form-control', 'placeholder'=>'Lugar', 'id'=>'lugar'])!!}
            </fieldset>
        </div>

    </div>

    <h5 class="m-t-lg with-border">Descripción</h5>

    <div class="row">
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label">Descripción</label>
                <?php $des = $taller->descripcion ?>
                {!!Form::textarea('descri', $des, ['class'=>'form-control','maxlength-simple','maxlength'=>'255','rows'=>'8','cols'=>31,'placeholder'=>'Descripcion del taller', 'id'=>'descri'])!!}
            </fieldset>
        </div>
    </div>

    <h5 class="m-t-lg with-border">Fechas</h5>

    <div class="row">
    	<div class="{{$classSize}}">
            <fieldset class="form-group">
              <label class="form-label">Inicio del Taller</label>
                <div class='input-group date'>
                      {!!Form::text('Date1', $dF, ['class'=>'form-control', 'id'=>'date_box', 'placeholder'=>'00/00/0000'])!!}
                      <span class="input-group-addon">
                          <i class="font-icon font-icon-calend"></i>
                      </span>
                </div>
            </fieldset>
        </div>

        <div class="{{$classSize}}">
            <fieldset class="form-group">
              <label class="form-label">Fin del Taller</label>
                <div class='input-group date'>
                      {!!Form::text('Date2', $dF2, ['class'=>'form-control', 'id'=>'date_box2', 'placeholder'=>'00/00/0000'])!!}
                      <span class="input-group-addon">
                          <i class="font-icon font-icon-calend"></i>
                      </span>
                </div>
            </fieldset>
        </div>

        <div class="{{$classSize}}">
          <fieldset class="form-group">
            <label class="form-label">Estatus</label>
            <?php $st = $taller->status ?>
            {!!Form::select('status',$status, $st, ['class'=>'bootstrap-select bootstrap-select-arrow form-control','id'=>'status','placeholder'=>'Seleccionar'])!!}
          </fieldset>
        </div>
    </div>

    <h5 class="m-t-lg with-border">Coordinador</h5>

    <div class="row text-center">
        <div class="{{$classSizeForms}}">
            <fieldset class="form-group">
                <label class="form-label"></label>
                <div class="form-group">
                  <label class="col-sm-12">¿Esta Registrado el Coordinador?</label>
                  <div class="col-sm-12">
                    <div class="rdio rdio-primary">
                      </br>
                      <input type="radio" name="taller" value="si" id="tlist" onclick="mostrar();"
                        @if($taller->usuario_id != null)
                            checked=""
                        @else

                        @endif
                      >
                      <label>Sí</label>
                    </div>
                    <div class="rdio rdio-primary">
                      <input type="radio" name="taller" value="no" id="tlistt" onclick="mostrar();"
                        @if($taller->usuario_id == null)
                            checked=""
                        @else

                        @endif
                      >
                      <label>No</label>
                    </div>
                  </div>
                </div>
            </fieldset>
        </div>
        <div class="{{$classSizeForms}}">
            <fieldset class="form-group">
                <label class="form-label"</label>
                  <!--Bloque Oculto-->
                  <div id="tlistF" style="display:none;">
                    <label>Seleccione el Coordinador:</label>
                    <div>
                          <fieldset class="form-group">
                            </br>
                              <label class="form-label">Coordinador</br></label>
                                {!!Form::select('coordinador',$coord, $taller->usuario_id, ['class'=>'select2 form-control', 'placeholder'=>'Selecciona un usuario'])!!}
                          </fieldset>
                          @unless(count($Pcoord)==0)
                          <fieldset class="form-group">
                              <label class="form-label">Alumno</br></label>
                                {!!Form::select('Pcoordinador',$Pcoord, -1, ['class'=>'select2 form-control', 'placeholder'=>'Selecciona un usuario'])!!}
                          </fieldset>
                          @endunless
                    </div>
                  </div>
                  <!--Bloque Oculto-->
            </fieldset>
        </div>
    </div>
    <input type="hidden" id="idTaller" name="idTaller" value="{{$taller->id}}">

</div> <!--End box typical-->

<!-- end profile -->


<div class="box-typical box-typical-padding">

	<br/>

	<div class="row text-center">
        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">
            <button type="submit" class="btn btn-rounded btn-inline btn-warning">
                Confirmar
            </button>
        </div>
	</div>
</div>
{!!Form::close()!!}
@stop

@section('scripts')

    <script src="{{asset('/Template/js/lib/hide-show-password/bootstrap-show-password.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/hide-show-password/bootstrap-show-password-init.js')}}"></script>

    <script src="{{asset('/Template/js/custom/completeProfileToggle.js')}}"></script>
    <script src="{{asset('/Template/js/plugins.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('/Template/js/custom/desabilitar.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>

    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
    <script src="{{asset('/Template/js/lib/daterangepicker/daterangepicker.js')}}"></script>

    <script>
    $(document).ready(function() {
        $('#telefono').mask('(000) 000-0000', {placeholder: "Teléfono personal"});
        $('#boleta').mask('0000 00 0000', {placeholder: "Boleta/Numero de Trabajador"});
    });

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
