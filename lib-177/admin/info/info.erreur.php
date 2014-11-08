<?php
$inf_pack = 1;
$titre = 'Package erreur';
$localisation = 'library/php/package/error/';
$introduction = '
	Ce package sert à générer vos page d\'erreur.
	<h2>Installation</h2>
	Si ce n\'est déjà fait télécharger
	<a href="dll-php-armature_maitre">l\'armature que nous vous proposons</a>
	Définissez si elle n\'existes, les règles htaccess suivantes:<br><br>
	ErrorDocument 404 http://localhost/nom_armature/error-404<br>
	ErrorDocument 401 http://localhost/nom_armature/error-401<br>
	ErrorDocument 402 http://localhost/nom_armature/error-402<br>
	ErrorDocument 403 http://localhost/nom_armature/error-403<br>
	ErrorDocument 500 http://localhost/nom_armature/error-500<br><br>
	RewriteRule ^error-([0-9]+)		ctr.ctr.php?action177=error&error=$1 [L]<br><br><br>
	En remplacent bien entendu "nom_armature" par le nom que vous avez donné à votre projet.<br><br>
	<h2>Personalisation</h2>
	Configuration générale dans le fichier config.php du package.<br>
	Dans library/php/package/error/messages vous trouverez les messages d\'erreurs correspondant
	à leurs codes par leurs noms de fichier, libre à vous de les éditer ou d\'en rajouter en suivant
	le modèle de celles existantes.<br>
	<h2>Utilisation</h2>
	Les erreurs sont affichés par controleur/ctr.error.php (ce reporter aux commentaires pour personaliser le html.<br<br>
	Les pages seront générées automatiquement pour les erreurs 401 à 404 et 500 grâce au htaccess, pour
	le déclanchement d\'erreurs standard ou pernalisé voire <a href="info-php-Error">la class Error</a>';
?>