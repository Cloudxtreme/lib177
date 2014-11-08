<?php
function createMVCPages($src, $stock, $cible)
{
    Program::getProgram('core177', 'create.php');
    Program::getProgram('core177', 'open.php');
    $src = array(
        $src.'controleur/' => 'ctr.'.$cible.'.php',
        $src.'model/' => 'mod.'.$cible.'.php',
        $src.'vue/' => 'vue.'.$cible.'.php'
    );
    foreach($src as $chemin => $cible){
        create($chemin, $cible);
        openFile($chemin.$cible);
    }
    header('Location: explore-see-'.$project.'-'.$stock.'-0');
    die;
} ?>