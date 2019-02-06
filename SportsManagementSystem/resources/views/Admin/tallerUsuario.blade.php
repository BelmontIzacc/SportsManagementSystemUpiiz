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
                <h4 class="modal-title" id="windowTitle">Funciones Especiales</h4>
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

<div class="container-fluid">

@include('alerts.formError')
@include('alerts.sessionAlert')

<div class="row">
    <div class="container-fluid">
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
        <section class="card">
            <div class="card-block">
                    <div class="row text-center">
                            <tr>
                                <th>
                                    <button type="button" class="btn btn-rounded btn-inline btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm">Funciones especiales</button>
                                </th>
                                <th>
                                    <a href="{{asset('/admin/student/')}}/{{$taller->id}}/studio/list" class="btn btn-rounded btn-inline btn-success">Listas de asistencia</a>
                                </th>
                                @unless($taller->usuario == null)
                                    <th>
                                        <a href="{{asset('/admin/lists/')}}/{{$taller->usuario->informacion->id}}" class="btn btn-rounded btn-primary btn-inline">Regresar</a>
                                    </th>
                                @endunless
                                @unless($taller->usuario != null)
                                    <th>
                                        <a href="{{asset('/admin')}}" class="btn btn-rounded btn-primary btn-inline">Regresar</a>
                                    </th>
                                @endunless
                                <th>
                                    <a href="{{asset('/admin/student/')}}/{{$taller->id}}/studio/add/User" class="btn btn-rounded btn-inline btn-secondary">Agregar usuarios al taller</a>
                                </th>
                                <th>
                                    <a href="{{asset('/admin/student/')}}/{{$taller->id}}/studio/delete/User" class="btn btn-rounded btn-inline btn-info">Eliminar usuarios del taller</a>
                                </th>
                            </tr>
                    </div>
            </div>
        </section>
		<section class="widget widget-accordion card" id="accordion" role="tablist" aria-multiselectable="true">
                <article class="panel">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                            Lista total de registros, registros: {{$total}}
                            <i class="font-icon font-icon-arrow-down"></i>
                        </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                        <div class="panel-collapse-in">
                        <table id="table-edit" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th width="1">
                                        #
                                    </th>
                                    <th>Nombre</th>
                                    <th>Sexo</th>
                                    <th>Boleta</th>
                                    <th>Carrera</th>
                                    <th>Semestre</th>
                                    <th>Institucion</th>
                                    <th>Asistencias</th>
                                    <th>Faltas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $num=0; $index=-1; ?>
                                @foreach($inscripcion as $i)
                                <tr id="$i->usuario->id">
                                    <td>
                                        <span class="tabledit-span tabledit-identifier"><?php echo $num=$num+1; ?></span>
                                        <input class="tabledit-input tabledit-identifier" type="hidden" name="id" value="1" disabled="">
                                    </td>
                                    <td class="tabledit-view-mode">
                                        <span class="tabledit-span"><a href="{{asset('/admin/lists')}}/{{$i->usuario->informacion->id}}" class="semibold">{{$i->usuario}}</a></span>
                                    </td>
                                    <td class="table-icon-cell">
                                        	@if($i->usuario->informacion->sexo == 0)
                    	 						Masculino
						                   	@else
						                   		Femenino
						                    @endif
                                        </a></span>
                                    </td>
                                    <td class="color-blue-grey-lighter tabledit-view-mode">
                                        <span class="tabledit-span">{{$i->usuario->boleta}}</span>
                                    </td>
                                    <td class="table-icon-cell">{{$i->usuario->informacion->carrera->nombre}}</td>
                                    <td class="table-icon-cell">{{$i->usuario->informacion->semestre}}</td>
                                    <td class="table-icon-cell">{{$i->usuario->informacion->institucion->nombre}}</td>
                                    <?php $index=$index+1; ?>
                                    <td class="table-icon-cell">{{$asistencia[$index]}}</td>
                                    <td class="table-icon-cell">{{$faltas[$index]}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </div>
                    </div>
                </article>
        </section>
        <section class="card">
            <header class="card-header"> </header>
            <div class="card-block">
                <div id="perf_div"></div>
                <?= Lava::render('ColumnChart', 'Finances', 'perf_div') ?>
            </div>
        </section>
        <section class="card">
            <header class="card-header"> </header>
            <div class="card-block">
                <div id="chart-div"></div>
                <?= Lava::render('DonutChart', 'IMDB', 'chart-div') ?>
            </div>
        </section>
        <section class="card">
            <header class="card-header"> </header>
            <div class="card-block">
                <div id="chart-div1"></div>
                <?= Lava::render('DonutChart', 'carrera', 'chart-div1') ?>
            </div>
        </section>
        <section class="card">
            <header class="card-header"> </header>
            <div class="card-block">
                <div id="chart-div2"></div>
                <?= Lava::render('DonutChart', 'INS', 'chart-div2') ?>
            </div>
        </section>
    </div>
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
