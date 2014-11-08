<?php
/**
 * @Version(name="Verif", version="1.0")
 */
 /* Données entrantes $pseudo = Secur::propre($_POST['pseudo']); */
class Verif{
	public static function int($saleter)
	{
		if(filter_var($saleter, FILTER_VALIDATE_INT) OR $saleter === 0 OR $saleter === '0')
			return true;
		else
			return false;
	}
	public static function aZ($saleter)
	{
		if(preg_match("#^[a-zA-Z]+$#",$saleter))
			return true;
		else
			return false;
	}
	public static function aZ09($saleter)
	{
		if(preg_match("#^[a-zA-Z0-9]+$#",$saleter))
			return true;
		else
			return false;
	}
	public static function txt_strict($saleter)
	{
		if(preg_match("#^[a-zA-Z0-9_-éèàïùç\.]+$#",$saleter))
			return true;
		else
			return false;
	}
	public static function float($saleter)
	{
		if(filter_var($saleter, FILTER_VALIDATE_FLOAT))
			return true;
		else
			return false;
	}
	public static function email($saleter)
	{
		if(preg_match ("#^[\w._-]+@[\w._-]{2,}\.[a-z]{2,4}$#",$saleter))
			return true;
		else
			return false;
	}
	public static function url($saleter)
	{
		if(filter_var($saleter, FILTER_VALIDATE_URL))
			return true;
		else
			return false;
	}
	public static function ip($saleter)
	{
		if(filter_var($saleter, FILTER_VALIDATE_IP))
			return true;
		else
			return false;
	}
	public static function min_max($saleter, $saleter_min, $saleter_max)
	{
		$options = array('options' => array(
        'min_range' => $saleter_min,
        'max_range' => $saleter_max));
		$resultat = filter_var($saleter, FILTER_VALIDATE_INT, $options);
		if($resultat !== false && $resultat !== null)
			return true;
		return false;
	}
} ?>