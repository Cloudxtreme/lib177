<?php
class Button{
	public static function post($src, $name, $value, $visible = false){
        if(empty($visible))
            $visible = $value;
		if(empty($name) OR empty($value))
			Error::brut('Name or value empty.');
		return'<form action="'.$src.'" method="post">
                <input type="hidden" name="'.$name.'" value="'.$value.'"><input type="submit" value="'.$visible.'" title="'.$src.'">
            </form>';
	}
	public static function multiPost($src, $BTname, array $values){
        $form = '<form action="'.$src.'" method="post">';
        foreach($values as $name => $value){
            if(empty($name) OR empty($value))
                Error::brut('Name or value empty.');
            $form .= '<input type="hidden" name="'.$name.'" value="'.$value.'">';
        }
		return $form .= '<input type="submit" value="'.$BTname.'" title="'.$src.'">
        </form>';
	}
}