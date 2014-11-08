<?php
namespace Explore;
function editBar($src, $project, $stock, $type = false){
    if('mvc' === $stock)
		$cible = 'createMVCPages';
	else
		$cible = 'createPage';
	$placeholderFile = 'New file';
	switch($type){
		case 'mvc':
			$cible = 'createMVCPages';
			$placeholderFile = 'New Files';
		break;
		case 'autoload':
			$cible = 'createAutoloadPage';
			$placeholderFile = 'class.?.php';
		break;
		case 'Atomes':
			$cible = 'createAtomePage';
			$placeholderFile = 'atm.?.php';
		break;
		case 'config':
			$cible = 'createCfgPage';
			$placeholderFile = 'cfg.?.php';
		break;
		case 'css':
			$cible = 'createCssPage';
			$placeholderFile = 'cs.?.css';
		break;
		case 'htaccess':
			$cible = 'createHtaccessPage';
			$placeholderFile = 'ht.?.php';
		break;
	}
	return '<div class="menuExplorer">
    <form action="explore-'.$cible.'-'.$project.'-'.$stock.'-0" method="post" id="addPage" class="off">
		<img src="library/img/add-page.png" alt="New file" title="New file"><br>
        <span>
			<input placeholder="'.$placeholderFile.'" name="cible">
			<input type="submit" value="+" title="'.$placeholderFile.'">
		</span>
    </form>
    <form action="explore-createFolder-'.$project.'-'.$stock.'-0" method="post" id="addFolder" class="off">
		<img src="library/img/add-folder.png" alt="Nouveau dossier" title="Nouveau dossier"><br>
        <span>
			<input placeholder="Nouveau dossier" name="cible">
			<input type="submit" value="+" title="Nouveau dossier">
		</span>
    </form>
    </div><br>';
}
?>