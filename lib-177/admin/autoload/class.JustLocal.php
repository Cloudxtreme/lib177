<?php
class JustLocal
{
    public static function lock()
    {
        if (GreyList::blackList(array('127.0.0.1', '::1'), @$_SERVER['REMOTE_ADDR']))
            Error::code(1);
    }
    public static function bool()
    {
        if(GreyList::blackList(array('127.0.0.1', '::1'), @$_SERVER['REMOTE_ADDR']))
			return false;
		return true;
    }
} ?>