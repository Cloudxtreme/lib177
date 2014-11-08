<?php
function nameSpaceGen($project){
	$src = '../'.$project.'/program/';
	$files = ScanDossier::fileOnly($src);
	foreach($files AS $file){
		$tabFile = file($src.$file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
		if(substr($tabFile[1], 0, 8) == 'namespace'){
			die('ok');
		}
		die(substr($tabFile[1], 0, 8));
	}
}
?>