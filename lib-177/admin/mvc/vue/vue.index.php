<?php
Head::insert('index', 'Zone admin', 'Zone admin');
echo '<h1 class="ongletTitre">Zone admin</h1>
<nav class="navAdmin corpNoPd">';
foreach($outils as $outil)
{
	echo '<h3>'.$outil['titre'].'</h3>';
	if(!empty($outil['options']))
	{
		foreach($outil['options'] as $option){//var_dump($option);die;
			echo '<a href="'.$option[0].'">'.$option[1].'</a>';
		}
	}
	else
		echo '<a href="">Aucun outil disponible pour le moment.</a>';
}
echo '</nav>';
Foot::insert(); ?>