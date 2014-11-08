<?php
namespace UserAjax;
function pseudoExist($cible)
{
	$userManag = New \UserManager;
	die($userManag->exist($cible));
}
?>