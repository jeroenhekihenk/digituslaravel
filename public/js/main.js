$(document).ready(function(){

	$('button#editprofile').on('click', function(){
		$('div.old').fadeToggle(15);
		$('div.edit').fadeToggle(15);
		$('tr.saveprofile').toggle(15);
	});

	$('button#saveMyProfileEdit').bind('click', function(event) {
		$('#editProfile').submit();
	});

})