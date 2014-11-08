<?php
/**
 * @Version(name="InfoFunc", version="1.0")
 */
class InfoFunc{
	public static function existe($lib_query, $name_func)
	{
		if(!file_exists('library/'.$lib_query.'/personal/info/info.'.$name_func.'.php'))
			return false;
		else
			return true;
	}
	public static function getFunc($lib_query, $name_func)
	{
		include 'library/'.$lib_query.'/personal/info/info.'.$name_func.'.php';
		if(isset($inf_pack))
		echo 
		'<div class="package_color">';
		else
		echo 
		'<div class="function_color">';
		if(isset($localisation))
			echo '<p class="localisation">Src: '.$localisation.'</p>';
		echo '
			<h1 class="titre">'.$titre.'</h1>
			<p>'.$introduction.'</p>';
		if(isset($structure))
			echo InfoFunc::genStructure($structure);
		if(isset($exemple))
			echo '
			<br>
			<h2>Exemple(s)</h2>
			<pre><code class="language-php">'.$exemple.'</code></pre>';
		echo '
		</div>';
		return true;
	}
	public static function genStructure($table_structure)
	{
		$structures = '';
		foreach($table_structure as $structure_pointeur)
		{
			if(isset($structure_pointeur['content'])){
				$structures .=  $structure_pointeur['content'];
			}
			$structures .= '<pre><code class="language-php">';
			if(isset($structure_pointeur['return']))
				$structures .= $structure_pointeur['return'].' ';
			$structures .= $structure_pointeur['name'].'(';
			$i = 0;
			foreach($structure_pointeur['param'] as $param)
			{
				if(empty($param['type']))
					continue;
				if($i > 0)
					$structures .= ', ';
				else
					$i = 1;
				$construct_param = '';
				$construct_param .= ' '.$param['type'].'';
				$construct_param .= ' $'.$param['name'];
				if(isset($param['facult']))
					$structures .= '['.$construct_param.']';
				else
					$structures .= $construct_param;
			}
			$structures .= ');';
			if(isset($structure_pointeur['comment']))
				$structures .= ' /* '.$structure_pointeur['comment'].' */</span>';
			$structures .= '</code></pre>';
		}
		return $structures;
	}
} ?>