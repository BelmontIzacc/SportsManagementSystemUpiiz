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
@section('subHead')
Talleres Registrados
@stop
@section('content')
<!--

-->


<div class="container-fluid">
			<section class="box-typical box-typical-full-height-with-header">
		@foreach($taller as $t)
		<!--<div class="col-md-2">
			<div class="row">
				<div class="col-xs-12">
					<section class="widget widget-simple-sm-fill green">
						<div class="widget-simple-sm-icon">
							<i class="font-icon font-icon-facebook"></i>
						</div>
						<div class="widget-simple-sm-fill-caption"><a href="{{asset('/admin/lists/taller/')}}/{{$t->id}}" class="semibold">{{$t->nombre}}</a></div>
					</section>
				</div>
			</div>
		</div>-->


		<div class="gallery-col col-md-3">
			<article class="gallery-item" style="height: 188px; width:auto;">
				<img class="gallery-picture" src="{{asset('/Template/img/Stickmen/StickmenSVG/sports2(
					6
				).svg')}}" alt="" height="188" >
				<div class="gallery-hover-layout">
					<div class="gallery-hover-layout-in">
						<p class="gallery-item-title">{{$t->nombre}}</p>
						<p>{{$t->usuario}}</p>
						<div class="btn-group">
							<a class="btn" href="{{asset('/admin/lists/taller/')}}/{{$t->id}}">
								<i class="font-icon font-icon-eye"></i>
							</a>
						</div>
						<p>{{$t->tipo->nombre}}</p>
					</div>
				</div>
			</article>
		</div><!--.gallery-col-->

		@endforeach
			</section><!--.box-typical-->
		</div>

@stop
@section('scripts')

    <script src="{{asset('/Template/js/custom/search.js')}}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

@stop