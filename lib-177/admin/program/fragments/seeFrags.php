<?php
function seeFrags($projet, $stock){
    $src = '../'.$projet.'/fragments/'.$stock;
    if(!file_exists($src)){
        echo 'Fragment "'.$src.'" introuvable.';
        die;
    }
	$files = ScanDossier::fileOnly('../'.$projet.'/fragments/'.$stock, false);
    if(empty($files))
        return false;
    foreach($files as $file)
    {
        $return[] = array
            (
                $file => 'fragments-openFrag-'.$projet.'-'.$stock.'-'.$file,
                'Actif' => 'fragments-alterFrag-'.$projet.'-'.$stock.'-'.$file
            );               
    }
	$files = ScanDossier::fileOnly('../'.$projet.'/fragments/'.$stock.'/inactif', false);
    if(empty($files))
        return $return;
    foreach($files as $file)
    {
        $return[] = array
            (
                $file => 'fragments-openFrag-'.$projet.'-'.$stock.'-'.$file,
                'Inactif' => 'fragments-alterFrag-'.$projet.'-'.$stock.'-'.$file
            );               
    }
    return $return;
}
?>