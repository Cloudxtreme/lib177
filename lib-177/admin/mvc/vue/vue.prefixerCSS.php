<?php
Head::insert('prefixerCSS', 'Ajoute automatiquement les prefixes propriétaires css au code à la volée.', 'Prefixer CSS');
echo '<div id="ajax">
	<h1 class="ongletTitre">Prefixe CSS Gen</h1>
	<section class="corp" id="prefixerCss">
		<form action="prefixerCSS" method="post">
			<textarea name="code">'.$origine.'</textarea><br><br>
			<input type="submit" value="Prefixe">
		</form>
		'.$result.'
	</section>
</div>';
Foot::insert(array('clipboard/ZeroClipboard.min.js', 'clipboard/main.js', 'prefixerCSS.js'));