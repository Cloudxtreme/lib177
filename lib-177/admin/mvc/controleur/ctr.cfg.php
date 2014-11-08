<?php
if(!isset($_GET['src']))
	Error::code(17);

$configCible = $_GET['src'];
if(!isset($_GET['outil'])){
	Error::brut('Query empty.');
$actions = array('new', 'view', 'reset', 'modif', 'clear', 'close');
if(!GreyList::whiteList($actions, $_GET['outil'])){
	Error::brut('Outil unknown.');
?>