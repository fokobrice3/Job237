<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pwd_forgot extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->database(); 
		$this->load->model('Employer'); 
		$this->load->model('Candidat');  
		$this->load->model('Metier');
		$this->load->model('Compagny'); 
		$this->load->model('Country'); 
		$this->load->model('State'); 
		$this->load->model('City'); 
		$this->load->model('Activity'); 	
		$this->load->model('Skills'); 	
		$this->load->model('Degree'); 	
		$this->load->model('Offre'); 	
		$this->load->model('SizeCompany'); 	
		$this->load->model('Ownership');  	
		$this->load->model('Fmt');  	
		$this->load->model('CategoryFormation'); 
		$this->load->model('Article'); 

		$this->listCat = $this->Metier->getList(0,15);
				
		session_start();
		if(empty($_SESSION['connected'])) $_SESSION['connected'] = "no";
		if(empty($_SESSION['site_lang'])) $_SESSION['site_lang'] = "french";
		$this->lang->load('information', $_SESSION['site_lang']);
		$this->lang->load('form_validation', $_SESSION['site_lang']);	
    }
	
	public function index(){		
		$data=array(
			'page'=>'passforget', 
			'langue'=>  $_SESSION['site_lang'],	
			'listCat'=>$this->listCat,	 
		);   
		$this->load->view('password_forgotten',$data);  
	} 
	public function validPassword($idUser,$ctpe,$cle){		
		if($this->verifFormRegister()){
			$hash = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);//PASSWORD_BCRYPT   
			$demande = $this->Candidat->GetForgotPass($cle,$ctpe);
			if(!empty($demande)){ 
				if($ctpe=='c'){		
					$this->Candidat->updatePassWord($idUser,$hash);	
					$this->Candidat->deleteDemandeForgetPass($cle);	
				}else if($ctpe=='e'){
					$this->Employer->updatePassWord($idUser,$hash);	
					$this->Employer->deleteDemandeForgetPass($cle);						 
				}else;				
				echo "<script>alert('Vous pouvez vous connecter avec votre nouveau mot de passe')</script>";
			} 	
			$this->Toindex(); 
		}else{			
			$data=array(
				'page'=>'passforget',
				'ctpe'=>	$ctpe,
				'cle'=> $cle,
				'idUser'=>	$idUser,
				'langue'=>  $_SESSION['site_lang'],	
				'listCat'=>$this->listCat,
			);  
			$this->load->view('password_reset',$data); 
		}
	} 
	private function verifFormRegister(){	 
		$this->form_validation->set_error_delimiters('<div style="background:linear-gradient(#d9534f,#d70872);border:0;font-family:Roboto;font-size:0.8em;margin:10px 1px;padding:5px 10px;" class="label label-danger">', '</div>');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[6]|alpha_numeric|callback_identique',array(
				'required'=>$this->lang->line('EnterPassword'),
				'min_length'=>$this->lang->line('Min6Char')
		));	 
		$this->form_validation->set_rules('password2', 'password2', 'required|min_length[6]|alpha_numeric|callback_identique',array(
				'required'=>$this->lang->line('EnterPassword'),
				'min_length'=>$this->lang->line('Min6Char')
		));	 
    if ($this->form_validation->run()){
			return TRUE;
        }else{ 	
			return FALSE;
    } 
	}
	public function identique($str){
  	if ($_POST["password"] != $_POST["password2"] ){
    	$this->form_validation->set_message('identique', 'Le mot de passe doit être identique');
      return FALSE;
    }else{
      return TRUE;
    }
  }
	public function resetpwd($cle,$ctpe){	
		$demande = $this->Candidat->GetForgotPass($cle,$ctpe);
		if(!empty($demande)){ 
			if($ctpe=='c'){		
				$user = $this->Candidat->getCandidat($demande->email);	
				$idUser = $user->idCandidat;	
			}else if($ctpe=='e'){
				$user = $this->Employer->getEmployer($demande->email);
				$idUser = $user->idEmployer;	
			}else;
			$data=array(
				'page'=>'passforget', 
				'ctpe'=>	$ctpe,
				'cle'=> $cle,
				'idUser'=>	$idUser,
				'langue'=>  $_SESSION['site_lang'],	
				'listCat'=>$this->listCat,	 
			);    
			$this->load->view('password_reset',$data);  
		}else{
			$this->Toindex(); 
		}		
	}
	public function resetPassword(){		
		$email=trim($_POST["email"]);
		$user = $this->Candidat->getCandidat($email);
		if($user){
			$key = $this->Candidat->ForgetPass($_POST["email"]); 		
			$this->sendMail('c',$key,$email);
			echo "<script>alert('Un Mail vous a été envoyé pour reinitialiser votre mot de passe')</script>";
		} 
		else{
			$user = $this->Employer->getEmployer($email);
			if($user){
				$key = $this->Employer->ForgetPass($_POST["email"]);
				$this->sendMail('e',$key,$email);
				echo "<script>alert('Un Mail vous a été envoyé pour reinitialiser votre mot de passe')</script>";
			}else{
				echo "<script>alert('Cette adresse Email n'existe pas sur CeoGroup')</script>";
			}
		} 
		$this->Toindex();  
	} 
	public function sendMail($ctpe,$key,$email){	
		$config = Array(       
			'mailtype' => 'html',
			'charset' => 'utf-8',
			'priority' => '1'
		);			
	    $this->load->library('email',$config);
		$this->email->set_newline("\r\n");       
		$this->email->initialize($config);
			
		$this->email->from('info@ceogroup.com');
		$this->email->to($email);	
		$this->email->subject('MOT DE PASSE OUBLIE');
		$data = array(
			'cle'=> $key,
			'ctpe'=> $ctpe,
		);
		$body = $this->load->view('static/mailpwd.php',$data,TRUE);			
        $this->email->message($body);
		$this->email->send(); 
	}

	public function Toindex(){ 
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
		);  
		$this->load->view('index',$data); 
	}
}
