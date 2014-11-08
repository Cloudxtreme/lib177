<?php
function createOnePage($src, $stock, $name)
{
    Program::getProgram('core177', 'create.php');
    create($src, $name);
    Program::getProgram('core177', 'open.php');
    openFile($src.'/'.$name);
    header('Location: explore-see-'.$project.'-'.$stock.'-0');
    die;
} ?>