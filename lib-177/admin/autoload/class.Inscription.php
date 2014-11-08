<?php
/**
 * @Version(name="inscription", version="1.0")
 */
class Inscription
{
	public function msgBienvenu(User $new_user){
		$newUser = New UserManager();
		//('query' => 'INSERT DELAYED '.Config::package('user', 'tUser').'(emetteur, destinataire, proprio, message, date_envoie, lu) VALUES(?, ?, ?, ?, NOW(), 2)',
					//'arguments' =>$emetteur, $pseudo, $pseudo, $message
	}
	public static function checkRegex(){
		$resultat = array(
			'error' => 0,
			'true' => array(),
			'false' => array(),
			'empty' => array()
		);
		$config = Config::package('inscription');
		foreach($config as $input){
			if(!isset($input['regex']) OR (isset($input['facultatif']) && empty($_POST[$input['name']])))
				continue;
			if(empty($_POST[$input['name']])){
				$resultat['error']++;
				$resultat['empty'][] = $input['name'];
				continue;
			}
			if(preg_match($input['regex'],$_POST[$input['name']]))
				$resultat['true'][$input['name']] = $_POST[$input['name']];
			else{
				$resultat['error']++;
				$resultat['false'][] = $input['name'];
			}
		}
		return $resultat;
		/*echo '<pre>tab:<br>';
		print_r($config['champs_bdd']);
		echo '</pre>';die;*/
	}
} ?>