<?php
namespace Explore;
function youAreHere($exploProject, $stock)
{
	$src = '<a href="explore" class="speedPath" data-project="" data-stock="">lib-177</a>/';
	if(!empty($exploProject)){
		$src .= '<a href="explore-see-'.$exploProject.'-0-0" class="speedPath" data-project="'.$exploProject.'" data-stock="")>'.$exploProject.'</a>/';
		if(!empty($stock)){
			foreach($stock as $oneStock){
				$buffer[] = $oneStock;
				$stock = implode(',', $buffer);
				$src .= '
				<a href="explore-see-'.$exploProject.'-'.$stock.'-0" class="speedPath"
				data-project="'.$exploProject.'" data-stock="'.$stock.'">
					'.$oneStock.'
				</a>/';
			}
		}
	}
	return $src;
}
?>