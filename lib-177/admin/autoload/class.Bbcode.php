<?php
/**
 * @Version(name="Bbcode", version="1.0")
 */
class Bbcode{
	private static $default_color = array(
		'red','green','blue','yellow','purple','olive'
	);
	/* Retourne les couleurs à remplacer */
	private function colorString(array $new_color = null){
		if($new_color != null){
			if(is_array($new_color)){
				$tabs = array_merge((array) self::$default_color,(array) $new_color);
			}else{
				throw new Exception('new_color is not array');
			}
		}else{
			$tabs = self::$default_color;
		}
		return implode('|', $tabs);
	}
	/* Regex pour le remplacement des bbcode */
	private function regPattern($new_color){
		return array(
			'/\[b](.+?)\[\/b\]/i','/\[i](.+?)\[\/i\]/i',
			'/\[u](.+?)\[\/u\]/i',
			'/\[color=('.self::colorString($new_color).'|#[[:xdigit:]]{6})\](.+?)\[\/color\]/i',
			'/\[quote\](.+?)\[\/quote\]/i',
			'/\[url=(.+?)\](.+?)\[\/url\]/i'
		);
	} /* Balises html qui remplace le bbcode pour l'affichage */
	private function strHtml($clear=false){
		if($clear == true){
			$pattern = array(
				'$1','$1','$1','$2','$1','$2'
			);
		}else{
			$pattern = array(
					'<strong>$1</strong>',
					'<span style="font-style:italic;">$1</span>',
					'<span style="text-decoration:underline;">$1</span>',
					'<span style="color:$1;">$2</span>',
					'$1',
					'$2'
			);
		}
		return $pattern;
	}
	/* bbcode=>html 
	option: traitement du \n => <br>, traitement de [b][u][color][quote][url], nouvelle couleur global*/
	public static function html_convert($string,$str_option=array('linebreaks'=>true,'clear'=>false,'new_color'=>null)){
		if(!empty($string)){
			if($str_option['linebreaks'] != false){
				$lb = nl2br($string);
			}else{
				$lb = $string;
			}
			return preg_replace(self::regPattern($str_option['new_color']), self::strHtml($str_option['clear']), $lb);
		}else{
			return false;
		}
	}
} ?>