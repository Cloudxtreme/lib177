<?php
namespace User;
function QueryUser($action, $user)
{
	switch($action)
	{
		case 'login':
			login($user);
		break;
		case 'inscription':
			inscription($user);
		break;
		case 'logout';
			logout($user);
		break;
		default:
			Error::brut('Unknown action.');
	}
	header('Location: login');
	die;
}
?>