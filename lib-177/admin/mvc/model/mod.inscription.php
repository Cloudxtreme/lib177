<?php
$affiche = '';
if (!isset($_POST) OR empty($_POST))
	return;

if (!(Secur::pseudo($_POST['pseudo'])))
	return $verif = 'Pseudo incorrect !';
if (!(Secur::email($_POST['email'])))
	return $verif = 'Email incorrect !';
if (!(strlen($_POST['Password']) < 31 && strlen($_POST['Password']) > 1))
	return $verif = 'Password incorrect !';
if (!($_POST['PassConfirm'] == $_POST['PassConfirm']))
	return $verif = 'Password Confirmation incorrect !';
if (!(Secur::name($_POST['name'])))
	return $verif = 'First name incorrect !';
if (!(Secur::name($_POST['lastname'])))
	return $verif = 'Name incorrect !';
if (!($_POST['quest'] > 0 && $_POST['quest'] < 7))
	return $verif = 'Secret question incorrect !';
if (!(strlen($_POST['rep']) < 31 && strlen($_POST['rep']) > 1))
	return $verif = 'Secret answer incorrect !';
if (!(Secur::name($_POST['ville'])))
	return $verif = 'City incorrect !';
if (!(Secur::codePostal($_POST['ville'])))
	return $verif = 'Postal code incorrect !';
if (!(Secur::birthday($_POST['birthday'])))
	return $verif = 'Birthday incorrect !';
die('Success!');