<?php
if(!isset($_POST['project']))
{
    $_POST['project'] = 0;
    $_POST['action'] = 'list';
}
Program::getProgram('projects', 'QueryProject.php');
$projectOut = QueryProject($_POST['project'], $_POST['action']);
?>