<?php
$outil = $_GET['outil'];
$srcPack = Config::srcPackage();
$srcCfg = Config::srcConfig();
$cfgName = '/cfg.'.$configCible.'.php';
switch($outil){
	case 'view':
		$vitrine = Config::viewCfg($configCible);
	break;
	case 'reset':
		$vitrine = Config::resetCfg($configCible);
	break;
	case 'modif';
		$reusie = Config::modifCfg($configCible);
		if(!$reusie)
			$vitrine = '<h2 class="zoneAdmin">Une erreur est survenu lors de la mise à jours du fichiers config.</h2>';
	break;
}
if(!isset($vitrine) || empty($vitrine))
	$vitrine = 'SUCCESS';
?>