<?php
$name = 'Perform';
$titre = 'Class '.$name;
$localisation = 'library/php/autoload/';
$introduction = 'Cette class permet d\'avoir un appercue des perfomances d\'un script php
				en comptant les lignes de code
				<a href="http://www.php.net/manual/fr/control-structures.declare.php" target="_banck">
				tickables</a> et le temps d\'execution du script,
				puis reporte les niveaux de mémoire.';
$structure = array(
	array('name' => $name.'::start', 'return' => 'void',
		'comment' => 'Démarre les compteurs de lignes et de temps',
		'param' => array()
	),
	array('name' => $name.'::end', 'return' => 'void',
		'comment' => 'Stop les compteurs et affiche le resultat',
		'param' => array()
	)
);
$exemple = '$compteur = New '.$name.'();
$compteur->start();
/* script ... */
$compteur->end();

/* Affiche:
Le compteur a parcourue 106 lignes de code tickables.
Temps d\'execution: 0.018482208251953s
Mémoire alloué à PHP pendant l\'éxécution du script: 195592 octets
Mémoire max alloué par le système à PHP: 262144 octets */';
?>