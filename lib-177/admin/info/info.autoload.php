<?php
$inf_pack = 1;
$titre = 'Auto chargement des fonctions';
$localisation = 'library/php/autoload';
$introduction = '
	Toute class mise dans <span class="green">library/php/autoload</span>, en suivant la convention
	de nomage <span class="red">class.MaClass.php</span> (ne pas oublier la majuscule de nom de class) sera chargé
	automatiquement à son appel grâce au script <span class="green">library/php/autoload.php</span> qui est inclu au début de
	toutes pages grâce au controleur principal <span class="green">ctr.ctr.php</span> à la racine du site appelé en 1er par defaut.<br><br>
	Pour modifier le chemin ou le nom du dossier de chargement automatique, ce référer à la <span class="yellow">ligne 4</span> de 
	<span class="green">library/php/autoload/autoload.php</span><br><br>
	Pour modifier le chemin ou le nom du fichier <span class="green">autoload.php</span>, ce référer à la <span class="yellow">ligne 2</span> de <span class="green">ctr.ctr.php</span>';
?>