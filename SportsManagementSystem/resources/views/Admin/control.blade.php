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
                                    <div class="col-lg-3 col-md-3">
                     <a href="{{asset('/admin')}}" class="btn btn-rounded btn-primary btn-inline">Regresar</a>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!--tbl tbl-item-->
                    </div> <!--tbl-cell-->
                </div> <!--tbl-row-->
            </div> <!--tbl tbl-outer-->
        </div> <!--container fluid-->
    </header>
</div>

@foreach($taller as $t)
<div class="col-md-2">
	<div class="row">
		<div class="col-xs-12">
			<section class="widget widget-simple-sm-fill green">
				<div class="widget-simple-sm-icon">
					<i class="font-icon font-icon-facebook"></i>
				</div>
				<div class="widget-simple-sm-fill-caption"><a href="{{asset('/admin/search')}}">{{$t->nombre}}</a></div>
			</section><!--.widget-simple-sm-fill-->
		</div>
	</div>
</div>
@endforeach

<div class="container-fluid">

@include('alerts.formError')
@include('alerts.sessionAlert')
    
<div class="row">

    <div class="col-lg-4 col-md-6">
        <section class="widget">
            <header class="widget-header-dark with-btn">
                Carreras registradas en el sistema
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
                                            <div class="font-11 color-blue-grey-lighter uppercase">Carrera</div>
                                            {{$c->nombre}}
                                        </td>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Número de alumnos</div>
                                            {{$c->informacion->count()}}
                                           <!--<?php error_log($c->informacion->count()); ?><--></-->
                                        </td>
                                        <td class="table-check">
                                            <div class="font-11 color-blue-grey-lighter uppercase">Color</div>
                                            <button type="button" class="btn btn-inline btn-lg" style="background-color: {{$c->color}}; border-color: #D0D0D0;"></button>
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
                Estados registrados en el sistema
                <button type="button" class="widget-header-btn" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="authUser('Editar estados', 2);">
                    <i class="font-icon font-icon-pencil"></i>
                </button>
            </header>
            <div class="tab-content widget-tabs-content">
                <div class="tab-pane active" id="w-2-tab-1" role="tabpanel">
                    <center>
                        <div class="pre-scrollable">
                            <table class="table table-hover">
                                <tbody>
								<!--foreach-->
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
                Municipios registrados en el sistema
                <button type="button" class="widget-header-btn" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="authUser('Editar Municipios', 3);">
                    <i class="font-icon font-icon-pencil"></i>
                </button>
            </header>
            <div class="tab-content widget-tabs-content">
                <div class="tab-pane active" id="w-3-tab-1" role="tabpanel">
                  <center>
                        <div class="pre-scrollable">
                            <table class="table table-hover">
                                <tbody>
									<!--foreach-->
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
                Becas Solicitadas en el sistema
                <button type="button" class="widget-header-btn" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="authUser('Editar Becas', 4);">
                    <i class="font-icon font-icon-pencil"></i>
                </button>
            </header>
            <div class="tab-content widget-tabs-content">
                <div class="tab-pane active" id="w-4-tab-1" role="tabpanel">
                    <center>
                        <div class="pre-scrollable">
                            <table class="table table-hover">
                                <tbody>
									<!--foreach-->
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
                Transportes registrados en el sistema
                <button type="button" class="widget-header-btn" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="authUser('Editar Transportes', 5);">
                    <i class="font-icon font-icon-pencil"></i>
                </button>
            </header>
            <div class="tab-content widget-tabs-content">
                <div class="tab-pane active" id="w-5-tab-1" role="tabpanel">
                   <center>
                        <div class="pre-scrollable">
                            <table class="table table-hover">
                                <tbody>
										<!--foreach-->
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
                Tipos de Casa registradas en el sistema
                <button type="button" class="widget-header-btn" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="authUser('Editar Casas', 6);">
                    <i class="font-icon font-icon-pencil"></i>
                </button>
            </header>
            <div class="tab-content widget-tabs-content">
                <div class="tab-pane active" id="w-6-tab-1" role="tabpanel">
                    <center>
                        <div class="pre-scrollable">
                            <table class="table table-hover">
                                <tbody>
									<!--foreach-->
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