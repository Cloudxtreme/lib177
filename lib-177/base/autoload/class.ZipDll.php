<?php
/**
 * @Version(name="ZipDll", version="1.0")
 */
 /* Créé une archive zip du dossier demandé */
class ZipDll{
	public static function src($racine, $name){
		$_zip = new ZipArchive();
		$_src = $racine.'/'.$name;
		$arborescence;
		if(!is_dir($_src)){
			return false;
		}
		$arborescence = ScanDossier::src($_src);
		if(!$_zip->open($_src.'.zip', ZIPARCHIVE::OVERWRITE))
			return false;
		foreach($arborescence['dossiers'] as $dossiers){
			if(!$_zip->addEmptyDir($name.'/'.$dossiers)){
				$_zip->close();
				return false;
			}
		}
		foreach($arborescence['fichiers'] as $fichiers){
			if(!$_zip->addFile($_src.'/'.$fichiers, $name.'/'.$fichiers)){
				$_zip->close();
				return false;
			}
		}
		$_zip->close();
		header('Content-Transfer-Encoding: binary'); //Transfert en binaire (fichier).
		header('Content-Disposition: attachment; filename="'.$name.'.zip"'); //Nom du fichier.
		header('Content-Length: '.filesize($_src.'.zip')); //Taille du fichier.
		readfile($_src.'.zip');
		return true;
	}
} ?>