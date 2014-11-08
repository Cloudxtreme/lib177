<?php
$distant = '';
$exploProject = '';
$exploAction = 'see';
$destination = 0;
$cible = 0;
if(isset($_POST['cible']))
    $_GET['cible'] = $_POST['cible'];
if(isset($_GET['exploProject']))
	$exploProject = $_GET['exploProject'];
if(isset($_GET['exploAction']))
	$exploAction = $_GET['exploAction'];
if(isset($_GET['destination']))
	$destination = $_GET['destination'];
if(isset($_GET['cible']))
	$cible = $_GET['cible'];
if(isset($_GET['distant']))
	$distant = $_GET['distant'];
Program::getProgram('Explore', 'QueryExplore.php');
$explore = Explore\QueryExplore($exploAction, $exploProject, $destination, $cible, $distant);

Program::getProgram('Explore', 'slide.php');
$slider = Explore\slide($exploProject, $destination);
$title = 'Explore';
if(!empty($exploProject))
	$title = $exploProject;
if(!empty($destination))
	$title .= '/'.$destination;
?>