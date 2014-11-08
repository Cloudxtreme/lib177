<?php
/**
 * @Version(name="Secur", version="1.0")
 */
 /* Données entrantes $pseudo = Secur::propre($_POST['pseudo']); */
class Secur{
	public static function auto($saleter){
		if(!ctype_digit($saleter))
			return htmlspecialchars($saleter, ENT_QUOTES | ENT_HTML5, 'UTF-8');
		return (int) $saleter;
	}
	public static function int($saleter){
		return (int) $saleter;
	}
	public static function aZ($saleter){
		if(preg_match('#^[a-zA-Z]#u', $saleter))
			return $saleter;
		return false;
	}
	public static function aZ09($saleter){
		if(preg_match('#^[a-zA-Z0-9]#u', $saleter))
			return $saleter;
		return false;
	}
	public static function txt($saleter){
		return filter_var($saleter, FILTER_SANITIZE_STRING);
	}
	public static function float($saleter){
		return filter_var($saleter, FILTER_SANITIZE_NUMBER_FLOAT);
	}
	public static function email($saleter){
		if(preg_match("#^[\w._-]+@[\w._-]{2,}\.[a-z]{2,4}$#u", $saleter))
			return $saleter;
		else
			return false;
	}
	public static function pseudo($saleter){
		if(preg_match("#^[a-zA-Z0-9]{2,25}$#u", $saleter))
			return $saleter;
		else
			return false;
	}
	public static function phone($saleter){
		$saleter = str_replace(array(' ', '-', '.'), '', $saleter);
		if(preg_match("#[0-9]{10}$#u", $saleter))
			return $saleter;
		else
			return false;
	}
	public static function url($saleter){
		return filter_var($saleter, FILTER_SANITIZE_URL);
	}
	public static function ip($saleter){
		return filter_var($saleter, FILTER_SANITIZE_IP);
	}
	public static function max($saleter, $saleter_min, $saleter_max){
		$options = array('options' => array(
        'min_range' => $saleter_min,
        'max_range' => $saleter_max));
		$resultat = filter_var($saleter, FILTER_SANITIZE_NUMBER_INT, $options);
		if($resultat !== false && $resultat !== null)
			return true;
		return false;
	}
} ?>