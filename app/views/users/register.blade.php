@section('title')
	Register
@stop

@section('content')
{{ Form::open( array('url'=>'users/create','class'=>'form-signup')) }}
	<h2 class="form-signup-heading">Please Register</h2>

	<ul>
		@foreach($errors->all() as $error)
	    	<li>{{ $error }}</li>
	    @endforeach
	</ul>
	{{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username..')) }}
	{{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First name..')) }}
	{{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last name..')) }}
	{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'E-mail address..')) }}
	{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password..')) }}
	{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Password confirmation..')) }}

	{{ Form::submit('Register', array('class'=>'btn btn-lg btn-primary btn-block')) }}

{{ Form::close() }}
@stop