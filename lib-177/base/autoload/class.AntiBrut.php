<?php
class AntiBrut
{
  public static function verifAdm($user)
  {
		$src = 'brut/'.$user.'.tmp';
		$tentatives = 0;
		if(!file_exists($src))
			return true;
		else
			$file = fopen($src, 'r+');
		$infos = AntiBrut::read($file);
		if($infos[0] == date('d/m/Y'))
			$tentatives = $infos[1];
		fclose($file);
		if($tentatives >= 9)
			return false;
    return true;
  }
  public static function secure($user)
  {
		$src = 'brut/'.$user.'.tmp';
		$tentatives = 0;
		if(!file_exists($src))
			$file = AntiBrut::create($src);
		else
			$file = fopen($src, 'r+');
		$infos = AntiBrut::read($file);
		if($infos[0] == date('d/m/Y'))
			$tentatives = $infos[1];
		else
			$file = AntiBrut::create($src);
		if($tentatives == 9)
			AntiBrut::alert($file);
		elseif($tentatives > 9)
			die;
		AntiBrut::tryUp($file, ($tentatives + 1));
		fclose($file);
  }
	public static function alert($file)
	{
		AntiBrut::tryUp($file, 100);
		fclose($file);
		echo 'Die';
		$email_administrateur = Config::emailAdmin();
		$sujet_notification = '['.Config::domaine().'] tentative de connection excédé';
		$message_notification = '9 echec de log en moins de 24h via l\'adresse: '.$_SERVER['REMOTE_ADDR'].' du fournisseur d\'accés: '.gethostbyaddr($_SERVER['REMOTE_ADDR']).' nom d\'hote 1: '.gethostname().' nom d\'hote 2: '.gethostbyaddr($_SERVER['REMOTE_ADDR']);
		mail($email_administrateur, $sujet_notification, $message_notification);
		die;
	}
	public static function read($cible)
	{
		$contenu = fgets($cible);
		return explode(';', $contenu);
	}
	public static function create($cible)
	{
		$file = fopen($cible, 'w+');
		fputs($file, date('d/m/Y').';0');
		return $file;
	}
	public static function tryUp($file, $try)
	{
		fseek($file, 11);
		fputs($file, $try);
	}
} ?>