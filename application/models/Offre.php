<?php
  
class Offre extends CI_Model{
	
	// Properties
	public $idOffre = null;
	public $idMetier = null;
	public $idEmployeur = null;
	public $idsociete = null;
	public $idNiveauEtude = null;
	public $idSecteurActivite = null;
	public $reference = null; 
	public $poste = null; 
	public $nbPoste = null; 
	public $experience = null; 
	public $duree = null; 
	public $pays = null; 
	public $region = null; 
	public $ville = null; 
	public $contrat = "CDD"; 
	public $descriptionProfil = null; 
	public $descriptionOffre = null; 
	public $listeCompetences = null; 
	public $Freelance = null; 
	public $datePublication = null; 
	public $dateDepot = null; 
	public $dateCreation = null; 
	public $valide = 1; 
	
 	public function __construct( $data=array() ) {
		if ( isset( $data['idNiveauEtude'] ) ) $this->idNiveauEtude = (int) $data['idNiveauEtude'];
		if ( isset( $data['poste'] ) ) $this->poste = (int) $data['poste'];  
	}   
	public function getFromID($idOffre) {  
		$query = $this->db->query('SELECT * FROM offre WHERE idOffre=?',array($idOffre));
		return $query->row();
	} 
	public function getValidateFromID($idOffre) {  
		$query = $this->db->query('
		SELECT offre.idOffre as idOffre, offre.poste as poste, offre.contrat as contrat, offre.duree as duree, offre.nbPoste as nbPoste, offre.datePublication as datePublication, offre.Freelance as Freelance, offre.descriptionOffre as descriptionOffre,
		offre.descriptionProfil as descriptionProfil, offre.dateDepot as dateDepot, offre.nbPosteAttribue as nbPosteAttribue, offre.listCompetences as listCompetences, offre.experience as experience, offre.motivationLetter as motivation,
		pays.nom as nom_pays, pays.name as name_pays, region.nom as nom_region, region.name as name_region, ville.nom as nom_ville , 
		societe.nom as societe, societe.logo as logo, societe.idSociete as idSociete,
		metier.nom as nom_metier, metier.name as name_metier, metier.idMetier as idMetier, metier.code as code, 
		secteur_activite.idSecteur as idSecteur, secteur_activite.libelle as nom_secteur, secteur_activite.name as name_secteur, 
		niveau_etude.nom as niveau_etude, type_education.nom as etudefr, type_education.name as etudeeng
			FROM offre
			LEFT JOIN pays ON offre.pays = pays.idPays
			LEFT JOIN region ON offre.region = region.idRegion
			LEFT JOIN ville ON offre.ville = ville.idVille
			LEFT JOIN societe ON offre.idSociete = societe.idSociete
			LEFT JOIN metier ON offre.idMetier = metier.idMetier
			LEFT JOIN secteur_activite ON offre.idSecteurActivite = secteur_activite.idSecteur
			LEFT JOIN niveau_etude ON offre.idNiveauEtude = niveau_etude.idNiveauEtude 
			LEFT JOIN type_education ON offre.idTypeEducation = type_education.idTypeEducation 
			WHERE offre.idOffre=? AND valide=1',array($idOffre));
		return $query->row();
	}
	public function getAllRelative($idOffre, $idMetier, $poste, $depart, $fin) {  
		$rek= 'SELECT DISTINCT offre.idOffre as idOffre, offre.poste as poste, offre.contrat as contrat, offre.duree as duree, offre.Freelance as Freelance, offre.descriptionOffre as descriptionOffre,  offre.dateDepot as dateDepot, offre.listCompetences as listCompetences, pays.nom as nom_pays, pays.name as name_pays, region.nom as nom_region, region.name as name_region, ville.nom as nom_ville , societe.nom as societe, societe.logo as logo, societe.idSociete as idSociete, metier.nom as nom_metier, metier.name as name_metier, metier.idMetier as idMetier, metier.code as code, secteur_activite.idSecteur as idSecteur, secteur_activite.libelle as nom_secteur, secteur_activite.name as name_secteur, 
			niveau_etude.nom as niveau_etude
			FROM offre 
			LEFT JOIN pays ON offre.pays = pays.idPays
			LEFT JOIN region ON offre.region = region.idRegion
			LEFT JOIN ville ON offre.ville = ville.idVille
			LEFT JOIN societe ON offre.idSociete = societe.idSociete
			LEFT JOIN metier ON offre.idMetier = metier.idMetier
			LEFT JOIN secteur_activite ON offre.idSecteurActivite = secteur_activite.idSecteur 
			LEFT JOIN niveau_etude ON offre.idNiveauEtude = niveau_etude.idNiveauEtude 
			WHERE offre.valide=1 AND offre.idOffre!='.$idOffre.' AND (offre.idMetier='.$idMetier.' OR offre.poste LIKE "%'.$poste.'%")
			ORDER BY offre.idOffre DESC, offre.datePublication DESC LIMIT '.$depart.','.$fin;
		$query = $this->db->query($rek);
		return $query->result_array();
	}
	public function getLastestJobs($depart, $fin) {  
		$rek= 'SELECT DISTINCT offre.idOffre as idOffre, offre.poste as poste, offre.contrat as contrat, offre.duree as duree, offre.Freelance as Freelance, offre.descriptionOffre as descriptionOffre,  offre.dateDepot as dateDepot, offre.listCompetences as listCompetences, pays.nom as nom_pays, pays.name as name_pays, region.nom as nom_region, region.name as name_region, ville.nom as nom_ville , societe.nom as societe, societe.logo as logo, societe.idSociete as idSociete, metier.nom as nom_metier, metier.name as name_metier, metier.idMetier as idMetier, metier.code as code, secteur_activite.idSecteur as idSecteur, secteur_activite.libelle as nom_secteur, secteur_activite.name as name_secteur, 
			niveau_etude.nom as niveau_etude
			FROM offre 
			LEFT JOIN pays ON offre.pays = pays.idPays
			LEFT JOIN region ON offre.region = region.idRegion
			LEFT JOIN ville ON offre.ville = ville.idVille
			LEFT JOIN societe ON offre.idSociete = societe.idSociete
			LEFT JOIN metier ON offre.idMetier = metier.idMetier
			LEFT JOIN secteur_activite ON offre.idSecteurActivite = secteur_activite.idSecteur 
			LEFT JOIN niveau_etude ON offre.idNiveauEtude = niveau_etude.idNiveauEtude 
			WHERE offre.valide=1
			ORDER BY offre.idOffre DESC LIMIT '.$depart.','.$fin;
		$query = $this->db->query($rek);
		return $query->result_array();
	}
	public function getFromCandidate($idCandidat) {   
		$query = $this->db->query('SELECT DISTINCT offre.idOffre as idOffre, offre.poste as poste, offre.contrat as contrat, offre.duree as duree, offre.Freelance as Freelance, offre.descriptionOffre as descriptionOffre,  offre.dateDepot as dateDepot, offre.listCompetences as listCompetences, pays.nom as nom_pays, pays.name as name_pays, region.nom as nom_region, region.name as name_region, ville.nom as nom_ville , societe.nom as societe, societe.logo as logo, societe.idSociete as idSociete, metier.nom as nom_metier, metier.name as name_metier, metier.idMetier as idMetier, metier.code as code, secteur_activite.idSecteur as idSecteur, secteur_activite.libelle as nom_secteur, secteur_activite.name as name_secteur, niveau_etude.nom as niveau_etude, demande.idDemande as idDemande, demande.idCandidat as idCandidat, demande.dateDemande as dateDemande, demande.accord as accord, demande.motif as motif, demande.idCandidat as idCandidat
			FROM offre 
			LEFT JOIN pays ON offre.pays = pays.idPays
			LEFT JOIN region ON offre.region = region.idRegion
			LEFT JOIN ville ON offre.ville = ville.idVille
			LEFT JOIN societe ON offre.idSociete = societe.idSociete
			LEFT JOIN metier ON offre.idMetier = metier.idMetier
			LEFT JOIN secteur_activite ON offre.idSecteurActivite = secteur_activite.idSecteur 
			LEFT JOIN niveau_etude ON offre.idNiveauEtude = niveau_etude.idNiveauEtude 
			LEFT JOIN demande ON offre.idOffre = demande.idOffre 
			WHERE demande.idCandidat=?
			ORDER BY offre.datePublication DESC',array($idCandidat));
		return $query->result_array();
	}
	public function getFromXp($idCandidat) {   
		$query = $this->db->query('SELECT DISTINCT offre.idOffre as idOffre, offre.poste as poste, offre.contrat as contrat, offre.duree as duree, offre.Freelance as Freelance, offre.descriptionOffre as descriptionOffre,  offre.dateDepot as dateDepot, offre.listCompetences as listCompetences, pays.nom as nom_pays, pays.name as name_pays, region.nom as nom_region, region.name as name_region, ville.nom as nom_ville , societe.nom as societe, societe.logo as logo, societe.idSociete as idSociete, metier.nom as nom_metier, metier.name as name_metier, metier.idMetier as idMetier, metier.code as code, secteur_activite.idSecteur as idSecteur, secteur_activite.libelle as nom_secteur, secteur_activite.name as name_secteur, niveau_etude.nom as niveau_etude, demande.idDemande as idDemande, demande.idCandidat as idCandidat, demande.dateDemande as dateDemande, demande.accord as accord, demande.motif as motif, demande.idCandidat as idCandidat
			FROM offre 
			LEFT JOIN pays ON offre.pays = pays.idPays
			LEFT JOIN region ON offre.region = region.idRegion
			LEFT JOIN ville ON offre.ville = ville.idVille
			LEFT JOIN societe ON offre.idSociete = societe.idSociete
			LEFT JOIN metier ON offre.idMetier = metier.idMetier
			LEFT JOIN secteur_activite ON offre.idSecteurActivite = secteur_activite.idSecteur 
			LEFT JOIN niveau_etude ON offre.idNiveauEtude = niveau_etude.idNiveauEtude 
			LEFT JOIN demande ON offre.idOffre = demande.idOffre 
			WHERE offre.idMetier IN (SELECT experience.idMetier FROM experience WHERE experience.idCandidat=?) AND offre.valide=1
			ORDER BY offre.datePublication DESC',array($idCandidat));
		return $query->result_array();
	}
	public function getFromDegree($idCandidat) {   
		$query = $this->db->query('SELECT DISTINCT offre.idOffre as idOffre, offre.poste as poste, offre.contrat as contrat, offre.duree as duree, offre.Freelance as Freelance, offre.descriptionOffre as descriptionOffre,  offre.dateDepot as dateDepot, offre.listCompetences as listCompetences, pays.nom as nom_pays, pays.name as name_pays, region.nom as nom_region, region.name as name_region, ville.nom as nom_ville , societe.nom as societe, societe.logo as logo, societe.idSociete as idSociete, metier.nom as nom_metier, metier.name as name_metier, metier.idMetier as idMetier, metier.code as code, secteur_activite.idSecteur as idSecteur, secteur_activite.libelle as nom_secteur, secteur_activite.name as name_secteur, niveau_etude.nom as niveau_etude, demande.idDemande as idDemande, demande.idCandidat as idCandidat, demande.dateDemande as dateDemande, demande.accord as accord, demande.motif as motif, demande.idCandidat as idCandidat
			FROM offre 
			LEFT JOIN pays ON offre.pays = pays.idPays
			LEFT JOIN region ON offre.region = region.idRegion
			LEFT JOIN ville ON offre.ville = ville.idVille
			LEFT JOIN societe ON offre.idSociete = societe.idSociete
			LEFT JOIN metier ON offre.idMetier = metier.idMetier
			LEFT JOIN secteur_activite ON offre.idSecteurActivite = secteur_activite.idSecteur 
			LEFT JOIN niveau_etude ON offre.idNiveauEtude = niveau_etude.idNiveauEtude 
			LEFT JOIN demande ON offre.idOffre = demande.idOffre 
			WHERE offre.idNiveauEtude IN (SELECT education.idNiveauEtude FROM education WHERE education.idCandidat=?) AND offre.valide=1
			ORDER BY offre.datePublication DESC',array($idCandidat));
		return $query->result_array();
	}
	public function getFromCat($idMetier) {   
		$query = $this->db->query('SELECT DISTINCT offre.idOffre as idOffre, offre.poste as poste, offre.contrat as contrat, offre.duree as duree, offre.Freelance as Freelance, offre.descriptionOffre as descriptionOffre,  offre.dateDepot as dateDepot, offre.listCompetences as listCompetences, pays.nom as nom_pays, pays.name as name_pays, region.nom as nom_region, region.name as name_region, ville.nom as nom_ville , societe.nom as societe, societe.logo as logo, societe.idSociete as idSociete, metier.nom as nom_metier, metier.name as name_metier, metier.idMetier as idMetier, metier.code as code, secteur_activite.idSecteur as idSecteur, secteur_activite.libelle as nom_secteur, secteur_activite.name as name_secteur, niveau_etude.nom as niveau_etude, demande.idDemande as idDemande, demande.idCandidat as idCandidat, demande.dateDemande as dateDemande, demande.accord as accord, demande.motif as motif, demande.idCandidat as idCandidat
			FROM offre 
			LEFT JOIN pays ON offre.pays = pays.idPays
			LEFT JOIN region ON offre.region = region.idRegion
			LEFT JOIN ville ON offre.ville = ville.idVille
			LEFT JOIN societe ON offre.idSociete = societe.idSociete
			LEFT JOIN metier ON offre.idMetier = metier.idMetier
			LEFT JOIN secteur_activite ON offre.idSecteurActivite = secteur_activite.idSecteur 
			LEFT JOIN niveau_etude ON offre.idNiveauEtude = niveau_etude.idNiveauEtude 
			LEFT JOIN demande ON offre.idOffre = demande.idOffre 
			WHERE offre.idMetier =? AND offre.valide=1
			ORDER BY offre.datePublication DESC',array($idMetier));
		return $query->result_array();
	}
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM offre ORDER BY datePublication DESC');
		return $query->result_array();
	}
	public function getAllPosteNumber() {  
		$query = $this->db->query('SELECT SUM(nbPoste) as TotalPoste FROM offre');
		$row = $query->row();
		return $row->TotalPoste;
	}
	public function getLast($depart,$fin) {  
		$query = $this->db->query('SELECT * FROM offre LEFT JOIN societe ON offre.idSociete = societe.idSociete ORDER BY datePublication DESC LIMIT ?,?',array($depart,$fin));
		return $query->result_array();
	}
	public function getAllfreelance_number() {  
		$query = $this->db->query('SELECT * FROM offre WHERE Freelance=1 ORDER BY datePublication DESC');
		return $query->num_rows();
	}
	public function getListSkills() {  
		$query = $this->db->query('SELECT listCompetences FROM offre WHERE valide=1 AND listCompetences!=""');		
		return $query->result_array();
	}
	public function getAllAviable() {  
		$query = $this->db->query('SELECT * FROM offre WHERE valide=1 ORDER BY datePublication DESC');
		return $query->result_array();
	} 
	public function getAllAttribued() {  
		$query = $this->db->query('SELECT * FROM offre WHERE valide=2 ORDER BY datePublication DESC');
		return $query->result_array();
	} 
	public function getAllForSeek() {  
		$query = $this->db->query('SELECT DISTINCT offre.idOffre as idOffre, offre.poste as poste, offre.contrat as contrat, offre.duree as duree, offre.Freelance as Freelance, offre.descriptionOffre as descriptionOffre,  offre.dateDepot as dateDepot, offre.listCompetences as listCompetences, pays.nom as nom_pays, pays.name as name_pays, region.nom as nom_region, region.name as name_region, ville.nom as nom_ville , societe.nom as societe, societe.logo as logo, societe.idSociete as idSociete, metier.nom as nom_metier, metier.name as name_metier, metier.idMetier as idMetier, metier.code as code, secteur_activite.idSecteur as idSecteur, secteur_activite.libelle as nom_secteur, secteur_activite.name as name_secteur, 
			niveau_etude.nom as niveau_etude
			FROM offre 
			LEFT JOIN pays ON offre.pays = pays.idPays
			LEFT JOIN region ON offre.region = region.idRegion
			LEFT JOIN ville ON offre.ville = ville.idVille
			LEFT JOIN societe ON offre.idSociete = societe.idSociete
			LEFT JOIN metier ON offre.idMetier = metier.idMetier
			LEFT JOIN secteur_activite ON offre.idSecteurActivite = secteur_activite.idSecteur 
			LEFT JOIN niveau_etude ON offre.idNiveauEtude = niveau_etude.idNiveauEtude 
			WHERE offre.valide=1 ORDER BY offre.idOffre DESC, offre.datePublication DESC');
		return $query->result_array();
	}
	public function getAllForSeek_FilterForm($skills,$secteur,$freelance,$company,$metiers,$degree,$xp,$pays) {  
		$rek = 'SELECT DISTINCT offre.idOffre as idOffre, offre.poste as poste, offre.contrat as contrat, offre.duree as duree, offre.Freelance as Freelance, offre.descriptionOffre as descriptionOffre,  offre.dateDepot as dateDepot, offre.listCompetences as listCompetences, pays.nom as nom_pays, pays.name as name_pays, region.nom as nom_region, region.name as name_region, ville.nom as nom_ville , societe.nom as societe, societe.logo as logo, societe.idSociete as idSociete, metier.nom as nom_metier, metier.name as name_metier, metier.idMetier as idMetier, metier.code as code, secteur_activite.idSecteur as idSecteur, secteur_activite.libelle as nom_secteur, secteur_activite.name as name_secteur, 
			niveau_etude.nom as niveau_etude
			FROM offre
			LEFT JOIN pays ON offre.pays = pays.idPays
			LEFT JOIN region ON offre.region = region.idRegion
			LEFT JOIN ville ON offre.ville = ville.idVille
			LEFT JOIN societe ON offre.idSociete = societe.idSociete
			LEFT JOIN metier ON offre.idMetier = metier.idMetier
			LEFT JOIN secteur_activite ON offre.idSecteurActivite = secteur_activite.idSecteur 
			LEFT JOIN niveau_etude ON offre.idNiveauEtude = niveau_etude.idNiveauEtude 
			WHERE offre.valide=1'; 	
		
		if(!empty($pays)){ 			
			$comma_separated = implode(",", $pays);
			$list = '('.$comma_separated.')'; 
			$rek .= ' AND offre.pays IN '.$list;		
		}
		if(!empty($skills)){ 
			$rek .= ' AND (offre.listCompetences LIKE "%'.$skills[0].'%"';	
			foreach($skills as $items){ 
				$rek .= ' OR offre.listCompetences LIKE "%'.$items.'%"';
			}		
			$rek .= ')';			
		}
		if(!empty($company)){ 			
			$comma_separated = implode(",", $company);
			$list = '('.$comma_separated.')'; 
			$rek .= ' AND offre.idsociete IN '.$list;		
		}
		if(!empty($metiers)){ 			
			$comma_separated = implode(",", $metiers);
			$list = '('.$comma_separated.')'; 
			$rek .= ' AND offre.idMetier IN '.$list;		
		}
		if(!empty($secteur)){ 			
			$comma_separated = implode(",", $secteur);
			$list = '('.$comma_separated.')'; 
			$rek .= ' AND offre.idSecteurActivite IN '.$list;		
		}
		if(!empty($degree)){ 			
			$comma_separated = implode(",", $degree);
			$list = '('.$comma_separated.')'; 
			$rek .= ' AND offre.idNiveauEtude IN '.$list;		
		}
		if(!empty($xp)){ 			 
			$rek .= ' AND offre.experience <='.$xp;		
		}
		if(!empty($freelance)){ 			
			$rek .= ' AND offre.Freelance = 1';		
		}
		
		$rek .= ' ORDER BY offre.idOffre DESC, offre.datePublication DESC';			
		
		$query = $this->db->query($rek);
		return $query->result_array();
	}
	public function getAllForSeek_TitleForm($title,$ville,$region,$pays) {  
		$_titleReq = "(SELECT DISTINCT offre.idOffre as idOffre, offre.poste as poste, offre.contrat as contrat, offre.duree as duree, offre.Freelance as Freelance, offre.descriptionOffre as descriptionOffre,  offre.dateDepot as dateDepot, offre.listCompetences as listCompetences, pays.nom as nom_pays, pays.name as name_pays, region.nom as nom_region, region.name as name_region, ville.nom as nom_ville , societe.nom as societe, societe.logo as logo, societe.idSociete as idSociete, metier.nom as nom_metier, metier.name as name_metier, metier.idMetier as idMetier, metier.code as code, secteur_activite.idSecteur as idSecteur, secteur_activite.libelle as nom_secteur, secteur_activite.name as name_secteur, 
			niveau_etude.nom as niveau_etude
			FROM offre
			LEFT JOIN pays ON offre.pays = pays.idPays
			LEFT JOIN region ON offre.region = region.idRegion
			LEFT JOIN ville ON offre.ville = ville.idVille
			LEFT JOIN societe ON offre.idSociete = societe.idSociete
			LEFT JOIN metier ON offre.idMetier = metier.idMetier
			LEFT JOIN secteur_activite ON offre.idSecteurActivite = secteur_activite.idSecteur
			LEFT JOIN niveau_etude ON offre.idNiveauEtude = niveau_etude.idNiveauEtude 
			WHERE offre.valide=1  
				AND (offre.poste LIKE '%".$title."%' OR secteur_activite.libelle LIKE '%".$title."%' OR secteur_activite.name LIKE '%".$title."%' OR metier.nom LIKE '%".$title."%' OR metier.name LIKE '%".$title."%' OR societe.nom LIKE '%".$title."%')  
			ORDER BY offre.idOffre DESC, offre.datePublication DESC)";
		
		if(!empty($pays) AND !empty($region) AND !empty($ville)) $_loca="AND pays.idPays=".$pays." AND ville.idVille=".$ville." AND region.idRegion=".$region;
		else if(!empty($pays) AND !empty($region)) $_loca="AND pays.idPays=".$pays." AND region.idRegion=".$region;
		else $_loca="AND pays.idPays=".$pays;
		
		$_contry = "(SELECT DISTINCT offre.idOffre as idOffre, offre.poste as poste, offre.contrat as contrat, offre.duree as duree, offre.Freelance as Freelance, offre.descriptionOffre as descriptionOffre,  offre.dateDepot as dateDepot, offre.listCompetences as listCompetences, pays.nom as nom_pays, pays.name as name_pays, region.nom as nom_region, region.name as name_region, ville.nom as nom_ville , societe.nom as societe, societe.logo as logo, societe.idSociete as idSociete, metier.nom as nom_metier, metier.name as name_metier, metier.idMetier as idMetier, metier.code as code, secteur_activite.idSecteur as idSecteur, secteur_activite.libelle as nom_secteur, secteur_activite.name as name_secteur 
			FROM offre
			LEFT JOIN pays ON offre.pays = pays.idPays
			LEFT JOIN region ON offre.region = region.idRegion
			LEFT JOIN ville ON offre.ville = ville.idVille
			LEFT JOIN societe ON offre.idSociete = societe.idSociete
			LEFT JOIN metier ON offre.idMetier = metier.idMetier
			LEFT JOIN secteur_activite ON offre.idSecteurActivite = secteur_activite.idSecteur
			WHERE offre.valide=1 ". $_loca."
			ORDER BY offre.idOffre DESC, offre.datePublication DESC)";		
		$rek=NULL;	
		if(!empty($title)) $rek=$_titleReq;
		if(!empty($pays)) $rek=$_contry;
		if(!empty($title) AND !empty($pays)) $rek=$_titleReq." UNION ".$_contry;		
		if($rek==NULL) return array();
		else{
			$query = $this->db->query($rek);
			return $query->result_array();
		}
	}
	public function getAllFromEmployeur($idEmployeur) {  
		$query = $this->db->query('SELECT * FROM offre WHERE idEmployeur=? ORDER BY datePublication DESC',array($idEmployeur));
		return $query->result_array();
	}
	public function listJobsDashBoard($idEmployeur) {  
		$query = $this->db->query('SELECT offre.poste as poste, offre.reference as reference, offre.contrat as contrat, offre.duree as duree, offre.datePublication as datePub, offre.dateDepot as dateFin,
		offre.descriptionOffre as descriptionOffre ,offre.descriptionProfil as descriptionProfil, offre.Freelance as Freelance, offre.nbPoste as nbPoste, offre.idOffre as idOffre, offre.motivationLetter as motivation,
			metier.nom as nom_metier, metier.name as name_metier, 
			pays.nom as nom_pays, pays.name as name_pays, 
			region.nom as nom_region, region.name as name_region, 
			ville.nom as nom_ville			
				FROM offre 
					LEFT JOIN metier ON offre.idMetier = metier.idMetier 
					LEFT JOIN societe ON offre.idSociete = societe.idSociete 
					LEFT JOIN pays ON offre.pays = pays.idPays 
					LEFT JOIN region ON offre.region = region.idRegion 
					LEFT JOIN ville ON offre.ville = ville.idVille 
					LEFT JOIN secteur_activite ON offre.idSecteurActivite = secteur_activite.idSecteur 
					WHERE ( offre.idEmployeur=? AND offre.valide=1)
				ORDER BY offre.dateCreation DESC',array($idEmployeur));
		return $query->result_array();
	}
	public function countJobAviable($idEmployeur) {  
		$query = $this->db->query('SELECT * FROM offre WHERE offre.idEmployeur=? AND offre.valide=1',array($idEmployeur));
		return $query->num_rows();
	}
	public function getAllFromCompagny($idCompagny) {  
		$query = $this->db->query('SELECT * FROM offre WHERE idCompagny=? ORDER BY datePublication DESC',array($idCompagny));
		return $query->result_array();
	}
	public function getForCompany($idCompagny, $depart, $fin) {  
		$query = $this->db->query('SELECT * FROM offre
			LEFT JOIN metier ON offre.idMetier = metier.idMetier
			WHERE idSociete=? 
			ORDER BY datePublication 
			DESC LIMIT ?,?', array($idCompagny, $depart, $fin));
		return $query->result_array();
	}
	public function getLastNumberFromEmployeur($idEmployeur) {  
		$query = $this->db->query('SELECT * FROM offre WHERE idEmployeur=?',array($idEmployeur));
		$no = $query->num_rows();
		return $no;
	}
		
	//INSERT
	public function add($data=array()) { 
		$this->db->query('INSERT INTO offre (idMetier,idEmployeur,idSociete,idNiveauEtude,idTypeEducation,idSecteurActivite,reference,poste,nbPoste,experience,duree,pays,region,ville,contrat,descriptionProfil,
		descriptionOffre,listCompetences,Freelance,datePublication,dateDepot,dateCreation,motivationLetter)
			VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
			$data['idMetier'],
			$data['idEmployeur'],
			$data['idSociete'],			
			$data['idNiveauEtude'],
			$data['idTypeEducation'],
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
			$data['dateCreation'],
			$data['motivationLetter']
		)); 
	} 
	
	//Update
	public function edit($data=array()) { 
		$this->db->query('UPDATE offre SET idMetier=?,idNiveauEtude=?,idTypeEducation=?,idSecteurActivite=?,reference=?,poste=?,nbPoste=?,experience=?,duree=?,pays=?,region=?,ville=?,contrat=?,descriptionProfil=?,
		descriptionOffre=?,listCompetences=?,Freelance=?,datePublication=?,dateDepot=?,motivationLetter=? WHERE idOffre=?',array(
			$data['idMetier'],	
			$data['idNiveauEtude'],
			$data['idTypeEducation'],
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
			$data['motivationLetter'],
			$data['idOffre']
		));
	} 		
	//DELETE
	public function delete($idOffre) { 
		$this->db->query('UPDATE offre SET valide=0 WHERE offre.idOffre=?',array($idOffre)); 
		//$this->db->query('DELETE FROM offre WHERE offre.idOffre=?',array($idOffre)); 
	} 
}
 
?>