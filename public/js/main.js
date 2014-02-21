$(document).ready(function(){

	$('button#editName').on('click', function(){
		$('table#old').hide();
		$('table#new').show();
		$(this).hide();
		$('button#saveMyName').show();
	});

	$('button#saveMyName').bind('click', function(event) {
		$('form#editName').submit();
	});

	$('button.saveMe').on('click', function(){
		$(this).hide();
		$('button#editName').show();
	});

})