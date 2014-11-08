$(function(){
	$('#menuOpen').on(
	'click', function(){
		var speedAcces = $('#speedAcces');
		if(speedAcces.attr('id') !== 'speedAcces2'){
			speedAcces.attr('id', 'speedAcces2');
		}
		
	});
});