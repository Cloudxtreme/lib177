<?php
function GenHt()
{
    $base = '../base/ht.base.php';
    if(!file_exists($base))
        Error::brut('Fragment htaccess "'.$base.'" not found.');
    $htBase = file_get_contents($base)."\n";
    $htPrimary = $htBase;
    $projects = ScanDossier::dirOnly('../', false);
    foreach($projects as $project)
    {
		$src = '../'.$project.'/fragments/htaccess/';
		$fragments = ScanDossier::fileOnly($src, false);
		/**/$cumul = "\n# Project: ".$project."\n#---------------------------------\n";/**/
        if(empty($fragments))
            continue;
		foreach($fragments as $frag){
			$cumul .= file_get_contents($src.'/'.$frag)."\n";
		}
		if(!empty($cumul)){
            $htPrimary .= $cumul;
            // Créé un ht pour chaque distant (avec ht.base au début)
            Save::src('../'.$project.'/distant/.htaccess', $htBase.$cumul);
		}
    }
	rename('../.htaccess', '../.HoldHt');
    Save::src('../.htaccess', $htPrimary);
    /*/echo nl2br($htPrimary);die;/**/
    if(empty($htPrimary))
        Error::brut('program/fragments/GenHt dit: Fin de composition du htPrimaire avec un reservoir vide !');
}
?>