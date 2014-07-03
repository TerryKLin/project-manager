<!DOCTYPE html>
<html>
	<head>
		<title>Project Manager - @yield('title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- CSS are placed here -->
		{{ HTML::style('css/bootstrap.min.css') }}
		{{ HTML::style('css/navbar-fixed-top.css') }}

		<!-- Scripts are placed here -->
		{{ HTML::script('js/jquery-1.11.1.min.js') }}
		{{ HTML::script('js/bootstrap.min.js') }}

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
					<a class="navbar-brand" href="{{ route('home') }}">Project Manager</a>
				</div>
				<div class="navbar-collapse collapse">
					@if ( Auth::check() )
					<ul class="nav navbar-nav">
						<li><a href="{{ route('projects') }}">Projects</a></li>
						<li><a href="{{ route('projects.votes.index') }}">Votes</a></li>
					</ul>

					<!-- User information when logged in -->
						<ul class="nav navbar-nav navbar-right">
							 <li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ Auth::user()->name() }}</a>
								<ul class="dropdown-menu">
									<li><a href="{{ route('logout') }}">Logout</a></li>
								</ul>
							</li>

						</ul>
					@endif
				</div><!--/.nav-collapse -->
			</div>
		</div>

		<!-- Container -->
		<div class="container">
			<div class="row">
				<!-- Warning -->
				@foreach ($errors->all() as $error)
					<div class="col-xs-12 alert alert-danger">{{ $error }}</div>
				@endforeach

				<!-- Messages -->
				@if (Session::has('message'))
					<div class="col-xs-12 alert alert-success">{{ Session::get('message') }}</div>
				@endif
			</div>

			<!-- Content -->
			@yield('content')

		</div>
	</body>
</html>