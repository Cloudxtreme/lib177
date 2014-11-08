<?php
namespace Explore;
function create($src, $project, $stock, $name, $type = false)
{
    \Program::getProgram('core177', 'create.php');
    \Program::getProgram('core177', 'open.php');
	switch($type){
		case 'atl':
			\Core177\create($src, 'class.'.ucfirst($name).'.php');
			\Core177\open($src.'/class.'.ucfirst($name).'.php');
		break;
		case 'atm':
			\Core177\create($src, 'atm.'.ucfirst($name).'.php');
			\Core177\open($src.'/atm.'.ucfirst($name).'.php');
		break;
		case 'cfg':
			\Core177\create($src, 'cfg.'.$name.'.php');
			\Core177\open($src.'/cfg.'.$name.'.php');
		break;
		case 'css':
			\Core177\create($src, 'cs.'.$name.'.css');
			\Core177\open($src.'/cs.'.$name.'.css');
		break;
		case 'hta':
			\Core177\create($src, 'ht.'.$name.'.php');
			\Core177\open($src.'/ht.'.$name.'.php');
		break;
		case 'mvc':
			$src = array(
				$src.'controleur/' => 'ctr.'.$name.'.php',
				$src.'model/' => 'mod.'.$name.'.php',
				$src.'vue/' => 'vue.'.$name.'.php'
			);
			foreach($src as $chemin => $name){
				\Core177\create($chemin, $name);
				\Core177\open($chemin.$name);
			}
		break;
		case 'dir';
			\Program::getProgram('core177', 'newDir.php');
			\Core177\newDir($src, $name);
		break;
		default:
			\Core177\create($src, $name);
			\Core177\open($src.'/'.$name);
	}
} ?>