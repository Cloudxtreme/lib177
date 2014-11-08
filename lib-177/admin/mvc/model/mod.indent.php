<?php
$origine = '';
$result = '<div id="repAjax"></div>';
if(isset($_POST['code']))
{
	$origine = htmlspecialchars($_POST['code']);
	$result = Indent::css($origine);
	$result = '<div id="ajaxRep"><h1 class="center">Result <button id="copy-button" data-clipboard-text="'.$result.'" title="Copy"><img src="library/img/copy2.png"></button></h1><pre id="result" contenteditable="true">'.$result.'</pre></div>';
}