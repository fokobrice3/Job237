<?php
  
class Country extends CI_Model{
	
	// Properties
	public $idPays = null;
	public $nom_fr = null;
	public $natio_fr = null;
	public $nom_eng = null;
	public $natio_eng = null;
	public $codeTel = null;
	public $abr = null; 
	
 	public function __construct( $data=array() ) {
		if ( isset( $data['idPays'] ) ) $this->idPays = (int) $data['idPays'];
		if ( isset( $data['nom_fr'] ) ) $this->nom_fr = (int) $data['nom_fr'];
		if ( isset( $data['natio_fr'] ) ) $this->natio_fr = $data['natio_fr'];
		if ( isset( $data['nom_eng'] ) ) $this->nom_eng = $data['nom_eng'];
		if ( isset( $data['natio_eng'] ) ) $this->natio_eng = $data['natio_eng'];
		if ( isset( $data['codeTel'] ) ) $this->codeTel = $data['codeTel']; 
		if ( isset( $data['abr'] ) ) $this->abr = $data['abr']; 
	}   
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM pays');
		return $query->result_array();
	}
	public function getAllForJob() {  
		$query = $this->db->query('SELECT count(idOffre) as nbOffre, pays.idPays, pays.nom, pays.name FROM  offre LEFT JOIN pays ON offre.pays = pays.idPays WHERE offre.valide=1 GROUP BY offre.pays');
		return $query->result_array();
	}
	public function getCountry($idPays) {  
		$query = $this->db->query('SELECT * FROM pays WHERE idPays=?',array($idPays));
		return $query->row();
	}
	public function getRegions($idPays=null) { 
		$query = $this->db->query('SELECT * FROM region WHERE idPays=? ORDER BY nom ASC', array($idPays));
		return $query; 
	} 
}
 
?>