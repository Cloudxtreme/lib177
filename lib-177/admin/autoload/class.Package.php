<?php
/**
 * @Version(name="Package", version="1.0")
 */
class Package{
	private static $_versions;
	public static function info(){
		$src_packages = Config::srcPackage();
		$packages = Scan_dossier::dirOnly($src_packages, false);
		foreach($packages as $package_actuel){
			include $src_packages.'/'.$package_actuel.'/vrn.'.$package_actuel.'.php';
		}
		return self::$_versions;
	}
	public static function printInfo(){
		if(empty(self::$_versions))
			self::info();
		echo '<table><tr><td>Package</td><td>Version</td></tr>';
		foreach(self::$_versions as $package => $version)
			echo '<tr><td>'.$package.'</td><td>'.$version.'</td></tr>';
		echo '</table>';
	}
}