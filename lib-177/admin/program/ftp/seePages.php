<?php
function seePages($src, $project, $stock){
	$files = ScanDossier::fileOnly($src, false);
    if(empty($files))
        return false;
	$return = '<table class="tabExplorer">';
    foreach($files as $file){
        $return .= '
        <tr class="menuExplorer">
            <td class="right"><a class="actionBT btFile" href="explore-open-'.$project.'-'.$stock.'-'.$file.'"><img src="library/img/page.png" alt="page">'.$file.'</a></td>
            <td>
				<a class="litleActBT" href="explore-delete-'.$project.'-'.$stock.'-'.$file.'" title="Supprimer"><img src="library/img/croix.png" alt="supprimer"></a>
				<form action="explore-see-'.$project.'-'.$stock.'-'.$file.'" method="post" class="litleActBT">
					<input type="hidden" name="propage" value="'.$file.'">
					<input type="image" src="library/img/servers.png" alt="Propagé" title="Propagé '.$file.' dans les autres projets.">
				</form>
			</td>
		</tr>';
    }
	$return .= '</table>';
    return $return;
}












?>