$(function()
{
	$('#prefixerCss input').replaceWith('<div class="subAjax">Prefixe</div>');
	$('script[src="library/js/clipboard/main.js"]').attr('id', 'reloadJs1');
	$('#prefixerCss .subAjax').click(function(){
		$('#repAjax').load('prefixerCss #ajaxRep',
			{code: $('#prefixerCss textarea[name="code"]').val()},
			function(){
				$('#reloadJs1').replaceWith('<script src="library/js/clipboard/main.js" id="reloadJs1">');
			}
		);
	});
});