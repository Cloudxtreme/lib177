<?php
$newConf = "<?php /* Configuration du package error */
\$package['error'] = array(
/* Veuillez mettre à 0 les options que vous ne voulez pas utiliser */
\t'timeout_redirect' => ".(int) $_POST['timeout_redirect'].
", /* Integer représentent le temps en secondes avant redirection */
\t'redirect' => '".$_POST['redirect']."' /* Chemin de redirection */
); ?>";
return $newConf;
?>