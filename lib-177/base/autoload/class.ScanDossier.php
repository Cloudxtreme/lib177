<?php
/**
 * @Version(name="Scan_dossier", version="1.0")
 */
 /* Renvoie un tableau de tout les fichiers et ss dossiers/fichiers du dossier demandé */
class ScanDossier
{
	public static function src($racine, $recurance = true){
		$grand_parent = scandir($racine);
		$recap = array();
		$i = 0;
		$arbo = array(
			'fichiers' => array(),
			'dossiers' => array(),
			'pile_scan' => array()
		);
		/* enlève . et .. (dossier courant et dossier parent) */
		array_shift($grand_parent);
		array_shift($grand_parent);
		foreach($grand_parent as $enfant)
		{
			if(is_dir($racine.'/'.$enfant)){
				$arbo['dossiers'][] = $enfant;
				$arbo['pile_scan'][] = $enfant;
			}
			else
				$arbo['fichiers'][] = $enfant;
			/*/$recap[] = array('type' => is_dir($racine.'/'.$enfant), 'name' => $enfant);/**/
		}
		if($recurance === false){
			if(empty($arbo['fichiers']))
				return false;
			unset($arbo['pile_scan']);
			return $arbo;
		}
		while($i === 0)
		{ /* parcour les sous dossiers */
			if(!empty($arbo['pile_scan']))
			{
				foreach($arbo['pile_scan'] as $scan_sd)
				{
					array_shift($arbo['pile_scan']);
					$sous_famille = scandir($racine.'/'.$scan_sd);
					/* enlève . et .. (dossier courant et dossier parent) */
					array_shift($sous_famille);
					array_shift($sous_famille);
					foreach($sous_famille as $petit_enfant)
					{
						if(is_dir($racine.'/'.$scan_sd.'/'.$petit_enfant)){
							$arbo['dossiers'][] = $scan_sd.'/'.$petit_enfant;
							$arbo['pile_scan'][] = $scan_sd.'/'.$petit_enfant;
						}
						else
							$arbo['fichiers'][] = $scan_sd.'/'.$petit_enfant;
						/*/$recap[] = array('type' => is_dir($racine.'/'.$scan_sd.'/'.$petit_enfant), 'name' => $scan_sd.'/'.$petit_enfant);/**/
					}
				}
			}
			else
				$i = 1;
		}/*/foreach($recap as $ln)echo ' name:'.$ln['name'].' '.$ln['type'].'<br>';die;/**/
		if(empty($arbo['fichiers']))
			return false;
		unset($arbo['pile_scan']);
		return $arbo;
	}
	public static function dirOnly($racine, $recurance = true){
		$grand_parent = scandir($racine);
		$recap = array();
		$i = 0;
		$arbo = array(
			'dossiers' => array(),
			'pile_scan' => array()
		);
		/* enlève . et .. (dossier courant et dossier parent) */
		array_shift($grand_parent);
		array_shift($grand_parent);
		foreach($grand_parent as $enfant)
		{
			if(is_dir($racine.'/'.$enfant)){
				$arbo['dossiers'][] = $enfant;
				$arbo['pile_scan'][] = $enfant;
			}
		}
		if($recurance === false){
			if(empty($arbo['dossiers']))
				return false;
			return $arbo['dossiers'];
		}
		while($i === 0)
		{ /* parcour les sous dossiers */
			if(!empty($arbo['pile_scan']))
			{
				foreach($arbo['pile_scan'] as $scan_sd)
				{
					array_shift($arbo['pile_scan']);
					$sous_famille = scandir($racine.'/'.$scan_sd);
					/* enlève . et .. (dossier courant et dossier parent) */
					array_shift($sous_famille);
					array_shift($sous_famille);
					foreach($sous_famille as $petit_enfant)
					{
						if(is_dir($racine.'/'.$scan_sd.'/'.$petit_enfant)){
							$arbo['dossiers'][] = $scan_sd.'/'.$petit_enfant;
							$arbo['pile_scan'][] = $scan_sd.'/'.$petit_enfant;
						}
						/*/$recap[] = array('type' => is_dir($racine.'/'.$scan_sd.'/'.$petit_enfant), 'name' => $scan_sd.'/'.$petit_enfant);/**/
					}
				}
			}
			else
				$i = 1;
		}/*/foreach($recap as $ln)echo ' name:'.$ln['name'].' '.$ln['type'].'<br>';die;/**/
		if(empty($arbo['dossiers']))
			return false;
		return $arbo['dossiers'];
	}
	public static function fileOnly($racine, $recurance = true){
		$grand_parent = scandir($racine);
		$recap = array();
		$i = 0;
		$arbo = array(
			'fichiers' => array(),
			'dossiers' => array(),
			'pile_scan' => array()
		);
		/* enlève . et .. (dossier courant et dossier parent) */
		array_shift($grand_parent);
		array_shift($grand_parent);
		foreach($grand_parent as $enfant)
		{
			if(is_dir($racine.'/'.$enfant)){
				$arbo['dossiers'][] = $enfant;
				$arbo['pile_scan'][] = $enfant;
			}
			else
				$arbo['fichiers'][] = $enfant;
			/*/$recap[] = array('type' => is_dir($racine.'/'.$enfant), 'name' => $enfant);/**/
		}
		if($recurance === false){
			if(empty($arbo['fichiers']))
				return false;
		return $arbo['fichiers'];
		}
		while($i === 0)
		{ /* parcour les sous dossiers */
			if(!empty($arbo['pile_scan']))
			{
				foreach($arbo['pile_scan'] as $scan_sd)
				{
					array_shift($arbo['pile_scan']);
					$sous_famille = scandir($racine.'/'.$scan_sd);
					/* enlève . et .. (dossier courant et dossier parent) */
					array_shift($sous_famille);
					array_shift($sous_famille);
					foreach($sous_famille as $petit_enfant)
					{
						if(is_dir($racine.'/'.$scan_sd.'/'.$petit_enfant)){
							$arbo['dossiers'][] = $scan_sd.'/'.$petit_enfant;
							$arbo['pile_scan'][] = $scan_sd.'/'.$petit_enfant;
						}
						else
							$arbo['fichiers'][] = $scan_sd.'/'.$petit_enfant;
						/*/$recap[] = array('type' => is_dir($racine.'/'.$scan_sd.'/'.$petit_enfant), 'name' => $scan_sd.'/'.$petit_enfant);/**/
					}
				}
			}
			else
				$i = 1;
		}/*/foreach($recap as $ln)echo ' name:'.$ln['name'].' '.$ln['type'].'<br>';die;/**/
		if(empty($arbo['fichiers']))
			return false;
		return $arbo['fichiers'];
	}
} ?>