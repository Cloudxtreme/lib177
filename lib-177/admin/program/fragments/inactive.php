<?php
function inactive($src, $name){
    $source = $src.$name;
    $dest = $src.'inactif/'.$name;
    if(file_exists($source)){
        copy($source, $dest);
        unlink($source);
        return true;
    }
    else
        Error::code(19);
} ?>