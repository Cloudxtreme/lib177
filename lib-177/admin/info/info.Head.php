<?php
$name = 'Head';
$titre = 'Class '.$name;
$localisation = 'library/php/autoload/';
$introduction = 'Inclue l\'entête de page <span class="blue">data/head.php</span>.';
$structure = array(
	array('name' => $name.'::insert', 'return' => 'bool',
		'param' => array(
			array('name' => 'url_canonique', 'type' => 'str', 'facult' => true),
			array('name' => 'meta_desc', 'type' => 'str', 'facult' => true),
			array('name' => 'meta_title', 'type' => 'str', 'facult' => true)
		)
	)
);
$exemple = 	'// Header de base:
'.$name.'::insert();
// Header avancé:
$url_canonique = \'produits.php\';
$meta_desc = \'Page oû sont affichés tout nos produits\';
$meta_title = \'Boutique\';
'.$name.'::insert($url_canonique, $meta_desc, $meta_title);';
			
?>