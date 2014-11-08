<?php
/**
 * @Version(name="Spire", version="1.0")
 */
class Spire
{
	public static function insert($className = false, $url = false)
	{
		if(empty($url))
			$url = 'javascript:history.back()';
		if(empty($className))
			$className = 'previous';
		return '
		<a href="'.$url.'" class="'.$className.'">
			<div class="'.$className.'_1">
				<div class="gradient"></div>
			</div><div class="'.$className.'_2 gradient"></div>
		</a>';
	}
}
?>