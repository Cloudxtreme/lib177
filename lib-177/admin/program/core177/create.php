<?php
namespace Core177{
	function create($src, $name, $charset = 'UTF-8', $mode = 'x')
	{
		if (!is_writable($src))
			\Error::brut('Writing on "'.$src.$name.'" impossible.');
		if ($mode == 'x' && file_exists($src.$name))
			\Error::brut($src.$name.' exist already');
		mb_internal_encoding($charset);
		$handle = fopen($src.$name, $mode);
		@fclose($handle);
    /*
    if(mb_check_encoding(file_get_contents($src.$name), 'UTF-8'))
      $res = 'i am in utf8';
    else
      $res = 'i fuck your brain with my bad charset';
    \Error::brut('Internal encoding is: '.mb_internal_encoding().'<br><br>'.$res);*/
	}
}