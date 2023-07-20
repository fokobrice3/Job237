<?php
  
class State extends CI_Model{
	
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
		$query = $this->db->query('SELECT * FROM region');
		return $query->result_array();
	}
	public function getState($idRegion) {  
		$query = $this->db->query('SELECT * FROM region WHERE idRegion=?',array($idRegion));
		return $query->row();
	} 
	public function getRegionFromPays($idPays=null) { 
		$query = $this->db->query('SELECT * FROM region WHERE idPays=? ORDER BY nom ASC', array($idPays));
		return $query->result_array(); 
	} 
	public function getVilles($idRegion=null) { 
		$query = $this->db->query('SELECT * FROM ville WHERE idRegion=? ORDER BY nom ASC', array($idRegion));
		return $query->result_array(); 
	} 
}
 
?>