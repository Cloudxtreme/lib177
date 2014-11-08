<?php
$newConf = "<?php
\$package['inscription'] = array(
\t/* Supprimer une étoile en début de ligne à l\'options que vous souhaitez désactiver.
\t** Vous pouvez ajouter un nouveau champs en suivant la convention en place. */
\t";
for($i = 0; isset($_POST['name_'.$i]); $i++)
{
	if(isset($_POST['delete_'.$i]))
		continue;
	if(empty($_POST['name_'.$i])){
		echo 'config invalid!';die;
	}
	$newConf .=
	"/**/array('name' =>\n'".$_POST['name_'.$i]."'";
	if(isset($_POST['presentation_'.$i]))
		$newConf .= ",\n\t'presentation' => '".$_POST['presentation_'.$i]."'";
	if(!empty($_POST['type_'.$i]))
		$newConf .= ",\n\t'type' => '".$_POST['type_'.$i]."'";
	else
		$newConf .= ",\n\t'type' => 'input'";
	if(isset($_POST['regex_'.$i]))
		$newConf .= ",\n\t'regex' => '".$_POST['regex_'.$i]."'";
	if(isset($_POST['enfants_'.$i])){
		$enfants = (array) unserialize($_POST['enfants_'.$i]);
		$newConf .= ",\n\t'enfants' => array(";
		//var_dump($enfants);die;
		foreach($enfants as $enfant){
			$newConf .= "\n\t\tarray('name' => '".$enfant['name']."', 'value' => '".$enfant['value']."'),";
		}
		$newConf = substr($newConf, 0, -1);
		$newConf .= "\n\t)/**/\n";
	}
	$newConf .=
	"),\n";
}
$newConf = substr($newConf, 0, -2);
$newConf .= "); ?>";
return $newConf;
?>