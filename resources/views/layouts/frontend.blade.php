<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Find easily a doctor and book online an appointment">
	<meta name="author" content="Ansonika">
	<title>Appointment</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- BASE CSS -->
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/style.css')}}" rel="stylesheet">
	<link href="{{asset('css/menu.css')}}" rel="stylesheet">
	<link href="{{asset('css/vendors.css')}}" rel="stylesheet">
	<link href="{{asset('css/icon_fonts/css/all_icons_min.css')}}" rel="stylesheet">
    @yield('css')
	<!-- YOUR CUSTOM CSS -->
	<link href="{{asset('css/custom.css')}}" rel="stylesheet">
</head>

<body>

	<div id="preloader" class="Fixed">
		<div data-loader="circle-side"></div>
	</div>
	<!-- /Preload-->

	<div id="page">
	<header class="header_sticky">
		<a href="#menu" class="btn_mobile">
			<div class="hamburger hamburger--spin" id="hamburger">
				<div class="hamburger-box">
					<div class="hamburger-inner"></div>
				</div>
			</div>
		</a>
		<!-- /btn_mobile-->
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div id="logo_home">
						<h1><a href="/" title="Findoctor">Findoctor</a></h1>
					</div>
				</div>
				<div class="col-lg-9 col-6">
					<ul id="top_access">
						<li><a href="/login"><i class="pe-7s-user"></i></a></li>
						<li><a href="/register"><i class="pe-7s-add-user"></i></a></li>
					</ul>
					<!-- /main-menu -->
				</div>
			</div>
		</div>
		<!-- /container -->
	</header>
	<!-- /header -->

	<main>
        @yield('content')
	</main>

	</div>
	<!-- page -->

	<div id="toTop"></div>
	<!-- Back to top button -->

	<!-- COMMON SCRIPTS -->
	<script src="{{asset('js/jquery-2.2.4.min.js')}}"></script>
	<script src="{{asset('js/common_scripts.min.js')}}"></script>
	<script src="{{asset('js/functions.js')}}"></script>
     @yield('js')
</body>

</html>
