<?php
namespace Explore;
function propage($src, $projectCurent, $stock, $name, $action = 'add')
{
	if(empty($projectCurent) OR $projectCurent == '..')
		\Error::brut('project empty.');
    $path = ''; 
	if(!empty($stock))
            $path .= str_replace(',', '/', $stock).'/';
	$original = $src.$name;
	$projects = \ScanDossier::dirOnly('../', false);
	foreach($projects AS $projectCible)
	{
		if($projectCible == $projectCurent)
			continue;
		$cibleSrc = $projectCible.'/'.$path;
		\Program::getProgram('core177', 'createPath.php');
		$cible = \Core177\createPath($cibleSrc);
		switch($action)
		{
			case 'add':
				\Program::getProgram('Explore', 'copyFile.php');
				copyFile($src, $projectCurent, $stock, $name, $cibleSrc);
			break;
			case 'rename':
				
			break;
			case 'del':
				\Program::getProgram('Explore', 'delete.php');
				delete($src, $projectCurent, $stock, $name);
			break;
			default:
				\Error::brut('Action unknown.');
		}
	}
	return true;
} ?>