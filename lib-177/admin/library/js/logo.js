$(function()
{
	$('*[title]').not('input[pattern]').tooltip();
	$('#colorSelector').draggable().resizable();
	$('#logo177').on('mouseenter', function(){
		$('#logo177').toggleClass('conteneur_vide');
	});
	setInterval(
		function(){
			meche = '' + Math.random();
			meche = meche.substr(2, 2);
			var elu = parseInt(meche, 10);
			if(elu >= 50){
				elu = elu - 50;
			}
			if(elu >= 25){
				elu = elu - 24;
			}
			else{
				elu = elu;
			}
			$('#grain177_'+elu).css('top', elu).css('background', 'rgb('+elu+', '+elu+', '+elu+')');
		}, 1000
	);
});