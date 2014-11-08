<?php
Head::insert('Project', 'Projets disponibles.', 'Projects');
echo '
<h1 class="ongletTitre">Projets:</h1>
<nav class="corp">
	<nav class="slide">
		Nouveau projet:
		<form action="project" method="post">
			<input type="hidden" name="action" value="new">
			<input placeholder="Project name" name="project">
			<input type="submit" value="+" title="Nouvelle page">
		</form>
	</nav>
	<nav class="center" id="explorer">
		'.$projectOut.'
	</nav>
</nav>';
Foot::insert(); ?>