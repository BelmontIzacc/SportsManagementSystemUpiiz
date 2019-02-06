@extends('Admin.layout3')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
?>

@section('title')
<title>Panel de Control</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>
@stop
@section('popUp')

<div class="modal fade bd-example1-modal-sm"
        tabindex="-1"
        role="dialog"
        aria-labelledby="mySmallModalLabel1"
        aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="windowTitle1">Funciones Especiales</h4>
            </div>
            {!!Form::open(array('method'=>'post', 'id'=>'passForm2'))!!}
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label" for="hide-show-password">Contraseña</label>
                    <input type="password" class="form-control" value="" name="clave" id="clave">
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <button type="submit" class="btn btn-rounded btn-danger" formaction="" id="formButton2">Aceptar</button>
                    <input type="hidden" id="control" name="control" value="1"></input>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div><!--.modal-->

<div class="modal fade bd-example2-modal-sm"
        tabindex="-1"
        role="dialog"
        aria-labelledby="mySmallModalLabel2"
        aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
                <h4 class="modal-title" id="windowTitle2">Control de Registros</h4>
            </div>
            {!!Form::open(array('method'=>'post', 'id'=>'passForm2'))!!}
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label" for="hide-show-password">Contraseña</label>
                    <input type="password" class="form-control" value="" name="clave" id="clave">
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <button type="submit" class="btn btn-rounded btn-danger" formaction="" id="formButton3">Aceptar</button>
                    <input type="hidden" id="control" name="control" value="2"></input>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div><!--.modal-->


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
                <h4 class="modal-title" id="windowTitle">¿Desea editar?</h4>
            </div>
            {!!Form::open(array('method'=>'post', 'id'=>'passForm'))!!}
            <div class="modal-body">
                <div class="form-group">
                    <label class="form-label" for="hide-show-password">Contraseña</label>
                    <input type="password" class="form-control" value="" name="clave" id="clave">
                </div>
            </div>
            <div class="modal-footer">
                <div class="text-center">
                    <button type="submit" class="btn btn-rounded btn-danger" formaction="" id="formButton">Editar datos</button>
                </div>
            </div>
            {!!Form::close()!!}
        </div>
    </div>
</div><!--.modal-->

<div class="box-typical">
    <header class="widgets-header">
        <div class="container-fluid">
            <div class="tbl tbl-outer">
                <div class="tbl-row">
                    <div class="tbl-cell">
                        <div class="tbl tbl-item">
                            <div class="tbl-row">
                                <div class="tbl-cell">
                                    <div class="title">Total de Registros : {{$usuarios->count()}}</div>
                                </div>
                                <div class="tbl-cell tbl-cell-progress">
                                </div>
                            </div>
                        </div> <!--tbl tbl-item-->
                    </div> <!--tbl-cell-->
                     <div class="tbl-cell">
                        <div class="tbl tbl-item">
                            <div class="tbl-row">
                                <div class="tbl-cell">
                                </div>
                                <div class="tbl-cell tbl-cell-progress">
                                    <div class="col-lg-6 col-md-6">
                     <a href="{{asset('/admin')}}" class="btn btn-rounded btn-primary btn-inline">Regresar</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                     <button type="button" class="btn btn-rounded btn-inline btn-warning" data-toggle="modal" data-target=".bd-example1-modal-sm">Funciones de borrado</button>
                                </div>
                                <div class="col-lg-6 col-md-6">
                     <button type="button" class="btn btn-rounded btn-inline btn-info" data-toggle="modal" data-target=".bd-example2-modal-sm">Control registros</button>
                                </div>
                            </div>
                        </div> <!--tbl tbl-item-->
                    </div> <!--tbl-cell-->
                </div> <!--tbl-row-->
            </div> <!--tbl tbl-outer-->
        </div> <!--container fluid-->
    </header>
</div>

<div class="container-fluid">

@include('alerts.formError')
@include('alerts.sessionAlert')

<div class="row">

    <div class="col-lg-4 col-md-6">
        <section class="widget">
            <header class="widget-header-dark with-btn">
                Carreras/Bachiller registradas en el sistema: {{count($carrer)}}
                <button type="button" class="widget-header-btn" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="authUser('Editar carreras', 1);">
                    <i class="font-icon font-icon-pencil"></i>
                </button>
            </header>
            <div class="tab-content widget-tabs-content">
                <div class="tab-pane active" id="w-1-tab-1" role="tabpanel">
                    <center>
                        <div class="pre-scrollable">
                            <table class="table table-hover">
                                <tbody>
                                    @foreach($carrer as $c)
                                    <tr>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Carrera/Bachiller</div>
                                            {{$c->nombre}}
                                        </td>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Número de alumnos</div>
                                            {{$c->informacion->count()}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </center>
                </div>
            </div>
            <div class="widget-tabs-nav bordered">
                <ul class="tbl-row" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#w-2-tab-1" role="tab">
                            <i class="font-icon font-icon-notebook-lines"></i>
                            Lista
                        </a>
                    </li>
                </ul>
            </div>
        </section><!--.widget-->
    </div> <!--col-lg-4 col-md-6-->

    <div class="col-lg-4 col-md-6">
        <section class="widget">
            <header class="widget-header-dark with-btn">
                Instituciones registradas en el sistema: {{count($institucion)}}
                <button type="button" class="widget-header-btn" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="authUser('Editar Instituciones', 2);">
                    <i class="font-icon font-icon-pencil"></i>
                </button>
            </header>
            <div class="tab-content widget-tabs-content">
                <div class="tab-pane active" id="w-2-tab-1" role="tabpanel">
                    <center>
                        <div class="pre-scrollable">
                            <table class="table table-hover">
                                <tbody>
                                    @foreach($institucion as $ins)
                                    <tr>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Institución</div>
                                            {{$ins->nombre}}
                                        </td>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Número de alumnos</div>
                                            {{$ins->informacion->count()}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </center>
                </div>
                <div class="tab-pane" id="w-2-tab-2" role="tabpanel">

                </div>
            </div>
            <div class="widget-tabs-nav bordered">
                <ul class="tbl-row" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#w-2-tab-1" role="tab">
                            <i class="font-icon font-icon-notebook-lines"></i>
                            Lista
                        </a>
                    </li>
                </ul>
            </div>
        </section><!--.widget-->
    </div> <!--col-lg-4 col-md-6-->

    <div class="col-lg-4 col-md-6">
        <section class="widget">
            <header class="widget-header-dark with-btn">
                Talleres registrados en el sistema: {{count($taller)}}
                <button type="button" class="widget-header-btn" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="authUser('Editar Talleres', 3);">
                    <i class="font-icon font-icon-pencil"></i>
                </button>
            </header>
            <div class="tab-content widget-tabs-content">
                <div class="tab-pane active" id="w-3-tab-1" role="tabpanel">
                  <center>
                        <div class="pre-scrollable">
                            <table class="table table-hover">
                                <tbody>
                                    @foreach($taller as $ta)
                                    <tr>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Taller</div>
                                            {{$ta->nombre}}
                                        </td>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Número de alumnos</div>
                                            {{$ta->inscripcion->count()}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </center>
                </div>
                <div class="tab-pane" id="w-3-tab-2" role="tabpanel">
                </div>
            </div>
            <div class="widget-tabs-nav bordered">
                <ul class="tbl-row" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#w-2-tab-1" role="tab">
                            <i class="font-icon font-icon-notebook-lines"></i>
                            Lista
                        </a>
                    </li>
                </ul>
            </div>
        </section><!--.widget-->
    </div> <!--col-lg-4 col-md-6-->

</div>

<div class="row">

    <div class="col-lg-4 col-md-6">
        <section class="widget">
            <header class="widget-header-dark with-btn">
                Tipo de talleres registrados en el sistema: {{count($tipo)}}
                <button type="button" class="widget-header-btn" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="authUser('Editar Tipos', 4);">
                    <i class="font-icon font-icon-pencil"></i>
                </button>
            </header>
            <div class="tab-content widget-tabs-content">
                <div class="tab-pane active" id="w-4-tab-1" role="tabpanel">
                    <center>
                        <div class="pre-scrollable">
                            <table class="table table-hover">
                                <tbody>
                                    @foreach($tipo as $ti)
                                    <tr>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Tipo</div>
                                            {{$ti->nombre}}
                                        </td>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Número de alumnos</div>
                                            {{$ti->taller->count()}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </center>
                </div>
                <div class="tab-pane" id="w-4-tab-2" role="tabpanel">
                </div>
            </div>
            <div class="widget-tabs-nav bordered">
                <ul class="tbl-row" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#w-2-tab-1" role="tab">
                            <i class="font-icon font-icon-notebook-lines"></i>
                            Lista
                        </a>
                    </li>
                </ul>
            </div>
        </section><!--.widget-->
    </div> <!--col-lg-4 col-md-6-->

    <div class="col-lg-4 col-md-6">
        <section class="widget">
            <header class="widget-header-dark with-btn">
                Coordinador/Administrador registrados en sistema: {{count($coord)}}
                <button type="button" class="widget-header-btn" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="authUser('Editar Coordinador/Admin', 5);">
                    <i class="font-icon font-icon-pencil"></i>
                </button>
            </header>
            <div class="tab-content widget-tabs-content">
                <div class="tab-pane active" id="w-5-tab-1" role="tabpanel">
                   <center>
                        <div class="pre-scrollable">
                            <table class="table table-hover">
                                <tbody>
                                    @foreach($coord as $cor)
                                    <tr>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Coordinador/Administrador</div>
                                            {{$cor}}
                                        </td>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Boleta</div>
                                            {{$cor->boleta}}
                                        </td>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Tipo</div>
                                        <?php
                                            if($cor->tipo == 1){
                                                echo "Administrador";
                                            }else if($cor->tipo == 3){
                                                echo "Coordinador";
                                            }
                                        ?>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </center>
                </div>
                <div class="tab-pane" id="w-5-tab-2" role="tabpanel">
                </div>
            </div>
            <div class="widget-tabs-nav bordered">
                <ul class="tbl-row" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#w-2-tab-1" role="tab">
                            <i class="font-icon font-icon-notebook-lines"></i>
                            Lista
                        </a>
                    </li>
                </ul>
            </div>
        </section><!--.widget-->
    </div> <!--col-lg-4 col-md-6-->

    <div class="col-lg-4 col-md-6">
        <section class="widget">
            <header class="widget-header-dark with-btn">
                Usuario-Coordinador registrados en sistema: {{count($sp)}}
                <button type="button" class="widget-header-btn" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="authUser('Editar Usuario-Coordinador', 6);">
                    <i class="font-icon font-icon-pencil"></i>
                </button>
            </header>
            <div class="tab-content widget-tabs-content">
                <div class="tab-pane active" id="w-6-tab-1" role="tabpanel">
                    <center>
                        <div class="pre-scrollable">
                            <table class="table table-hover">
                                <tbody>
                                    @foreach($sp as $s)
                                    <tr>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Usuario-Coordinador</div>
                                            {{$s}}
                                        </td>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Boleta</div>
                                            {{$s->boleta}}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </center>
                </div>
                <div class="tab-pane" id="w-6-tab-2" role="tabpanel">
                </div>
            </div>
            <div class="widget-tabs-nav bordered">
                <ul class="tbl-row" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#w-2-tab-1" role="tab">
                            <i class="font-icon font-icon-notebook-lines"></i>
                            Lista
                        </a>
                    </li>
                </ul>
            </div>
        </section><!--.widget-->
    </div> <!--col-lg-4 col-md-6-->

</div>
@stop
@section('content')
panel

@stop
@section('scripts')

    <script src="{{asset('/Template/js/lib/bootstrap-sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('/Template/js/custom/desabilitar.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>

    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
    <script src="{{asset('/Template/js/lib/daterangepicker/daterangepicker.js')}}"></script>

@stop
