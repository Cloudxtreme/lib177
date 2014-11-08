<?php
/**
 * @Version(name="ZipDossier", version="1.0")
 */
 /* Créé une archive zip du dossier demandé */
class ZipDossier{
	public static function src($racine, $name){
		$_zip = new ZipArchive();
		$_src = $racine.'/'.$name;
		$arborescence;
		$procedure = '';
		if(!is_dir($_src)){
			$procedure .= 'Cette méthode Zip des dossiers, pas des fichiers.<br>';
			return $procedure;
		}
		$arborescence = Scan_dossier::src($_src);
		if(!$_zip->open($_src.'.zip', ZIPARCHIVE::OVERWRITE)){
			$procedure .= 'Echec à l\'ouverture de l\'archive.<br>';
			return $procedure;
		}
		foreach($arborescence['dossiers'] as $dossiers){
			$procedure .= 'création dossier: '.$dossiers.'<br>';
			if(!$_zip->addEmptyDir($name.'/'.$dossiers)){
				$procedure .= 'Echec de création d\'un sous dossier zip.<br>';
				$_zip->close();
				return $procedure;
			}
		}
		foreach($arborescence['fichiers'] as $fichiers){
			$procedure .= 'Création de l\'archive: '.$fichiers.'<br>';
			if(!$_zip->addFile($_src.'/'.$fichiers, $name.'/'.$fichiers)){
				$procedure .= 'Echec de création d\'un fichier zip.<br>';
				$_zip->close();
				return $procedure;
			}
		}
		$_zip->close();
		/**/echo $procedure.'<br><br><br>$_src='.$_src.'<br><br><br>$arborescence=';
		print_r($arborescence);die;/**/
		header('Content-Transfer-Encoding: binary'); //Transfert en binaire (fichier).
		header('Content-Disposition: attachment; filename="'.$name.'.zip"'); //Nom du fichier.
		header('Content-Length: '.filesize($_src.'.zip')); //Taille du fichier.
		readfile($_src.'.zip');
		$procedure .= 'Fermeture du tampon zip.<br>Votre cible a été zipper avec succés.<br>
			Elle est disponible <a href="'.$_src.'.zip">ici</a>.';
		return $procedure;
	}
} ?>