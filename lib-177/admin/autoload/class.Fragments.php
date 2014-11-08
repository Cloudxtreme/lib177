<?php
class Fragments
{
	public static function present($project, $groupe = false)
	{
		if(empty($groupe)){
			return ScanDossier::dirOnly('../'.$project.'/fragments', false);
		}
		return ScanDossier::fileOnly('../'.$project.'/fragments/'.$groupe, false);
	}

	public static function getFrag($project, $groupe, $name){
		file_get_contents('../'.$project.'/fragments/'.$groupe.'/'.$name);
	}

	public static function compact($groupe, $destination, $project = ''){
		if(!empty($project))
			$project = '../'.$project.'/';
		$src = $project.'fragments/'.$groupe;
		$fragments = ScanDossier::fileOnly($src, false);
		$cumul = '';
		foreach($fragments as $frag){
			$cumul .= file_get_contents($src.'/'.$frag)."\n";
		}
		if(!empty($cumul)){
			Save::src($destination, $cumul);
		}
	}

	public static function compactCss($name = false, $project = '')
	{
		if(!empty($project))
			$project = '../'.$project.'/';
		if(empty($name))
			$name = 'skin.css';
		$src = $project.'fragments/css';
        $dev = $project.'library/css/'.$name;
        $min = $project.'library/css/Minify.css';
		$fragments = ScanDossier::fileOnly($src, false);
		$cumul = '';
		if(!empty($fragments))
		{
			foreach($fragments as $frag){
				$cumul .= file_get_contents($src.'/'.$frag);
			}
		}
		if(!empty($cumul)){
			Save::src($dev, $cumul);
			$cumul = Minify::css($cumul);
			$cumul .= "\n /* Retrouver le code non minifié ici:  ".$dev.'*/';
			Save::src($min, $cumul);
		}
	}

	public static function compactJs($name = false, $project = '')
	{
		if(!empty($project))
			$project = '../'.$project.'/';
		if(!file_exists($project.'fragments/js'))
			return false;
		$src = $project.'fragments/js';
        $dev = 'library/js/'.$name;
        $min = 'library/js/Minify.js';
		$fragments = ScanDossier::fileOnly($src, false);
		if(empty($fragments))
			return false;
		if(!empty($name)){ /* Compacte all in one file */
			$cumul = '';
			foreach($fragments as $frag){
				$cumul .= file_get_contents($src.'/'.$frag);
			}
			if(!empty($cumul)){
				Save::src($dev, $cumul);
				$cumul = Minify::css($cumul);
				$cumul .= "\n /* Retrouver le code non minifié ici:  ".$dev.'*/';
				Save::src($min, $cumul);
			}
			return true;
		}
		/* Compacte all file to file */
		foreach($fragments as $frag){
			$file = '';
			$file = file_get_contents($src.'/'.$frag);
			$file = Minify::css($file);
			if(!empty($file))
				Save::src('library/js/'.$frag, $file);
		}
		return true;
	}

	public static function debugJs($name = false, $project = '')
	{
		if(!empty($project))
			$project = '../'.$project.'/';
		if(!file_exists($project.'fragments/js'))
			return false;
		$src = $project.'fragments/js';
        $dev = 'library/js/'.$name;
        $min = 'library/js/Minify.js';
		$fragments = ScanDossier::fileOnly($src, false);
		if(empty($fragments))
			return false;
		if(!empty($name)){ /* Compacte all in one file */
			$cumul = '';
			foreach($fragments as $frag){
				$cumul .= file_get_contents($src.'/'.$frag);
			}
			if(!empty($cumul)){
				Save::src($dev, $cumul);
				Save::src($min, $cumul);
			}
			return true;
		}
		/* Compacte all file to file */
		foreach($fragments as $frag){
			$file = '';
			$file = file_get_contents($src.'/'.$frag);
			if(!empty($file))
				Save::src('library/js/'.$frag, $file);
		}
		return true;
	}
}
?>