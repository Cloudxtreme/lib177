<?php
function compacte($project)
{
	Fragments::compact($project, 'css', '../../library/admin/css/skin.css');
	header('Location: fragments');
    die;
}
?>