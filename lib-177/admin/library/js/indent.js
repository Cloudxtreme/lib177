$(function()
{
	$('#prefixerCss input').replaceWith('<div class="subAjax">Indent</div>');
	$('script[src="library/js/clipboard/main.js"]').attr('id', 'reloadJs1');
	$('#prefixerCss .subAjax').click(function(){
		$('#repAjax').load('indent #ajaxRep',
			{code: $('#prefixerCss textarea[name="code"]').val()},
			function(){
				$('#reloadJs1').replaceWith('<script src="library/js/clipboard/main.js" id="reloadJs1">');
			}
		);
	});
});