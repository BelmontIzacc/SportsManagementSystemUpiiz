@extends('Coord.coor.layout')
<?php
  $classSizeForms = "col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2";
?>

@section('title')
<title>Inicio Servicio Coordinador</title>
@stop

@section('css')
<link rel="stylesheet" href="{{asset('/Template/css/lib/bootstrap-sweetalert/sweetalert.css')}}"/>
<link rel="stylesheet" href="{{asset('/Template/css/lib/clockpicker/bootstrap-clockpicker.min.css')}}"/>

@stop
@section('popUp')
@stop
@section('subHead')
Talleres a Impartir
@stop
@section('content')
<div class="container-fluid" >
			<section class="box-typical box-typical-full-height-with-header">
		@foreach($taller as $t)
		<?php
			$i = 0;
			$num = rand ( 1 , 25 );
			$i = $i +1;   
			$url = '/Template/img/Stickmen/StickmenSVG/sports2(	'.$num.').svg';  ?>
		<div class="gallery-col col-md-3">
			<article class="gallery-item" style="height: 188px; width:auto;">
				<font size=4><p style="color:#1B38E3";>{{$t->nombre}}</p></font>
				<img class="gallery-picture" src="{{asset($url)}}" alt="" height="188" >
				<div class="gallery-hover-layout">
					<div class="gallery-hover-layout-in">
						<p class="gallery-item-title">{{$t->nombre}}</p>
						<p>{{$t->usuario}}</p>
						<div class="btn-group">
							<a class="btn" href="{{asset('/coord/taller/')}}/{{$t->id}}">
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


{!!Form::open(array('method'=>'post', 'id'=>'forms'))!!}
	<input type="hidden" id="stats" name="stats"></input>
{!!Form::close()!!}

@stop
@section('scripts')


    <script type="text/javascript">
        var array = [];
        function getValue() {
           var isChecked = document.getElementById('check-toggle-1').checked;
           var the_value = isChecked ? 1 : 0;
           //alert('status :'+the_value);
           document.getElementById('stats').value = the_value;
           document.getElementById("forms").submit();
        }
    </script>

    <script src="{{asset('/Template/js/custom/search.js')}}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

@stop
