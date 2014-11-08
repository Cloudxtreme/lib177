<?php
namespace Explore;
function seeMVC($src, $project, $stock)
{
	if(!file_exists($src))
		return false;
    $chemins = array(
        'ctr' => $src.'/controleur',
        'mod' => $src.'/model',
        'vue' => $src.'/vue'
    );
    $architectMVC = array();
    foreach($chemins as $name => $chemin){
        if(!file_exists($chemin)){
            echo 'Dossier "'.$chemin.'" introuvable.';
            die;
        }
        $newList = \ScanDossier::fileOnly($chemin);
        if(empty($newList))
            continue;
        foreach($newList as $file)
            $architectMVC[substr($file, 4, -4)][] = $name;
    }
    $return = '<nav id="Mvc">';
	$move = '<span class="largeBT center bold active">Déplacer vers:</span>';
	$copy = '<span class="largeBT center bold active">Copier vers:</span>';
    if(empty($architectMVC))
        return $return;
    $projects = \ScanDossier::dirOnly('../', false);
    foreach($architectMVC as $file => $keys)
    {
		if(!empty($projects))
			foreach($projects AS $cible){
				$move .= '<a href="explore-deplaceMVC-'.$project.'-'.$stock.'-'.$file.'-'.$cible.'" class="largeBT">'.$cible.'</a>';
				$copy .= '<a href="explore-copy-'.$project.'-'.$stock.'-'.$file.'-'.$cible.','.$stock.'" class="largeBT">'.$cible.'</a>';
			}
		$return .= '
		<nav class="fileMVC bTmodeLine">   
			<a href="explore-openMVC-'.$project.'-'.$stock.'-'.$file.'" class="largeBT">'.$file.'</a>
			<a href="explore-mvcOne-'.$project.'-'.$stock.'-controleur,ctr.'.$file.'.php" class="shortBT">ctr</a>
			<a href="explore-mvcOne-'.$project.'-'.$stock.'-model,mod.'.$file.'.php" class="shortBT">mod</a>
			<a href="explore-mvcOne-'.$project.'-'.$stock.'-vue,vue.'.$file.'.php" class="shortBT">vue</a>
			<a href="explore-deleteMVC-'.$project.'-'.$stock.'-'.$file.'" class="litleActBT" title="Supprimer"><img src="library/img/croix.png" alt="Supprimer"></a>
			<a href="explore-propageMVC-'.$project.'-'.$stock.'-'.$file.'" class="litleActBT"><img src="library/img/servers.png" alt="Propager" title="Propager dans les autres projets."></a>
			<span class="litleActBT listOpt">
				<img src="library/img/deplace.png" alt="Déplacer">
				<span class="abso">'.$move.'</span>
			</span>
			<span class="litleActBT listOpt">
				<img src="library/img/copy2.png" alt="Copier">
				<span class="abso">'.$copy.'</span>
			</span>
		</nav>';
		$move = '<span class="largeBT center bold active">Déplacer vers:</span>';
		$copy = '<span class="largeBT center bold active">Copier vers:</span>';
    }
    $return .= '</nav>';
    return $return;
}
?>