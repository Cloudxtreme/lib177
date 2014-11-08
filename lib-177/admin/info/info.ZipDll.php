<?php
$name = 'ZipDll';
$titre = 'Class '.$name;
$localisation = 'library/php/autoload/';
$introduction = 'Cette fonction Zip le dossier (et tout ses sous dossier) demandé puis envoie le fichier zipper au navigateur.<br>
				$racine est le dossier au dessus du dossier cible, $name est le nom du dossier à zipper.<br> 
				';
$structure = array(
	array('name' => $name.'::src', 'return' => '[bool]', 
		'comment' => 'renvoie true si le zippage c\'est déroulé sans erreur',
		'param' => array(
		array('name' => 'racine', 'type' => 'str'),
		array('name' => 'name', 'type' => 'str')
		)
	)
);
$exemple = '/* Zipage puis téléchargement du package autoload */
'.$name.'::src(\'library/php\', \'autoload\');';
?>