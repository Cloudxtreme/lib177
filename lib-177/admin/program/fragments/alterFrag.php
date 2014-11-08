<?php
function alterFrag($src, $project, $stock, $name)
{
    if(@file_exists($src.$name)){
        Program::getProgram('fragments', 'inactive.php');
        inactive($src, $name);
    }
    else{
        Program::getProgram('fragments', 'active.php');
        active($src, $name);
    }
	header('Location: fragments-seeFrags-'.$project.'-'.$stock.'-none');
	die;
}