@section('title')
	Messages
@stop

@section('content')
        <script type="text/x-handlebars">
            @{{outlet}}
        </script>
		<script type="text/x-handlebars" data-template-name="index">
		    <div class="container">
		        <div class="row">
		            <div class="col-md-12">
		                <h1>Laravel 4 Chat</h1>
		                <table class="table table-striped">
		                    @{{#each message in model}}
		                        <tr>
		                            <td @{{bind-attr class="message.user_id_class"}}>
		                                @{{message.user_name}}
		                            </td>
		                            <td>
		                                @{{message.message}}
		                            </td>
		                        </tr>
		                    @{{/each}}
		                </table>
		            </div>
		        </div>
		        <div class="row">
		            <div class="col-md-12">
		                <div class="input-group">
		                    @{{input
		                        type="text"
		                        value=command
		                        class="form-control"
		                    }}
		                    <span class="input-group-btn">
		                        <button
		                            class="btn btn-default"
		                            @{{action "send"}}
		                        >
		                            Send
		                        </button>
		                    </span>
		                </div>
		            </div>
		        </div>
		    </div>
		</script>

        <script type="text/javascript" src="{{ asset("js/jquery-2.1.0.min.js") }}"></script>
        <script type="text/javascript" src="{{ asset("js/web-socket.js") }}"></script>
        <script type="text/javascript" src="{{ asset("js/handlebars-1.1.2.js") }}"></script>
        <script type="text/javascript" src="{{ asset("js/ember-1.4.0.js") }}"></script>
        <script type="text/javascript" src="{{ asset("js/ember.data-1.0.0.js") }}"></script>
        <script type="text/javascript" src="{{ asset("js/shared.js") }}"></script>
@stop