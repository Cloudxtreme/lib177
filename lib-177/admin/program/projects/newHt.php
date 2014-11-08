<?php
function newht($name){
    $destination = '../'.$name.'/fragments/htaccess/ht.personal.php';
    if(!file_exists('../'.$name))
    {
        echo 'adm/program/project/newHt dit: impossible de créer le fragment Htaccess "'.$destination.'"';
        die;
    }
    $maj = ucfirst($name);
    $ctr = 'RewriteRule ^'.$name.'/([a-zA-Z0-9]+)$           '.$name.'/ctr.ctr.php?action177=$1 [L]';
    Save::src($destination, $ctr);
} ?>