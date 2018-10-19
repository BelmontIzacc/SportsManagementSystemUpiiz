@extends('Admin.layout')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
?>

@section('title')
<title>Inicio Servicio Admin</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>
@stop
@section('popUp')



@stop
@section('content')
<section class="widget widget-user">
    <div class="widget-user-bg" style="background-image: url('{{asset('/Template/img/backgroundUser.svg')}}')"></div>
    <div class="widget-user-photo">
        <img src="{{asset('/Template/img/avatar.svg')}}">
    </div>
    <div>
        {{$taller->nombre}}
        <i class="font-icon font-icon-award"></i>
    </div>
    @unless($taller->usuario_id == null)
    <div>{{$taller->usuario_id->nombre}}</div>
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
        @unless($taller->descripcion == null)
            <div class="number">{{$taller->descripcion}}</div>
            <div class="caption">Descripcion</div>
        @endunless
    </div>
</section>

<div class="box-typical box-typical-padding">
		
	<br/>

	<div class="row text-center">
		<div class="col-lg-4 col-md-4">
		    <button type="button" class="btn btn-rounded btn-inline btn-warning" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="">Estadisticas</button>
		</div>
        <div class="col-lg-4 col-md-4">
             <a class="btn btn-rounded btn-inline btn-success" target="_blank" onclick="Asistentes();">Participantes</a>
        </div>
	</div>
</div>

<div class="box-typical box-typical-padding">

 
    <div class="row" id="lista_asistentes" style="display:none">
        <div class="col-sm-12">
            <table id="example" class="display table table-striped table-bordered dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="example_info" style="width: 100%;">
                <thead>
					<tr role="row">   
                        <th class="sorting_asc" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 114px;">Nombre</th>
                            
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 62px;">Edad</th>      
                        
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 36px;">Sexo</th>
                            
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 36px;">Institución</th>
                            
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 80px;">Carrera/<br/>Bachiller</th>
                        
                        <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 80px;">Semestre</th>
                    </tr>
				</thead>
				<tbody>
					@foreach($inscripcion as $i)
					<tr role="row" class="odd">
						<td class="sorting_1">{{$i->usuario}}</td>
						<td>{{$i->usuario->informacion->edad}}</td>
						<td>@if($i->usuario->informacion->sexo==1)
                                Hombre
                            @else
                                Mujer
                            @endif</td>
						<td>{{$i->usuario->informacion->institucion->nombre}}</td>
						<td>{{$i->usuario->informacion->carrera->nombre}}</td>
						<td>{{$i->usuario->informacion->semestre}}</td>
					</tr>
                    @endforeach
                </tbody>
				</table>
        </div>
    </div>
</div> <!--End box typical-->

<!-- end profile -->
@stop
@section('scripts')

    <script src="{{asset('/Template/js/lib/bootstrap-sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{asset('/Template/js/custom/desabilitar.js')}}"></script>

    <script src="{{asset('/Template/js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/select2/select2.full.min.js')}}"></script>

    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker.min.js')}}"></script>
    <script src="{{asset('/Template/js/lib/clockpicker/bootstrap-clockpicker-init.js')}}"></script>
    <script src="{{asset('/Template/js/lib/daterangepicker/daterangepicker.js')}}"></script>

    <script src="{{asset('Template/js/custom/infTaller.js')}}"></script>

@stop