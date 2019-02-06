@extends('Coord.coor.layout3')
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

<div class="container-fluid">

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
		    <div>Coordinador <font FACE="raro, courier" SIZE=3 COLOR="red">{{$taller->usuario}}</font></div>
		    @endunless

		    <div class="widget-user-stat hidden-md-down">
		        <div class="item">
		            <div class="number">{{count($inscripcion)}}</div>
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
                <div class="item">
                    <div class="number">{{$fechaI}}</div>
                    <div class="caption">Inicia</div>
                </div>

                <div class="item">
                    <div class="number">{{$fechaF}}</div>
                    <div class="caption">Termina</div>
                </div>

                @unless($taller->dias == null)
                <div class="item hidden-md-down">
                    <div class="number">{{$taller->duracion}} hrs</div>
                    <div class="caption">Duracion total</div>
                </div>
                @endunless
            </div>

            <div class="widget-user-stat">
                @unless($taller->status == null)
                </br>
                    <div class="number">
                        @if($t == 1)
                            Inactivo
                        @elseif($t == 2)
                            Activo
                        @elseif($t == 3)
                            Suspendido temporalmente
                        @elseif($t == 4)
                            Sin Coordinador
                        @endif
                    </div>
                    <div class="caption">Estatus</div>
                @endunless
            </div>
		    <div class="widget-user-stat">
		        @unless($taller->descripcion == null)
		            <div class="number">{{$taller->descripcion}}</div>
		            <div class="caption">Descripción</div>
		        @endunless
		    </div>
		</section>
        @include('alerts.formError')
        @include('alerts.sessionAlert')
        <section class="card">
            <div class="card-block">
                    <div class="row text-center">
                            <tr>
                                <th>
                                    <a href="{{asset('/coord/taller/')}}/{{$taller->id}}/studio/list" class="btn btn-rounded btn-inline btn-success">Tomar asistencia</a>
                                </th>
                                <th>
                                    <a href="{{asset('/coord')}}" class="btn btn-rounded btn-primary btn-inline">Regresar</a>
                                </th>
                            </tr>
                    </div>
            </div>
        </section>
		<section class="widget widget-accordion card" id="accordion" role="tablist" aria-multiselectable="true">
                <article class="panel">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                            Lista total de registros, registros: {{count($inscripcion)}}
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
                                    <th>Institución</th>
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
                                        <span class="tabledit-span"><font FACE="raro, courier" SIZE=2 COLOR="black">{{$i->usuario}}</font></span>
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
