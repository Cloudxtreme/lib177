<?php
session_start();
ini_set("auto_detect_line_endings", true);
header('Content-Type: text/html; charset=utf-8');
require 'autoload/class.Autoload.php';
JustLocal::lock();
if(JustLocal::bool()){
	Error::init();
	Fragments::compactCss();
	Prefixer::css('Minify.css');
	/*/Fragments::compactJs();/**/
	/**/Fragments::debugJs();/**/
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