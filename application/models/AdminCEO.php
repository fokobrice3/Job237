<?php
  
class AdminCEO extends CI_Model{
 
  // Properties
  public $idUser = null; 
  public $login = null;
  public $pass = null;
  public $dateDernierCnx = null; 
 
 
 
  /**
  * Sets the object's properties using the values in the supplied array
  *
  * @param assoc The property values
  */
	public function __construct( $data=array() ) {
		if ( isset( $data['idUser'] ) ) $this->idUser = (int) $data['idUser'];
		if ( isset( $data['nom'] ) ) $this->nom = $data['nom'];
		if ( isset( $data['login'] ) ) $this->login = $data['login'];
		if ( isset( $data['pass'] ) ) $this->pass = $data['pass'];
		if ( isset( $data['dateDernierCnx'] ) ) $this->dateDernierCnx = $data['dateDernierCnx'];
		if ( isset( $data['profil'] ) ) $this->profil = $data['profil']; 
		if ( isset( $data['email'] ) ) $this->email = $data['email']; 
	}
  
	public function construct() {
		$query = $this->db->query('SELECT * FROM users WHERE login=? AND pass=?',array("".$this->login, $this->pass));
		$params = $query->row_array();
		$this->__construct( $params );
	}  
	public function getAdmin($login) {  
		$query = $this->db->query('SELECT * FROM admin WHERE login=?',array($login));
		return $query->row();
	} 
	public function storeFormValues ( $params ) {  
		$this->__construct( $params );
	}
	
	//INSERT	
	public function add($data=array()) { 
		$this->db->query('INSERT INTO admin (login,pass,dateCreation) VALUES (?,?,?)',array(
			$data['login'],
			$data['pass'], 	
			$data['dateCreation']
		)); 
	} 

 	//UPDATE
 	public function updateLastConnexion($idAdmin) {  
		$this->db->query('UPDATE admin SET lastCnx=? WHERE idAdmin=?',array("".date("Y-m-d H:i:s"), $idAdmin)); 
	}
 
}
 
?>