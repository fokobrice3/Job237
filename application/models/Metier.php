<?php
  
class Metier extends CI_Model{
	
	// Properties
	public $idMetier = null;
	public $nom = null; 
	public $name = null; 
	public $code = null; 
	
 	public function __construct( $data=array() ) {
		if ( isset( $data['idMetier'] ) ) $this->idMetier = (int) $data['idMetier'];
		if ( isset( $data['nom'] ) ) $this->nom = (int) $data['nom'];  
		if ( isset( $data['name'] ) ) $this->name = (int) $data['name'];  
		if ( isset( $data['code'] ) ) $this->code = (int) $data['code'];  
	}   
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM metier ORDER BY nom ASC');
		return $query->result_array();
	}
	public function getCDE($idMetier) {  
		$query = $this->db->query('SELECT * FROM metier WHERE idMetier=?',array($idMetier));
		return $query->row();
	}
	public function getList($debut,$fin) {  
		$fin=20;
		$query = $this->db->query('SELECT * FROM metier ORDER BY nom ASC LIMIT ?,?',array($debut, $fin));
		return $query->result_array();
	}
	public function getAllForJob() {  
		$query = $this->db->query('SELECT count(idOffre) as nbOffre, metier.idMetier, metier.nom, metier.name FROM offre LEFT JOIN metier ON offre.idMetier = metier.idMetier WHERE offre.valide=1 GROUP BY offre.idMetier ORDER BY metier.nom ASC');
		return $query->result_array();
	}
	public function getFromCDE($cde) {  
		$query = $this->db->query('SELECT * FROM metier WHERE code=?',array($cde));
		return $query->row();
	}
	
}
 
?>