@extends('Admin.layout')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
?>
<?php $num=0; ?>
@section('title')
<title>Lista de registros de usuarios</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>
@stop
@section('popUp')
@stop
@section('subHead')

@stop
@section('content')

<div class="container-fluid">
        <section class="card">
            <div class="card-block">
	            <div class="row text-center">
					<a href="{{asset('/admin/controlPanel')}}" class="btn btn-rounded btn-inline btn-secondary">Regresar</a>
				</div>
			</div>
		</section>
	<section class="box-typical">
			<table id="table-edit" class="table table-bordered table-hover">
				<thead>
				<tr>
					<th width="1">
						#
					</th>
					<th>Boleta</th>
					<th>Nombre</th>
					<th>Carrera\Bachiller</th>
					<th>Semestre</th>
					<th>Grupo</th>
					<th>Tipo</th>
					<th>Estatus</th>
				</tr>
				</thead>
				<?php $num = 1; ?>
				<?php $var = count($user); ?>
				<tbody>
					@if( $var == 0)
						<tr id="0">
							<td>
								<span class="tabledit-span tabledit-identifier"></span>
							</td>
							<td class="tabledit-view-mode">
								<span class="tabledit-span"></span>
							</td>
							<td class="color-blue-grey-lighter tabledit-view-mode">
								<span class="tabledit-span"></span>
							</td>
							<td class="color-blue-grey-lighter tabledit-view-mode">
								<span class="tabledit-span">No hay alumnos con documentación completa</span>
							</td>
							<td class="table-date"></td>
							<td class="table-date"></td>
							<td class="color-blue-grey-lighter tabledit-view-mode">

							</td>
							<td class="color-blue-grey-lighter tabledit-view-mode">
	                            
							</td>
	                    </tr>
					@else
						@foreach($user as $u)
						<tr id="{{$u->id}}">
							<td>
								<span class="tabledit-span tabledit-identifier"> <?php echo $num; $num = $num +1; ?> </span>
							</td>
							<td class="tabledit-view-mode">
								<span class="tabledit-span"><a href="{{asset('/admin/lists')}}/{{$u->informacion->id}}" class="semibold">{{$u->boleta}}</a></span>
							</td>
							<td class="color-blue-grey-lighter tabledit-view-mode">
								<span class="tabledit-span">{{$u}}</span>
							</td>
							<td class="color-blue-grey-lighter tabledit-view-mode">
								<span class="tabledit-span">{{$u->informacion->carrera->nombre}}</span>
							</td>
							<td class="table-date">{{$u->informacion->semestre}}</td>
							<td class="table-date">{{$u->informacion->grupo}}</td>
							<td class="color-blue-grey-lighter tabledit-view-mode">
	                            @if($u->tipo == 3)
	                            	<span class="tabledit-span">Coordinador</span>
	                            @elseif($u->tipo == 2)
	                                <span class="tabledit-span">Usuario</span>       
	                            @endif
							</td>
							<td class="color-blue-grey-lighter tabledit-view-mode">
	                            @if($u->completado == 1)
	                            	<span class="tabledit-span">Completo</span>
	                            @elseif($u->completado == 0)
	                                <span class="tabledit-span">Incompleto</span>
	                            @endif
							</td>
	                    </tr>
						@endforeach
					@endif
				</tbody>
				<div style="text-align: center;">
					{!!with(new App\Pagination\HDPresenter($user))->render()!!}
				</div>
			</table>
			
	</section><!--.box-typical-->
</div>

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