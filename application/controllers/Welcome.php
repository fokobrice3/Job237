<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
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
		$this->load->model('Fmt');  	
		$this->load->model('CategoryFormation'); 
		$this->load->model('Article'); 
		$this->load->model('Pole_Service'); 
		$this->listCat = $this->Metier->getList(0,15);
				
		session_start();
		if(empty($_SESSION['connected'])) $_SESSION['connected'] = "no";
		if(empty($_SESSION['site_lang'])) $_SESSION['site_lang'] = "french";
		$this->lang->load('information', $_SESSION['site_lang']);
    }
	
	public function index(){ 
		$list_offres = $this->Offre->getLastestJobs(0, 8); 
		$list_formations = $this->Fmt->getFormation(0, 4);  
		$data=array(
			'page'=>'accueil',			
			'list_offres'=>$list_offres,	
			'list_competence'=>$this->Skills->getAll(),
			'list_offres_skills'=>$this->Offre->getListSkills(),	
			'candidateNumber'=>count($this->Candidat->getAll()),
			'jobNumber'=>$this->Offre->getAllPosteNumber(),
			'employerNumber'=>count($this->Employer->getAll()),	
			'list_offres'=>$list_offres,	
			'list_formations'=>$list_formations,		
			'langue'=>  $_SESSION['site_lang'],
			'listCat'=>$this->listCat,	
			'list_pole'=>$this->Pole_Service->getPoles()
		);  
		$this->load->view('index',$data); 
	}
	public function qui_sommes_nous(){ 	  
		$list_offres = $this->Offre->getLastestJobs(0, 6); 
		$list_formations = $this->Fmt->get(0, 4);  
		$data=array(
			'page'=>'qui_sommes_nous',			
			'list_offres'=>$list_offres,	
			'list_competence'=>$this->Skills->getAll(),
			'list_offres_skills'=>$this->Offre->getListSkills(),	
			'candidateNumber'=>count($this->Candidat->getAll()),
			'jobNumber'=>$this->Offre->getAllPosteNumber(),
			'employerNumber'=>count($this->Employer->getAll()),	
			'list_offres'=>$list_offres,	
			'list_formations'=>$list_formations,		
			'langue'=>  $_SESSION['site_lang'],
			'listCat'=>$this->listCat,	
			'list_service_pole'=>$this->Pole_Service->getServicesByPoles()
		);  
		$this->load->view('qui_sommes_nous',$data); 
	}
	public function formation(){ 	 
		$list_formations = $this->Fmt->get(0, 8);  
		$data=array(
			'page'=>'formation', 
			'list_formations'=>$list_formations,		
			'langue'=>  $_SESSION['site_lang'],
			'listCat'=>$this->listCat,	
		);  
		$this->load->view('formation',$data); 
	}
	public function AllFormation($currentPage=1,$idCategory=0){
		if($idCategory==0){
			if(intval($currentPage)<=0 || intval($currentPage)>10) $currentPage=1; 	 
			$depart=9*($currentPage-1);
			$fin=9*($currentPage);
			$nbFormation =  $this->Fmt->number(); 
	
			$list_formations = $this->Fmt->getFormation($depart, $fin);  
			$list_catform = $this->CategoryFormation->getList(0,10);
			$list_categoryFormation = $this->CategoryFormation->getAll();
			$last_formation = $this->Fmt->getFormation(0, 3);
			$list_offres = $this->Offre->getLastestJobs(0, 5); 
			
			//$nbFormation=80;
			$nbPage = intval($nbFormation/9);
			if($nbFormation%9) $nbPage= $nbPage+1; 
	
			$data=array(
				'page'=>'formation',
				'currentPage'=>$currentPage, 
				'nbPage'=>$nbPage,
				'list_formations'=>$list_formations,		
				'langue'=>  $_SESSION['site_lang'],
				'listCat'=>$this->listCat,	
				'list_categoryFormation'=>$list_categoryFormation,
				'list_catform'=>$list_catform,
				'last_formation'=>$last_formation,
				'list_offres'=>$list_offres,
				'catSelect'=>false,
				'idCategory'=>$idCategory,
			);
		}else{
			if(intval($currentPage)<=0 || intval($currentPage)>10) $currentPage=1; 	 
			$depart=9*($currentPage-1);
			$fin=9*($currentPage);
			$nbFormation =  $this->Fmt->numberFromCat($idCategory); 

			$list_formations = $this->Fmt->getFormation_cat($idCategory, $depart, $fin);  
			$list_catform = $this->CategoryFormation->getList(0,10);
			$list_categoryFormation = $this->CategoryFormation->getAll();
			$last_formation = $this->Fmt->getFormation(0, 3);
			$list_offres = $this->Offre->getLastestJobs(0, 5); 			
			$nomCat = $this->CategoryFormation->get($idCategory);
			//$nbFormation=80;
			$nbPage = intval($nbFormation/9);
			if($nbFormation%9) $nbPage= $nbPage+1; 

			$data=array(
				'page'=>'formation',
				'currentPage'=>$currentPage, 
				'nbPage'=>$nbPage,
				'list_formations'=>$list_formations,		
				'langue'=>  $_SESSION['site_lang'],
				'listCat'=>$this->listCat,	
				'list_categoryFormation'=>$list_categoryFormation,
				'list_catform'=>$list_catform,
				'last_formation'=>$last_formation,
				'list_offres'=>$list_offres,
				'catSelect'=>true,
				'idCategory'=>$idCategory,
				'nomCat'=>$nomCat,
			);
		}
		  
		/*print_r("nbForm=".$nbFormation);echo"---";
		print_r("nbPage=".$nbPage);echo"---";
		print_r("currentPage=".$currentPage);*/
		$this->load->view('AllFormation',$data); 
	} 	
	public function Formation_details($idFormation){ 	  
		$list_categoryFormation = $this->CategoryFormation->getList(0,10);
		$last_formation = $this->Fmt->get(0, 3);
		$list_offres = $this->Offre->getLastestJobs(0, 5); 
		$formation = $this->Fmt->getFromID($idFormation); 
		$list_formations = $this->Fmt->get(0, 4);  
		$list_catform = $this->CategoryFormation->getList(0,10);
		$data=array(
			'page'=>'formation2', 
			'formation'=>$formation,	
			'list_formations'=>$list_formations,	
			'langue'=>  $_SESSION['site_lang'],
			'listCat'=>$this->listCat,	
			'langue'=>  $_SESSION['site_lang'], 
			'list_categoryFormation'=>$list_categoryFormation,
			'last_formation'=>$last_formation,
			'list_catform'=>$list_catform,
			'list_offres'=>$list_offres,
		);  
		$this->load->view('article_formation',$data); 
	}
	public function Article($currentPage=1){ 	  
		if(intval($currentPage)<=0 || intval($currentPage)>10) $currentPage=1; 	 
		$depart=9*($currentPage-1);
		$fin=9*($currentPage);
		$nbArticle =  $this->Article->number(); 
	
		$list_articles = $this->Article->get($depart, $fin);   
		$last_formation = $this->Fmt->getFormation(0, 5);
		$list_offres = $this->Offre->getLastestJobs(0, 8); 
		 
		$nbPage = intval($nbArticle/9);
		if($nbArticle%9) $nbPage= $nbPage+1; 
		$data=array(
			'page'=>'article',
			'currentPage'=>$currentPage, 
			'nbPage'=>$nbPage,
			'list_articles'=>$list_articles,		
			'langue'=>  $_SESSION['site_lang'], 
			'last_formation'=>$last_formation,
			'list_offres'=>$list_offres, 
			'listCat'=>$this->listCat,	
		);
		$this->load->view('Article',$data); 
	}
	public function contact(){ 	
		$data=array(
			'page'=>'contact',	
			'langue'=>  $_SESSION['site_lang'],
			'listCat'=>$this->listCat,	
		);  
		$this->load->view('contact',$data); 
	}
	public function signIn(){ 	
		$data=array(
			'page'=>'signIn',	
			'langue'=>  $_SESSION['site_lang'],
			'listCat'=>$this->listCat,	
		);  
		$this->load->view('log-in',$data); 
	}
	public function signUp(){ 	
		$data=array(
			'page'=>'signUp',	
			'langue'=>  $_SESSION['site_lang'],
			'listCat'=>$this->listCat,					
		);  
		$this->load->view('register',$data); 
	}
	public function signOut(){ 	
		session_destroy();
        redirect('/', 'refresh');  
	}
	public function findJob(){ 	
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
		$data=array(
			'page'=>'findJob',
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
		
		/*$data=array(
			'page'=>'findJob'
		);  */
		//$this->load->view('findJob',$data); 
	}
	public function postJob(){ 	
		$data=array(
			'page'=>'postJob',	
			'langue'=>  $_SESSION['site_lang'],
			'listCat'=>$this->listCat,	
		);  
		$this->load->view('postJob',$data); 
	}
	public function company($idCompany){ 	
		$company = $this->Compagny->getFromID($idCompany);
		$offres = $this->Offre->getForCompany($idCompany, 0,3);   
		$propriete =  $this->Ownership->getFromID($company->idPropriete);
		$taille =  $this->SizeCompany->getFromID($company->idTaille);
		$pays =  $this->Country->getCountry($company->pays);
		$region =  $this->State->getState($company->region);
		$ville =  $this->City->getCity($company->ville);
		$secteur =  $this->Compagny->getSecteur($company->idSecteurActivite);
		$data=array(
			'page'=>'company_details',
			'societe'=>$company,
			'offres'=>$offres,
			'list_offres_skills'=>$this->Offre->getListSkills(),
			'langue'=>  $_SESSION['site_lang'],	
			'listCat'=>$this->listCat,	
			'propriete'=>$propriete,
			'taille'=>$taille,
			'pays'=>$pays,
			'region'=>$region,
			'ville'=>$ville,
			'secteur'=>$secteur, 
			'list_competence'=>$this->Skills->getAll(), 
		);
		$this->load->view('company_details',$data); 
	}
	public function tnc(){ 	 
		$data=array(
			'page'=>'tnc', 
			'langue'=>  $_SESSION['site_lang'],	
			'listCat'=>$this->listCat,	 
		);   
		$this->load->view('tnc',$data); 
	}
}
