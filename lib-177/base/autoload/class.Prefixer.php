<?php
class Prefixer
{
	public static function css($name, $projet = ''){
		if(!empty($project))
			$project = '../'.$project.'/';
		$src = $projet.'library/css/'.$name;
		$code = file_get_contents($src);
		$code = Prefixer::get($code);
		return Save::src($src, $code);
	}
	public static function get($code, $clean = true){
		$pattern = array(
			"animation",
			"border-radius",
			"box-shadow",
			"box-sizing",
			"transform",
			"transition",
			"columns"
		);
		foreach($pattern AS $i => $val){
			$patternClean[$i] = "#(\s*)(-o-".$val."|-ms-".$val."|-moz-".$val."|-webkit-".$val.")(.*;)(\s*)#U";
			$replacementClean[$i] = '';
			$pattern[$i] = "#(".$val.")(.*;)#U";
			$replacement[$i] = '$1$2-o-$1$2-ms-$1$2-moz-$1$2-webkit-$1$2';
		}
		$pattern[++$i] = "#(@keyframes)([^}{]*\{([^}{]*\{[^}{]*\}[^}{]*)*\})#U";
		$replacement[$i] = '$1$2 @-o-keyframes$2 @-ms-keyframes$2 @-moz-keyframes$2 @-webkit-keyframes$2';
		$val = 'keyframes';

		$patternClean[$i] = "#(\s*@)(-o-".$val."|-ms-".$val."|-moz-".$val."|-webkit-".$val.")([^}{]*\{([^}{]*\{[^}{]*\}[^}{]*)*\})(\s*)#U";
		$replacementClean[$i] = '';
		/*/echo 'Pat :<pre>';print_r($pattern);echo'replace';print_r($replacement);die;
background: -ms-linear-gradient(top, rgba(76,76,76,1) 0%,rgba(0,0,0,1) 100%);
background: linear-gradient(top, rgba(76,76,76,1) 0%,rgba(0,0,0,1) 100%);/**/
		$pattern[++$i] = "#(background\s*:\s*)((linear-gradient)\([^\)\(]*([^\)\(]*\([^\)\(]*\)[^\)\(]*)*[^)(]*\);)#U";
		$replacement[$i] = '$1$2 $1-o-$2 $1-ms-$2 $1-moz-$2 $1-webkit-$2';
		$val = 'linear-gradient';

		$patternClean[$i] = "#(\s*background\s*:\s*)(-o-|-ms-|-moz-|-webkit-)((linear-gradient)\([^)(]*(\([^)(]*\))*[^)(]*\);)(\s*)#U";
		$replacementClean[$i] = '';

		if($clean)
			$code = preg_replace($patternClean, $replacementClean, $code);
		$code = preg_replace($pattern, $replacement, $code);
		if(empty($code))
			return false;
		return $code;
	}
}
?>