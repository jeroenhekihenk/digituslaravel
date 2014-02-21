@section('title')
	Login
@stop
@section('content')
{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
	<h2 class="form-signin-heading">Please Login</h2>

	{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'E-mail Address..')) }}
	{{ Form::password('password', array('class'=>'form-control','placeholder'=>'Password..')) }}

	{{ Form::submit('Login', array('class'=>'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}
@stop