<?php
  
class Employer extends CI_Model{
	
	// Properties
	public $id = null;
	public $nom = null;
	public $prenom = null;
	public $sex = null;
	public $lang = null;
	public $email = null;
	public $pass = null;
	public $nationalite = null;
	public $pays = null; 
	public $adresse = null;
	public $telephone = null;
	public $dateNaissance = null;
	public $localiteBP = null;
	public $societe = null;
	public $niveau = null;
	public $createur = null;
	public $photo = null;
	public $lastConnexion = null; 
	public $dateCreation = null; 
	public $type = null; 
 
 	public function __construct( $data=array() ) {
		if ( isset( $data['type'] ) ) $this->type = (int) $data['type'];
		if ( isset( $data['id'] ) ) $this->id = (int) $data['id'];
		if ( isset( $data['nom'] ) ) $this->nom = $data['nom'];
		if ( isset( $data['prenom'] ) ) $this->prenom = $data['prenom'];
		if ( isset( $data['sex'] ) ) $this->sex = $data['sex'];
		if ( isset( $data['pass'] ) ) $this->pass = $data['pass'];
		if ( isset( $data['lang'] ) ) $this->lang = $data['lang'];
		if ( isset( $data['dateCreation'] ) ) $this->dateCreation = $data['dateCreation'];
		if ( isset( $data['lastConnexion'] ) ) $this->lastConnexion = $data['lastConnexion'];
		if ( isset( $data['photo'] ) ) $this->photo = $data['photo']; 
		if ( isset( $data['email'] ) ) $this->email = $data['email']; 
		if ( isset( $data['pays'] ) ) $this->pays = $data['pays']; 
	}  
	public function storeFormValues ( $params ) {  
		$this->__construct( $params );
	}	
	public function _exist($data=array()) {  
		$query = $this->db->query('SELECT * FROM employeur WHERE employeur.email=?',array($data['email']));
		if($query->num_rows()) return TRUE;
		return FALSE;	
	}
	public function _active($data=array()) {  
		$query = $this->db->query('SELECT active FROM employeur WHERE employeur.email=?',array(''.$data['email'])); 
		$row = $query->row();
		if($row->active==1) return TRUE;
		return FALSE;
	}
	public function Fullname($data=array()) {  
		$query = $this->db->query('SELECT nom FROM employeur WHERE employeur.email=?',array(''.$data['email'])); 
		$row = $query->row();
		$fullname = "".strtoupper($row->nom);
		return $fullname;
	}
	public function photoProfil($data=array()) {  
		$query = $this->db->query('SELECT photo FROM employeur WHERE employeur.email=?',array(''.$data['email'])); 
		$row = $query->row();
		return $row->photo;
	}
	public function lastConnexion($data=array()) {  
		$query = $this->db->query('SELECT lastConnexion FROM employeur WHERE employeur.email=?',array(''.$data['email'])); 
		$row = $query->row();
		return $row->lastConnexion;
	}	
	public function profilOk($data=array()) {  
		$query = $this->db->query('SELECT profilOk FROM employeur WHERE employeur.email=?',array(''.$data['email'])); 
		$row = $query->row();
		if($row->profilOk==1) return TRUE;
		return FALSE;
	}
	public function getId($data=array()) {  
		$query = $this->db->query('SELECT idEmployeur FROM employeur WHERE employeur.email=?',array(''.$data['email'])); 
		$row = $query->row();
		return $row->idEmployeur; 
	}
	public function getPassword($data=array()) { 
		$query = $this->db->query('SELECT pass FROM employeur WHERE employeur.email=?',array(''.$data['email'])); 
		$row = $query->row();
		return $row->pass;
	}	
	public function getEmployer($email) {  
		$query = $this->db->query('SELECT * FROM employeur WHERE employeur.email=?',array(''.$email)); 
		$row = $query->row(); 
		return $row;
	}
	public function getLanguage($email) {  
		$query = $this->db->query('SELECT langue FROM employeur WHERE employeur.email=?',array(''.$email)); 
		$row = $query->row(); 
		return $row->langue;
	}
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM employeur');
		return $query->result_array();
	} 
	public function getAllValide() {  
		$query = $this->db->query('SELECT * FROM employeur WHERE active=1');
		return $query->result_array();
	} 
	public function getLast($depart,$fin) {  
		$query = $this->db->query('SELECT * FROM employeur ORDER BY dateCreation LIMIT ?,?',array($depart,$fin));
		return $query->result_array();
	}  
	public function GetForgotPass($cle,$ctpe) {  
		$query = $this->db->query('SELECT * FROM passwordforget WHERE cle=? AND ctpe=?',array($cle,$ctpe));
		return $query->row();
	} 
	//INSERT
	public function add_admin($data=array()) {  
		$this->db->query('INSERT INTO employeur (nom,pass,email,sexe,pays,adresse,telephone,langue,active,profilOk,dateCreation) VALUES (?,?,?,?,?,?,?,?,?,?,?)',array(
			$data['nom'],
			$data['pass'],
			$data['email'],
			$data['sexe'],
			$data['pays'],
			$data['adresse'],
			$data['telephone'],
			$data['langue'],
			$data['active'],
			$data['profilOk'],
			$data['dateCreation']
		)); 
	}
	public function add($data=array()) {  
		$this->db->query('INSERT INTO employeur (nom,pass,email,dateCreation) VALUES (?,?,?,?)',array(
			$data['nom'],
			$data['pass'],
			$data['email'],
			$data['dateCreation']
		)); 
	}
	public function ForgetPass($email) {  
		$query = $this->db->query('SELECT * FROM employeur WHERE employeur.email=?',array(''.$email)); 
		$employeur=$query->row();
		$key=sha1("".$employeur->idEmployeur."".$email."".$employeur->nom."".date("Y-m-d H:i:s"));
		
		$query = $this->db->query('SELECT * FROM passwordforget WHERE email=?',array($email));
		if($query->num_rows()){
			$date=date("Y-m-d H:i:s");
			$this->db->query('UPDATE passwordforget SET cle=?, date=? WHERE email=?',array($key,$date,$email));
		}else{
			$query = $this->db->query('INSERT INTO passwordforget (email,cle,ctpe) VALUES (?,?,?)',array($email,$key,"e"));
		} 		
		return $key;
	} 

	//Update
	public function updateLastConnexion($data=array()) {  
		$this->db->query('UPDATE employeur SET lastConnexion=? WHERE email=?',array("".date("Y-m-d H:i:s"), $data['email'])); 
	}
	public function activeEmployer($idEmployeur) {  
		$this->db->query('UPDATE employeur SET active=? WHERE email=?',array("".date("Y-m-d H:i:s"), $data['email'])); 
	}
	public function updateProfil($data=array()){
		$this->db->query('UPDATE employeur SET nom=?,sexe=?,langue=?,pays=?,adresse=?,telephone=?,photo=?,profilOK=? WHERE idEmployeur=?',array(
			$data["nom"],
			$data["sexe"],
			$data["langue"],
			$data["pays"],
			$data["adresse"],
			$data["telephone"],
			$data["photo"],
			1,
			$data['idEmployeur']
		)); 
	}
	public function updatePassWord($idUser,$pass){
		$this->db->query('UPDATE employeur SET pass=? WHERE idEmployeur=?',array($pass,$idUser)); 
	}

	//Delete
	public function deleteDemandeForgetPass($cle) {  
		$this->db->query('DELETE FROM passwordforget WHERE cle=?',array($cle)); 
	} 
}
 
?>