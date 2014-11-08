<?php
$pseudo = $mdp = '';
if(!isset($_POST['pseudo'], $_POST['mdp']))
	return;
$pseudo = Secur::aZ09($_POST['pseudo']);
$mdp = sha1($_POST['mdp']);
?>