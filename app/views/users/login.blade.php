@section('title')
	Login
@stop
@section('content')
{{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
	<ul>
		@foreach($errors->all() as $error)
	    	<li>{{ $error }}</li>
	    @endforeach
	</ul>
	<h2 class="form-signin-heading">Please Login</h2>

	{{ Form::text('email_or_username', null, array('class'=>'form-control', 'placeholder'=>'Please login with your email or username')) }}
	{{ Form::password('password', array('class'=>'form-control','placeholder'=>'Password..')) }}

	<div class="checkbox-form">
		<label>
	{{ Form::checkbox('remember', 'Stay signed in', true, array('id'=>'remember')) }} Stay signed in
		</label>
	</div>
	{{ Form::submit('Login', array('class'=>'btn btn-lg btn-primary btn-block')) }}
{{ Form::close() }}
@stop