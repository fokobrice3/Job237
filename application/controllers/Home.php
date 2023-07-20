<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->database(); 
		$this->load->model('Employer'); 
		$this->load->model('Candidat'); 
		$this->load->model('Compagny'); 
		$this->load->model('Country'); 
		$this->load->model('State'); 
		$this->load->model('City'); 
		$this->load->model('Activity'); 	
		$this->load->model('Skills'); 	
		$this->load->model('Degree'); 	
		$this->load->model('Metier'); 	
		$this->load->model('Offre'); 	
		$this->load->model('SizeCompany'); 	
		$this->load->model('Ownership');  	
		
		$this->listCat = $this->Metier->getList(0,15);
		
		session_start();
		if(empty($_SESSION['connected'])) $_SESSION['connected'] = "no";
		if(empty($_SESSION['site_lang'])) $_SESSION['site_lang'] = "french";
		$this->lang->load('information',$_SESSION['site_lang']);
    } 
	
	
	public function index(){ 
		if($_SESSION['connected']=="yes"){
			if($_SESSION['compte']== "candidate"){
				$user = $this->Candidat->getCandidat($_SESSION['email']); 
				if($user->CV!=null) $CVOk=true; else $CVOk=false;
				$dateTime = explode(" ", $user->lastConnexion);
				$date = explode("-", $dateTime[0]);
				$time = explode(":", $dateTime[1]); 
				$dateTime = date("M d, Y, H\h i",mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0]));
				if($user->listCompetences ){
					$skills = explode(",",$user->listCompetences); 
					$nbSkills = count($this->Offre->getAllForSeek_FilterForm($skills,null,null,null,null,null,null,null));
				}else $nbSkills=0;  
				$data=array(
					'page'=>'home',
					'email'=>$_SESSION['email'],
					'nom'=> $user->nom, 
					'prenom'=> $user->prenom, 
					'photoProfil'=> $user->photo,	
					'profilOk'=> $user->profilOk,	  
					'CVOk'=> $CVOk, 
					'JobXp' =>count($this->Offre->getFromXp($user->idCandidat)),
					'JobDegree'=>count($this->Offre->getFromDegree($user->idCandidat)),
					'JobSkills'=>$nbSkills,
					'lastConnexion' => $dateTime,
					'listCat'=>$this->listCat,		 			
				); 
			}else{
				$user = $this->Employer->getEmployer($_SESSION['email']); 
				$dateTime = explode(" ", $user->lastConnexion);
				$date = explode("-", $dateTime[0]);
				$time = explode(":", $dateTime[1]); 
				$dateTime = date("M d, Y, H\h i",mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0])); 
				//$user =array('email'=>$_SESSION['email']); 
				//$idUser = (int)$this->Employer->getId($user);
				$data['idSociete'] = $this->Compagny->getIdSociete($user->idEmployeur);
				$data=array(
					'page'=>'home',
					'email'=>$_SESSION['email'],
					'nom'=> $user->nom, 
					'photoProfil'=> $user->photo,	
					'profilOk'=> $user->profilOk,	
					'idSociete' => $this->Compagny->getIdSociete($user->idEmployeur),
					'societeOk' => $this->Compagny->complete($data['idSociete']), 
					'nbJobs' => $this->Offre->countJobAviable($user->idEmployeur),
					'listCat'=>$this->listCat,		  
					'lastConnexion' => $dateTime,
				);  
			} 			
			$this->load->view('home',$data); 
		}else $this->getOut();
	}	
	public function profile(){ 	
		if($_SESSION['connected']=="yes"){
			if($_SESSION['compte']== "candidate"){
				$user = $this->Candidat->getCandidat($_SESSION['email']); 
				$countries = $this->Country->getAll();
				$data=array(
					'page'=>'profile',
					'email'=> $user->email,
					'nom'=> $user->nom,
					'prenom'=> $user->prenom,
					'sexe'=> $user->sexe,
					'photoProfil'=> $user->photo,
					'dateCreation'=> $user->dateCreation,
					'lastConnexion'=> $user->lastConnexion,
					'idPays'=> $user->pays, 
					'list_pays'=> $countries,
					'idRegion'=> $user->region, 
					'list_region'=> $this->State->getRegionFromPays($user->pays),
					'idVille'=> $user->ville, 
					'list_ville'=> $this->City->getCityFromRegion($user->region), 
					'idNationalite'=> $user->idNationalite,
					'telephone'=> $user->telephone, 
					'dateNaissance'=> $user->dateNaissance,
					'langue'=> $_SESSION['site_lang'],
					'profilOk'=> $user->profilOk,
					'listCat'=>$this->listCat,		 
					'photo'=> $user->photo
				);
				$this->load->view('home',$data);				
			}else{	
				$user = $this->Employer->getEmployer($_SESSION['email']);
				$countries = $this->Country->getAll();
				$data=array(
					'page'=>'profile',
					'email'=> $user->email,
					'nom'=> $user->nom,
					'sexe'=> $user->sexe,
					'photoProfil'=> $user->photo,
					'dateCreation'=> $user->dateCreation,
					'lastConnexion'=> $user->lastConnexion,
					'idPays'=> $user->pays, 
					'adresse'=> $user->adresse,
					'telephone'=> $user->telephone, 
					'active'=> $user->active,
					'langue'=> $_SESSION['site_lang'],
					'profilOk'=> $user->profilOk,
					'listCat'=>$this->listCat,		 	
					'list_pays'=> $countries,
				);  
				$this->load->view('home',$data);
			}
		}else $this->getOut();
	}
	
	public function messages(){ 	
		if($_SESSION['connected']=="yes"){
			$data=array(
				'page'=>'messages',
				'listCat'=>$this->listCat,		 
				'email'=>$_SESSION['email']
			);  
			$this->load->view('home',$data); 
		}else $this->getOut();
	}
	
	public function jobs(){ 	
		if($_SESSION['connected']=="yes"){
			$user = $this->Employer->getEmployer($_SESSION['email']); 
			$compagny = $this->Compagny->getCompagny($user->idEmployeur);
			$list_offres = $this->Offre->listJobsDashBoard($user->idEmployeur);
			$data=array(
				'page'=>'postjobs_db',
				'logo'=>$compagny->logo,
				'langue'=> $_SESSION['site_lang'],
				'list_offres' => $list_offres, 
				'societeOk' => $compagny->complete,
				'listCat'=>$this->listCat,		  
				'email'=>$_SESSION['email']
			);  
			$this->load->view('home',$data); 
		}else $this->getOut();
	}
	public function postJob(){ 
		$user = $this->Employer->getEmployer($_SESSION['email']);
		$countries = $this->Country->getAll();
		$compagny = $this->Compagny->getCompagny($user->idEmployeur);  		
		if($_SESSION['connected']=="yes"){
			$data=array(
				'page'=>'postjobs_add',
				'list_pays'=> $countries,
				'langue'=> $_SESSION['site_lang'],
				'list_secteur'=>  $this->Activity->getAll(),				
				'secteurID'=> $compagny->idSecteurActivite,
				'idPays'=> $compagny->pays,
				'pays'=> $this->Country->getCountry($compagny->pays),
				'list_region'=> $this->State->getRegionFromPays($compagny->pays),
				'idRegion'=> $compagny->region,
				'region'=> $this->State->getState($compagny->region),
				'idVille'=> $compagny->ville,
				'list_ville'=> $this->City->getCityFromRegion($compagny->region),
				'ville'=>$this->City->getCity($compagny->ville),
				'list_competence'=>$this->Skills->getAll(),
				'list_degree'=>$this->Degree->getAll(),
				'list_metier'=>$this->Metier->getAll(),
				'numero_offre'=>($this->Offre->getLastNumberFromEmployeur($user->idEmployeur)+1),
				'societeOk' => $compagny->complete,
				'list_type_degree'=>$this->Degree->getAllType(),
				'listCat'=>$this->listCat,		  
				'email'=>$_SESSION['email']
			);  
			$this->load->view('home',$data); 
		}else $this->getOut();
	}
	public function seekJobs($filter=null,$cat=null){ 			
		$list_offres = $this->Offre->getAllForSeek();
		if(isset($_GET['form-title'])){
			if(isset($_GET['title'])) $title=$_GET['title']; else  $title=Null;
			if(isset($_GET['ville'])) $ville=$_GET['ville']; else  $ville=Null;
			if(isset($_GET['region'])) $region=$_GET['region']; else  $region=Null;
			if(isset($_GET['pays'])) $pays=$_GET['pays']; else  $pays=Null;
			$list_offres = $this->Offre->getAllForSeek_TitleForm($title,$ville,$region,$pays);
		} 
		$skills=array(); $secteur=array(); $freelance=array(); $company=array(); $metiers=array(); $degree=array(); $xp=array(); $pays=array();
		if(isset($_GET['form-filter'])){
			if(isset($_GET['country_id'])) $pays = $_GET['country_id']; else $pays=NULL;
			if(isset($_GET['skill_id'])) $skills = $_GET['skill_id']; else $skills=NULL;
			if(isset($_GET['sector_id'])) $secteur = $_GET['sector_id']; else $secteur=NULL;
			if(isset($_GET['freelance'])) $freelance = $_GET['freelance']; else $freelance=NULL;
			if(isset($_GET['company_id'])) $company = $_GET['company_id']; else $company=NULL;
			if(isset($_GET['metier_id'])) $metiers = $_GET['metier_id']; else $metiers=NULL;
			if(isset($_GET['degree_id'])) $degree = $_GET['degree_id']; else $degree=NULL;
			if(isset($_GET['xp_id'])) $xp = $_GET['xp_id']; else $xp=NULL;
			$list_offres = $this->Offre->getAllForSeek_FilterForm($skills,$secteur,$freelance,$company,$metiers,$degree,$xp,$pays);
		} 
		
		if($filter=="myJobs"){				
			if($_SESSION['connected']=="yes"){
				$user = $this->Candidat->getCandidat($_SESSION['email']);
				$list_offres = $this->Offre->getFromCandidate($user->idCandidat);
				$data=array(
					'page'=>'candidate_job',
					'list_pays' => $this->Country->getAll(),
					'list_offres'=>$list_offres,		
					'list_competence'=>$this->Skills->getAll(),
					'list_offres_skills'=>$this->Offre->getListSkills(),
					'skills_check'=> $skills,
					'list_profession'=>  $this->Metier->getAllForJob(),	
					'metiers_check'=> $metiers,
					'list_company'=>  $this->Compagny->getAllForJob(),	
					'company_check'=> $company,
					'list_countryJobs'=> $this->Country->getAllForJob(),		 
					'pays_check'=> $pays,
					'freelance_number'=>$this->Offre->getAllfreelance_number(),		 
					'freelance_check'=> $freelance,
					'list_secteur'=>  $this->Activity->getAllForJob(),			 
					'secteur_check'=> $secteur,
					'list_degree'=>  $this->Degree->getAll(),			 
					'degree_check'=> $degree,
					'xp_check'=> $xp,
					'langue'=>  $_SESSION['site_lang'],
					'listCat'=>$this->listCat,		 	 
				);  
				$this->load->view('home',$data); 
			}else $this->getOut();
		}else if($filter=="xp"){
			$user = $this->Candidat->getCandidat($_SESSION['email']);
			$list_offres = $this->Offre->getFromXp($user->idCandidat);
			$data=array(
				'page'=>'jobs_seeking_bd',
				'list_pays' => $this->Country->getAll(),
				'list_offres'=>$list_offres,		
				'list_competence'=>$this->Skills->getAll(),
				'list_offres_skills'=>$this->Offre->getListSkills(),
				'skills_check'=> $skills,
				'list_profession'=>  $this->Metier->getAllForJob(),	
				'metiers_check'=> $metiers,
				'list_company'=>  $this->Compagny->getAllForJob(),	
				'company_check'=> $company,
				'list_countryJobs'=> $this->Country->getAllForJob(),		 
				'pays_check'=> $pays,
				'freelance_number'=>$this->Offre->getAllfreelance_number(),		 
				'freelance_check'=> $freelance,
				'list_secteur'=>  $this->Activity->getAllForJob(),			 
				'secteur_check'=> $secteur,
				'list_degree'=>  $this->Degree->getAll(),			 
				'degree_check'=> $degree,
				'xp_check'=> $xp,
				'langue'=>  $_SESSION['site_lang'],
				'listCat'=>$this->listCat,		 	 
			);  
			$this->load->view('seekjob',$data); 
		}else if($filter=="degree"){
			$user = $this->Candidat->getCandidat($_SESSION['email']);
			$list_offres = $this->Offre->getFromDegree($user->idCandidat); 
			$data=array(
				'page'=>'jobs_seeking_bd',
				'list_pays' => $this->Country->getAll(),
				'list_offres'=>$list_offres,		
				'list_competence'=>$this->Skills->getAll(),
				'list_offres_skills'=>$this->Offre->getListSkills(),
				'skills_check'=> $skills,
				'list_profession'=>  $this->Metier->getAllForJob(),	
				'metiers_check'=> $metiers,
				'list_company'=>  $this->Compagny->getAllForJob(),	
				'company_check'=> $company,
				'list_countryJobs'=> $this->Country->getAllForJob(),		 
				'pays_check'=> $pays,
				'freelance_number'=>$this->Offre->getAllfreelance_number(),		 
				'freelance_check'=> $freelance,
				'list_secteur'=>  $this->Activity->getAllForJob(),			 
				'secteur_check'=> $secteur,
				'list_degree'=>  $this->Degree->getAll(),			 
				'degree_check'=> $degree,
				'xp_check'=> $xp,
				'langue'=>  $_SESSION['site_lang'],
				'listCat'=>$this->listCat,		 	 
			);  
			$this->load->view('seekjob',$data); 
		}else if($filter=="skills"){
			$user = $this->Candidat->getCandidat($_SESSION['email']); 
			if($user->listCompetences ){
				$list_offres = $this->Offre->getAllForSeek_FilterForm($skills,null,null,null,null,null,null,null);  
			}else $list_offres=array();  
			$data=array(
				'page'=>'jobs_seeking_bd',
				'list_pays' => $this->Country->getAll(),
				'list_offres'=>$list_offres,		
				'list_competence'=>$this->Skills->getAll(),
				'list_offres_skills'=>$this->Offre->getListSkills(),
				'skills_check'=> $skills,
				'list_profession'=>  $this->Metier->getAllForJob(),	
				'metiers_check'=> $metiers,
				'list_company'=>  $this->Compagny->getAllForJob(),	
				'company_check'=> $company,
				'list_countryJobs'=> $this->Country->getAllForJob(),		 
				'pays_check'=> $pays,
				'freelance_number'=>$this->Offre->getAllfreelance_number(),		 
				'freelance_check'=> $freelance,
				'list_secteur'=>  $this->Activity->getAllForJob(),			 
				'secteur_check'=> $secteur,
				'list_degree'=>  $this->Degree->getAll(),			 
				'degree_check'=> $degree,
				'xp_check'=> $xp,
				'langue'=>  $_SESSION['site_lang'],
				'listCat'=>$this->listCat,		 	 
			);  
			$this->load->view('seekjob',$data); 
		}else if($filter=="cat"){ 
			$list_offres = $this->Offre->getFromCat($cat);
			$data=array(
				'page'=>'jobs_seeking_bd',
				'list_pays' => $this->Country->getAll(),
				'list_offres'=>$list_offres,		
				'list_competence'=>$this->Skills->getAll(),
				'list_offres_skills'=>$this->Offre->getListSkills(),
				'skills_check'=> $skills,
				'list_profession'=>  $this->Metier->getAllForJob(),	
				'metiers_check'=> $metiers,
				'list_company'=>  $this->Compagny->getAllForJob(),	
				'company_check'=> $company,
				'list_countryJobs'=> $this->Country->getAllForJob(),		 
				'pays_check'=> $pays,
				'freelance_number'=>$this->Offre->getAllfreelance_number(),		 
				'freelance_check'=> $freelance,
				'list_secteur'=>  $this->Activity->getAllForJob(),			 
				'secteur_check'=> $secteur,
				'list_degree'=>  $this->Degree->getAll(),			 
				'degree_check'=> $degree,
				'xp_check'=> $xp,
				'langue'=>  $_SESSION['site_lang'],
				'listCat'=>$this->listCat,		 	 
			);  
			$this->load->view('seekjob',$data); 
		}else{		
			$data=array(
				'page'=>'jobs_seeking_bd',
				'list_pays' => $this->Country->getAll(),
				'list_offres'=>$list_offres,		
				'list_competence'=>$this->Skills->getAll(),
				'list_offres_skills'=>$this->Offre->getListSkills(),
				'skills_check'=> $skills,
				'list_profession'=>  $this->Metier->getAllForJob(),	
				'metiers_check'=> $metiers,
				'list_company'=>  $this->Compagny->getAllForJob(),	
				'company_check'=> $company,
				'list_countryJobs'=> $this->Country->getAllForJob(),		 
				'pays_check'=> $pays,
				'freelance_number'=>$this->Offre->getAllfreelance_number(),		 
				'freelance_check'=> $freelance,
				'list_secteur'=>  $this->Activity->getAllForJob(),			 
				'secteur_check'=> $secteur,
				'list_degree'=>  $this->Degree->getAll(),			 
				'degree_check'=> $degree,
				'xp_check'=> $xp,
				'langue'=>  $_SESSION['site_lang'],	
				'listCat'=>$this->listCat,		 
			);  
			$this->load->view('seekjob',$data);
		} 
	}
	public function compagny(){ 	
		if($_SESSION['connected']=="yes"){
			$user = $this->Employer->getEmployer($_SESSION['email']);
			$countries = $this->Country->getAll();
			$secteur_activites = $this->Activity->getAll(); 
			$compagny = $this->Compagny->getCompagny($user->idEmployeur); 
			$data=array(
				'page'=>'compagny',
				'list_pays'=> $countries,
				'list_secteur'=> $secteur_activites,
				'langue'=> $_SESSION['site_lang'],
				'secteurID'=> $compagny->idSecteurActivite,
				'idCompagny'=> $compagny->idSociete,
				'logo'=> $compagny->logo,
				'nomCompagny'=> $compagny->nom,
				'mailCompagny'=> $compagny->mail,
				'idPays'=> $compagny->pays,
				'pays'=> $this->Country->getCountry($compagny->pays),
				'list_region'=> $this->State->getRegionFromPays($compagny->pays),
				'description'=> $compagny->description,
				'idRegion'=> $compagny->region,
				'region'=> $this->State->getState($compagny->region),
				'idVille'=> $compagny->ville,
				'list_ville'=> $this->City->getCityFromRegion($compagny->region),
				'ville'=>$this->City->getCity($compagny->ville),
				'adresse'=> $compagny->adresse,
				'idTaille'=> $compagny->idTaille,
				'size_compagny'=> $this->SizeCompany->getAll(),
				'idPropriete'=> $compagny->idPropriete,
				'Ownerships'=> $this->Ownership->getAll(),
				'telephone'=> $compagny->telephone,
				'listCat'=>$this->listCat,		 
				'email'=>$_SESSION['email']
			);  				
			$this->load->view('home',$data); 
		}else $this->getOut();
	}
	public function resume(){ 	
		if($_SESSION['connected']=="yes"){
			$user = $this->Candidat->getCandidat($_SESSION['email']); 
			$data=array(
				'page'=>'resume',			 
				'resume'=>$user->CV,		
				'list_competence'=>$this->Skills->getAll(),				
				'my_skills'=>$this->Skills->getForCandidate($user->idCandidat),			
				'list_degree'=>$this->Degree->getAll(),				
				'list_job'=>$this->Metier->getAll(),				
				'list_type_degree'=>$this->Degree->getAllType(),		 
				'education_list'=>$this->Candidat->getEducationList($user->idCandidat),		 
				'languages_list'=>$this->Candidat->getLanguage($user->idCandidat),	 
				'xp_list'=>$this->Candidat->getXpList($user->idCandidat),	 
				'listCat'=>$this->listCat,		
			);  		
			$this->load->view('home',$data); 
		}else $this->getOut();
	}
	private function getOut(){ 
		$data=array(
			'page'=>'signIn',
			'langue'=>$_SESSION["site_lang"],
			'listCat'=>$this->listCat,		
		);  
		$this->load->view('log-in',$data); 
	}
}
