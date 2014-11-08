<?php
namespace Explore;
function deplace($src, $projectCurent, $name, $srcDest, $stock, $type = false)
{
	$stockDest = $srcDest;
	$srcDest = str_replace(',', '/', $srcDest);
	if(empty($projectCurent) OR empty($srcDest))
		\Error::brut('Program/explore/deplace.php: Incomplet path.');
	if(!file_exists($src.'/'.$name))
		\Error::brut('Program/explore/deplace.php: File '.$src.'/'.$name.' not found.');
    \Program::getProgram('core177', 'createPath.php');
	$projectDest = \Core177\createPath($srcDest);
	$srcDest = '../'.$srcDest;
	switch($type){
		case 'mvc':
			$ctr = '/controleur/ctr.'.$name.'.php';
			$mod = '/model/mod.'.$name.'.php';
			$vue = '/vue/vue.'.$name.'.php';
			if(!rename($src.$ctr, $srcDest.$ctr))
				return false;
			if(!rename($src.$mod, $srcDest.$mod))
				return false;
			if(!rename($src.$vue, $srcDest.$vue))
				return false;
		break;
		default:
			$original = $src.$name;
			if(!rename($original, $srcDest.'/'.$name))
				return false;
	}
	header('Location: explore-see-'.$projectDest.'-'.$stock.'-0');
	die;
} ?>