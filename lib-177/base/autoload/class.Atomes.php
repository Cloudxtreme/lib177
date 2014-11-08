<?php
class Atomes
{
	private static $_atomes;
	
	public function __construct($name)
	{
		Atomes::$_atomes = include 'data/Atomes/atm.'.$name.'.php';
	}
	public function get($name, $search){
		if(array_key_exists($name, Atomes::$_atomes)){
			if(array_key_exists($search, Atomes::$_atomes[$name]))
				return Atomes::$_atomes[$name][$search];
		}
		return false;
	}
	public function groupe($name){
		if(array_key_exists($name, Atomes::$_atomes))
			return Atomes::$_atomes[$name];
		return false;
	}
	public function all(){
		return Atomes::$_atomes;
	}
	public static function inSelect($name, $values, $text = 'Choix', $default = 0){
		$select = '<select name="'.$name.'"><option value="0"';
		if(empty($default))
			$select .= ' selected="selected"';
		$select .= '>'.$text.'</option>';
		foreach($values AS $key => $val)
		{
			$select .= '<option value="'.$key.'"';
			if($default == $key)
				$select .= ' selected="selected"';
			$select .= ' >'.ucfirst($val).'</option>';
		}
		return $select.'</select>';
	}
}
?>