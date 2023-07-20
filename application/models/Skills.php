<?php
  
class Skills extends CI_Model{
	
	// Properties
	public $idCompetence = null;
	public $nom = null; 
	
 	public function __construct( $data=array() ) {
		if ( isset( $data['idCompetence'] ) ) $this->idCompetence = (int) $data['idCompetence'];
		if ( isset( $data['nom'] ) ) $this->nom = (int) $data['nom'];  
	}   
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM competence ORDER BY nom ASC');
		return $query->result_array();
	}
	public function getJobCount() {  
		$query = $this->db->query('SELECT * FROM competence ORDER BY nom ASC');
		return $query->result_array();
	}
	public function getForCandidate($idCandidat){  
		$query = $this->db->query('SELECT listCompetences FROM candidat WHERE idCandidat=?',array($idCandidat));
		$row = $query->row();
		$tabskills = explode(',',$row->listCompetences);
		$query = $this->db->query('SELECT * FROM competence WHERE idCompetence IN ?',array($tabskills));
		return $query->result_array();
	}
	public function listForAdmin($idCandidat){  
		$query = $this->db->query('SELECT listCompetences FROM candidat WHERE idCandidat=?',array($idCandidat));
		$row = $query->row();
		$tabskills = explode(',',$row->listCompetences);
		$query = $this->db->query('SELECT * FROM competence WHERE idCompetence IN ?',array($tabskills));
		$res=$query->result_array();
		$list="";
		foreach($res as $skills){
			$list.=$skills['nom'].", ";
		}
		return $list;
	}
	public function listForOffreAdmin($idOffre){  
		$query = $this->db->query('SELECT listCompetences FROM offre WHERE idOffre=?',array($idOffre));
		$row = $query->row();
		$tabskills = explode(',',$row->listCompetences);
		$query = $this->db->query('SELECT * FROM competence WHERE idCompetence IN ?',array($tabskills));
		$res=$query->result_array();
		$list="";
		foreach($res as $skills){
			$list.=$skills['nom'].", ";
		}
		return $list;
	}
}
 
?>