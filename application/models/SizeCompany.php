<?php
  
class SizeCompany extends CI_Model{
	
	// Properties
	public $idTaille = null;
	public $nom = null; 
	public $name = null; 
	
 	public function __construct( $data=array() ) {
		if ( isset( $data['idTaille'] ) ) $this->idTaille = (int) $data['idTaille'];
		if ( isset( $data['nom'] ) ) $this->nom = (int) $data['nom']; 
		if ( isset( $data['name'] ) ) $this->name = $data['name']; 
	}   
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM taille');
		return $query->result_array();
	} 
	public function getFromID($idTaille) {  
		$query = $this->db->query('SELECT * FROM taille Where idTaille=?',array($idTaille));
		return $query->row();
	} 
}
 
?>