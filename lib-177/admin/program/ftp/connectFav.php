<?php
function connectFav($name)
{
	$src = 'fragments/ftp/';
	if(!file_exists($src.$name))
		return 'Favori inconnue.';
	$fav = fopen($src.$name, 'r');
	$_SESSION['server'] = substr(fgets($fav), 0, -2);
	$_SESSION['pseudo'] = substr(fgets($fav), 0, -2);
	$_SESSION['mdp'] = substr(fgets($fav), 0, -2);
	$_SESSION['port'] = (int) fgets($fav);
	fclose($fav);
	/*/echo 'host: '.$_SESSION['server'].' pseudo: '.$_SESSION['pseudo'].' mdp: '.$_SESSION['mdp'].' port: '.$_SESSION['port'];die;/**/
	header('Location: ftp');
	die;
} ?>