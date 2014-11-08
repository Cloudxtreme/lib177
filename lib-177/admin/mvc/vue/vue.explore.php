<?php
Head::insert('explore', 'Explorer les fichiers source de la librairie 177', $title);
echo '
<h2 class="ongletTitre">Explore</h2>
<section class="corp">
<nav class="slide">'.$slider.'</nav>
<div id="ajax" class="center">
	<div id="explorer" data-src=\'{"project": "'.$exploProject.'", "stock": "'.$destination.'"}\'>';
	if(!empty($_GET['exploProject']))
	{
		Program::getProgram('Explore', 'youAreHere.php');
		if(!empty($destination))
      $stock = explode(',', $destination);
    else
      $stock = 0;
		echo '
		<nav class="menuExplorer">
			You are here: '.Explore\youAreHere($exploProject, $stock).'<hr>
			<select id="menuExplorer">';
		foreach(Config::package('explore', 'vuesMenu') as $name => $value)
		{
			echo '<option';
			if($destination === $value)
				echo ' selected="seleted"';
			echo ' value="explore-see-'.$exploProject.'-'.$value.'-0">'.$name.'</option>';
		}
		echo '
			</select>
			Switch: <br>
		</nav>';
	}
	else
		echo '<nav class="menuExplorer">Projets<hr></nav>';
	if(empty($explore))
		echo '<div class="menuExplorer"><span class="whiteBT">Dossier vide.</span></div>';
	else
		echo $explore;
	echo '
	</div>
</div>
</section>';
Foot::insert(array('explore.js'));
?>