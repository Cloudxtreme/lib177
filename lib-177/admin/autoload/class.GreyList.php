<?php
/**
 * @Version(name="GreyList", version="1.0")
 */
 /* Soumet une variable à une white list ou une black list fournie dans une tableau.) */
class GreyList
{
	public static function whiteList($w_list, $a_test)
	{
		if(in_array($a_test, $w_list))
			return true;
		else
			return false;
	}
	public static function blackList($b_list, $a_test)
	{
		$autorisation = true;
		foreach($b_list as $black_key)
		{
			if(stripos($a_test, $black_key) !== false)
			{
				$autorisation = false;
				break;
			}
		}
		return $autorisation;
	}
}