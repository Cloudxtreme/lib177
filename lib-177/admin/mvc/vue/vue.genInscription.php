<?php
Head::insert('inscription', 'Generateur de page d\'inscription', 'GenInscriptor');
echo '
<h1 class="ongletTitre">Génération page d\'inscription</h1>
<section class="corp center">
	'.$affiche.'
</section>';
if (!isset($_POST['ajax']))
	Foot::insert(array('genInscription.js'));
else
	Foot::insert();