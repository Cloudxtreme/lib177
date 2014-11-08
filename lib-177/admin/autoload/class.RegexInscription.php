<?php
/**
 * @Version(name="RegexInscription", version="1.0")
 */
class RegexInscription
{
	public static function verif($key, $pattern){
		if(preg_match($pattern, $key))
			return true;
		else
			return false;
	}
	public static function recup($key, $pattern){
		preg_match_all($pattern , $key , $recup, PREG_SET_ORDER);
		if(empty($recup))
			return false;
		$resultat = '';
		foreach($recup as $match){
			$resultat .= $match[1];
		}
		if(empty($resultat))
			return false;
		else
			return $resultat;
	}
	public static function split($key, $pattern){
		return preg_split($pattern, $key, 0, PREG_SPLIT_NO_EMPTY);
	}
	public static function supprime($key, $pattern){
	
	}
} ?>