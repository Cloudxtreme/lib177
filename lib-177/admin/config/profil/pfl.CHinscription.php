<?php
$config = Config::package('inscription');
$form = '';
foreach($config as $input){
	if(empty($input['name']))
		Error::code(5);
	if(empty($input['type']))
		Error::code(16);
	
	if($input['type'] === 'radio'){
		$form .= '<fieldset><legend>'.$input['name'].':</legend>';
		foreach($input['enfants'] as $radio)
		{
			if(empty($radio['value']))
				continue;
			$form .= '<label for="'.$radio['value'].'">'.$radio['value'].'</label>';
			$form .= '<input type="radio" name="'.$input['name'].'" value="'.$radio['value'].'" id="'.$radio['value'].'">';
		}
		$form .= '</fieldset>';
		continue;
	}
	else
	{
		$form .= '<input name="'.$input['name'].'" placeholder="'.$input['name'].'"';
		if(!empty($input['type']))
			$form .= ' type="'.$input['type'].'"';
		if(!empty($input['maxL']))
			$form .= ' maxlength="'.$input['maxL'].'"';
		$form .= '>';
	}
}
return $form;
?>