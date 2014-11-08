<?php
Head::insert('Minify', 'Compress your code for better performance', 'Minify', '<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">');
echo '<div id="ajax">
	<h1 class="ongletTitre">Minify</h1>
	<section class="corp" id="prefixerCss">
		<form method="post" action="minify">
			<textarea name="code">'.$origine.'</textarea><br><br>
			<input type="submit" value="Minify">
		</form>
		'.$result.'
	</section>
</div>';
Foot::insert(array('clipboard/ZeroClipboard.js', 'clipboard/main.js', 'minify.js'));