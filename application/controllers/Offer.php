<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer extends CI_Controller {
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
		$this->load->model('Demande'); 
		
		$this->listCat = $this->Metier->getList(0,15);
		
		session_start();
		if(empty($_SESSION['site_lang'])) $_SESSION['site_lang'] = "french";
		$this->lang->load('information', $_SESSION['site_lang']);	
		$this->lang->load('form_validation', $_SESSION['site_lang']);	
    }
	
	
	public function Check($idOffre){	 
		if($offre = $this->Offre->getValidateFromID($idOffre)){		 
			$list_offres = $this->Offre->getAllRelative( $offre->idOffre, $offre->idMetier, $offre->poste, 0, 3); 
			$demande=null;
			$lettremotivation = null;
			if(isset($_SESSION['email']) AND $_SESSION["compte"]=="candidate"){ 
				$user = $this->Candidat->getCandidat($_SESSION['email']); 
				if($user->CV!=null) $CVOk=true; else $CVOk=false;
				$demande = $this->Demande->getForDetails($idOffre,$user->idCandidat);
			}else $CVOk=false;
			if(!empty($demande)){
				$idDemande = $demande->idDemande;
				$EtatDemande = $demande->accord;
				$lettremotivation = $demande->motivationLetter;
			}else{
				$idDemande = null;
				$EtatDemande = null;
			}
			$data=array(
				'page'=>'jobs_seeking_details',	
				'offre'=>$offre,
				'langue'=>  $_SESSION['site_lang'],	
				'list_pays' => $this->Country->getAll(),
				'list_offres'=>$list_offres,		
				'list_competence'=>$this->Skills->getAll(),
				'list_offres_skills'=>$this->Offre->getListSkills(),
				'list_profession'=>  $this->Metier->getAllForJob(),	
				'list_company'=>  $this->Compagny->getAllForJob(),	
				'list_countryJobs'=> $this->Country->getAllForJob(),	
				'freelance_number'=>$this->Offre->getAllfreelance_number(),		
				'list_secteur'=>  $this->Activity->getAllForJob(),		
				'list_degree'=>  $this->Degree->getAll(),	
				'idDemande'=> $idDemande,	
				'EtatDemande'=> $EtatDemande,	 
				'lettremotivation'=>$lettremotivation,
				'CVOk'=>  $CVOk,
				'listCat'=>$this->listCat,		
			);  
			$this->load->view('job_details',$data);
		}else redirect('/Welcome/index');  
  }
	public function Send($idOffre){	 
		if($_SESSION['connected']=="yes"){
			$user = $this->Candidat->getCandidat($_SESSION['email']); 
			$demande = array('idCandidat'=>$user->idCandidat, 'idOffre'=>$idOffre, 'dateDemande'=>date("Y-m-d"));
			if($user->CV!=null){ 
				$d = $this->Demande->getForDetails($idOffre,$user->idCandidat);
				if(empty($d)) $this->Demande->add($demande);
			}
			$this->Check($idOffre);
		}else{
			redirect('/', 'refresh');
			echo'<script>alert("ACCESS DENIED")</script>';
		}
	} 
	public function Send_lettreMotivation($idOffre){	 
		if($_SESSION['connected']=="yes"){				
			$user = $this->Candidat->getCandidat($_SESSION['email']); 			
			if($user->CV!=null && !empty($_FILES["file"]["name"])){				
				$target_dir = "assets/lettre_motivation/";
				$target_file = $target_dir . basename($_FILES["file"]["name"]); 
				$ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$fileName = $user->idCandidat."-".date("ymdHis").".".$ext; 
				if($ext=="jpg" or $ext=="jpeg" or $ext=="png" or $ext=="pdf" or $ext=="doc" or $ext=="docx" or $ext=="rtf"){
					move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir."/".$fileName);			 
					$demande = array('idCandidat'=>$user->idCandidat, 'idOffre'=>$idOffre, 'dateDemande'=>date("Y-m-d"), 'lettreMotivation'=>$fileName);
					$d = $this->Demande->getForDetails($idOffre,$user->idCandidat);
					if(empty($d)) $this->Demande->add_ml($demande);		
					$this->Check($idOffre);
				}else{				
					echo'<script>alert("REQUEST REJECTED")</script>';
					redirect('Offer/Check/'.$idOffre, 'refresh');	
				}
			}else{				
				echo'<script>alert("REQUEST REJECTED")</script>';
				redirect('Offer/Check/'.$idOffre, 'refresh');	
			}
		}else{
			redirect('/', 'refresh');
			echo'<script>alert("ACCESS DENIED")</script>';
		}
	} 
	
	public function deleteDemande($idDemande,$idOffre){	 
		if($_SESSION['connected']=="yes"){
			$user = $this->Candidat->getCandidat($_SESSION['email']);  
			$this->Demande->delete($idDemande, $user->idCandidat); 
			$this->Check($idOffre);
		}else{
			redirect('/', 'refresh');
			echo'<script>alert("ACCESS DENIED")</script>';
		}
	}
	public function addOffer(){	 
		if($this->verifOffer()){ 
			$user = $this->Employer->getEmployer($_SESSION['email']);  
			$specialite = $_POST["specialite"];
			$experience = $_POST["experience"];
			$niveau_etude = $_POST["niveau_etude"];
			$type_education = $_POST["type_education"]; 
			if($_POST['ctype']=="CDD") $duree = $_POST['duree']; else $duree =0;
			$offer=array( 
				'idMetier'=>$this->Metier->getFromCDE($_POST['metier'])->idMetier, 
				'reference'=>$_POST['reference'], 
				'pays'=>$_POST['pays'], 
				'region'=>$_POST['region'], 
				'ville'=>$_POST['ville'], 
				'contrat'=>$_POST['ctype'], 
				'poste'=>$_POST['nom'], 
				'duree'=>$duree, 
				'duree'=>$_POST['duree'], 
				'nbPoste'=>$_POST['nbPoste'], 
				'datePublication'=>$_POST['datePub'], 
				'dateDepot'=>$_POST['dateFin'],  				
				'descriptionOffre'=>$_POST['comment'], 
				'idNiveauEtude'=>$niveau_etude, 
				'idTypeEducation'=>$type_education, 
				'experience'=>$experience, 
				'idSecteurActivite'=>$specialite, 
				'Freelance'=>$_POST['freelance'],
				'motivationLetter' => $_POST["motivationLetter"],
				'listCompetences'=>$_POST['skills'], 	
				'descriptionProfil'=>$_POST['profil'],
				'idEmployeur'=>$user->idEmployeur, 
				'idSociete'=>$this->Compagny->getIdSociete($user->idEmployeur),  
				'dateCreation'=>date("Y-m-d")			
			);		
			$this->Offre->add($offer);	 
			redirect('/Home/jobs');  			
		}else $this->addOfferLose(); 
    }	
	public function updateOffer($idOffre){
		if($this->verifOffer()){ 
			$user = $this->Employer->getEmployer($_SESSION['email']);  
			$specialite = $_POST["specialite"];
			$experience = $_POST["experience"];
			$niveau_etude = $_POST["niveau_etude"];
			$type_education = $_POST["type_education"];
			if($_POST['ctype']=="CDD") $duree = $_POST['duree']; else $duree =0;
			$offer=array( 
				'idMetier'=>$this->Metier->getFromCDE($_POST['metier'])->idMetier, 
				'reference'=>$_POST['reference'], 
				'pays'=>$_POST['pays'], 
				'region'=>$_POST['region'], 
				'ville'=>$_POST['ville'], 
				'contrat'=>$_POST['ctype'], 
				'poste'=>$_POST['nom'], 
				'duree'=>$duree, 
				'nbPoste'=>$_POST['nbPoste'], 
				'datePublication'=>$_POST['datePub'], 
				'dateDepot'=>$_POST['dateFin'],  				
				'descriptionOffre'=>$_POST['comment'], 
				'idNiveauEtude'=>$niveau_etude, 
				'idTypeEducation'=>$type_education, 
				'experience'=>$experience, 
				'idSecteurActivite'=>$specialite, 
				'Freelance'=>$_POST['freelance'],
				'motivationLetter' => $_POST["motivationLetter"],
				'listCompetences'=>$_POST['skills'], 	
				'descriptionProfil'=>$_POST['profil'],		
				'idOffre'=>$idOffre		
			);		
			$this->Offre->edit($offer);	 
			redirect('/Home/jobs');  			
		}else $this->edit($idOffre); 		
	}
	public function edit($idOffre){		
		if($_SESSION['connected']=="yes"){
			$user = $this->Employer->getEmployer($_SESSION['email']); 
			$offre = $this->Offre->getFromID($idOffre);
			$user = $this->Employer->getEmployer($_SESSION['email']);
			$countries = $this->Country->getAll();
			$secteur_activites = $this->Activity->getAll(); 
			$compagny = $this->Compagny->getCompagny($user->idEmployeur);  
			if($offre->idEmployeur==$user->idEmployeur){		
				$data=array(
					'page'=>'postjobs_edit',
					'offre'=>$offre,
					'list_pays'=> $countries,
					'langue'=> $_SESSION['site_lang'],
					'list_secteur'=> $secteur_activites,				
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
					'list_type_degree'=>$this->Degree->getAllType(),
					'numero_offre'=>($this->Offre->getLastNumberFromEmployeur($user->idEmployeur)+1),
					'societeOk' => $compagny->complete, 
					'listCat'=>$this->listCat,
					'email'=>$_SESSION['email']					
				);  
				$this->load->view('home',$data);  
			}else{
				redirect('/', 'refresh');
				echo'<script>alert("ACCESS DENIED")</script>';
			}
		}else $this->getOut();
	}
	public function delete($idOffre){
		if($_SESSION['connected']=="yes"){
			$user = $this->Employer->getEmployer($_SESSION['email']); 
			$offre = $this->Offre->getFromID($idOffre);
			if($offre->idEmployeur==$user->idEmployeur){
				$this->Offre->delete($idOffre);
				echo'<script>alert("DELETE")</script>';
				redirect('Home/jobs', 'refresh');  
			}else{
				echo'<script>alert("ACCESS DENIED")</script>';
			}
		}else $this->getOut();
	}
	/*------- verifi Form -----------------*/
	private function verifOffer(){	 
		$this->form_validation->set_error_delimiters('<div style="position:absolute;top:-12px;background:linear-gradient(#d9534f,#d70872);border:0;font-family:Roboto;font-size:0.8em;padding:5px 10px;" class="label">', '</div>');
		$this->form_validation->set_rules('nom', 'nom', 'trim|required|min_length[3]|max_length[50]',array(
				'required'=>$this->lang->line('EnterPostName'),
				'max_length'=>$this->lang->line('Max50Char'),
				'min_length'=>$this->lang->line('Min3Char')
			));
		$this->form_validation->set_rules('duree', 'duree', 'trim|required|numeric',array(
				'required'=>$this->lang->line('EnterDuration'),
				'numeric'=>$this->lang->line('EnterNumber'),
				'less_than'=>$this->lang->line('ExceedTimeContrat'),
			));
		$this->form_validation->set_rules('metier', 'metier', 'required',array(
				'required'=>$this->lang->line('EnterWork'),
			));
		$this->form_validation->set_rules('datePub', 'datePub', 'required|callback_date_check',array(
				'required'=>$this->lang->line('EnterDatePub'),
			));
		$this->form_validation->set_rules('dateFin', 'dateFin', 'required|callback_date_check',array(
				'required'=>$this->lang->line('EnterDateFin'), 
			));
		$this->form_validation->set_rules('pays', 'pays', 'required',array(
				'required'=>$this->lang->line('EnterCountry'),
			));
		$this->form_validation->set_rules('region', 'region', 'required',array(
				'required'=>$this->lang->line('EnterState'),
			));
		$this->form_validation->set_rules('ville', 'ville', 'required',array(
				'required'=>$this->lang->line('EnterCity'),
			)); 
		$this->form_validation->set_rules('comment', 'comment', 'required',array(
				'required'=>$this->lang->line('EnterDetailsOffer'),
			)); 
		$this->form_validation->set_rules('profil', 'profil', 'required',array(
				'required'=>$this->lang->line('EnterDetailsProfil'),
			)); 
        if ($this->form_validation->run()){
			return TRUE;
        }else{ 	
			return FALSE;
        } 
	} 
	/*--------- CALLBACK -----------------*/
	public function date_check($str){	
		$date=explode("-",$str);
		if(isset($date[1],$date[2],$date[0])){
			if (checkdate($date[1],$date[2],$date[0])){			
				RETURN TRUE;
			}else{
				$this->form_validation->set_message('date_check', $this->lang->line('DateNotValid'));
				return FALSE;
			}
		}else{
			$this->form_validation->set_message('date_check', $this->lang->line('EnterDate'));
			return FALSE;
		}
    } 
	// Fin  CALLBACK
	
	private function addOfferLose($link="postjobs_add"){
		$user = $this->Employer->getEmployer($_SESSION['email']);
		$countries = $this->Country->getAll();
		$secteur_activites = $this->Activity->getAll(); 
		$compagny = $this->Compagny->getCompagny($user->idEmployeur); 		
		if($_SESSION['connected']=="yes"){
			$data=array(
				'page'=>'postjobs_add',
				'list_pays'=> $countries,
				'langue'=> $_SESSION['site_lang'],
				'list_secteur'=> $secteur_activites,				
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
				'numero_offre'=>1,
				'societeOk' => $compagny->complete,
				'listCat'=>$this->listCat, 
				'email'=>$_SESSION['email']
			);  
			$this->load->view('home',$data); 
		}else $this->getOut();
	}	
	private function getOut(){
		$data=array(
			'page'=>'signIn',
			'listCat'=>$this->listCat,
		);  
		$this->load->view('log-in',$data); 
	}
}
