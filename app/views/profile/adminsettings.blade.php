@section('title')
	Profile of {{ Auth::user()->username }}
@stop

@section('sidebar')
@stop

@section('content')
<div class="row container" style="margin:0 auto;">
	<div class="col-md-10 col-sm-10 col-xs-10 col-lg-10">

		<ul>
			@foreach($errors->all() as $error)
			   	<li>{{ $error }}</li>
			@endforeach
		</ul>

		<div class="panel panel-default">
			
			<div class="panel-heading"><h3 style="margin:0;">Users<button id="addNewUser" type="button" class="btn btn-success btn-xs form-control-feedback pull-right">
				<span class="glyphicon glyphicon-plus"></span> 
				Add user
			</button></h3></div>
			<div class="panel-body">
				
				@if($users->count())
					<table class="table table-hover">
						<tr class="active">
							<td><b>Id</b></td>
							<td><b>Username</b></td>
							<td><b>Firstname</b></td>
							<td><b>Lastname</b></td>
							<td><b>Emailaddress</b></td>
							<td><b>Created at</b></td>
							<td><b>Last updated at</b></td>
						</tr>
						@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->username }}</td>
								<td>{{ $user->firstname }}</td>
								<td>{{ $user->lastname }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->created_at }}</td>
								<td>{{ $user->updated_at }}</td>
							</tr>
						@endforeach
					</table>
					@else
					There are no users
					@endif

					@stop
				<table class="table-condensed" id="new">
					{{ Form::open(array('action'=>'UserProfileController@updateName', 'method'=>'PUT', 'id'=>'editName')) }}
					<tr><td><b>Username:</b></td><td>{{ Form::text('username', Auth::user()->username , array('class'=>'form-control')) }}</td></tr>
					<tr><td><b>Firstname:</b></td><td>{{ Form::text('firstname', Auth::user()->firstname, array('class'=>'form-control')) }}</td></tr>
					<tr><td><b>Lastname:</b></td><td>{{ Form::text('lastname', Auth::user()->lastname, array('class'=>'form-control')) }}</td></tr>
					{{ Form::close() }}
				</table>
			</div>
		</div>
		
	</div>
</div>
@stop

@section('overlay')
	<div class="addnewuser">
		{{ Form::open( array('action'=>'UserProfileController@newUser' ,'class'=>'form-signup form-absolute')) }}
			<h2 class="form-signup-heading">Please Register</h2>

			
			{{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Username..')) }}
			{{ Form::text('firstname', null, array('class'=>'form-control', 'placeholder'=>'First name..')) }}
			{{ Form::text('lastname', null, array('class'=>'form-control', 'placeholder'=>'Last name..')) }}
			{{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'E-mail address..')) }}
			{{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password..')) }}
			{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Password confirmation..')) }}

			{{ Form::submit('Register user', array('class'=>'btn btn-lg btn-success btn-block')) }}

		{{ Form::close() }}
	</div>
@stop