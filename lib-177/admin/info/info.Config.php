<?php
$name = 'Config';
$titre = 'Class '.$name;
$localisation = 'library/php/autoload/';
$introduction = 'Cette class permet d\'enregistrer vos paramètres (identifiants bdd, nom de domaine, email admin, chemins récurants...).
				De cette manière vous appelerez cette classe pour y acceder à chaque fois, et lors ce que vous devrez changer l\'une de ces
				valeurs vous n\'aurez que ce fichier à éditer.<br><br>
				<span class="red">Les paramètres sont à renseigner dans le fichier config/configBase.php</span>';
$structure = array(
	array('content' => '<hr>Configuration de base<hr>',
		'name' => $name.'::bdd', 'return' => 'array', 
		'comment' => 'renvoie une instance de PDO en passant par la class Connect',
		'param' => array()
	),
	array('name' => $name.'::domaine', 'return' => 'str',
		'comment' => 'renvoie le nom de domaine',
		'param' => array()
	),
	array('name' => $name.'::emailAdmin', 'return' => 'str',
		'comment' => 'renvoie l\'adresse de l\'admin du site',
		'param' => array()
	),
	array('name' => $name.'::srcPackage', 'return' => 'str',
		'comment' => 'renvoie le chemin vers le dossier package',
		'param' => array()
	),
	array('name' => $name.'::srcData', 'return' => 'str',
		'comment' => 'renvoie le chemin vers le dossier Data',
		'param' => array()
	),
	array('name' => $name.'::srcCache', 'return' => 'str',
		'comment' => 'chemin du cache Html',
		'param' => array()
	),
	array('name' => $name.'::srcConfig', 'return' => 'str',
		'comment' => 'chemin du dossier de config',
		'param' => array()
	),
	array('content' => '<hr>Configuration d\'un package<hr>',
		'name' => $name.'::package', 'return' => 'array',
		'comment' => '
Retourne les valeurs d\'un fichier config dans un tableau, ou juste un enfant si précisé.',
		'param' => array(
			array('name' => 'package_name', 'type' => 'str'),
			array('name' => 'enfant', 'type' => 'str', 'facult' => 1)
		)
	),
	array('content' => '<hr>Interaction fichier<hr>',
		'name' => $name.'::viewCfg', 'return' => 'str',
		'comment' => 'retourne une config dans un code html minimal (utile pour ajax)',
		'param' => array(array('name' => 'config_name', 'type' => 'str'))
	),
	array('name' => $name.'::resetCfg', 'return' => 'bool',
		'comment' => 'Réinitialise un fichier config',
		'param' => array(array('name' => 'config_name', 'type' => 'str'))
	),
	array('name' => $name.'::modifCfg', 'return' => 'bool',
		'comment' => 'Modifie un fichier config',
		'param' => array(array('name' => 'config_name', 'type' => 'str'))
	)
);
$exemple = '$bdd = '.$name.'::bdd();
$bdd->query(\'SELECT * FROM ...\');';
?>