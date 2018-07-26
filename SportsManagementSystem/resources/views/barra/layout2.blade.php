<!DOCTYPE html>
<html>
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

    @yield('css')
</head>

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
				                <img src="{{asset('/Template/img/circular.svg')}}" alt="" style="height:100px;width:auto;" id="modalMessagePhoto" class="round">
				            </a>
				        </div>
		            </div
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

    @unless($index == 4)

   <header class="site-header">
	    <div class="container-fluid">
	        <div class="site-header-content">
	            <div class="site-header-content-in">

	  <span class="lbl hidden-md-down" style="font-size:25px;margin: 0 0 10px 0px;">{{config('globalInfo.nombreUpiiz')}}</span>
      <span class="lbl hidden-lg-up" style="font-size:25px">{{config('globalInfo.nombreUpiiz2')}}</span>

	                <div class="site-header-shown">	                    
	
	                    <div class="dropdown user-menu">
	                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	                            <img src="{{asset('/Template/img/circular.svg')}}" alt="">
	                        </button>
	                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
	                            <a class="dropdown-item" href="{{asset('/admin')}}"><span class="font-icon font-icon-list-square"></span>Inicio</a>
	                            <div class="dropdown-divider"></div>
	                            <a class="dropdown-item" href="{{asset('/logout')}}"><span class="font-icon glyphicon glyphicon-log-out"></span>Cerrar sesión</a>
	                        </div>
	                    </div>
	                </div><!--.site-header-shown-->
	            </div><!--site-header-content-in-->
	        </div><!--.site-header-content-->
	    </div><!--.container-fluid-->
	</header>
	        


	<div class="page-content">
		<div class="container-fluid">
            @include('alerts.sessionAlert')
            @include('alerts.formError')
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


</html>
