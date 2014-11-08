<?php
$affiche = '';
if(!isset($_POST['project'])){
	$input = 'Aucun projet trouvé.';
	$projects = \ScanDossier::dirOnly('../', false);
	if(empty($projects))
		return;
	$input = '<select name="project">';
	foreach($projects as $project){
		$input .= '<option value="'.$project.'">'.$project.'</option>';
	}
	$input .= '</select>';
	$affiche = 'Où souhaitez vous déployer une zone utilisateur ?<br><br>
	<form action="userDeployment" method="post">
		'.$input.'<br><br>
		<input type="checkbox" name="bdd" value="7" id="bdd"> <label for="bdd">Créer la bdd user</label><br><br>
		<input type="submit" value="Deploy">
	</form>';
	return;
}
$project = Secur::aZ09($_POST['project']);
$bdd = (int) $_POST['bdd'];
if(7 == $bdd){
	$dbname = Config::get('bdd', 'bddName', $project);
	$host = Config::get('bdd', 'bddHost', $project);
	$pseudo = Config::get('bdd', 'bddUser', $project);
	$mdp = Config::get('bdd', 'bddMdp', $project);
	$bdd = Connect::bdd($host, $dbname, $pseudo, $mdp);
	$bdd->query('CREATE TABLE IF NOT EXISTS `user` (
					`userID` int(11) NOT NULL AUTO_INCREMENT,
					`pseudo` varchar(25) NOT NULL,
					`email` varchar(255) NOT NULL,
					`mdp1` varchar(41) NOT NULL,
					`mdp2` int(50) NOT NULL,
					`active` int(1) NOT NULL,
					PRIMARY KEY (`userID`),
					UNIQUE KEY `email` (`email`)
				) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1');
	$affiche = 'ON '.$host.' IN '.$dbname.' CREATE DATABASE user';
}
?>