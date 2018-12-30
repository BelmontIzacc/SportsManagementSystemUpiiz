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
				                <img src="{{asset('/Template/img/circular.svg')}}" alt="" style="height:60px;width:auto;" id="modalMessagePhoto" class="round">
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