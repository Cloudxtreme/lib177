<?php
$name = 'Error';
$titre = 'Class '.$name;
$localisation = 'library/php/autoload/ | ';
$introduction = 'Redirige vers la page d\'erreur demandé et stop le script.<br>
				Grâce au package erreur il vous suffit de modifier les fichiers dans le dossier
				library/php/package/error/messages pour géré les messages d\'erreurs.';
$structure = array(
	array('name' => $name.'::code', 'return' => 'empty', 
		'comment' => 'Redirige vers la page error-404 et fait un "die;"',
		'param' => array(
			array('name' => 'code_error', 'type' => 'int')
		)
	)
);
$exemple = $name.'::code(404);';
?>