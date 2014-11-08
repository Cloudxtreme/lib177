<?php
Program::getProgram('ftp', 'slide.php');
$slider = slide($stock);
Head::insert('ftp', 'Explorer my FTP servers.', 'FTP');
echo '
<h2 class="ongletTitre">Ftp</h2>
<section class="corp">'
	.$slider
	.$affiche.'
</section>';
Foot::insert(array('AExplore.js'));
?>