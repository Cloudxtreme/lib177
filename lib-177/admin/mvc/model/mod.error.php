<?php
header("X-Robots-Tag: noindex, nofollow", true);
if(isset($_GET['error']))
	$code = (int) $_GET['error'];
$time_redirect = 25;
$src_redirect = 'index';
$site_name = 'lib-177.fr';
if(!empty($time_redirect) && !empty($src_redirect))
    header('Refresh: '.$time_redirect.'; '.$src_redirect);

$meta_desc = 'Une erreur c\'est produite sur votre site '.$site_name;

$message_error = Error::recupTxt($code);
if(empty($message_error))
    $message_error = 'Votre site '.$site_name.' est momentanément indisponible,
    nous travaillons actuellement à régler ce problème dans les meilleurs délais,
    merci par avance pour votre compréhension.<br><br>Cordialement.';
?>