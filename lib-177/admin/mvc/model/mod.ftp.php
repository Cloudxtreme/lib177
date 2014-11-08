<?php
$affiche = $stock = '';
$action = 'see';
$cible = 0;
Program::getProgram('ftp', 'QueryFtp.php');
if(isset($_POST['logout'])){
	unset($_SESSION['server']);
	unset($_SESSION['pseudo']);
	unset($_SESSION['mdp']);
	unset($_SESSION['port']);
	return;
}
if(isset($_GET['actionFtp']))
	$action = $_GET['actionFtp'];
if(isset($_GET['destination']))
	$stock = $_GET['destination'];
if(isset($_GET['cible']))
	$cible = $_GET['cible'];
if(isset($_POST['cible']))
	$cible = $_POST['cible'];
$affiche = QueryFtp($action, $stock, $cible);
?>
