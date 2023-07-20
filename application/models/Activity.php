<?php
  
class Activity extends CI_Model{
	
	// Properties
	public $idSecteurActivite = null;
	public $nom = null; 
	public $name= null; 
	
 	public function __construct( $data=array() ) {
		if ( isset( $data['idRegion'] ) ) $this->idRegion = (int) $data['idRegion'];
		if ( isset( $data['nom_fr'] ) ) $this->nom_fr = (int) $data['nom_fr']; 
		if ( isset( $data['nom_eng'] ) ) $this->nom_eng = $data['nom_eng']; 
	}   
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM secteur_activite ORDER BY libelle ASC');
		return $query->result_array();
	} 
	public function getAllForJob() {  
		$query = $this->db->query("SELECT count(idOffre) as nbOffre, secteur_activite.idSecteur, secteur_activite.libelle, secteur_activite.name FROM offre LEFT JOIN secteur_activite ON offre.idSecteurActivite = secteur_activite.idSecteur WHERE libelle!='' AND offre.valide=1 GROUP BY offre.idSecteurActivite ORDER BY secteur_activite.libelle ASC");
		return $query->result_array();
	} 
}
 
?>