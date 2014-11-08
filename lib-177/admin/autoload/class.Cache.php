<?php
class Cache
{
	public static function read($src)
	{
		return include Config::srcCache().'/'.$src;
	}
} ?>