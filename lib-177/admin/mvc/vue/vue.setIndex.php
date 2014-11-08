<?php
Head::insert('Set Index', 'Modifier l\'index par défaut', 'Set Index');
echo '<h1 class="ongletTitre">Modifier l\'index par défaut</h1>
<nav class="corp">
	'.$affiche.'
	<form id="setIndex" class ="center" method="post" action="setIndex">
		<input name="newIndex" placeholder="Nouvel index">
		<input type="submit">
	</form>
</nav>';
Foot::insert(); ?>