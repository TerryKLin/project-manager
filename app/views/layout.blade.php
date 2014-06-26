<!DOCTYPE html>
<html>
	<head>
		<title>Project Manager - @yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS are placed here -->
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/navbar-fixed-top.css') }}

	</head>

	<body>
		<!-- Fixed Navbar -->
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">Project Manager</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#about">About</a></li>
						<li><a href="#contact">Contact</a></li>
					</ul>

					<!-- User information when logged in -->
					@if ( Auth::check() )
						<ul class="nav navbar-nav navbar-right">
							<li><a href="#">{{ Auth::user()->name }}</a></li>
						</ul>
					@endif
				</div><!--/.nav-collapse -->
			</div>
		</div>

		<!-- Container -->
		<div class="container">
			<!-- Warning -->
			@foreach ($errors->all() as $error)
				<div class="alert alert-danger">{{ $error }}</div>
			@endforeach

			<!-- Messages -->
			@foreach ($messages->all() as $message)
				<div class="alert alert-info">{{ $message }}</div>
			@endforeach

			<!-- Content -->
			@yield('content')

		</div>

		<!-- Scripts are placed here -->
		{{ HTML::script('js/jquery-1.11.1.min.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}

	</body>
</html>