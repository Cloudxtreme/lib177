<?php
namespace Core177
{
	function createPath($cible)
	{
		\Program::getProgram('core177', 'newDir.php');
		if(!empty($cible))
			$map = explode('/', $cible);
		$cible = $source = array_shift($map);
		while(!empty($map)){
			$last = array_shift($map);
			if(!file_exists($cible.'/'.$last))
				newDir('../'.$cible.'/', $last);
			$cible .= '/'.$last;
		}
		return $source;
	}
}
?>