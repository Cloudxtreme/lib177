<?php
/**
 * @Version(name="Connect", version="1.0")
 */
class Connect
{
	public static function bdd($host, $dbname, $pseudo, $mdp){
		try{
			return $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname, $pseudo, $mdp, array (PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
		}
		catch(PDOException $e){
			echo 'Connection failed.';
			die;
		}
	}
}
?>