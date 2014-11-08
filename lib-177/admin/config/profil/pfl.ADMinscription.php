<?php
$name = 'inscription';
$config = Config::package($name);
$i = 0;
$view = '
<form action="admin-cfg-'.$name.'-modif" method="post">
	<div class="champCfg">Name/Description</div>
	<div class="champCfg">Type</div>
	<div class="champCfg">Regex</div>
	<div class="champCfg">Dépendance</div>
	<div class="champCfg">Enfants</div><br>';
foreach($config as $input)
{
	if(empty($input['name'])){
		echo 'Un paramètre est sans nom, cfg corompue, fin.';die;}
	if(empty($input['type']))
		$input['type'] = '';
	if(empty($input['regex']))
		$input['regex'] = '';
	if(empty($input['presentation']))
		$input['presentation'] = 'presentation';
	if(empty($input['facultatif']) || $input['facultatif'] !== 1){
		$input['facultatif'] = '';
		$input['obligatoire'] = ' selected="selected"';
	}
	else{
		$input['facultatif'] = ' selected="selected"';
		$input['obligatoire'] = '';
	}
	if(!empty($input['enfants'])){
		$input['Venfants'] = 'Editer les enfants';
		$input['enfants'] = serialize($input['enfants']);
	}
	else{
		$input['Venfants'] = 'Aucun enfant';
		$input['enfants'] = '';
	}
	$view .= '
<div class="inputInscA" id="input_'.$i.'">
	<div class="panelAinsc" id="delet_'.$i.'">
		<div id="crossL"></div>
		<div id="crossR"></div>
	</div>
	<input name="name_'.$i.'" placeholder="name" value="'.$input['name'].'" id="name_'.$i.'" class="nameInscA">
	<input name="type_'.$i.'" placeholder="type" value="'.$input['type'].'" id="type_'.$i.'">
	<input name="regex_'.$i.'" placeholder="regex" value="'.$input['regex'].'" id="regex_'.$i.'">
	<select>
		<option'.$input['facultatif'].'>facultatif</option>
		<option'.$input['obligatoire'].'>obligatoire</option>
	</select>
	<input type="hidden" name="enfants_'.$i.'" value=\''.$input['enfants'].'\'>
	<input id="enfantEdit_'.$i.'" type="button" value="'.$input['Venfants'].'">
	<input name="presentation_'.$i.'" placeholder="indicatif" value="'.$input['presentation'].'">
	<select id="type_switch_'.$i.'">
		<option>type</option>
		<option>input</option>
		<option>radio</option>
		<option>select</option>
		<option>password</option>
	</select>
	<select id="regex_switch_'.$i.'">
		<option>regex</option>
		<option>email</option>
		<option>pseudo</option>
		<option>nom</option>
		<option>password</option>
		<option>codePostal</option>
	</select>
</div><hr>';
	$i++;
}
$view .= '<hr>
<div id="btCfgEdit">
	<a href="admin-cfg-'.$name.'-view">Actualise</a> | <input type="submit" value="Save"> | <a href="admin-cfg-'.$name.'-reset">Reset</a>
</div>
</form>';
return $view;
?>