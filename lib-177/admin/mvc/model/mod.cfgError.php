<?php
$dialInscription = '';
if(empty($etat))
	return;
/* Nouvelle cfg */
$victime = 'error';
if(!isset('victime'))
	Error::brut('Empty victime.');
Head::insert();
/* Save de la configuration inscription via le profil PFLinscription */
$reusie = Save::cfg('CFGinscription', 'inscription');
Inscription::saveForm();
if($reusie)
	echo '<h2 class="zoneAdmin">Configuration mise à jours avec succés.</h2>';
else
	echo '<h2 class="zoneAdmin">Une erreur est survenu lors de la mise à jours du fichiers config.</h2>';
echo '<section class="corp"><h3>Precedent: '.Spire::insert().'</h3></section>';
Foot::insert();
die;
?>