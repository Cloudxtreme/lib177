<?php
function openMVC($projet, $type, $cible){
    $mvc = '../'.$projet.'/mvc/';
    switch($type){
        case 'ctr':
            $path = 'controleur/';
        break;
        case 'mod':
            $path = 'model/';
        break;
        case 'vue':
            $path = 'vue/';
        break;
        case 'all':
            Program::getProgram('core177', 'open.php');
            openFile($mvc.'controleur/ctr.'.$cible.'.php');
            openFile($mvc.'model/mod.'.$cible.'.php');
            openFile($mvc.'vue/vue.'.$cible.'.php');
        break;
        default:
            die('A.openMVC dit: type '.$type.' incorect.');
    }
    $chemin = $mvc.$path.$type.'.'.$cible.'.php';
    Program::getProgram('core177', 'open.php');
    openFile($chemin);
}
?>