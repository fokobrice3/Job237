<?php
  
class Compagny extends CI_Model{
	
	// Properties
	public $idSociete = null;
	public $idEmployeur = null;
	public $nom = null;
	public $logo = null;
	public $description = null;
	public $dateCreation = null;
	public $mail = null;
	public $pays = null;
	public $ville = null;
	public $adresse = null;
	public $contact = null;
	public $idSecteurActivité = null;
	public $secteurActivite = null;
	public $complete = null;
	public $totalJobs = null; 
 
 	public function __construct( $data=array() ) {
		if ( isset( $data['idSociete'] ) ) $this->idSociete = (int) $data['idSociete'];
		if ( isset( $data['idEmployeur'] ) ) $this->idEmployeur = (int) $data['idEmployeur'];
		if ( isset( $data['nom'] ) ) $this->nom = $data['nom'];
		if ( isset( $data['logo'] ) ) $this->logo = $data['logo'];
		if ( isset( $data['description'] ) ) $this->description = $data['description'];
		if ( isset( $data['mail'] ) ) $this->mail = $data['mail']; 
		if ( isset( $data['dateCreation'] ) ) $this->dateCreation = $data['dateCreation'];
		if ( isset( $data['pays'] ) ) $this->pays = $data['pays'];
		if ( isset( $data['ville'] ) ) $this->ville = $data['ville']; 
		if ( isset( $data['adresse'] ) ) $this->adresse = $data['adresse']; 
		if ( isset( $data['contact'] ) ) $this->contact = $data['contact']; 
		if ( isset( $data['idSecteurActivité'] ) ) $this->idSecteurActivité =  (int)$data['idSecteurActivité']; 
		if ( isset( $data['complete'] ) ) $this->complete = $data['complete']; 
	}  
	public function storeFormValues ( $params ) {  
		$this->__construct( $params );
	}	
	public function complete($idSociete) {  
		$query = $this->db->query('SELECT complete FROM societe WHERE societe.idSociete=?',array($idSociete));
		$row = $query->row();
		if($row->complete==1) return TRUE;
		return FALSE;
	}	
	public function getCompagny($idEmployeur) {  
		$query = $this->db->query('SELECT * FROM societe WHERE societe.idEmployeur=?',array($idEmployeur)); 
		$row = $query->row(); 
		return $row; 
	} 
	public function getFromID($idSociete) {  
		$query = $this->db->query('SELECT * FROM societe WHERE societe.idSociete=?',array($idSociete)); 
		$row = $query->row(); 
		return $row; 
	} 
	public function getAllCompagnies() {  
		$query = $this->db->query('SELECT * FROM societe'); 
		return $query; 
	}
	public function getAllActive() {  
		$query = $this->db->query('SELECT * FROM societe WHERE complete=1'); 
		return $query->result_array(); 
	}
	public function getAllForJob() {  
		$query = $this->db->query("SELECT count(idOffre) as nbOffre, societe.idSociete, societe.nom FROM offre LEFT JOIN societe ON offre.idSociete = societe.idSociete WHERE offre.valide=1 GROUP BY offre.idSociete ORDER BY societe.nom ASC");
		return $query->result_array();
	} 
	public function getIdSociete($idEmployeur) {  
		$query = $this->db->query('SELECT idSociete FROM societe WHERE societe.idEmployeur=?',array($idEmployeur)); 
		$row = $query->row();
		return $row->idSociete; 
	}
	public function getSecteurID($idCompagny) {  
		$query = $this->db->query('SELECT idSecteurActivite FROM societe WHERE societe.idEmployeur=?',array($idCompagny)); 
		$row = $query->row();
		return $row->idSecteurActivite; 
	}
	public function getSecteur($idSecteur) {  
		$query = $this->db->query('SELECT * FROM secteur_activite WHERE idSecteur=?',array($idSecteur)); 
		$row = $query->row();
		return $row;
	}
	public function getOffers($idCompagny, $depart, $fin) {  
		$query = $this->db->query('SELECT * FROM offre WHERE offre.idSociete=? ORDER BY datePublication DESC LIMIT ?,?', array($idCompagny, $depart, $fin));
		return $query->result_array();
	}

	//INSERT
	public function add($data=array()) { 
		$this->db->query('INSERT INTO societe (idEmployeur,dateCreation,complete) VALUES (?,?,?)',
		array(
			$data['idEmployeur'],			
			$data['dateCreation'],		
			$data['complete']
		)); 
	} 
	public function add_admin($data=array()) { 
		$this->db->query('INSERT INTO societe (idEmployeur,nom,dateCreation,complete) VALUES (?,?,?,?)',
		array(
			$data['idEmployeur'],			
			$data['nom'],			
			$data['dateCreation'],		
			$data['complete']
		)); 
	} 
	//Update
	public function update($data){  
		$this->db->query('UPDATE societe SET idTaille=?, idPropriete=?, nom=?, logo=?, description=?, mail=?, pays=?, region=?, ville=?, adresse=?, telephone=?, idSecteurActivite=?, complete=? WHERE idSociete=?',
		array(
			$data['idTaille'],
			$data['idPropriete'],	
			$data['nom'],	
			$data['logo'],
			$data['description'],
			$data['mail'],
			$data['pays'],
			$data['region'],
			$data['ville'],
			$data['adresse'],
			$data['telephone'],
			$data['idSecteurActivite'],
			1,			
			$data['idSociete']
		));		
	} 
}
 
?>