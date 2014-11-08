<?php
$name = 'Capsule';
$titre = 'Class '.$name;
$localisation = 'library/php/autoload/';
$introduction = 'Cette class permet d\'encapsuler une réponse (type réponse ajax en html généré par du php) dans un
document basique html5 utf-8 basique de forme:<br><br>
<pre>
	<code class="language-markup">'
		.htmlspecialchars(
			'<!DOCTYPE html>
		<html>
			<head>
				<meta charset="UTF-8">
			</head>
			<body class="corp">
				[Contenu à encapsuler]
			</body>
		</html>').'
	</code>
</pre>';
$structure = array(
	array('name' => $name.'::html', 'return' => 'array', 
		'comment' => 'retourne $content encapsuler dans du html',
		'param' => array(array('name' => 'content', 'type' => 'mixte'))
	)
);
$exemple = '$content = \'Succes\';
Capsule::html($content);';
?>