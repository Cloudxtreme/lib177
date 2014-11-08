<?php
$name = 'error';
$config = Config::package($name);
$i = 0;
$view = '
<form action="admin-cfg-'.$name.'-modif" method="post">';
	if(empty($config['timeout_redirect'])){
		$config['timeout_redirect'] = 25;
	}
	if(empty($config[$name]['redirect'])){
		$config['redirect'] = 'index';
	}
$view .= '<span>temps avant redirection: </span>
<input name="timeout_redirect" value="'.$config['timeout_redirect'].'">
<span>Rediriger par defaut vers: </span>
<input name="redirect" value="'.$config['redirect'].'">
<hr>
<div id="btCfgEdit">
	<a href="admin-cfg-'.$name.'-view">Actualise</a> | <input type="submit" value="Save"> | <a href="admin-cfg-'.$name.'-reset">Reset</a>
</div>
</form>';
return $view;
?>