<?php
function deleteFav($ftp, $src, $stock, $cible){
	$ftp->cd($src);
    $ftp->rm($cible);
    header('Location: ftp-see-'.$stock.'-0');
    die;
}
?>