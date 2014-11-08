<?php
/**
 * @Version(name="Config", version="1.0")
 */
class Config
{
	protected static $_Bdd;
	protected static $_Liens;
	protected static $_srcPackage;
	protected static $_Packages_on;
	protected static $_package;
	protected static $_srcCache;
	protected static $_Config_src;
	
	public static function init(){
		if(empty(self::$_Liens))
			include 'config/configBase.php';
	}
								/* Getters de config général */
/* Bdd */
	public static function bdd(){
		self::init();
		return Connect::bdd(
			self::$_Bdd['bddHost'],
			self::$_Bdd['bddName'],
			self::$_Bdd['bddUser'],
			self::$_Bdd['bddMdp']
		);
	}
/* Liens */
	public static function distant(){
		self::init();
		return self::$_Liens['distant'];
	}
	public static function domaine(){
		self::init();
		return self::$_Liens['domaine'];
	}
	public static function emailAdmin(){
		self::init();
		return self::$_Liens['emailAdmin'];
	}
	public static function emailClient(){
		self::init();
		return self::$_Liens['emailClient'];
	}
	public static function srcData(){
		self::init();
		return self::$_Liens['srcData'];
	}
	public static function srcPackage(){
		self::init();
		return self::$_Liens['srcPackage'];
	}
	public static function srcCache(){
		self::init();
		return self::$_Liens['srcCache'];
	}
	public static function srcDll(){
		self::init();
		return self::$_Liens['srcDll'];
	}
	public static function srcConfig(){
		self::init();
		return self::$_Liens['srcConfig'];
	}
	public static function srcProject(){
		self::init();
		return self::$_Liens['srcProject'];
	}
								/* Getters de config package */
	public static function package($package_name, $info_query = false){
		self::init();
		if(GreyList::whiteList(self::$_Packages_on, $package_name)){
			include self::$_Liens['srcConfig'].'/cfg.'.$package_name.'.php';
			if(empty($info_query))
				return $package[$package_name];
			else
				return $package[$package_name][$info_query];
		}
		else
			Error::brut('E_Warning: Vous avez tenté d\'accéder aux paramètres du package '.
						Secur::aZ($package_name).' alors que ce dernier est désactivé.');
	}
	public static function viewCfg($name){
		$srcCfg = Config::srcConfig().'/profil/pfl.ADM'.$name.'.php';
		if(file_exists($srcCfg))
			return include $srcCfg;
		else
			Error::code(18);
	}
	public static function resetCfg($name){
		$source = Config::srcPackage().'/'.$name.'/cfg.'.$name.'.php';
		$dest = Config::srcConfig().'/cfg.'.$name.'.php';
		if(file_exists($source))
			copy($source, $dest);
		else
			Error::code(17);
	}
	public static function modifCfg($configCible){
		if(!Save::cfg('CFG'.$configCible, $configCible)
		 OR !Save::cache('CH'.$configCible, $configCible))
			return false;
		return true;
	}
	public static function fragment($frag_name, $info_query = false){
		self::init();
			include self::$_Liens['srcConfig'].'/fragments/cfg.'.$frag_name.'.php';
			if(empty($info_query))
				return $package[$frag_name];
			else
				return $package[$frag_name][$info_query];
	}
	public static function get($configFile, $configName, $project = false){
		if(empty($configFile) OR empty($configName))
			return false;
		$src = '';
		if(false !== $project)
			$src .= '../'.$project.'/';
		$src .= 'config/cfg.'.$configFile.'.php';
		if(!file_exists($src))
			Error::brut('Config file "'.$src.'" not found.');
		$cfg = New Navigator(include $src);
		if(!is_array($configName)){
			if($cfg->exist($configName))
				return $cfg->at($configName);
			else
				Error::brut('Config data $'.$configFile.'[\''.$configName.'\'] in "'.$src.'" not found.');
		}
		$cfgReturn = array();
		foreach($configName AS $cfgName){
			if(isset($cfg[$configFile][$cfgName]))
				$cfgReturn[$cfgName] = $cfg[$configFile][$cfgName];
			else
				Error::brut('Config array data $'.$configFile.'[\''.$cfgName.'\'] in "'.$src.'" not found.');
		}
		return $cfgReturn;
	}
} ?>