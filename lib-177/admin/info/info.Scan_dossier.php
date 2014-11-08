<?php
$name = 'Scan_dossier';
$titre = 'Class '.$name;
$localisation = 'library/php/autoload/';
$introduction = 'Cette class renvoie un tableau de tout les fichiers, sous dossiers et sous fichiers
				du dossier demandé';
$structure = array(
	array('name' => $name.'::src', 'return' => 'array',
		'param' => array(
		array('name' => 'racine', 'type' => 'str')
		)
	)
);
$exemple = $name.'::src(\'library/php/package\');';
?>