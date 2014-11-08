<?php
function newCtr($name){
	$destination = '../'.$name.'/ctr.ctr.php';
	if(!file_exists('../'.$name))
	{
		echo 'adm/program/project/newCtr dit: impossible de créer le controleur frontal à l\'adresse "'.$destination.'"';
		die;
	}
	$maj = ucfirst($name);
	$ctr = "<?php
session_start();
/*/header('Accept-Encoding: gzip, deflate');/**/
require 'autoload/class.Autoload.php';
if(JustLocal::bool()){
	Error::init();
	Fragments::compactCss('$name', 'css', 'skin.css');
	Prefixer::css('admin', 'Minify.css');
	Fragments::compactJs('$name', 'js', 'jsPersonalMin.js');
}
else
	header('Accept-Encoding: gzip, deflate');
if(!isset(\$_GET['action']))
	\$action$maj = 'index';
else
	\$action$maj = substr(Secur::aZ09(\$_GET['action']), 0, 100);
/*/ echo 'mvc/controleur/ctr.'.\$action$maj.'.php';die; /**/
/* Controleur */
if(!file_exists('mvc/controleur/ctr.'.\$action$maj.'.php')){
	Error::code(8);
}
require 'mvc/controleur/ctr.'.\$action$maj.'.php';

/* Model */
if(!file_exists('mvc/model/mod.'.\$action$maj.'.php')){
	Error::code(9);
}
require 'mvc/model/mod.'.\$action$maj.'.php';

/* Vue */
if(!file_exists('mvc/vue/vue.'.\$action$maj.'.php')){
	Error::code(10);
}
require 'mvc/vue/vue.'.\$action$maj.'.php';
?>";
	Save::src($destination, $ctr);
} ?>