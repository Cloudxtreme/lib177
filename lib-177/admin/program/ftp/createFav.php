<?php
function createFav($name, $server, $pseudo, $mdp, $port = 21)
{
	$content = 	$server.PHP_EOL
				.$pseudo.PHP_EOL
				.$mdp.PHP_EOL
				.$port;
    Save::src('fragments/ftp/'.$name, $content);
} ?>