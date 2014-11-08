<?php
function createDir($ftp, $src, $stock, $cible)
{
	$ftp->cd($src);
    $ftp->newDir($cible);
    header('Location: ftp-see-'.$stock.'-0');
    die;
} ?>