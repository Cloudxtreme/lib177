<?php
/**
 * @Version(name="autoload", version="1.0")
 */
 /* charge à leurs appel les fonctions du dossier autoload */
function Autoload($classname)
{
	$path = __DIR__.'/class.'.$classname.'.php';
	if(file_exists($path))
		require $path;
	else{
		echo 'Autoload dit: fonction "'.$path.'" introuvable.';
		die;
	}
}
spl_autoload_register('autoload');
if(function_exists('__autoload'))
	spl_autoload_register('__autoload');
spl_autoload_register('spl_autoload');