<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Mytrainr</title>

		<!-- Fonts -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

		<!-- Styles -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
		{{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

		<script src="https://code.jquery.com/jquery-3.1.0.js" integrity="sha256-slogkvB1K3VOkzAI8QITxV3VzpOnkeNVsKvtkYLMjfk=" crossorigin="anonymous"></script>

		<style>
			body {
				font-family: 'Lato';
			}

			.fa-btn {
				margin-right: 6px;
			}
		</style>
	</head>
	<body id="app-layout">
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">

					<!-- Collapsed Hamburger -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<!-- Branding Image -->
					<a class="navbar-brand" href="{{ url('/') }}">
						MyTrainr
					</a>
				</div>

				<div class="collapse navbar-collapse" id="app-navbar-collapse">
					<!-- Left Side Of Navbar -->
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/dashboard') }}"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a></li>
						@role('coach')
						<li><a href="{{ url('/groups') }}"><i class="fa fa-users" aria-hidden="true"></i> Groepen</a></li>
						<li><a href="{{ url('/trainings') }}"><i class="fa fa-book" aria-hidden="true"></i> Trainingen</a></li>
						<li><a href="{{ url('/videos') }}"><i class="fa fa-video-camera" aria-hidden="true"></i> Videos</a></li>
						<li><a href="{{ url('/analysis') }}"><i class="fa fa-line-chart" aria-hidden="true"></i> Analyses</a></li>
						@endrole
						@role('sporter')
						<li><a href="{{ url('/videos') }}">Videos</a></li>
						@endrole
						@role('club')
						<li><a href="{{ url('/locations') }}"><i class="fa fa-map-marker" aria-hidden="true"></i> Locaties</a></li>
						<li><a href="{{ url('/sports') }}"><i class="fa fa-futbol-o" aria-hidden="true"></i> Sporten</a></li>
						@endrole
					</ul>

					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
						<!-- Authentication Links -->
						@if (Auth::guest())
						<li><a href="{{ url('/login') }}">Inloggen</a></li>
						<li><a href="{{ url('/register') }}">Registreren</a></li>
						@else
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
								@if(isset(Auth::user()->roles[0]))
								{{ Auth::user()->name }} ({{Auth::user()->roles[0]->display_name}}) <span class="caret"></span>
								@endif
							</a>

							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Uitloggen</a></li>
							</ul>
						</li>
						@endif
					</ul>
				</div>
			</div>
		</nav>

		@yield('content')

		<!-- JavaScripts -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
	</body>
</html>
