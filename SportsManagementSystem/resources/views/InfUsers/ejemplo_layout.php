<!DOCTYPE html>
<html>
<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	@yield('title')

	@yield('css')

	<link href="{{asset('/Template/img/favicon.144x144.png')}}" rel="apple-touch-icon" type="/image/png" sizes="144x144">
	<link href="{{asset('/Template/img/favicon.114x114.png')}}" rel="apple-touch-icon" type="/image/png" sizes="114x114">
	<link href="{{asset('/Template/img/favicon.72x72.png')}}" rel="apple-touch-icon" type="/image/png" sizes="72x72">
	<link href="{{asset('/Template/img/favicon.57x57.png')}}" rel="apple-touch-icon" type="/image/png">
	<link href="{{asset('/Template/img/favicon.png')}}" rel="icon" type="image/png">
	<link href="{{asset('/Template/img/favicon.ico')}}" rel="shortcut icon">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

    <link rel="stylesheet" href="{{asset('/Template/css/lib/font-awesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/Template/css/main.css')}}">
</head>

<body class="horizontal-navigation">
@yield('popUp')

<div class="modal fade"
        id="modalMessage"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modalMessageLabel"
        aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            	<div class="row">
            		<div class="col-lg-1 col-md-1">
				    	<div class="tbl-cell tbl-cell-photo">
				            <a >
				                <img src="{{asset('/Template/img/avatar.svg')}}" alt="" style="height:50px;width:auto;" id="modalMessagePhoto" class="round">
				            </a>
				        </div>
		            </div>
		            <div class="col-lg-11 col-md-11">
		            	<h4 class="modal-title" id="modalMessageLabel"></h4>
               			 <p class="color-blue-grey-lighter" id="modalMessageUser"> </p>
		            </div>
                </div>
                <button type="button" class="modal-close" data-dismiss="modal" aria-label="Close">
                    <i class="font-icon-close-2"></i>
                </button>
            </div>
            <div class="modal-body" id="modalMessageBody"></div>
            <div class="modal-footer">
                <p class="color-blue-grey-lighter" id="modalMessageDate"> </p>
            </div>
        </div>
    </div>
</div><!--.modal-->

@unless($index==4) <!--= No se muestra la cabecera-->
    <header class="site-header">
	    <div class="container-fluid">
	        <a class="site-logo">
	            <img class="hidden-md-down" src="{{asset('/Template/img/logo upiiz estilo ipn_small2.png')}}" alt="">
	            <img class="hidden-lg-up" src="{{asset('/Template/img/logo upiiz estilo ipn_small3.png')}}" alt="">
	        </a>

	        <button class="hamburger hamburger--htla">
	            <span>toggle menu</span>
	        </button>

	        <div  class="site-header-content">

	            <div class="site-header-content-in">
	                <div class="site-header-shown">

	                    <a class="site-logo">
                            <img class="hidden-md-down" src="{{asset('/Template/img/escudo ipn negro_small.png')}}" alt="">
                        </a>

	                </div><!--.site-header-shown-->

	                <span class="lbl hidden-md-down" style="font-size:25px;margin: 0 0 10px -150px;">Upiiz</span>

	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->

	<div class="mobile-menu-left-overlay" ></div> <!--=Index en este caso solo sirve para el estilo CSS-->
	<ul class="main-nav nav nav-inline">
		<li class="nav-item">
			<a class="nav-link @if($index==1)active @endif" href="{{asset('/')}}">Inicio</a>
		</li>
		<li class="nav-item">
			<a class="nav-link @if($index==2)active @endif" href="{{asset('/news')}}">Novedades</a>
		</li>
		<li class="nav-item">
			<a class="nav-link @if($index==3)active @endif" href="{{asset('/contact')}}">Contactanos</a>
		</li>
        <li class="nav-item">
			<a class="nav-link @if($index==6)active @endif" href="{{asset('/tutorials')}}">Tutoriales</a>
		</li>
        <li class="nav-item">
			<a class="nav-link @if($index==9)active @endif" href="{{asset('/maps')}}">lista de clinicas IMSS</a>
		</li>
		<li class="nav-item">
			<a class="nav-link @if($index==12)active @endif" href="{{asset('/credits')}}">Creditos</a>
		</li>
		@if(Auth::check())
        <li class="nav-item">
			<a class="nav-link @if($index==7)active @endif" href="{{asset('/forms')}}">Formularios</a>
		</li>
		<!--<li class="nav-item">
			<a class="nav-link @if($index==8)active @endif" href="/lifeInsurance">Seguro de vida</a>
		</li>-->
		@else
		<li class="nav-item">
			<a class="nav-link @if($index==5)active @endif" href="{{asset('/login')}}">Iniciar sesión</a>
		</li>
		@endif
	</ul>

	<div class="page-content">
		<div class="container-fluid">
            @include('alerts.sessionAlert')
            @include('alerts.formError')
            @include('alerts.sessionMessages')
            <h3 class="with-border text-center">@yield('subHead')</h3>
            @yield('content')
		</div><!--.container-fluid-->
	</div><!--.page-content-->
@endunless

	<script src="{{asset('/Template/js/lib/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('/Template/js/lib/tether/tether.min.js')}}"></script>
	<script src="{{asset('/Template/js/lib/bootstrap/bootstrap.min.js')}}"></script>
	<script src="{{asset('/Template/js/plugins.js')}}"></script>

	@yield('scripts')

    <script src="{{asset('/Template/js/app.js')}}"></script>

	<script>
		function updateModalMessage(user, date,  title, content, photo){
			document.getElementById('modalMessageLabel').innerHTML = title;
			document.getElementById('modalMessageBody').innerHTML = content;
			document.getElementById('modalMessageDate').innerHTML = date;
			document.getElementById('modalMessageUser').innerHTML = 'Autor: '+user;
			document.getElementById('modalMessagePhoto').setAttribute('src', photo);
			$('#modalMessage').modal('show');
		}
	</script>
</body>
</html>
