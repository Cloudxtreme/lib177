<?php
$name = 'Connect';
$titre = 'Class '.$name;
$localisation = 'library/php/autoload/';
$introduction = 'Cette class permet de ce connecter à une base de donnée mySQL.
				Si vous vous connecter le plus souvent sur cette bdd reporter vous à
				<a href="info-php-Config">Config::bdd</a>.';
$structure = array(
	array('name' => $name.'::bdd', 'return' => 'PDO',
		'comment' => 'renvoie une instance PDO',
		'param' => array(
			array('name' => 'host', 'type' => 'str'),
			array('name' => 'dbname', 'type' => 'str'),
			array('name' => 'pseudo', 'type' => 'str'),
			array('name' => 'mdp', 'type' => 'str')
		)
	)
);
$exemple = '$bdd = '.$name.'::bdd(\'localhost\', \'new_project\', \'root\', \'\');
$bdd->query(\'SELECT * FROM ...\');';
?>