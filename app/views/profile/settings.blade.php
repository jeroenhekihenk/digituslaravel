@section('title')
	Profile of {{ Auth::user()->username }}
@stop

@section('sidebar')
@stop

@section('content')
<div class="row container" style="margin:0 auto;">
	<div class="col-md-10 col-sm-10 col-xs-10 col-lg-10">

		<div class="panel panel-default">
			<div class="panel-heading"><h3 style="margin:0;">User				<button id="editName" type="button" data-target="edit-profile" class="btn btn-primary btn-xs form-control-feedback pull-right">
					<span class="glyphicon glyphicon-cog"></span> 
					Edit
				</button>
				<button id="saveMyName" type="button" data-target="edit-profile" class="btn btn-success btn-xs form-control-feedback pull-right saveMe">
					<span class="glyphicon glyphicon-save"></span> 
					Save
				</button></h3> </div>
			<div class="panel-body">
				<table class="table-condensed" id="old">
					<tr><td><b>Username:</b></td><td>{{ Auth::user()->username }}</td></tr>
					<tr><td><b>Firstname:</b></td><td>{{ Auth::user()->firstname }}</td></tr>
					<tr><td><b>Lastname:</b></td><td>{{ Auth::user()->lastname }}</td></tr>
				</table>
				<table class="table-condensed" id="new">
					{{ Form::open(array('url'=>'user/settings/editname','method'=>'PUT', 'id'=>'editName')) }}
					<tr><td><b>Username:</b></td><td>{{ Form::text('username', null, array('class'=>'form-control')) }}</td></tr>
					<tr><td><b>Firstname:</b></td><td>{{ Form::text('firstname', null, array('class'=>'form-control')) }}</td></tr>
					<tr><td><b>Lastname:</b></td><td>{{ Form::text('lastname', null, array('class'=>'form-control')) }}</td></tr>
					{{ Form::close() }}
				</table>
			</div>
		</div>
		
	</div>
</div>
@stop