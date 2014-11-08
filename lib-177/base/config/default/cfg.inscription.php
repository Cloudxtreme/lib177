<?php
$package['inscription'] = array(
	/* Supprimer une étoile en début de ligne à l\'options que vous souhaitez désactiver.
	** Vous pouvez ajouter un nouveau champs en suivant la convention en place. */
/*/array('name' =>
'sexe',
	'presentation' => 'sexe',
	'type' => 'radio',
	'regex' => '',
	'enfants' => array(
		array('name' => 'sexe', 'value' => 'homme'),
		array('name' => 'sexe', 'value' => 'femme')
	)
),/**/
/**/array('name' =>
'pseudo',
	'presentation' => 'pseudo',
	'type' => 'input',
	'regex' => '#^[A-Za-z0-9]{2,25}$#u',
	'enfants' => array(
		array('name' => '', 'value' => '')
	)
),/**/
/*/array('name' =>
'cdp',
	'presentation' => 'code postal',
	'type' => 'input',
	'regex' => '#^[0-9]{4,5}$#u',
	'enfants' => array(
		array('name' => '', 'value' => '')
	)
),/**/
/*/array('name' =>
'nom',
	'presentation' => 'nom',
	'type' => 'input',
	'regex' => '#^[A-Za-zéèàêâùïüë-]{2,30}$#u',
	'enfants' => array(
		array('name' => '', 'value' => '')
	)
),/**/
/*/array('name' =>
'prenom',
	'presentation' => 'prenom',
	'type' => 'input',
	'regex' => '#^[A-Za-zéèàêâùïüë-]{2,30}$#u',
	'enfants' => array(
		array('name' => '', 'value' => '')
	)
),/**/
/**/array('name' =>
'email',
	'presentation' => 'E-mail',
	'type' => 'input',
	'regex' => '#^[A-Za-z0-9._-]+@[a-z0-9._-]+\.[a-z]{2,6}$#u',
	'enfants' => array(
		array('name' => '', 'value' => '')
	)
),/**/
/**/array('name' =>
'mdp1',
	'presentation' => 'mot de passe',
	'type' => 'password',
	'regex' => '#^.{4,50}$#u',
	'enfants' => array(
		array('name' => '', 'value' => '')
	)
),/**/
/*/array('name' =>
'ville',
	'presentation' => 'ville',
	'type' => 'input',
	'regex' => '',
	'enfants' => array(
		array('name' => '', 'value' => '')
	)
),/**/
/*/array('name' =>
'Vernam',
	'presentation' => 'Question secrete',
	'type' => 'input',
	'regex' => '',
	'enfants' => array(
		array('name' => '', 'value' => '')
	)
),/**/
/**/array('name' =>
'confirm_mdp',
	'presentation' => 'confirmation du mot de passe',
	'type' => 'input',
	'regex' => '',
	'enfants' => array(
		array('name' => '', 'value' => '')
	)/**/
)); ?>