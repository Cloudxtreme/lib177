<?php
namespace UserAjax;
function QueryUserAjax($action, $cible)
{
	switch($action){
		case 'pseudoExist':
			\Program::getProgram('UserAjax', 'pseudoExist.php');
			return pseudoExist($cible);
		break;

		default:
			\Error::brut('Action unknown !');
	}
}