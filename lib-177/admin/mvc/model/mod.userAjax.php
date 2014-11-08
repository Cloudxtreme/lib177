<?php
if(!isset($_GET['action']))
	return;
$cible = '';
if(isset($_GET['cible']))
	$cible = Secur::aZ09($_GET['cible']);
$action = Secur::aZ09($_GET['action']);

Program::getProgram('UserAjax', 'QueryUserAjax.php');
$UserAjax = UserAjax\QueryUserAjax($action, $cible);