<?php
class Save
{
	public static function src($chemin, $contenu)
	{
		if(!$fichier_save = fopen($chemin, 'wb'))
			\Error::brut('Error at the opening file.');
		if(fwrite($fichier_save, $contenu) === FALSE)
			\Error::brut('Error at the write of file.');
		fclose($fichier_save);
		return true;
	}
	
	public static function cfg($profil, $chemin)
	{
		$srcConfig = Config::srcConfig();
		$chemin = $srcConfig.'/cfg.'.$chemin.'.php';
		$contenu = @include $srcConfig.'/profil/pfl.'.$profil.'.php';
		if(empty($contenu))
			\Error::brut('Profil unknown.');
		return Save::src($chemin, $contenu);
	}	
	
	public static function cache($contenu, $chemin)
	{
		$chemin = Config::srcCache().'/'.$chemin;
		return Save::src($chemin, $contenu);
	}
	
	public static function frag($contenu, $chemin)
	{
		$chemin = Config::srcFrag().'/'.$chemin;
		return Save::src($chemin, $contenu);
	}
} ?>