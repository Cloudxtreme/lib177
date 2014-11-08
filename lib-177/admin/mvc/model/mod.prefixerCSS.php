<?php
$origine = '';
$result = '<div id="repAjax"></div>';
if(isset($_POST['code'])){
	$origine = htmlspecialchars($_POST['code']);
	$result = Prefixer::get($origine);
	$result = '<div id="ajaxRep"><h1 class="center">Result <button id="copy-button" data-clipboard-text="'.htmlspecialchars($result).'" title="Copy"></button></h1><pre id="result" contenteditable="true">'.$result.'</pre></div>';
}