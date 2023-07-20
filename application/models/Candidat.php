<?php
  
class Candidat extends CI_Model{
	// Properties
	public $idCandidat = null;
	public $nom = null;
	public $pass = null;
	public $prenom = null;
	public $sex = null;
	public $lang = null;
	public $email = null;
	public $nationalite = null;
	public $paysResidence = null;
	public $villeResidence = null;
	public $regionResidence = null;
	public $quartierResidence = null;
	public $telephone = null;
	public $dateNaissance = null;
	public $localiteBP = null;
	public $societe = null;
	public $niveau = null;
	public $createur = null;
	public $photo = null;
	public $derniereCnx = null; 
	public $dateCreation = null; 
	public $type = null; 
 
 	public function __construct( $data=array() ) {
		if ( isset( $data['type'] ) ) $this->type = (int) $data['type'];
		if ( isset( $data['idCandidat'] ) ) $this->idCandidat = (int) $data['idCandidat'];
		if ( isset( $data['nom'] ) ) $this->nom = $data['nom'];
		if ( isset( $data['prenom'] ) ) $this->prenom = $data['prenom'];
		if ( isset( $data['sex'] ) ) $this->sex = $data['sex'];
		if ( isset( $data['pass'] ) ) $this->pass = $data['pass'];
		if ( isset( $data['lang'] ) ) $this->lang = $data['lang'];
		if ( isset( $data['dateCreation'] ) ) $this->dateCreation = $data['dateCreation'];
		if ( isset( $data['derniereCnx'] ) ) $this->derniereCnx = $data['derniereCnx'];
		if ( isset( $data['photo'] ) ) $this->photo = $data['photo']; 
		if ( isset( $data['email'] ) ) $this->email = $data['email']; 
	}  
	public function storeFormValues ( $params ) {  
		$this->__construct( $params );
	}	
	public function _exist($data=array()) {  
		$query = $this->db->query('SELECT * FROM candidat WHERE candidat.email=?',array(''.$data['email'])); 
		if($query->num_rows()) return TRUE;
		else return FALSE; 
	}	
	public function getId($data=array()) {  
		$query = $this->db->query('SELECT idCandidat FROM candidat WHERE candidat.email=?',array(''.$data['email'])); 
		$row = $query->row();
		return $row->idCandidat; 
	}
	public function getCandidat($email) {  
		$query = $this->db->query('SELECT * FROM candidat WHERE candidat.email=?',array(''.$email)); 
		$row = $query->row(); 
		return $row;
	}
	public function getFromID($idCandidat) {  
		$query = $this->db->query('SELECT * FROM candidat WHERE candidat.idCandidat=?',array(''.$idCandidat)); 
		$row = $query->row(); 
		return $row;
	}
	public function getPassword($data=array()) { 
		$query = $this->db->query('SELECT pass FROM candidat WHERE candidat.email=?',array(''.$data['email'])); 
		$row = $query->row();
		return $row->pass;
	}
	public function Fullname($data=array()) {  
		$query = $this->db->query('SELECT nom,prenom FROM candidat WHERE candidat.email=?',array(''.$data['email'])); 
		$row = $query->row();
		$fullname = "".$row->prenom." ".strtoupper($row->nom);
		return $fullname;
	}
	public function photoProfil($data=array()) {  
		$query = $this->db->query('SELECT photo FROM candidat WHERE candidat.email=?',array(''.$data['email'])); 
		$row = $query->row();
		return $row->photo;
	}
	public function profilOk($data=array()) {  
		$query = $this->db->query('SELECT profilOk FROM candidat WHERE candidat.email=?',array(''.$data['email'])); 
		$row = $query->row();
		if($row->profilOk==1) return TRUE;
		return FALSE;
	}
	public function getLanguage($idCandidat){  
		$query = $this->db->query('SELECT * FROM language WHERE idCandidat=?',array($idCandidat)); 
		return $query->result_array();
	}
	public function getEducationList($idCandidat){  
		$query = $this->db->query('SELECT education.idEducation as idEducation, education.titre as degree, education.date as date, education.institution as institution, education.mention as mention, niveau_etude.nom as degreeLevel, type_education.nom as degreeTypefr, type_education.name as degreeTypeeng FROM education 
			LEFT JOIN type_education ON education.idTypeEducation = type_education.idTypeEducation
			LEFT JOIN niveau_etude ON education.idNiveauEtude = niveau_etude.idNiveauEtude
			WHERE idCandidat=?',array($idCandidat)); 
		return $query->result_array();
	} 
	public function getAllForCandidat($idOffre) {  
		$query = $this->db->query('SELECT idCandidat, nom, prenom, email, sexe, dateNaissance, telephone, photo, CV FROM `candidat`
			WHERE candidat.idCandidat IN (SELECT idCandidat from experience WHERE experience.idMetier =ANY(SELECT idMetier FROM offre WHERE offre.idOffre=?))
		UNION SELECT idCandidat, nom, prenom, email, sexe, dateNaissance, telephone, photo, CV FROM `candidat` 
			WHERE candidat.idCandidat IN (SELECT idCandidat from education WHERE education.idNiveauEtude >=ANY(SELECT idNiveauEtude FROM offre  WHERE offre.idOffre=? AND offre.idTypeEducation=education.idTypeEducation)) LIMIT 0,20',array($idOffre,$idOffre));
		return $query->result_array();
	} 
	
	public function getXpList($idCandidat){  
		$query = $this->db->query('SELECT * FROM experience LEFT JOIN metier ON experience.idMetier=metier.idMetier WHERE idCandidat=?',array($idCandidat)); 
		return $query->result_array();
	}
	public function getLanguageFromID($idLanguage) {  
		$query = $this->db->query('SELECT * FROM language WHERE idLanguage=?',array($idLanguage));
		return $query->row();
	} 
	public function getEducationFromID($idEducation) {  
		$query = $this->db->query('SELECT * FROM education WHERE idEducation=?',array($idEducation));
		return $query->row();
	} 
	public function getExperienceFromID($idExperience) {  
		$query = $this->db->query('SELECT * FROM experience LEFT JOIN metier ON experience.idMetier=metier.idMetier WHERE idExperience=?',array($idExperience));
		return $query->row();
	} 
	public function getAll() {  
		$query = $this->db->query('SELECT * FROM candidat');
		return $query->result_array();
	} 
	public function getAllValide() {  
		$query = $this->db->query('SELECT * FROM candidat WHERE CV!="" AND profilOK=1');
		return $query->result_array();
	} 
	public function getLastID() {  
		$query = $this->db->query('SELECT * FROM candidat WHERE CV!="" AND profilOK=1');
		return $query->result_array();
	} 
	public function GetForgotPass($cle,$ctpe) {  
		$query = $this->db->query('SELECT * FROM passwordforget WHERE cle=? AND ctpe=?',array($cle,$ctpe));
		return $query->row();
	} 
	
	//INSERT	
	public function add($data=array()) { 
		$this->db->query('INSERT INTO candidat (nom,pass,email,dateCreation) VALUES (?,?,?,?)',array(
			$data['nom'],
			$data['pass'],
			$data['email'],			
			$data['dateCreation']
		)); 
	} 
	public function add_admin($data=array()) {  
		$this->db->query('INSERT INTO candidat (nom,prenom,dateNaissance,pass,email,sexe,pays,region,ville,telephone,langue,idNationalite,profilOk,dateCreation) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)',array(
			$data['nom'],
			$data['prenom'],
			$data['dateNaissance'],
			$data['pass'],
			$data['email'],
			$data['sexe'],
			$data['pays'],
			$data['region'],
			$data['ville'], 
			$data['telephone'],
			$data['langue'],
			$data['idNationalite'],
			$data['profilOk'],
			$data['dateCreation']
		)); 
	}
	public function addLanguage($lang,$parle,$ecris,$idCandidat) { 
		$query = $this->db->query('SELECT * FROM language WHERE idCandidat=? AND langue=?',array($idCandidat,$lang));
		if($query->num_rows()){
			$this->db->query('UPDATE language SET parle=?, ecris=? WHERE idCandidat=? AND langue=?',array($parle,$ecris,$idCandidat,$lang));
		}else{
			$this->db->query('INSERT INTO language (idCandidat,langue,parle,ecris) VALUES (?,?,?,?)',array(
				$idCandidat,
				$lang,
				$parle,
				$ecris
			));
		} 
	} 
	public function addEducation($degree,$degreeType,$degreeTitre,$institution,$dateObtention,$mention,$idCandidat) { 
		$query = $this->db->query('INSERT INTO education (idNiveauEtude,idTypeEducation,titre,institution,date,mention,idCandidat) VALUES (?,?,?,?,?,?,?)',array(
			$degree,
			$degreeType,
			$degreeTitre,
			$institution,
			$dateObtention,
			$mention,
			$idCandidat
		)); 
	} 
	public function addExperience($poste,$mois,$description,$company,$idCandidat,$job) { 
		$query = $this->db->query('INSERT INTO experience (poste,nbAnnee,description,company,idCandidat,idMetier) VALUES (?,?,?,?,?,?)',array(
			$poste,
			$mois,
			$description,
			$company,
			$idCandidat, 
			$job 
		)); 
	} 	
	public function ForgetPass($email) {  
		$query = $this->db->query('SELECT * FROM candidat WHERE candidat.email=?',array(''.$email)); 
		$candidat=$query->row();
		$key=sha1("".$candidat->idCandidat."".$email."".$candidat->nom."".date("Y-m-d H:i:s"));
		
		$query = $this->db->query('SELECT * FROM passwordforget WHERE email=?',array($email));
		if($query->num_rows()){
			$date=date("Y-m-d H:i:s");
			$this->db->query('UPDATE passwordforget SET cle=?, date=? WHERE email=?',array($key,$date,$email));
		}else{
			$query = $this->db->query('INSERT INTO passwordforget (email,cle,ctpe) VALUES (?,?,?)',array($email,$key,"c"));
		} 		
		return $key;
	} 

	//UPDATE
	public function updateLastConnexion($data=array()) {  
		$this->db->query('UPDATE candidat SET lastConnexion=? WHERE email=?',array("".date("Y-m-d H:i:s"), $data['email'])); 
	}
	public function updateProfil($data=array()){
		$this->db->query('UPDATE candidat SET nom=?,prenom=?,sexe=?,langue=?,pays=?,region=?,ville=?,idNationalite=?,dateNaissance=?,telephone=?,photo=?,profilOK=? WHERE idCandidat=?',array(
			$data["nom"],
			$data["prenom"],
			$data["sexe"],
			$data["langue"],
			$data["pays"],
			$data["region"],
			$data["ville"],
			$data["nationalite"],
			$data["dateNaissance"],
			$data["telephone"],
			$data["photo"],
			1,
			$data['idCandidat']
		)); 
	}
	public function updateCV($cv, $idCandidat){
		$this->db->query('UPDATE candidat SET CV=? WHERE idCandidat=?',array(
			$cv,
			$idCandidat
		)); 
	}
	public function updateSkills($skills, $idCandidat){
		$this->db->query('UPDATE candidat SET listCompetences=? WHERE idCandidat=?',array(
			$skills,
			$idCandidat
		)); 
	}
	public function UpdateExperience($poste,$mois,$description,$company,$idCandidat,$idExperience,$job) { 
		$query = $this->db->query('UPDATE experience SET poste=?,nbAnnee=?,description=?,company=?,idMetier=? WHERE idCandidat=? AND idExperience=?',array(
			$poste,
			$mois,
			$description,
			$company,
			$idCandidat,
			$idExperience, 
			$job 			
		)); 
	}
	public function UpdateEducation($degree,$degreeType,$degreeTitre,$institution,$dateObtention,$mention,$idEducation) { 
		$query = $this->db->query('UPDATE education SET idNiveauEtude=?,idTypeEducation=?,titre=?,institution=?,date=?,mention=? WHERE idEducation=?',array(
			$degree,
			$degreeType,
			$degreeTitre,
			$institution,
			$dateObtention,
			$mention,
			$idEducation
		)); 
	}
	public function updatePassWord($idUser,$pass){
		$this->db->query('UPDATE candidat SET pass=? WHERE idCandidat=?',array($pass,$idUser)); 
	}
	//Delete	
	public function deleteLanguage($idLanguage) {  
		$this->db->query('DELETE FROM language WHERE language.idLanguage=?',array($idLanguage)); 
	} 
	public function deleteEducation($idEducation) {  
		$this->db->query('DELETE FROM education WHERE education.idEducation=?',array($idEducation)); 
	} 
	public function deleteExperience($idExperience) {  
		$this->db->query('DELETE FROM experience WHERE experience.idExperience=?',array($idExperience)); 
	} 
	public function deleteDemandeForgetPass($cle) {  
		$this->db->query('DELETE FROM passwordforget WHERE cle=?',array($cle)); 
	} 
}
 
?>