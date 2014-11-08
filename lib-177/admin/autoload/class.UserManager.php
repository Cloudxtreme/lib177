<?php
/**
 * @Version(name="UserManager", version="1.0")
 */
class UserManager
{
	private $_db;
	private $_tUser;
	public function __construct(){
		$this->setDb(Config::bdd());
		$this->setTuser(Config::package('user', 'tUser'));
	}
	public function add(User $user)
	{
		$q = $this->_db->prepare('INSERT INTO '.$this->_tUser.' SET pseudo = ?, mdp1 = ?, email = ?') or die(print_r($this->_db->errorInfo()));
		$q->execute(array($user->pseudo(), $user->mdp(), $user->email()));
		return true;
	}
	public function delete(User $user){
		$this->_db->exec('DELETE FROM '.$this->_tUser.' WHERE id = '.$user->id());
	}
	public function count(){
		return $this->_db->query('SELECT COUNT(*) FROM '.$this->_tUser.'')->fetchColumn();
	}
	public function exist($info)
	{
		if (is_int($info)) // On veut voir si tel user ayant pour id $info existe.
			return (bool) $this->_db->query('SELECT COUNT(*) FROM '.$this->_tUser.' WHERE id = '.$info)->fetchColumn();
		// Sinon, c'est qu'on veut vérifier que le pseudo existe ou pas.
		$pseudo = Secur::aZ09($info);
		$q = $this->_db->prepare('SELECT COUNT(*) FROM '.$this->_tUser.' WHERE pseudo = :pseudo');
		$q->execute(array(':pseudo' => $pseudo));

		return (bool) $q->fetchColumn();
	}
	public function get($id)
	{	/* Crée un nouvel objet user en récuperant les infos bdd corespondant à l'id envoyé */
		$id = (int) $id;
		$q = $this->_db->query('SELECT * FROM '.$this->_tUser.' WHERE id = '.$id);
		$donnees = $q->fetch(PDO::FETCH_ASSOC);
		return new User($donnees);
	}

	public function getList()
	{	/* Retourne la liste de tout les user en bdd */
		$persos = array();
		$q = $this->_db->query('SELECT * FROM '.$this->_tUser.' ORDER BY nom');
		while ($donnees = $q->fetch(PDO::FETCH_ASSOC)){
			$persos[] = new User($donnees);
		}
		return $persos;
	}
	public function update(User $user)
	{
		$q = $this->_db->prepare('UPDATE '.$this->_tUser.' SET mdp = :mdp, pseudo = :pseudo, id = :id WHERE id = :id');
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
			$this->_tUser = $tUser;
		else
			Error::brut('Name of user SQL table is invalide in your file of config.');
	}
} ?>