<?php
Program::load('inscription');

if (!isset($_POST) || empty($_POST))
{
	$affiche = genInscription::viewInscription('admin');
	return ;
}

if (isset($_POST['ajax']))
{
	$affiche = genInscription::viewInscription($_POST['ajax']);
	return ;
}
	//die(Capsule::html(genInscription::viewInscription($_POST['ajax'])));
/*/echo '<pre>';print_r($_POST);echo '</pre>';die;/**/
$target = 'admin';
$name = 'inscription';
if (isset($_POST['save']))
	$target = $_POST['save'];
if (isset($_POST['name']))
	$name = $_POST['name'];
genInscription::buildInscription($target, $name, $_POST);
header('Location: ../'.$target.'/'.$name);
die;
?>