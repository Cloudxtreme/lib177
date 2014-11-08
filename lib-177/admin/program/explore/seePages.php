<?php
namespace Explore;
function seePages($src, $project, $stock){
	if(!file_exists($src))
		return false;
	$files = \ScanDossier::fileOnly($src, false);
    $projects = \ScanDossier::dirOnly('../', false);
    $return = '';
	$move = '<span class="largeBT center bold active">Déplacer vers:</span>';
	$copy = '<span class="largeBT center bold active">Copier vers:</span>';
    if(empty($files))
        return $return;
	if(empty($project))
		$project = 0;
	if(empty($stock))
		$stock = 0;
    foreach($files as $file){
		if(!empty($projects))
			foreach($projects AS $cible){
				$move .= '<a href="explore-deplace-'.$project.'-'.$stock.'-'.$file.'-'.$cible.','.$stock.'" class="largeBT">'.$cible.'</a>';
				$copy .= '<a href="explore-copy-'.$project.'-'.$stock.'-'.$file.'-'.$cible.','.$stock.'" class="largeBT">'.$cible.'</a>';
			}
		$return .= '
		<nav class="file bTmodeLine">
			<a class="link" href="explore-open-'.$project.'-'.$stock.'-'.$file.'"><img src="library/img/page.png" alt="page"></a>
			<input name="rename" value="'.$file.'">
			<a class="litleActBT" href="explore-delete-'.$project.'-'.$stock.'-'.$file.'" title="Supprimer"><img src="library/img/croix.png" alt="supprimer"></a>
			<a href="explore-propage-'.$project.'-'.$stock.'-'.$file.'" class="litleActBT"><img src="library/img/servers.png" alt="Propager" title="Propager dans les autres projets."></a>
			<span class="litleActBT listOpt">
				<img src="library/img/deplace.png" alt="Déplacer" title="Déplacer">
				<span class="abso">'.$move.'</span>
			</span>
			<span class="litleActBT listOpt">
				<img src="library/img/copy2.png" alt="Copier" title="Copier">
				<span class="abso">'.$copy.'</span>
			</span>
		</nav>';
		$move = '<span class="largeBT center bold active">Déplacer vers:</span>';
		$copy = '<span class="largeBT center bold active">Copier vers:</span>';
    }
    return '<nav class="files">'.$return.'</nav>';
}
?>