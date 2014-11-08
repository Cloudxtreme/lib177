<?php
namespace Explore;
function openFile($src, $project, $stock, $cible, $type = false){
    if(!file_exists($src))
        \Error::brut('Dossier "'.$src.'" introuvable.');
    \Program::getProgram('core177', 'open.php');
	switch($type){
		case 'autoload':
			\Core177\open($src.'class.'.$name.'.php');
		break;
		case 'css':
			\Core177\open($src.'cs.'.$name.'.css');
		break;
		case 'htaccess':
			\Core177\open($src.'ht.'.$name.'.php');
		break;
		case 'mvc':
			$src = array(
				$src.'controleur/' => 'ctr.'.$cible.'.php',
				$src.'model/' => 'mod.'.$cible.'.php',
				$src.'vue/' => 'vue.'.$cible.'.php'
			);
			foreach($src as $chemin => $cible){
				\Core177\open($chemin.$cible);
			}
		break;
		case 'mvcOne':
			$cible = str_replace(',', '/', $cible);
			\Core177\open($src.$cible);
		break;
		default:
			\Core177\open($src.$cible);
	}
}
?>
