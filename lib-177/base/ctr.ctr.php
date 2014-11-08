<?php
session_start();
require 'autoload/class.Autoload.php';
if(JustLocal::bool()){
	Error::init();
	Fragments::compactCss('skin.css');
	Prefixer::css('Minify.css');
	Fragments::compactJs('jsPersonalMin.js');
}
else
	header('Accept-Encoding: gzip, deflate');
if(!isset($_GET['action177']))
	$_GET['action177'] = 'index';
else
	$_GET['action177'] = substr(Secur::aZ09($_GET['action177']), 0, 100);
if(!file_exists('mvc/controleur/ctr.'.$_GET['action177'].'.php')){
	Error::code(8);
}
require 'mvc/controleur/ctr.'.$_GET['action177'].'.php';
if(!file_exists('mvc/model/mod.'.$_GET['action177'].'.php')){
	Error::code(9);
}
require 'mvc/model/mod.'.$_GET['action177'].'.php';
if(!file_exists('mvc/vue/vue.'.$_GET['action177'].'.php')){
	Error::code(10);
}
require 'mvc/vue/vue.'.$_GET['action177'].'.php';
?>