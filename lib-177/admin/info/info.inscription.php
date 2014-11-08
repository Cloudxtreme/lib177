<?php
$name = 'inscription';
$titre = 'Class '.$name;
$localisation = 'library/php/package/';
$introduction = 'Ce package a été créé pour gérer l\'inscription de vos membres facilement et éfficacement grace
				à de nombreuses options.<br><br>
				Ce package hérite de la configuration table_name du package User dont il dépent.<br>
				Il vous faudrat donc télécharger et configurer le package User si ce n\'est déjà fait.<br>
				<br>
				L\'atout principal de ce package est de pouvoir installer facilement et rapidement
				une page d\'inscription sécurisé en choisisant simplement les informations à demander et leurs type.
				<br><br>
				La configuration de ce package repose sur 3 sous tableaux:<br>
				- "champs_bdd": Champs de la base de donnée utilisateur à remplir lors d\'une inscription.
				<br><br>
				- "create_line_id_sup": Tables SQL où vous souhaiteriez créer une ligne vide contenant le nouvel id utilisateur créé.<br>
				Particulièrement utile pour les tables contenants un champs unique pour chaque utilisateur afin de ne pas avoir 
				à vérifier si l\'utilisateur y a déjà un champs déclaré pour chaque UPDATE.
				<br><br>
				- "hello": Permet d\'enregistrer un message de bienvenue dans la base de donnée tmessage pour le nouvel utilisateur.
				<h2>Champs_bdd</h2>
				Dans ce sous tableau sont rangés les champs SQl à remplire par l\'ulisateur.
				Il leurs est attribué à chacun un tableau de paramètres contenant:<br>
				- name: nom du champs SQL à remplire<br>
				- regex: une regex à vérifier avant insertion (facultatif)
				- facultatif: rend le remplissage du champs facultatif
				Des champs sont géré nativement sans regex, car récurant dans les espaces membres et plus perfomant
				sans regex il s\'agit des champs nommer:
				- birthday: date de naissance (controle de nombre)<br>
				- mdp2: mdp1 est encrypter en vernam avec la valeur de question_secrete pour clé unique';
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