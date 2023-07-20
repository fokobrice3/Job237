<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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

		$this->listCat = $this->Metier->getList(0,15);
		
		session_start();
		if(empty($_SESSION['site_lang'])) $_SESSION['site_lang'] = "french";
		$this->lang->load('information', $_SESSION['site_lang']);	
		$this->lang->load('form_validation', $_SESSION['site_lang']);	
    }
	
	public function add(){		 
		if($this->verifFormRegister()){
			$hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);//PASSWORD_BCRYPT  
			$user=array( 
				'nom'=>$_POST['fullname'], 
				'pass'=>$hash, 
				'email'=>$_POST['email'],
				'dateCreation'=>date("Y-m-d H:i:s")
			);
			$_a = $this->Candidat->_exist($user);
			$_b = $this->Employer->_exist($user); 
			if($_a or $_b){
				$data=array(
					'page'=>'signUp',
					'listCat'=>$this->listCat,	
					'emailExist'=>'y'
				);  
				$this->load->view('register',$data); 	
			}else{ 
				$data=array(
					'page'=>'home',
					'nom'=>$_POST['fullname'],   
					'email'=>$_POST['email'],
					'compte'=>$_POST['comptetype'],
					'nom'=>$user['nom'],					
					'profilOk'=>FALSE,
					'listCat'=>$this->listCat,
					'emailExist'=>'n'
				);  
				if($_POST['comptetype']=="candidate"){
					$this->Candidat->add($user);	
					$user = $this->Candidat->getCandidat($user['email']); 
					//print_r($user);
					$data['photoProfil'] = $user->photo;	
					$data['prenom'] = $user->prenom; 	
					$data['CVOk'] = FALSE;		 					
					$data['JobXp'] = 0;		 					
					$data['JobDegree'] = 0;		 					
					$data['JobSkills'] = 0;	 					
					$dateTime = explode(" ", $user->lastConnexion);
					$date = explode("-", $dateTime[0]);
					$time = explode(":", $dateTime[1]); 
					$data['lastConnexion'] = date("M d, Y, H\h i",mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0])); 					
				}else if($_POST['comptetype']=="employer"){
					$this->Employer->add($user);
					$user = $this->Employer->getEmployer($user['email']);  
					$compagny = array(
						'idEmployeur' => $user->idEmployeur,
						'dateCreation'=> date("Y-m-d"),
						'complete' => 0
					); 
					$this->Compagny->add($compagny);
					$data['idSociete'] = $this->Compagny->getIdSociete($user->idEmployeur);
					$data['societeOk'] = $this->Compagny->complete($data['idSociete']);
					$data['photoProfil'] = $user->photo; 
					$data['nbJobs'] = 0; 
					$dateTime = explode(" ", $user->lastConnexion);
					$date = explode("-", $dateTime[0]);
					$time = explode(":", $dateTime[1]); 
					$data['lastConnexion'] = date("M d, Y, H\h i",mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0]));
				}else;		
				$_SESSION['connected'] = "yes"; 
				$_SESSION['compte'] = $_POST['comptetype'];
				$_SESSION['email'] = $_POST['email'];
				$_SESSION['active'] = "no";  
				$this->load->view('home',$data); 
			}			
		}else{			
			$data=array(
				'page'=>'signUp',
				'listCat'=>$this->listCat,
			);  
			$this->load->view('register',$data); 
		}
  }	
	public function login(){	
		if($this->verifFormLogin()){
			$user=array( 
				'pass'=>$_POST['password'], 
				'email'=>$_POST['email']
			);
			if($_POST['comptetype']=="candidate"){
				$_a = $this->Candidat->_exist($user);
				if($_a){
					$hash = $this->Candidat->getPassword($user);
					if (password_verify($user['pass'], $hash)) {
						$this->Candidat->updateLastConnexion($user);
						$user = $this->Candidat->getCandidat($_POST['email']);  
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
							'email'=>$_POST['email'],
							'compte'=>"candidate",
							'accountFalse'=>'n',
							'nom'=> $user->nom, 
							'prenom'=> $user->prenom, 
							'CVOk'=> $CVOk,	  
							'JobXp' =>count($this->Offre->getFromXp($user->idCandidat)),
							'JobDegree'=>count($this->Offre->getFromDegree($user->idCandidat)),
							'JobSkills'=> $nbSkills,
							'sexe'=> $user->sexe, 
							'photoProfil'=> $user->photo,
							'profilOk'=> $user->profilOk,
							'listCat'=>$this->listCat, 
							'lastConnexion' => $dateTime,
						);  
						$_SESSION['email'] = $_POST['email'];
						$_SESSION['compte'] = "candidate";
						$_SESSION['connected'] = "yes";
						$this->load->view('home',$data); 
					}else $this->loginLose(); 
				}else $this->loginLose();
			}else if($_POST['comptetype']=="employer"){
				$_b = $this->Employer->_exist($user); 
				if($_b){					
					$hash = $this->Employer->getPassword($user);
					if (password_verify($user['pass'], $hash)) {
						$_active = $this->Employer->_active($user); 
						$this->Employer->updateLastConnexion($user);
						$idUser = (int)$this->Employer->getId($user);
						$dateTime = explode(" ", $this->Employer->lastConnexion($user));
						$date = explode("-", $dateTime[0]);
						$time = explode(":", $dateTime[1]); 
						$dateTime = date("M d, Y, H\h i",mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0])); 						
						$data=array( 
							'page'=>'home',
							'email'=>$_POST['email'],
							'compte'=>"employer",
							'active'=>$_active,
							'accountFalse'=>'n', 
							'idSociete' => $this->Compagny->getIdSociete($idUser),  
							'lastConnexion' => $dateTime,	
							'nom'=> $this->Employer->Fullname($user), 
							'photoProfil'=> $this->Employer->photoProfil($user), 
							'nbJobs' => $this->Offre->countJobAviable($idUser), 
							'profilOk'=> $this->Employer->profilOk($user), 
							'listCat'=>$this->listCat, 
						);  								
						$data['societeOk'] = $this->Compagny->complete($data['idSociete']);		
						$_SESSION['email'] = $_POST['email'];					 
						$_SESSION['compte'] = "employer";
						$_SESSION['connected'] = "yes";	
						$_SESSION['site_lang'] = $this->Employer->getLanguage($_SESSION['email']);						
						if($_active){								
							$_SESSION['active'] = "yes"; 
							$this->load->view('home',$data);
						}else{ 
							$_SESSION['active'] = "no"; 
							$this->load->view('home',$data);
						} 
					}else $this->loginLose(); 
				}else $this->loginLose();
			}else;
		}else{
			$this->loginLose();
			/*$data=array(
				'page'=>'signIn'
			);  
			$this->load->view('log-in',$data);*/ 
		} 
  }
	public function updateEmployeur(){	
		if($this->verifUpdateEmployeur()){
			$user = $this->Employer->getEmployer($_SESSION['email']); 
			if(!empty($_FILES["photo"]["name"])){
				$target_dir = "assets/img/profil/";
				$target_file = $target_dir . basename($_FILES["photo"]["name"]); 
				$ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$fileName = $user->idEmployeur."E".date("ymdHis").".".$ext; 
				if($ext=="jpg" or $ext=="jpeg" or $ext=="png" or $ext=="gif"){
					move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir."/".$fileName);
				}else{
					$fileName=$user->photo;	
				}			 
			}else{
				$fileName=$user->photo;	
			}  
			$profil=array( 
				'idEmployeur'=>$user->idEmployeur, 
				'nom'=>$_POST['nom'], 
				'sexe'=>$_POST['sexe'], 
				'langue'=>$_POST['langue'], 
				'pays'=>$_POST['pays'], 
				'adresse'=>$_POST['adresse'], 
				'photo'=>$fileName, 
				'telephone'=>$_POST['telephone'] 
			);		
			$this->Employer->updateProfil($profil);	 
			redirect('/Home/profile');
		}else $this->profile();
	}
	public function updateCandidat(){	
		if($this->verifUpdateCandidat()){
			$user = $this->Candidat->getCandidat($_SESSION['email']); 
			if(!empty($_FILES["photo"]["name"])){
				$target_dir = "assets/img/profil/";
				$target_file = $target_dir . basename($_FILES["photo"]["name"]); 
				$ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$fileName = $user->idCandidat."C".date("ymdHis").".".$ext; 
				if($ext=="jpg" or $ext=="jpeg" or $ext=="png" or $ext=="gif"){
					move_uploaded_file($_FILES["photo"]["tmp_name"], $target_dir."/".$fileName);
				}else{
					$fileName=$user->photo;	
				}			 
			}else{
				$fileName=$user->photo;	
			}  
			$profil=array( 
				'idCandidat'=>$user->idCandidat, 
				'nom'=>$_POST['nom'], 
				'prenom'=>$_POST['prenom'], 
				'sexe'=>$_POST['sexe'], 
				'langue'=>$_POST['langue'], 
				'pays'=>$_POST['pays'], 
				'region'=>$_POST['region'], 
				'ville'=>$_POST['ville'], 
				'nationalite'=>$_POST['nationalite'], 
				'telephone'=>$_POST['telephone'], 
				'dateNaissance'=>$_POST['dateNaissance'], 
				'photo'=>$fileName
			);		
			print_r($profil);
			$this->Candidat->updateProfil($profil);	 
			redirect('/Home/profile');
		}else $this->profile();
	}
	private function loginLose(){		 
		$list_offres = $this->Offre->getLastestJobs(0, 6); 
		$list_formations = $this->Fmt->get(0, 4);  
		$data=array(
			'page'=>'accueil',				
			'accountFalse'=>'y',
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
		);  
		$this->load->view('index',$data); 
		/*$data=array(
			'page'=>'signIn',
			'accountFalse'=>'y'
		);  
		$this->load->view('log-in',$data);*/ 
	}
	private function verifFormRegister(){	 
		$this->form_validation->set_error_delimiters('<div style="background:linear-gradient(#d9534f,#d70872);border:0;font-family:Roboto;font-size:0.8em;margin:10px 1px;padding:5px 10px;" class="label label-danger">', '</div>');
		$this->form_validation->set_rules('fullname', $this->lang->line('FullName'), 'trim|required|min_length[3]|max_length[50]',array(
				'required'=>$this->lang->line('EnterFullName'),
				'max_length'=>$this->lang->line('Max50Char'),
				'min_length'=>$this->lang->line('Min3Char')
			));
		$this->form_validation->set_rules('email', $this->lang->line('Email'), 'trim|required|valid_email',array(
				'required'=>$this->lang->line('EnterMail'),
				'valid_email'=>$this->lang->line('ErrMail')
			));
		$this->form_validation->set_rules('password', 'password', 'required|min_length[6]|alpha_numeric',array(
				'required'=>$this->lang->line('EnterPassword'),
				'min_length'=>$this->lang->line('Min6Char')
			));	
		$this->form_validation->set_rules('accept_terms', '...',  'required',array(
				'required'=>$this->lang->line('AcceptRules')
			));
        if ($this->form_validation->run()){
			return TRUE;
        }else{ 	
			return FALSE;
        } 
	}
	private function verifFormLogin(){	 
		$this->form_validation->set_error_delimiters('<div style="background:linear-gradient(#d9534f,#d70872);border:0;font-family:Roboto;font-size:0.8em;margin:10px 1px;padding:5px 10px;" class="label label-danger">', '</div>');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email',array(
				'required'=>$this->lang->line('EnterMail'),
				'valid_email'=>$this->lang->line('ErrMail')
			));
		$this->form_validation->set_rules('password', 'password', 'required|min_length[6]|alpha_numeric',array(
				'required'=>$this->lang->line('EnterPassword'),
				'min_length'=>$this->lang->line('Min6Char')
			));	
        if ($this->form_validation->run()){
			return TRUE;
        }else{ 	
			return FALSE;
        } 
	}
	private function verifUpdateEmployeur(){	 
		$this->form_validation->set_error_delimiters('<div style="background:linear-gradient(#d9534f,#d70872);border:0;font-family:Roboto;font-size:0.8em;margin:10px 1px;padding:5px 10px;" class="label label-danger">', '</div>');
		$this->form_validation->set_rules('nom', 'nom', 'trim|required|min_length[3]|max_length[50]',array(
				'required'=>$this->lang->line('EnterFullName'),
				'max_length'=>$this->lang->line('Max50Char'),
				'min_length'=>$this->lang->line('Min3Char')
			));
		$this->form_validation->set_rules('sexe', 'sexe', 'required',array(
				'required'=>$this->lang->line('SelectValue'),
			));
		$this->form_validation->set_rules('langue', 'langue', 'required',array(
				'required'=>$this->lang->line('SelectValue'),
			));
		$this->form_validation->set_rules('telephone', 'telephone', 'trim|required',array(
				'required'=>$this->lang->line('EnterValue'),
			));
		$this->form_validation->set_rules('adresse', 'adresse', 'trim|required',array(
				'required'=>$this->lang->line('EnterValue'),
			));		
		$this->form_validation->set_rules('pays', 'pays', 'required',array(
				'required'=>$this->lang->line('SelectValue'),
			));
        if ($this->form_validation->run()){
			return TRUE;
        }else{ 	
			return FALSE;
        } 
	}
	private function verifUpdateCandidat(){	 
		$this->form_validation->set_error_delimiters('<div style="background:linear-gradient(#d9534f,#d70872);border:0;font-family:Roboto;font-size:0.8em;margin:10px 1px;padding:5px 10px;" class="label label-danger">', '</div>');
		$this->form_validation->set_rules('nom', 'nom', 'trim|required|min_length[3]|max_length[50]',array(
				'required'=>$this->lang->line('EnterName'),
				'max_length'=>$this->lang->line('Max50Char'),
				'min_length'=>$this->lang->line('Min3Char')
			));
		$this->form_validation->set_rules('prenom', 'prenom', 'trim|required|min_length[3]|max_length[50]',array(
				'required'=>$this->lang->line('EnterName'),
				'max_length'=>$this->lang->line('Max50Char'),
				'min_length'=>$this->lang->line('Min3Char')
			));
		$this->form_validation->set_rules('sexe', 'sexe', 'required',array(
				'required'=>$this->lang->line('SelectValue'),
			)); 
		$this->form_validation->set_rules('telephone', 'telephone', 'trim|required',array(
				'required'=>$this->lang->line('EnterTel'),
			));
		$this->form_validation->set_rules('nationalite', 'nationalite', 'required',array(
				'required'=>$this->lang->line('SelectValue'),
			));		
		$this->form_validation->set_rules('dateNaissance', 'dateNaissance', 'required',array(
				'required'=>$this->lang->line('EnterBirthday'),
			));
		$this->form_validation->set_rules('pays', 'pays', 'required',array(
				'required'=>$this->lang->line('SelectValue'),
			));
		$this->form_validation->set_rules('region', 'region', 'required',array(
				'required'=>$this->lang->line('SelectValue'),
			));
		$this->form_validation->set_rules('ville', 'ville', 'required',array(
				'required'=>$this->lang->line('SelectValue'),
			));
        if ($this->form_validation->run()){
			return TRUE;
        }else{ 	
			return FALSE;
        } 
	}
	//Come from Home
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
}
