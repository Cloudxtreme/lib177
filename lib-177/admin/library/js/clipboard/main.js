$(function(){
	ZeroClipboard.config( { moviePath: 'library/js/clipboard/ZeroClipboard.swf' } );
	var client = new ZeroClipboard(document.getElementById('copy-button'));
	
	client.on('load', function(client){
		client.on('complete', function(client, args){
			this.style.display = "none";
		});
	});

	$('#prefixerCss textarea').on('focus', function(){
		$(this).addClass('active');
	});
	$('#prefixerCss textarea').on('blur', function(){
		$(this).removeClass('active');
	});
});