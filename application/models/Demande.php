<?php
  
class Demande extends CI_Model{
	
	// Properties
	public $idDemande = null; 
	public $idOffre = null; 
	
 	public function __construct( $data=array() ) {
		
	}   
	public function getFromID($idDemande) {  
		$query = $this->db->query('SELECT * FROM demande WHERE idDemande=?',array($idDemande));
		return $query->row();
	}
	public function getForDetails($idDemande,$idCandidat) {  
		$query = $this->db->query('SELECT * FROM demande WHERE demande.idOffre=? AND demande.idCandidat=?',array($idDemande,$idCandidat)); 
		return $query->row();
	}	
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM demande ORDER BY dateDemande DESC');
		return $query->result_array();
	}
	public function getLast($depart,$fin) {  
		$query = $this->db->query('SELECT *, candidat.nom as nom_candidat, societe.nom as nom_societe FROM demande 
			LEFT JOIN candidat ON demande.idCandidat=candidat.idCandidat
			LEFT JOIN offre ON demande.idOffre=offre.idOffre
			LEFT JOIN societe ON offre.idSociete=societe.idSociete
		WHERE accord="en cours" ORDER BY dateDemande DESC LIMIT ?,?',array($depart,$fin));
		return $query->result_array();
	}
	public function getAllAccorded() {  
		$query = $this->db->query('SELECT * FROM demande WHERE accord="accordée" ORDER BY dateDemande DESC');
		return $query->result_array();
	}
	public function getAllOnGoing() {  
		$query = $this->db->query('SELECT * FROM demande WHERE accord="en cours" ORDER BY dateDemande DESC');
		return $query->result_array();
	}
	public function getAllRejected() {  
		$query = $this->db->query('SELECT * FROM demande WHERE accord="rejetée" ORDER BY dateDemande DESC');
		return $query->result_array();
	}

	//INSERT
	public function add($data=array()) { 
		$this->db->query('INSERT INTO demande (idCandidat,idOffre,dateDemande) VALUES (?,?,?)',array(
			$data['idCandidat'],
			$data['idOffre'],
			$data['dateDemande']
		)); 
	} 
	public function add_ml($data=array()) { 
		$this->db->query('INSERT INTO demande (idCandidat,idOffre,dateDemande,motivationLetter) VALUES (?,?,?,?)',array(
			$data['idCandidat'],
			$data['idOffre'],
			$data['dateDemande'],
			$data['lettreMotivation']
		)); 
	}
	//Update
	public function edit($data=array()) { 
		$this->db->query('UPDATE offre SET idMetier=?,idNiveauEtude=?,idSecteurActivite=?,reference=?,poste=?,nbPoste=?,experience=?,duree=?,pays=?,region=?,ville=?,contrat=?,descriptionProfil=?,
		descriptionOffre=?,listCompetences=?,Freelance=?,datePublication=?,dateDepot=? WHERE idOffre=?',array(
			$data['idMetier'],	
			$data['idNiveauEtude'],
			$data['idSecteurActivite'],
			$data['reference'],
			$data['poste'],
			$data['nbPoste'],
			$data['experience'],
			$data['duree'],
			$data['pays'],
			$data['region'],
			$data['ville'],
			$data['contrat'],
			$data['descriptionProfil'],
			$data['descriptionOffre'],
			$data['listCompetences'],
			$data['Freelance'],
			$data['datePublication'],
			$data['dateDepot'],
			$data['idOffre']
		));
	} 	
	public function accepter($data=array()) { 
		$this->db->query('UPDATE demande SET accord=? WHERE idDemande=?',array("accordée",$data['idDemande']));
		$this->db->query('UPDATE offre SET nbPosteAttribue=? WHERE idOffre=?',array($data['nbPosteAttribue'],$data['idOffre']));
	} 
	public function mark_finish($idOffre) {  
		$this->db->query('UPDATE offre SET finish=1,valide=2 WHERE idOffre=?',array($idOffre));
	} 
	public function rejeter($data=array()) { 
		$this->db->query('UPDATE demande SET accord=?,motif=? WHERE idDemande=?',array("rejetée",$data['idDemande'],$data['motif']));
	} 	
	//DELETE
	public function delete($idDemande,$idCandidat) { 
		$this->db->query('DELETE FROM demande WHERE demande.idDemande=? AND demande.idCandidat=?',array($idDemande,$idCandidat)); 
	} 
}
 
?>