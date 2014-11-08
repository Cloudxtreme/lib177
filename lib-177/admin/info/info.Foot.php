<?php
$name = 'Foot';
$titre = 'Class '.$name;
$localisation = 'library/php/autoload/';
$introduction = 'Inclue le bas de page <span class="blue">data/foot.php</span> ainsi que les script
définit global dans cfg.foot.php ainsi que tout script passé à la fonction.<br>
Les scripts sont inséré par defaut avec le chemin library/js/ pour des raisons de pratique, libre à vous de changer ce comportement';
$structure = array(
	array('name' => $name.'::insert', 'return' => 'mixed',
		'param' => array(
			array('name' => 'script_js', 'type' => 'array', 'facult' => true),
			array('name' => 'jquery', 'type' => 'bool', 'facult' => true)
		)
	)
);
$exemple = 	'$script_perso = array(\'inscription.js\', \'load_city.js\', \'hello.js\');<br>$jquery = true;
'.$name.'::insert($script_perso, $jquery);';
?>