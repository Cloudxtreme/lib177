<?php
class Indent
{
	public static function css($css)
	{
		return preg_replace_callback('#(\s*{\s*)([^}]*)(\s*}\s*)#', "self::indentCode", $css);
	}
	
	private static function indentCode($capture)
	{
		$txt = "\n{\n";
		$txt .= preg_replace_callback(
			'#(\s*)([^;\t\n]*)(\s*;\s*)#',
			function($underCap){
				return "\t".trim($underCap[2]).";\n";
			}, $capture[2]);
		$txt .= "}\n";
		return $txt; 
	}
}