<?php
$affiche = '';
if(!isset($_POST['newIndex']) OR empty($_POST['newIndex']))
	return;
$contenu = 
'<?php
header(\'Location: '.$_POST['newIndex'].'\');
die();
?>';
if(Save::src('../index.php', $contenu))
	$affiche = '<h3 class="blue center">Chemin modifié.</h3>';
else
	$affiche = '<h3 class="red center">Erreur lors de l\'écriture du nouvel index.</h3>';
?>