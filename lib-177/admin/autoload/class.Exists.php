<?php
class Exists{
	public static function tab(array $search, array $stock)
	{
		if(empty($search))
			return true;
		$key = array_pop($search);
		if(!array_key_exists($key, $stock))
			return false;
		Exists::tab($search, $stock);
		return true;
	}
} ?>