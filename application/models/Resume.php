<?php
  
class Resume extends CI_Model{
	
	// Properties
	public $idRegion = null;
	public $nom_fr = null; 
	public $nom_eng = null; 
	
 	public function __construct( $data=array() ) {
		if ( isset( $data['idRegion'] ) ) $this->idRegion = (int) $data['idRegion'];
		if ( isset( $data['nom_fr'] ) ) $this->nom_fr = (int) $data['nom_fr']; 
		if ( isset( $data['nom_eng'] ) ) $this->nom_eng = $data['nom_eng']; 
	}   
	public function getFromCandidate($idCandidat) {  
		$query = $this->db->query('SELECT * FROM curriculum WHERE idCandidat=?',array($idCandidat));
		return $query->row();
	}
	public function getFromID($idCv) {  
		$query = $this->db->query('SELECT * FROM curriculum WHERE idCv=?',array($idCv));
		return $query->row();
	} 
	public function getLanguageID($idLanguage) {  
		$query = $this->db->query('SELECT * FROM lannguage WHERE idLanguage=?',array($idLanguage));
		return $query->row();
	} 
	
	//Delete
	public function deleteLanguage($idLanguage) {  
		$this->db->query('DELETE FROM language WHERE language.idLanguage=?',array($idLanguage)); 
	} 
	//Update
}
 
?>