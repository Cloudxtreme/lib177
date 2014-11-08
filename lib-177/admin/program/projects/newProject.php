<?php
function newProject($name)
{
    if(file_exists('../'.$name))
    {
        echo 'Imposible de créer le projet '.$name.' car il existe déjà!';
        die;
    }
    Program::getProgram('core177', 'newDir.php');
    newDirectory('../', $name);
    
    $pile = ScanDossier::src('../base');
    foreach($pile['dossiers'] as $dossier){
        newDirectory('../'.$name.'/', $dossier);
    }
    foreach($pile['fichiers'] as $fichier){
        copy('../base/'.$fichier, '../'.$name.'/'.$fichier);
    }
    Program::getProgram('projects', 'newCtr.php');
    newCtr($name);
    Program::getProgram('projects', 'newHt.php');
    newHt($name);
	
    copy('../.htaccess', '../.HoldHt');
    Program::getProgram('fragments', 'GenHt.php');
    GenHt();
    header('Location: project');
    die;
} ?>