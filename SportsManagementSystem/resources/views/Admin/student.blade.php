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
            {!!Form::open(array('method'=>'post', 'id'=>'userForm'))!!}
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-lg-offset-1 col-md-5 col-md-offset-1">
                            <div class="checkbox-toggle">
                                    <input type="checkbox" id="check-toggle-1" name="check-toggle-1"   
                                        @if($student->usuario->completado == 1)
                                            value="false"
                                            checked
                                        @else
                                            value="true"
                                        @endif
                                    >
                                    <label for="check-toggle-1">Estatus</label>
                            </div>
                        </div>
                        <div class="col-lg-4 col-lg-offset-1 col-md-5 col-md-offset-1">
                            <div class="checkbox-toggle">
                                <input type="checkbox" id="check-toggle-2" name="check-toggle-2"   
                                    @if($student->usuario->permisos == 1)
                                        value="false"
                                        checked
                                    @else
                                        value="true"
                                    @endif
                                >
                                <label for="check-toggle-2">Permisos</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
<!--                 <button type="button" class="btn btn-rounded btn-default" data-dismiss="modal">Close</button> -->
                <div class="text-center">
                    <button type="submit" class="btn btn-rounded btn-primary" formaction="{{asset('/')}}" id="formi">Guardar cambios</button>
                </div>
            </div>
            {!!Form::close()!!}
            
             <div class="modal-footer">
                <div class="text-center">
                    <a onclick="toggle();" id="more">Mostrar más</a>
                </div>
            </div>
            
            {!!Form::open(array('method'=>'delete', 'style'=>'display:none', 'class'=>'details'))!!}
                <input type="hidden" name="idVal2" id="idVal2" value="{{$student->id}}">
                <div class="modal-footer">
                    <div class="container text-center">
                        <div class="form-group">
                            <h5 class="m-t-lg with-border">¿Seguro que quiere eliminar el Usuario?</h5>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <button type="submit" class="btn btn-rounded btn-primary btn-danger" formaction="{{asset('/admin/')}}" id="formButton2">Eliminar</button>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <button type="button" class="btn btn-rounded btn-primary" onclick="toggle();">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>
            {!!Form::close()!!}
        </div>
    </div>
</div><!--.modal-->

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
		
	</br>

	<div class="row text-center">
		<div class="col-lg-4 col-md-4">
		    <button type="button" class="btn btn-rounded btn-inline btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="updateInputsProfile({{$student->id}}, '{{$student->user}}');">Editar</button>
		</div>
        <div class="col-lg-4 col-md-4">
             <a href="{{asset('/admin/student')}}/{{$student->id}}" class="btn btn-rounded btn-inline btn-success" target="_blank" >Ver talleres</a>
        </div>
	</div>
</div>

@stop

@section('scripts')
    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('/Template/js/custom/listsEdits.js')}}"></script>
@stop
