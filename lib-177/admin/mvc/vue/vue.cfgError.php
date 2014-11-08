<?php
Head::insert('admin-error', 'Modifier le package error', 'Modif - Error');
echo '
<h1 class="ongletTitre">Error</h1>
<div class="userAdm corp">
	<div class="dialInscription">'.$dialInscription.'</div>'
	.Config::viewCfg('Error').
'</div>';
Foot::insert(array('Acfg.js'));
?>