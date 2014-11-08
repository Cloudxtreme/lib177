<?php
function GenCss()
{
    $projects = ScanDossier::dirOnly('../', false);
    foreach($projects as $project)
    {
		Fragments::compactCss($project, 'css', 'skin_dev.css');
    }
}
?>