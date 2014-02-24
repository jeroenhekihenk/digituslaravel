$(document).ready(function(){

	$('button#editName, button.saveMyName, button#cancelSaveMyName').on('click', function(){
		toggleSaveNameInfo();
	});

	$('button#saveMyName').bind('click', function(event) {
		$('form#editName').submit();
	});
	$('button#saveMyDesc').bind('click', function(event) {
		$('form#editDesc').submit();
	});
	$('button#saveMyPassword').bind('click', function(event) {
		$('form#editPassword').submit();
	});

	function toggleSaveNameInfo() {
		$('table#newName, table#oldName, button#editName, button#saveMyName, button#cancelSaveMyName, button.saveMe').toggle();
	};

	$('button#addNewUser').on('click', function(){
		$('div.addnewuser').show();
	});

	$('button#editDesc, button#cancelSaveMyDesc').on('click', function(){
		$('table#oldDesc, table#newDesc, button#saveMyDesc, button#cancelSaveMyDesc, button#editDesc').toggle();
	});

	$('button#editPassword, button#cancelSaveMyPassword').on('click', function(){
		$('button#saveMyPassword, button#cancelSaveMyPassword, button#editPassword').toggle();
	});


})