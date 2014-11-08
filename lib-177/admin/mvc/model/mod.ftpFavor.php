<?php
$affiche = '';
if(isset($_POST['name'], $_POST['server'], $_POST['pseudo'], $_POST['mdp'])){
	$port = 21;
	if(isset($_POST['port']) && !empty($_POST['port']))
		$port = (int) $_POST['port'];
	Program::getProgram('ftp', 'createFav.php');
	$affiche = createFav($_POST['name'], $_POST['server'], $_POST['pseudo'], $_POST['mdp'], $port);
}
$actionFtpFav = $cible = '';
if(isset($_GET['actionFtpFav']))
	$actionFtpFav = $_GET['actionFtpFav'];
if(isset($_GET['cible']))
	$cible = $_GET['cible'];
if(isset($_POST['actionFtpFav']))
	$actionFtpFav = $_POST['actionFtpFav'];
if(isset($_POST['cible']))
	$cible = $_POST['cible'];
Program::getProgram('ftp', 'QueryFtpFav.php');
$affiche = QueryFtpFav($actionFtpFav, $cible);
?>
