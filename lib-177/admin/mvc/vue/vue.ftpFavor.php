<?php
Program::getProgram('ftp', 'slideFavor.php');
$slider = slideFavor();
Head::insert('ftpFavor', 'Gestion des ftp favoris', 'FTP Favor');
echo '
<h2 class="ongletTitre">Ftp favoris</h2>
<section class="corp">
	'.$slider.'<br><br>
	'.$affiche.'
</section>';
Foot::insert();
?>