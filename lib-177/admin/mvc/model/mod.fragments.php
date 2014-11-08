<?php
$affiche = '';
if(!isset($_GET['action'])){
    return;
}
if('ht' === $_GET['action'])
{
    Program::getProgram('fragments', 'GenHt.php');
    GenHt();
	$affiche = '<h2 class="center white">.htaccess mis à jours.</h2>';
}
if('css' === $_GET['action'])
{
    Program::getProgram('fragments', 'GenCss.php');
    GenCss();
	$affiche = '<h2 class="center white">Feuilles css misent à jours.</h2>';
}
?>