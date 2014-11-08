<?php
class Capsule
{
	public static function html($content)
	{
		return '<!DOCTYPE html><html><head><meta charset="UTF-8"></head><body class="corp">'
		.$content.'</body></html>';
	}
} ?>