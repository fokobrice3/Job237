<?php
  
class City extends CI_Model{
	
	// Properties
	public $idRegion = null;
	public $nom_fr = null; 
	public $nom_eng = null; 
	
 	public function __construct( $data=array() ) {
		if ( isset( $data['idRegion'] ) ) $this->idRegion = (int) $data['idRegion'];
		if ( isset( $data['nom_fr'] ) ) $this->nom_fr = (int) $data['nom_fr']; 
		if ( isset( $data['nom_eng'] ) ) $this->nom_eng = $data['nom_eng']; 
	}   
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM ville');
		return $query->result_array();
	}
	public function getCity($idVille) {  
		$query = $this->db->query('SELECT * FROM ville WHERE idVille=?',array($idVille));
		return $query->row();
	}
	public function getCityFromRegion($idRegion) {  
		$query = $this->db->query('SELECT * FROM ville WHERE idRegion=? ORDER BY nom ASC',array($idRegion));
		return $query->result_array();
	} 
}
 
?>