<!DOCTYPE html>
<html>
<html class="" style="overflow: auto;">

<head lang="en">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	
	@yield('title')
	
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
	
	<style type="text/css">.fancybox-margin{margin-right:0px;}</style>
	@yield('css')
</head>
@yield('popUp')

<body class="with-side-menu" style="">

 @unless($index == 4)
	<header class="site-header">
	    <div class="container-fluid">
	        <a href="{{asset('/admin')}}" class="site-logo">
	            <img class="hidden-md-down" src="{{asset('/Template/img/Stickmen/LogoSRDpng2.png')}}" alt="" style="height:60px;width:auto;">
	            <img class="hidden-lg-up" src="{{asset('/Template/img/Stickmen/LogoSRDpng2.png')}}" alt="" >
	        </a>
	        <button class="hamburger hamburger--htla">
	            <span>toggle menu</span>
	        </button>
	        <div class="site-header-content">
	            <div class="site-header-content-in">
	            @if(Auth::check())
	                <div class="site-header-shown">
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                        	<a href="{{asset('/admin')}}">
	                            <img src="{{asset('/Template/img/Stickmen/LogoDeporte.png')}}" alt="" style="height:40px;width:auto;">
	                            </a>
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="{{asset('/admin/profile')}}"><span class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="{{asset('/admin')}}"><span class="font-icon font-icon-home"></span>Home</a>
	                            <a class="dropdown-item" href="{{asset('/Credits')}}"><span class="font-icon font-icon-heart"></span>Creditos</a>
	                            <div class="dropdown-divider"></div>	                            
	                            <a class="dropdown-item" href="{{asset('/logout')}}"><span class="font-icon glyphicon glyphicon-log-out"></span>Logout</a>
	                        </div>
	                    </div>
	
	                </div><!--.site-header-shown-->
				@endif
	                <div class="mobile-menu-right-overlay"></div>
	                <div class="site-header-collapsed">
	                    <div class="site-header-collapsed-in">
	                        <div class="dropdown dropdown-typical">
	                            <div class="dropdown-menu" aria-labelledby="dd-header-sales">
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
	                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
	                            </div>
	                        </div>
	                    </div><!--.site-header-collapsed-in-->
	                </div><!--.site-header-collapsed-->
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header><!--.site-header-->

	<div class="mobile-menu-left-overlay"></div>
	<nav class="side-menu">
	    <div class="side-menu-avatar">
	        <div class="avatar-preview avatar-preview-100">
	        	<a href="{{asset('/admin')}}">
	            <img src="{{asset('/Template/img/Stickmen/LogoDeporte.png')}}" alt="" style="height:130px;width:auto;">
	            </a>
	        </div>
	    </div>
	</br>
	    <ul class="side-menu-list">
	        <li>
                <span class="lbl">{{$userI}}</span>
	        </li>
	        <li>
                <span class="lbl">{{$userI->boleta}}</span>
	        </li>
	        <li class="blue">
	            <a href="{{asset('/admin/registerCoord')}}">
	                <i class="font-icon font-icon-user"></i>
	                <span class="lbl">Registrar un Nuevo Coordinador</span>
	            </a>
	        </li>
	        <li class="brown">
	            <a href="{{asset('/admin/registerStudio')}}">
	                <i class="font-icon font-icon-award"></i>
	                <span class="lbl">Registrar un Taller</span>
	            </a>
	        </li>
	        <li class="red">
	            <a href="{{asset('/admin/search')}}">
	                <i class="font-icon font-icon-search"></i>
	                <span class="lbl">Buscar</span>
	            </a>
	        </li>
	        <li class="black">
	            <a href="{{asset('/admin/controlPanel')}}">
	                <i class="font-icon font-icon-users"></i>
	                <span class="lbl">Panel de control</span>
	            </a>
	        </li>  
	        <li class="grey">
	            <a href="{{asset('/admin/Register/userList')}}">
	                <i class="font-icon font-icon-list-square"></i>
	                <span class="lbl">Usuarios registrados</span>
	            </a>
	        </li>      
	    </ul>
	</nav><!--.side-menu-->

	<div class="page-content">
		<div class="container-fluid">
            @include('alerts.sessionAlert')
            @include('alerts.formError')
            <h3 class="with-border text-center">@yield('subHead')</h3>
            @yield('content')
		</div><!--.container-fluid-->
	</div><!--.page-content-->

	@endunless

	<script src="{{asset('/Template/js/lib/tether/tether.min.js')}}"></script>
	<script src="{{asset('/Template/js/lib/jquery/jquery.min.js')}}"></script>
	<script src="{{asset('/Template/js/lib/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{asset('/Template/js/app.js')}}"></script>

	@yield('scripts')

    <script src="{{asset('/Template/js/app.js')}}"></script>

<div class="responsive-bootstrap-toolkit"><div class="device-xs visible-xs visible-xs-block"></div><div class="device-sm visible-sm visible-sm-block"></div><div class="device-md visible-md visible-md-block"></div><div class="device-lg visible-lg visible-lg-block"></div></div></body>

</html>