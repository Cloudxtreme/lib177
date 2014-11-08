<?php
function deleteMVC($src, $project, $stock, $cible){
    $src = array(
        $src.'controleur/' => 'ctr.'.$cible.'.php',
        $src.'model/' => 'mod.'.$cible.'.php',
        $src.'vue/' => 'vue.'.$cible.'.php'
    );
    Program::getProgram('core177', 'delete.php');
    foreach($src as $chemin => $name){
        delete177($chemin, $name);
    }
    header('Location: explore-see-'.$project.'-'.$stock.'-0');
    die;
}
?>