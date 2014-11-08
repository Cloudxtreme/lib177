<?php
Class genInscription
{
	public static function viewInscription($target)
	{
		$src = '../'.$target.'/config/cfg.genInscription.php';
		if (!file_exists($src))
			copy('../admin/config/cfg.genInscription.php', $src);
		include_once $src;
		$projects = ScanDossier::dirOnly('../', false);
		$select = "	<option></option>\n";
		foreach ($projects as $project)
			$select .= '	<option value="'.$project.'">'.$project.'</option>'."\n";
		$form = '<form class="genInscLoader">Load: <select id="project177" name="project177">'."\n".$select.'</select></form>
		<form action="genInscription" method="post" id="genInscription">
		<hr>
		<table>
		<thead>
			<tr>
				<td><div class="createBT" title="Add"><div class="crossL"></div><div class="crossR"></div></div></td>
				<td><input name="" value="" class="addInput177" placeholder="Name" maxlength="255" pattern="[A-Za-z0-9 ]{2,255}" title="2 à 255 caractères alphanumériques"></td>
				<td><textarea name="" placeholder="Code HTML for this input"></textarea></td>
				<td><textarea name="" placeholder="Condition of validation"></textarea></td>
			</tr>
			<tr><td>remove</td><td>Name</td><td>HTML</td><td>Checking condition</td></tr>
		</thead>
		<tbody>';
		$i = -1;
		foreach ($cfg['genInscription']['save'] as $index => $input)
			$form .= '
			<tr id="tr'.(++$i).'">
				<td><div class="rmBT" title="Remove"><div class="crossL"></div><div class="crossR"></div></div></td>
				<td><input name="index'.$i.'" value="'.$index.'" placeholder="Name" maxlength="255" required="required" pattern="[A-Za-z0-9 ]{2,255}" title="2 à 255 caractères alphanumériques"></td>
				<td><textarea name="'.$index.'Html" placeholder="Code HTML for this input">'.$input['html'].'</textarea></td>
				<td><textarea name="'.$index.'Verif" placeholder="Condition of validation">'.$input['verif'].'</textarea></td>
			</tr>';
		$select = "\n".'<h3 class="center">Save in: <select name="save">'."\n".$select.'</select> page name: <input name="name" value="inscription"></h3>';
		return $form."\n".'</tbody></table><br><hr>'."\n".$select.'<button>Generation</button><br><br>
		</form>';
	}

	public static function buildInscription($project, $name, $values)
	{
		Program::getProgram('core177', 'create.php');
		$src = '../'.$project.'/mvc/';
		$data = '../'.$project.'/data/genInscription/';

		\Core177\create($src.'controleur/', 'ctr.'.$name.'.php', 'UTF-8', 'w+');
		\Core177\create($src.'model/', 'mod.'.$name.'.php', 'UTF-8', 'w+');
		\Core177\create($src.'vue/', 'vue.'.$name.'.php', 'UTF-8', 'w+');
		
		$controller = '<?php'."\n".'/*/Virtualflux::drip();/**/'."\n".'?>';

		$model = "<?php\n\$verif = '';\nif (!isset(\$_POST) OR empty(\$_POST))\n{\n"
		."	\$form = include '../lib177/data/genInscription/formBrut.php';\n	return;\n}\n\n";

		$view = "<?php\nHead::insert('$name', 'Create your account now with our form of registration', '$name');\n"
			."echo \$verif.'\n<form action=\"$name\" method=\"post\">\n"
			."	'.\$form.'\n	<input type=\"submit\" value=\"Inscription\">\n</form>';\nFoot::insert();\n?>";

		$formBrut = $formRetail = '';
		$values = self::extractInArray($values);
		foreach($values AS $input)
		{
			$model .= 'if (!('.$input['verif'].'))'."\n".'	$verif .= ucfirst(\''.$input['name'].' incorrect !\');'."\n"
			.'else'."\n".'	$recup[\''.$input['name'].'\'] = $_POST[\''.$input['name'].'\'];'."\n\n";
			
			$formBrut .= '	'.$input['html']."\n	<br><br>\n";

			$formRetail .= str_replace(
				'name="'.$input['name'].'"', /* Search */

				'<?php if (!empty($recup[\''.$input['name'].'\'])) echo \'value="\'.$recup[\''.$input['name'].'\'].\'"\'; ?>'
					.' name="'.$input['name'].'"',/* Replace by */

				$formBrut /* Target */
			);
		}
		$model .= "\nif (empty(\$verif))\n	die('Success!');\n\n"
			."if (empty(\$recup))\n	\$form = include '".$data."formBrut.php';\n"
			."else\n	\$form = include '".$data."formRetail.php';\n?>";

		$formRetail = "<?php ob_start(); ?>\n".$formRetail."<?php return ob_get_clean(); ?>";

		$formBrut = "<?php\nreturn\n<<<EOF177\n".$formBrut."EOF177;\n?>";

		if (!is_dir($data))
			mkdir($data);

		Save::src($data.'formBrut.php', $formBrut);
		Save::src($data.'formRetail.php', $formRetail);
		Save::src($src.'controleur/ctr.'.$name.'.php', $controller);
		Save::src($src.'model/mod.'.$name.'.php', $model);
		Save::src($src.'vue/vue.'.$name.'.php', $view);

		Program::getProgram('core177', 'open.php');
		\Core177\open($src.'controleur/ctr.'.$name.'.php');
		\Core177\open($src.'model/mod.'.$name.'.php');
		\Core177\open($src.'vue/vue.'.$name.'.php');
	}

	private static function extractInArray($values)
	{
		$i = -1;
		while (isset($values['index'.(++$i)]))
		{
			$index = str_replace(' ', '_', $values['index'.$i]);
			$info[$i] = array(
				'name' => $values['index'.$i],
				'html' => $values[$index.'Html'],
				'verif' => $values[$index.'Verif']
			);
		}
		return $info;
	}

	private static function saveInscription($values)
	{
		$i = -1;
		while (isset($values['index'.(++$i)]))
		{
			$index = str_replace(' ', '_', $values['index'.$i]);
			$info[$i] = array(
				'name' => $values['index'.$i],
				'html' => $values[$index.'Html'],
				'verif' => $values[$index.'Verif']
			);
		}
		return $info;
	}
}
?>