$(document).ready(function(){
	
		$('form').ready(function(){
		$('#player').youTubeEmbed($('#url').val());
		$('#url').val('');
		return false;
	});

});
