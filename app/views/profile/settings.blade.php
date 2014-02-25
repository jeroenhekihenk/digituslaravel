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
			<div class="panel-heading"><h3 style="margin:0;">User				<button id="editName" type="button" data-target="edit-profile" class="btn btn-primary btn-xs form-control-feedback pull-right">
					<span class="glyphicon glyphicon-cog"></span> 
					Edit
				</button>
				
				<button id="cancelSaveMyName" type="button" data-target="edit-profile" class="btn btn-danger btn-xs form-control-feedback pull-right cancelMyName">
					<span class="glyphicon glyphicon-remove"></span>
					Cancel
				</button>
				<button id="saveMyName" type="button" data-target="edit-profile" class="btn btn-success btn-xs form-control-feedback pull-right saveMyName">
					<span class="glyphicon glyphicon-save"></span> 
					Save
				</button></h3> </div>
			<div class="panel-body">
				<table class="table-condensed" id="oldName">
					<tr><td><b>Username:</b></td><td>{{ Auth::user()->username }}</td></tr>
					<tr><td><b>Firstname:</b></td><td>{{ Auth::user()->firstname }}</td></tr>
					<tr><td><b>Lastname:</b></td><td>{{ Auth::user()->lastname }}</td></tr>
				</table>
				<table class="table-condensed" id="newName">
					{{ Form::open(array('action'=>'UserProfileController@updateName', 'method'=>'PUT', 'id'=>'editName')) }}
					<tr><td><b>Username:</b></td><td>{{ Form::text('username', Auth::user()->username , array('class'=>'form-control')) }}</td></tr>
					<tr><td><b>Firstname:</b></td><td>{{ Form::text('firstname', Auth::user()->firstname, array('class'=>'form-control')) }}</td></tr>
					<tr><td><b>Lastname:</b></td><td>{{ Form::text('lastname', Auth::user()->lastname, array('class'=>'form-control')) }}</td></tr>
					{{ Form::close() }}
				</table>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading"><h3 style="margin:0;">User description				<button id="editDesc" type="button" class="btn btn-primary btn-xs form-control-feedback pull-right">
					<span class="glyphicon glyphicon-cog"></span> 
					Edit
				</button>
				
				<button id="cancelSaveMyDesc" type="button" class="btn btn-danger btn-xs form-control-feedback pull-right cancelMyDesc">
					<span class="glyphicon glyphicon-remove"></span>
					Cancel
				</button>
				<button id="saveMyDesc" type="button" class="btn btn-success btn-xs form-control-feedback pull-right saveMyDesc">
					<span class="glyphicon glyphicon-save"></span> 
					Save
				</button></h3> </div>
			<div class="panel-body">
				<table class="table-condensed" id="oldDesc">
					<tr><td><b>User description:</b></td><td>{{ Auth::user()->description }}</td></tr>
				</table>
				<table class="table-condensed" id="newDesc">
					{{ Form::open(array('action'=>'UserProfileController@updateDesc', 'method'=>'PUT', 'id'=>'editDesc')) }}
					<tr><td><b>User description:</b></td><td>{{ Form::textarea('description', Auth::user()->description , array('class'=>'form-control')) }}</td></tr>
					{{ Form::close() }}
				</table>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading"><h3 style="margin:0;">Update password				<button id="editPassword" type="button" class="btn btn-primary btn-xs form-control-feedback pull-right">
					<span class="glyphicon glyphicon-cog"></span> 
					Edit
				</button>
				
				<button id="cancelSaveMyPassword" type="button" data-target="edit-profile" class="btn btn-danger btn-xs form-control-feedback pull-right cancelMyPassword">
					<span class="glyphicon glyphicon-remove"></span>
					Cancel
				</button>
				<button id="saveMyPassword" type="button" data-target="edit-profile" class="btn btn-success btn-xs form-control-feedback pull-right saveMyPassword">
					<span class="glyphicon glyphicon-save"></span> 
					Save
				</button></h3> </div>
			<div class="panel-body">
				
				<table class="table-condensed" id="oldPass">
					{{ Form::open(array('action'=>'UserProfileController@updatePass', 'method'=>'PUT', 'id'=>'editPassword')) }}
					<tr><td><b>Password:</b></td><td>{{ Form::password('password', null, array('class'=>'form-control','placeholder'=>'Password..')) }}</td></tr>
					<tr><td><b>Confirm Password:</b></td><td>{{ Form::password('password_confirmation', null, array('class'=>'form-control','placeholder'=>'Password confirmation..')) }}</td></tr>
					{{ Form::close() }}
				</table>
			</div>
		</div>
		
	</div>
</div>
@stop