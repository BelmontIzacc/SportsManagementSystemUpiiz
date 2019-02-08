@extends('Admin.layout3')

@section('title')
<title>Inicio servicio medico</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/colorpicker/bootstrap-colorpicker.min.css')}}">
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
                <h4 class="modal-title" id="windowTitle">Editar</h4>
            </div>
            {!!Form::open(array('method'=>'patch'))!!}
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label" for="hide-show-password">Nombre</label>
                    {!!Form::text('nombre', null, array('class'=>'form-control', 'id'=>'nombre', 'placeholder'=>'Ej: Ingeniería en Sistemas Computacionales'))!!}
                    <input type="hidden" name="idVal" id="idVal" value="">
                </div>
            </div>

            <div class="modal-footer">
                <div class="text-center">
                    <button type="submit" class="btn btn-rounded btn-primary btn-warning" formaction="/" id="formButton">Guardar</button>
                </div>
            </div>
            {!!Form::close()!!}

            <div class="modal-footer">
                <div class="text-center">
                    <a onclick="toggle();" id="more">Mostrar más</a>
                </div>
            </div>

            {!!Form::open(array('method'=>'delete', 'style'=>'display:none', 'class'=>'details'))!!}
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">¿Seguro quiere eliminar el registro?</label>
                    </div>
                </div>

                <input type="hidden" name="idVal2" id="idVal2" value="">
                <div class="modal-footer">
                    <div class="text-center">
                        <button type="submit" class="btn btn-rounded btn-primary btn-danger" formaction="/" id="formButton2">Eliminar</button>
                    </div>
                    <br/>
                    <div class="text-center">
                        <button type="button" class="btn btn-rounded btn-primary" onclick="toggle();">Cancelar</button>
                    </div>
                </div>
            {!!Form::close()!!}
        </div>
    </div>
</div><!--.modal-->

<div class="page-content">
<div class="container-fluid">

<div class="row">
    <div class="col-lg-4 col-md-6"></div>
    <div class="col-lg-4 col-md-6">
        <section class="widget widget-time">
            <header class="widget-header-dark with-btn">
                Editar @if($variable == 1)
                            carrera/bachiller
                        @elseif($variable == 2)
                            instituciones
                        @elseif($variable == 3)
                            talleres
                        @elseif($variable == 4)
                            tipo
                        @endif
                <a href="{{asset('/admin/controlPanel')}}"><button type="button" class="widget-header-btn">
                    <i class="font-icon font-icon-del"></i>
                </button></a>
            </header>
            <div class="widget-time-content">

            @include('alerts.formSus')
                {!!Form::open(array('method'=>'post'))!!}
                @if($variable!=3 && $variable!=5 && $variable!=6)
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <div class="form-group">
                            @if($variable == 1)
                                <label class="form-label">Institución a la que pertenece </label>
                                {!!Form::select('institucion',$insti,0,['class'=>'bootstrap-select bootstrap-select-arrow form-control', 'id'=>'institución'])!!}
                            @endif
                            <label class="form-label" for="exampleInputDisabled2">Nombre de
                                @if($variable == 1)
                                    carrera/bachiller
                                @elseif($variable == 2)
                                    instituciones
                                @elseif($variable == 4)
                                    tipo
                                @endif
                            </label>
                            <input name="nombre" type="text" class="form-control"
                                placeholder="
@if($variable == 1)
Ej: Ingeniería en Sistemas Computacionales
@elseif($variable == 2)
Ej: Upiiz
@elseif($variable == 4)
Ej: Acuatico
@endif" value="">

                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-rounded btn-primary btn-warning" formaction="{{asset('/admin/controlPanel/insert')}}/{{$variable}}">Agregar</button>
                </div>
                @endif
                {!!Form::close()!!}

                <h5 class="m-t-lg with-border">
                    @if($variable == 1)
                        Carreras/Bachiller registradas
                    @elseif($variable == 2)
                        Instituciones registrados
                    @elseif($variable == 3)
                        Talleres registrados
                    @elseif($variable == 4)
                        Tipo registrados
                    @elseif($variable == 5)
                        Coordinador/Admin registrados
                    @elseif($variable == 6)
                        Usuario-Coordinador registrados
                    @endif
                en sistema</h5>

                <div class="pre-scrollable">
                    <table class="table table-hover">
                        <tbody>

                            @if($variable == 1)
                                @foreach(\App\carrera::all() as $carrer)
                                <tr>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Carrera</div>
                                        {{$carrer->nombre}}
                                    </td>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Número de alumnos</div>
                                        {{$carrer->informacion->count()}}
                                    </td>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Editar</div>
                                        <button type="button"
                                                    class="btn btn-inline btn-sm btn-primary"
                                                    data-toggle="modal"
                                                    data-target=".bd-example-modal-sm" onclick="updateInputs3('Editar carrera', '{{$carrer->nombre}}', 1, {{$carrer->id}});">
                                                    <span class="font-icon font-icon-pencil"></span>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            @elseif($variable == 2)
                                @foreach(\App\institucion::where('id','>',4)->get() as $state)
                                <tr>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Institución</div>
                                        {{$state->nombre}}
                                    </td>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Número de alumnos</div>
                                        {{$state->informacion->count()}}
                                    </td>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Editar</div>
                                        <button type="button"
                                                    class="btn btn-inline btn-sm btn-primary"
                                                    data-toggle="modal"
                                                    data-target=".bd-example-modal-sm" onclick="updateInputs('Editar Institucion', '{{$state->nombre}}', 2, {{$state->id}});">
                                                    <span class="font-icon font-icon-pencil"></span>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            @elseif($variable == 3)
                                @foreach(\App\taller::all() as $institute)
                                <tr>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Taller</div>
                                        <a href="{{asset('/admin/lists/taller/')}}/{{$institute->id}}" class="semibold">{{$institute->nombre}}</a>
                                    </td>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Número de registros</div>
                                        {{$institute->inscripcion->count()}}
                                    </td>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Editar</div>
                                        <button type="button"
                                                    class="btn btn-inline btn-sm btn-primary"
                                                    data-toggle="modal"
                                                    data-target=".bd-example-modal-sm" onclick="updateInputs('Editar Taller', '{{$institute->nombre}}', 3, {{$institute->id}});">
                                                    <span class="font-icon font-icon-pencil"></span>
                                        </button>
                                        <div class="font-11 color-blue-grey-lighter uppercase">Avanzado</div>
                                        <a href="{{asset('/admin/edit/')}}/{{$institute->id}}" class="btn btn-inline btn-sm btn-secondary">
                                            <span class="font-icon font-icon-list-square"></span>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            @elseif($variable == 4)
                                @foreach(\App\tipo::all() as $place)
                                <tr>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Tipo</div>
                                        {{$place->nombre}}
                                    </td>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Número de alumnos</div>
                                        {{$place->taller->count()}}
                                    </td>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Editar</div>
                                        <button type="button"
                                                    class="btn btn-inline btn-sm btn-primary"
                                                    data-toggle="modal"
                                                    data-target=".bd-example-modal-sm" onclick="updateInputs('Editar Tipo', '{{$place->nombre}}', 4, {{$place->id}});">
                                                    <span class="font-icon font-icon-pencil"></span>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            @elseif($variable == 5)
                                @foreach(\App\User::where('tipo','!=',2)->get() as $status)
                                <tr>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Coordinador/Administrador</div>
                                        <a href="{{asset('/admin/lists')}}/{{$status->informacion->id}}" class="semibold">{{$status}}</a>
                                    </td>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Tipo</div>
                                    <?php
                                        if($status->tipo == 1){
                                            echo "Administrador";
                                        }else if($status->tipo == 3){
                                            echo "Coordinador";
                                        }
                                    ?>
                                    </td>
                                </tr>
                                @endforeach
                            @elseif($variable == 6)
                                @foreach(\App\User::where('permisos',1)->get() as $clinic)
                                <tr>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Usuario-Coordinador</div>

                                        <a href="{{asset('/admin/lists')}}/{{$clinic->informacion->id}}" class="semibold">{{$clinic}}</a>
                                    </td>
                                    <td class="table-check">
                                        <div class="font-11 color-blue-grey-lighter uppercase">Boleta</div>
                                       {{$clinic->boleta}}
                                    </td>
                                </tr>
                                @endforeach
                            @endif

                        </tbody>
                    </table>
                </div>

            </div>
        </section><!--.widget-time-->
    </div>
    <div class="col-lg-4 col-md-6"></div>
</div>

</div>
</div>

@stop

@section('subHead')
@stop

@section('content')
Hola
@stop

@section('scripts')
    <script src="{{asset('/Template/js/custom/configEdit.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/colorpicker/bootstrap-colorpicker.min.js')}}"></script>

    <script>
        $(document).ready(function(){
            $("input[name='numero']").TouchSpin();
        });
        $(document).ready(function(){
            $("input[name='numero2']").TouchSpin();
        });
        $(function() {
            $('#cp2').colorpicker();
            $('#cp3').colorpicker();
        });
    </script>
@stop
