<?php
  
class Ownership extends CI_Model{
	
	// Properties
	public $idPropriete = null;
	public $nom = null; 
	public $name = null; 
	
 	public function __construct( $data=array() ) {
		if ( isset( $data['idPropriete'] ) ) $this->idPropriete = (int) $data['idPropriete'];
		if ( isset( $data['nom'] ) ) $this->nom = (int) $data['nom']; 
		if ( isset( $data['name'] ) ) $this->name = $data['name']; 
	}   
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM propriete');
		return $query->result_array();
	} 
	public function getFromID($idPropriete) {  
		$query = $this->db->query('SELECT * FROM propriete Where idPropriete=?',array($idPropriete));
		return $query->row();
	} 
}
 
?>