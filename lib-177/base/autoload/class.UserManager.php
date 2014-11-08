<?php
/**
 * @Version(name="UserManager", version="1.0")
 */
class UserManager
{
	private $_db; /* Instance de PDO */
	/* Récupère les paramètres BDD définit dans le fichier config du package user (php/package/user/cfg.user.php)*/
	private $_tUser;
	public function __construct(){
		$this->setDb(Config::bdd());/* Connection à la bdd définit dans la config général (php/config/config.php) */
		$this->setTuser(Config::package('user', 'tUser'));
	}
	public function add(User $user)
	{
		if(empty($user->ext())){
			$q = $this->_db->prepare('INSERT INTO '.$_tUser.' SET pseudo = :pseudo, mdp = :mdp');
			$q->bindValue(':pseudo', $user->pseudo());
			$q->bindValue(':mdp', $user->mdp());
			$q->execute();
			return true;
		}
		echo '<br>Champs suplémentaire dans la config pas encore géré (à faire)';die;
	}
	/* Supprime un utilisateur */
	public function delete(User $user){
		$this->_db->exec('DELETE FROM '.$_tUser.' WHERE id = '.$user->id());
	}
	public function count(){
		return $this->_db->query('SELECT COUNT(*) FROM '.$_tUser.'')->fetchColumn();
	}
	public function delete(User $perso)
	{
		$this->_db->exec('DELETE FROM '.$_tUser.' WHERE id = '.$perso->id());
	}

	public function exists($id)
	{
		if (is_int($id)) // On veut voir si tel user ayant pour id $id existe.
			return (bool) $this->_db->query('SELECT COUNT(*) FROM '.$_tUser.' WHERE id = '.$id)->fetchColumn();
		// Sinon, c'est qu'on veut vérifier que le pseudo existe ou pas.
		$q = $this->_db->prepare('SELECT COUNT(*) FROM '.$_tUser.' WHERE pseudo = :pseudo');
		$q->execute(array(':pseudo' => $id));

		return (bool) $q->fetchColumn();
	}
	public function get($id)
	{	/* Crée un nouvel objet user en récuperant les infos bdd corespondant à l'id envoyé */
		$id = (int) $id;
		$q = $this->_db->query('SELECT * FROM '.$_tUser.' WHERE id = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new User($donnees);
	}

	public function getList()
	{	/* Retourne la liste de tout les user en bdd */
		$persos = array();
		$q = $this->_db->query('SELECT * FROM '.$_tUser.' ORDER BY nom');
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
			$persos[] = new User($donnees);
		}
		return $persos;
	}
	abstract public function update(User $user)
	{
		$q = $this->_db->prepare('UPDATE '.$_tUser.' SET mdp = :mdp, pseudo = :pseudo, id = :id WHERE id = :id');
		$q->bindValue(':mdp', $user->mdp(), PDO::PARAM_INT);
		$q->bindValue(':pseudo', $user->pseudo(), PDO::PARAM_INT);
		$q->bindValue(':id', $user->id(), PDO::PARAM_INT);
		$q->execute();
	}
	public function setDb(PDO $db){
		$this->_db = $db;
	}
	public function setTuser($tUser){
		if(Verif::txt_strict($tUser))
			$this->_typeUser = $tUser;
		else{
			echo 'UserManager dit: nom de table invalide!';die;
		}
	}
} ?>