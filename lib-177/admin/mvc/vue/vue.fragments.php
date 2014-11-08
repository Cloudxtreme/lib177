<?php
Head::insert('fragments', 'Gestion des fragments de la librairie 177', 'Fragments');
echo '
<h2 class="ongletTitre">Fragments</h2>
<section class="corp">
<div class="slide"><a href="fragment-ht">Gen htaccess</a><a href="fragment-css">Gen CSS</a></div>
'.$affiche.'
</section>';
Foot::insert();
?>