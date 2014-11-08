<?php
/**
 * @Version(name="Error", version="1.0")
 */
class Error{
	public static function init(){
		error_reporting(E_ALL | E_STRICT);
		if(!ini_set('display_errors', 'On'))
			Error::brut('php.ini can\'t be edit');
		ini_set('error_log', 'lib177.log');
		ini_set('html_errors', 'Off');
		
		set_error_handler(function($type, $msg, $file, $line, $context = array()){
			$response = '<hr><hr><h2>Une erreur s\'est produite : ('.$type.') '.$msg."</h2><hr>"
			.'<h2>Dans le fichier '.$file.' à la ligne '.$line.'</h2><hr>'
			.'<h2>Contexte :</h2><pre>'.print_r($context, true).'</pre>'
			.'<hr><h2>Chemin parcourue jusqu\'à l\'erreur:</h2><pre>'
			.self::getTrace()
			.'</pre><hr><hr>';
			if($type == E_USER_ERROR){
				$method = 1;
				$dest   = Config::emailAdmin();
			}
			else{
				$method = 3;
				$dest   = 'lib177.log';
			}

			error_log($response, $method, $dest);
			echo $response;
		});
	}
	private static function getTrace()
	{
		ob_start();
		debug_print_backtrace();
		return ob_get_clean();
	}
	public static function code($code){
		$code = (int) $code;
		header('Location: error-'.$code); die;
	}
	public static function recupTxt($code)
	{
		$code = (int) $code;
		$srcError = Config::srcPackage().'/error/messages/'.$code.'.php';
		if($code !== 0 AND file_exists($srcError)){
			$buf_error = @fopen($srcError, 'r');
			if($buf_error){
				$message_error = '';
				while(!feof($buf_error)){
					$buffer = fgetss($buf_error);
					$message_error .= $buffer;
				}
				fclose($buf_error);
				return $message_error;
			}
			else
				return false;
		}
		return false;
	}
	public static function insert($code)
	{
		$code = (int) $code;
		$configError = Config::package('error');//, 'timeout_redirect'
		$time_redirect = $configError['timeout_redirect'];
		$src_redirect = $configError['redirect'];
		$site_name = Config::domaine();
		if(!empty($time_redirect) && !empty($src_redirect))
			header('Refresh: '.$time_redirect.'; '.$src_redirect.'');
		header("X-Robots-Tag: noindex, nofollow", true);
		$meta_desc = 'Une erreur c\'est produite sur votre site '.$site_name;
		$message_defaut = 'Votre site '.$site_name.' est momentanement indisponible,
					nous travaillons actuellement à réglé ce problème dans les meilleurs délais,
					merci par avance pour votre compréention.<br><br>Cordialement.';
		Head::insert('error-'.$code,$meta_desc,$site_name.' - Erreur '.$code.'!');
		$message_error = Error::recupTxt($code);
		if(empty($message_error))
			$message_error = $message_defaut;
		echo '
		<h2 class="h2Error">(erreur '.$code.')</h2>
		<h3 class="h3Error center">'.$message_error.'</h3>';
		if(isset($complement))
			echo '<h3 class="h3Error" id="complement">'.$complement.'</h3>';
		echo '
		<h4 class="h4Error center">Vous allez être redirigé dans un instant...</h4>
		<h5 class="h5Error center">
			Si vous ne souhaitez pas attendre,
			cliquez <a href="http://'.$site_name.'/'.$src_redirect.'">ici</a>
		</h5>';
		Foot::insert(); die;
	}
	public static function brut($message)
	{
		$trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
		header("X-Robots-Tag: noindex, nofollow", true);
		$meta_desc = 'Une erreur c\'est produite sur votre site.';
		if(empty($message))
			$message = 'Votre site est momentanément indisponible,
			nous travaillons actuellement à réglé ce problème dans les meilleurs délais,
			merci par avance pour votre compréhension.<br><br>Cordialement.';
		Head::insert('Erreur', $meta_desc, 'Erreur');
		echo '
		<h2 class="ongletTitre">Erreur</h2>
		<p class="corp center">
			'.$trace[0]['file'].' line '.$trace[0]['line'].' say: '.$message.'
		</p>';
		Foot::insert(); die;
	}
	
} ?>