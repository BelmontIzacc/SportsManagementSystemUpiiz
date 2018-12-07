@extends('Admin.layout')

<?php
	$classSize = "col-lg-4 col-md-4 col-sm-6";
	$classSizeModal = "col-lg-6 col-md-6";
?>

@section('title')
<title>Informacion</title>
@stop

@section('css')
@stop

@section('popUp')

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
                <h4 class="modal-title" id="mySmallModalLabel">Edición del perfil</h4>
            </div>
            {!!Form::open(array('method'=>'post', 'id'=>'forms'))!!}

            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-1 col-md-5 col-md-offset-1">
                            <div class="checkbox-toggle">
                                    <input type="checkbox" id="check-toggle-1" name="check-toggle-1" onclick="getValue();"
                                        @if($student->usuario->completado == 1)
                                            checked
                                        @else
                                        @endif
                                    >
                                    <label for="check-toggle-1">Estatus</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-lg-offset-1 col-md-5 col-md-offset-1">
                            <div class="checkbox-toggle">
                                <input type="checkbox" id="check-toggle-2" name="check-toggle-2" onclick="getValue2();"
                                    @if($student->usuario->permisos == 1)
                                        checked
                                    @else
                                    @endif
                                >
                                <label for="check-toggle-2">Permisos</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-lg-offset-1 col-md-5 col-md-offset-1">
                            <div class="checkbox-toggle">
                                <input type="checkbox" id="check-toggle-3" name="check-toggle-3" onclick="getValue3();"
                                    @if($student->usuario->tipo == 3)
                                        checked
                                    @else
                                    @endif
                                >
                                <label for="check-toggle-3">Coordinador </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
<!--                 <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Close</button> -->
                <div class="text-center">
                    <input type="hidden" id="stats" name="stats">
                    <input type="hidden" id="perm" name="perm">
                    <input type="hidden" id="coord" name="coord">
                    <button type="submit" class="btn btn-rounded btn-primary" id="formi">Guardar cambios</button>
                </div>
            </div>
            {!!Form::close()!!}

             <div class="modal-footer">
                <div class="text-center">
                    <a onclick="toggle2();" id="more2">Mostrar más</a>
                </div>
            </div>

            {!!Form::open(array('method'=>'delete', 'style'=>'display:none', 'class'=>'details2'))!!}
                <input type="hidden" name="idVal2" id="idVal2" value="{{$student->id}}">
                <div class="modal-footer">
                    <div class="container text-center">
                        <div class="form-group">
                            <h5 class="m-t-lg with-border">¿Seguro que quiere eliminar el Usuario?</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <button type="submit" class="btn btn-rounded btn-primary btn-danger" id="formButton2">Eliminar</button>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <button type="button" class="btn btn-rounded btn-primary" onclick="toggle2();">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            {!!Form::close()!!}
        </div>
    </div>
</div><!--.modal-->


<div class="modal fade bd-example-modal-lg"
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
                <h4 class="modal-title" id="mySmallModalLabel">Talleres</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="text-center">
                            <button class="btn btn-inline dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Elije el taller para ver</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <?php
                                    $tam = sizeof($taller);
                                ?>
                                @if($tam == 0)
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item">Sin taller para mostrar</a>
                                @else
                                    @foreach($taller as $t)
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{asset('/admin/student/')}}/{{$t->id}}/studio">{{$t->nombre}}</a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <div class="modal-footer">
                <div class="text-center">
                    <a onclick="toggle();" id="more">Mostrar más</a>
                </div>
            </div>

            {!!Form::open(array( 'style'=>'display:none', 'class'=>'details'))!!}
                <input type="hidden" name="idVal2" id="idVal2" value="{{$student->id}}">
                <div class="modal-footer">
                    <div class="container text-center">
                        <div class="form-group">
                            <h7 class="m-t-lg with-border">¿Agregar talleres al usuario?</h7>
                        </div>
                        <div class="row">
                            <a href="{{asset('/admin/student/add/studio/')}}/{{$student->id}}" class="btn btn-rounded btn-inline btn-success">Ver talleres</a>
                            <div class="dropdown-divider"></div>
                            <div class="col-lg-12 col-md-12">
                                <button type="button" class="btn btn-rounded btn-primary" onclick="toggle();">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            {!!Form::close()!!}
        </div>
    </div>
</div><!--.modal-->

<div class="modal fade bd-example-modal-rp"
     tabindex="-1"
     role="dialog"
     aria-labelledby="mySmallModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" style="width:350px">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="mySmallModalLabel">Seleccione un taller</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-11 col-lg-offset-0 col-md-11 col-md-offset-0">
                            @foreach($taller as $t)
                                {{$t->nombre}}&nbsp;&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-rounded btn-inline" href="{{asset('/admin/')}}/{{$t->id}}/{{$student->id}}/reporte">Generar reporte</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('subHead')

@stop

@section('content')

<!-- start profile -->

<section class="widget widget-user">
    <div class="widget-user-bg" style="background-image: url('{{asset('/Template/img/backgroundUser.svg')}}')"></div>
    <div class="widget-user-photo">
        <img src="{{asset('/Template/img/avatar.svg')}}">
    </div>
    <div class="widget-user-name">
        {{$student->usuario}}
        <i class="font-icon font-icon-award"></i>
    </div>
    @unless($student->carrera->nombre == null)
    <div>{{$student->carrera->nombre}}</div>
    @endunless

    <div class="widget-user-stat hidden-md-down">
    	@unless($student->institucion->nombre == null)
        <div class="item">
            <div class="number">{{$student->institucion->nombre}}</div>
            <div class="caption">Plantel</div>
        </div>
        @endunless
        @unless($student->usuario->email == null)
        <div class="item">
            <div class="number">{{$student->usuario->email}}</div>
            <div class="caption">Correo</div>
        </div>
         @endunless
        <div class="item">
            <div class="number">{{$student->usuario->boleta}}</div>
            <div class="caption">Boleta</div>
        </div>

    </div>
</section>

<div class="box-typical box-typical-padding">

    <h5 class="m-t-lg with-border">Datos personales</h5>

    <div class="row">
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Tipo de usuario</label>
                    @if($student->usuario->tipo == 1)
                    	 <input type="text" readonly class="form-control" value="Administrador">
                   	@elseif($student->usuario->tipo == 3)
                   		 <input type="text" readonly class="form-control" value="Coordinador">
                   	@else
                   		<input type="text" readonly class="form-control" value="Usuario">
                    @endif

            </fieldset>
        </div>
        @unless($student->sexo == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Sexo</label>
                    @if($student->sexo == 0)
                    	 <input type="text" readonly class="form-control" value="Masculino">
                   	@else
                   		 <input type="text" readonly class="form-control" value="Femenino">
                    @endif
            </fieldset>
        </div>
        @endunless
        @unless($student->telefono == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Teléfono</label>
                <input type="text" readonly class="form-control" value="{{$student->telefono}}">
            </fieldset>
        </div>
         @endunless
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Estatus</label>
                    @if($student->usuario->completado == 1)
                    	 <input type="text" readonly class="form-control" value="Completo">
                   	@else
                   		 <input type="text" readonly class="form-control" value="Incompleto">
                    @endif
            </fieldset>
        </div>
        @unless($student->edad == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Edad</label>
                <input type="text" readonly class="form-control" value="{{$student->edad}}">
            </fieldset>
        </div>
        @endunless
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Estatus</label>
                    @if($student->usuario->permisos == 1)
                         <input type="text" readonly class="form-control" value="Permisos de Coordinador">
                    @else
                         <input type="text" readonly class="form-control" value="Sin Permisos de Coordinador">
                    @endif
            </fieldset>
        </div>
        @unless($student->usuario->email == null)
    	<div class="{{$classSize}} hidden-lg-up">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Correo</label>
                <input type="text" readonly class="form-control" value="{{$student->usuario->email}}">
            </fieldset>
        </div>
        @endunless
    </div>

    <h5 class="m-t-lg with-border">Datos de escolares</h5>

    <div class="row">
    	<div class="{{$classSize}} hidden-lg-up">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Boleta</label>
                <input type="text" readonly class="form-control" value="{{$student->usuario->boleta}}">
            </fieldset>
        </div>
        @unless($student->institucion->nombre == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Platel</label>
                <input type="text" readonly class="form-control" value="{{$student->institucion->nombre}}">
            </fieldset>
        </div>
        @endunless
        @unless($student->carrera->nombre == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Carrera</label>
                <input type="text" readonly class="form-control" value="{{$student->carrera->nombre}}">
            </fieldset>
        </div>
        @endunless
        @unless($student->semestre == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Semestre</label>
                <input type="text" readonly class="form-control" value="{{$student->semestre}}">
            </fieldset>
        </div>
        @endunless
        @unless($student->grupo == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Grupo</label>
                <input type="text" readonly class="form-control" value="{{$student->grupo}}">
            </fieldset>
        </div>
        @endunless
    </div>

    <h5 class="m-t-lg with-border">Datos de geográficos</h5>

    <div class="row">
    	@unless($student->calle == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Calle</label>
                <input type="text" readonly class="form-control" value="{{$student->calle}}">
            </fieldset>
        </div>
        @endunless
        @unless($student->numExterior == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Número exterior</label>
                <input type="text" readonly class="form-control" value="{{$student->numExterior}}">
            </fieldset>
        </div>
        @endunless
        @unless($student->numInterior == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Número interior</label>
                <input type="text" readonly class="form-control" value="{{$student->numInterior}}">
            </fieldset>
        </div>
        @endunless
        @unless($student->colonia == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Colonia</label>
                <input type="text" readonly class="form-control" value="{{$student->colonia}}">
            </fieldset>
        </div>
        @endunless
        @unless($student->codigoPostal == null)
        <div class="{{$classSize}}">
            <fieldset class="form-group">
                <label class="form-label" for="exampleInputDisabled2">Código postal</label>
                <input type="text" readonly class="form-control" value="{{$student->codigoPostal}}">
            </fieldset>
        </div>
        @endunless
    </div>

</div> <!--End box typical-->

<!-- end profile -->


<div class="box-typical box-typical-padding">

	<br/>

	<div class="row text-center">
         @if(($student->usuario->permisos == 1) || ($student->usuario->tipo != 2))
		<div class="col-lg-3 col-md-3">
		    <button type="button" class="btn btn-rounded btn-inline btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="updateInputsProfile({{$student->id}}, '{{$student->user}}');">Editar</button>
		</div>
        <div class="col-lg-3 col-md-3">
            <button type="button" class="btn btn-rounded btn-inline btn-succes" data-toggle="modal" data-target=".bd-example-modal-rp" onclick="">Generar Reporte</button>
        </div>
        <div class="col-lg-3 col-md-3">
            <button type="button" class="btn btn-rounded btn-inline btn-success" data-toggle="modal" data-target=".bd-example-modal-lg" onclick="updateInputsProfile({{$student->id}}, '{{$student->user}}');">Talleres</button>
        </div>
        <!--<div class="col-lg-6 col-md-6">
             <a href="{{asset('/admin/student/')}}/{{$student->id}}/studio" class="btn btn-rounded btn-inline btn-success">Ver talleres</a>
        </div>
            -->
        <div class="col-lg-3 col-md-3">
            <a href="{{asset('/admin/list/')}}/{{$student->id}}/addTaller" class="btn btn-rounded btn-info">Registrar en un taller</a>
        </div>
        @else
        <div class="col-lg-4 col-md-4">
            <button type="button" class="btn btn-rounded btn-inline btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="updateInputsProfile({{$student->id}}, '{{$student->user}}');">Editar</button>
        </div>
        <div class="col-lg-4 col-md-4">
            <button type="button" class="btn btn-rounded btn-inline btn-succes" data-toggle="modal" data-target=".bd-example-modal-rp" onclick="">Generar Reporte</button>
        </div>
        <div class="col-lg-4 col-md-4">
            <a href="{{asset('/admin/list/')}}/{{$student->id}}/addTaller" class="btn btn-rounded btn-info">Registrar en un taller</a>
        </div>
        @endif
	</div>
</div>

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
    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('/Template/js/custom/listsEdits.js')}}"></script>
@stop
