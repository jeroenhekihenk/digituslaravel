@section('title')
	Profile of {{ Auth::user()->username }}
@stop

@section('sidebar')
@stop

@section('content')
<div class="row container" style="margin:0 auto;">
	<div class="col-md-10 col-sm-10 col-xs-10 col-lg-10">
		<table class="table table-hover">
			<tr class="username">
				<td><b>Username:</b></td>
				<td>
					<div class="old">
						{{ Auth::user()->username }}
					</div>
					<div class="edit">
						<div class="form-group has-warning has-feedback">
							{{ Form::open(array('method'=>'PUT', 'url'=>'user/settings/edit','class'=>'editprofile','id'=>'editProfile')) }}
							{{ Form::text('username', null, array('class'=>'form-control')) }}
						</div>
					</div>
				</td>
			</tr>
			<tr class="firstname">
				<td><b>Firstname:</b></td>
				<td>
					<div class="old">
						{{ Auth::user()->firstname }}
					</div>
					<div class="edit">
						<div class="form-group has-warning has-feedback">
								{{ Form::text('firstname', null, array('class'=>'form-control')) }}
						</div>
					</div>
				</td>
			</tr>
			<tr class="lastname">
				<td><b>Lastname:</b></td>
				<td>
					<div class="old">
						{{ Auth::user()->lastname }}
					</div>
					<div class="edit">
						<div class="form-group has-warning has-feedback">
							{{ Form::text('lastname', null, array('class'=>'form-control')) }}

						</div>
					</div>
				</td>
			</tr>
			<tr class="emailaddress">
				<td><b>Email Address:</b></td>
				<td>
					<div class="old">
						{{ Auth::user()->email }}
					</div>
					<div class="edit">
						<div class="form-group has-warning has-feedback">
							{{ Form::text('email', null, array('class'=>'form-control')) }}
						</div>
					</div>
				</td>
			</tr>
			<tr class="password">
				<td><b>Password:</b></td>
				<td class="password-security">
					<div class="old">
						<input disabled class="asinput" type="password" value="{{ Auth::user()->password }}">
					</div>
						<div class="edit">
						<div class="form-group has-warning has-feedback">
							{{ Form::password('password', array('class'=>'form-control mb5', 'placeholder'=>'Password..')) }}
							{{ Form::password('password_confirmation', array('class'=>'form-control', 'placeholder'=>'Password confirmation..')) }}
						</div>
					</div>
				</td>
			</tr>
			<tr class="description">
				<td><b>Description</b></td>
				<td>
					<div class="old">
						{{ Auth::user()->description }}
					</div>
						<div class="edit">
							<div class="form-group has-warning has-feedback">
								{{ Form::textarea('description', null, array('class'=>'form-control')) }}
							</div>
					</div>
				</td>
			</tr>
			<tr class="saveprofile">
				<td></td>
				<td>
					<button id="saveMyProfileEdit" type="button" data-target="edit-profile" class="btn btn-success btn-md form-control-feedback pull-right">
						<span class="glyphicon glyphicon-save"></span>
						Save
					</button>
					{{ Form::close() }}
				</td>
			</tr>
		</table>
		
	</div>
	<button id="editprofile" type="button" data-target="edit-profile" class="btn btn-primary btn-xs form-control-feedback">
		<span class="glyphicon glyphicon-cog"></span> 
		Edit
	</button>
</div>
@stop