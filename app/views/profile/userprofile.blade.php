@section('title')
	Welcome to the profile of {{Auth::user()->username}}
@stop

@section('sidebar')
@stop

@section('notification')
<div class="notification">
	<p class="bg-info">You have <span class="badge">1</span> new notification</p>
</div>
@stop

@section('content')
<div class="row container" style="margin:0 auto;">
	<div class="col-md-10 col-sm-10 col-xs-10 col-lg-10">
		<div class="panel panel-default">
			<div class="panel-heading"><h3 style="margin:0;">Profile of {{ Auth::user()->username }}</h3></div>
			<div class="panel-body">
				My username is: {{ Auth::user()->username }}<br />
				My email is: {{ Auth::user()->email }}
			</div>
		</div>
	</div>
</div>
@stop