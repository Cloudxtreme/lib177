<?php
Head::insert('indent', 'Indent your code for better readability', 'Indent');
echo '<div id="ajax">
	<h1 class="ongletTitre">Indent</h1>
	<section class="corp" id="prefixerCss">
		<form method="post" action="indent">
			<textarea name="code">'.$origine.'</textarea><br><br>
			<input type="submit" value="Indent">
		</form>
		'.$result.'
	</section>
</div>';
Foot::insert(array('clipboard/ZeroClipboard.js', 'clipboard/main.js', 'indent.js'));