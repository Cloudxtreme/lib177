<?php
namespace Core177
{
	function delete($src, $name)
	{
		if(!is_readable($src))
			\Error::brut('Reading of "'.$src.$name.'" impossible.');
		unlink($src.$name);
	}
}
?>