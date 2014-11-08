<?php
function active($src, $name){
    $source = $src.'inactif/'.$name;
    $dest = $src.$name;
    if(file_exists($source)){
        copy($source, $dest);
        unlink($source);
        return true;
    }
    else
        Error::code(19);
} ?>