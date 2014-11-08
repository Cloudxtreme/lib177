$(function() {
	var error = !$('#myCanvas').tagcanvas({
		maxSpeed : 0.05,
		depth : 0.75,
		textColour : "262626",
		textHeight : 16,
		outlineThickness : 1,
		outlineColour : "204987"
	}, 'tagList');
	if(error){
		$('#myCanvas').hide();
	}
});