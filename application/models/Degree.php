<?php
  
class Degree extends CI_Model{
	
	// Properties
	public $idNiveauEtude = null;
	public $nom = null; 
	
 	public function __construct( $data=array() ) {
		if ( isset( $data['idNiveauEtude'] ) ) $this->idNiveauEtude = (int) $data['idNiveauEtude'];
		if ( isset( $data['nom'] ) ) $this->nom = (int) $data['nom'];  
	}   
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM niveau_etude ORDER BY nom ASC');
		return $query->result_array();
	}
	public function getAllType() {  
		$query = $this->db->query('SELECT * FROM type_education ORDER BY nom ASC');
		return $query->result_array();
	}
}
 
?>