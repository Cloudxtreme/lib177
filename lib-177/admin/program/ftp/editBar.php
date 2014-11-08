<?php
function editBar($src, $stock){
    if('mvc' === $stock)
		$action = 'createMVCPages';
	else
		$action = 'createOnePage';
	return '<div class="menuExplorer"><hr>
    <form action="ftp-'.$action.'-'.$stock.'-0" method="post" id="addPage" class="off">
		<img src="library/img/add-page.png" alt="Nouvelles pages" title="Nouvelles pages"><br>
        <span>
			<input placeholder="Nouvelles pages" name="cible">
			<input type="submit" value="+" title="Nouvelles pages">
		</span>
    </form>
    <form action="ftp-createDir-'.$stock.'-0" method="post" id="addFolder" class="off">
		<img src="library/img/add-folder.png" alt="Nouveau dossier" title="Nouveau dossier"><br>
        <span>
			<input placeholder="Nouveau dossier" name="cible">
			<input type="submit" value="+" title="Nouveau dossier">
		</span>
    </form>
    </div><br>';
}
?>