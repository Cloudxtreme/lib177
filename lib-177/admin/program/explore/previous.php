<?php
namespace Explore;
function previous($projectCurent, $stock)
{
	$last = '..';
	if($stock[0] == 0 && !isset($stock[1]))
		array_pop($stock);
	if(!empty($stock))
		$last = array_pop($stock);
	elseif($projectCurent !== '..')
		return 'explore-see-..-0-0';
	if($projectCurent !== '..' && empty($stock))
		return 'explore-see-'.$projectCurent.'-0-0';

	if($projectCurent == '..'){
		if(!empty($stock))
			return 'explore-see-..-'.implode(',', $stock).',..,..-0';
		return 'explore-see-..-..,..-0';
	}
	return 'explore-see-'.$projectCurent.'-'.implode(',', $stock).'-0';
}
?>