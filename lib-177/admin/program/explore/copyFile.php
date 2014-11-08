<?php
namespace Explore;
function copyFile($src, $projectCurent, $stock, $name, $cibleSrc, $type = false)
{
	$cibleSrc = str_replace(',', '/', $cibleSrc);
	if(empty($projectCurent) OR empty($cibleSrc))
		\Error::brut('Path missing.');
    \Program::getProgram('core177', 'createPath.php');
	$cible = \Core177\createPath($cibleSrc);
	$cibleSrc = '../'.$cibleSrc;
	switch($type){
		case 'mvc':
			$ctr = '/controleur/ctr.'.$name.'.php';
			$mod = '/model/mod.'.$name.'.php';
			$vue = '/vue/vue.'.$name.'.php';
			if(!\copy($src.$ctr, $cibleSrc.$ctr))
				return false;
			if(!\copy($src.$mod, $cibleSrc.$mod))
				return false;
			if(!\copy($src.$vue, $cibleSrc.$vue))
				return false;
		break;
		default:
			if(!\copy($src.$name, $cibleSrc.'/'.$name))
				return false;
	}
}
?>