<?php
namespace Core177
{
	function newDir($src, $name)
	{
		if(!is_writable($src))
			\Error::brut('Creation of "'.$src.$name.'" impossible.');
		if(!is_dir($src.$name))
			mkdir($src.$name, 0777);
	}
}
?>