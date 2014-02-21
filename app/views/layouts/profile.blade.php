<!DOCTYPE html>

<html lang="nl-NL">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Digitus Marketing | @yield('title')</title>
	{{ HTML::style('packages/bootstrap/css/bootstrap.css') }}
	{{ HTML::style('css/main.css') }}
</head>
<body>

	<div class="navbar navbar-fixed-top navbar-default row">
		<div class="navbar-inner">
			<div class="container">
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav pull-left">
						<li class="navbar-brand">Digitus Test</li>
						<li></span>{{ HTML::link('', 'Home') }}</li>
					</ul>
					<ul class="nav navbar-nav pull-right">
						@if(!Auth::check())
							<li>{{ HTML::link('register', 'Register') }}</li>
							<li>{{ HTML::link('login', 'Login') }}</li>
						@else
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<span class="glyphicon glyphicon-user"></span>  
									{{ Auth::user()->email }} <span class="caret"></span>
								</a>
								<ul class="dropdown-menu">
									<li>
										{{ HTML::link('dashboard', 'Dashboard')}}
									</li>
									<li>
										{{ HTML::link('user/messages', 'Messages')}}
									</li>
									<li>
										{{ HTML::link('user/settings', 'Account Settings') }}
									</li>
									<li>
										{{ HTML::link('user/plan', 'Change Plan') }}
									</li>
									<li>{{ HTML::link('logout', 'Logout') }}</li>

								</ul></li>
						@endif
					</ul>
				</div>
			</div>
		</div>
	</div>

	@if(Session::has('message'))
		<div class="container">
			<p class="alert">{{ Session::get('message') }}</p>
		</div>
	@endif

	
	<div id="sidebar">
		@yield('sidebar')
	</div>

	<div id="content">
		@yield('content')
	</div>

	{{ HTML::script('js/jquery-2.1.0.min.js') }}
	{{ HTML::script('js/main.js') }}
	{{ HTML::script('packages/bootstrap/js/bootstrap.min.js') }}

</body>
</html>