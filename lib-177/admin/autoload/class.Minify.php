<?php
class Minify{
	public static function css($css){
		$css = preg_replace('#/\*.\*/#s', '', $css);
		$css = preg_replace('#\r+|\n+|\s+#', ' ', $css);
		$css = preg_replace('#(  )+#', '', $css);
		return trim($css);
	}
}