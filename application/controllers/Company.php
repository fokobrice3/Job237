<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
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
		
    }	
	public function update($idCompagny){
		if($this->verifUpdate()){ 
			$user = $this->Employer->getEmployer($_SESSION['email']);  		
			$company = $this->Compagny->getCompagny($user->idEmployeur);  		
			if(!empty($_FILES["logo"]["name"])){
				$target_dir = "assets/img/logo/";
				$target_file = $target_dir . basename($_FILES["logo"]["name"]); 
				$ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				$fileName = $user->idEmployeur."-".date("ymdHis").".".$ext; 
				if($ext=="jpg" or $ext=="jpeg" or $ext=="png" or $ext=="gif"){
					move_uploaded_file($_FILES["logo"]["tmp_name"], $target_dir."/".$fileName);
				}else{
					$fileName=$company->logo;	
				}				
			}else{
				$fileName=$company->logo;	
			}  
			$company=array( 
				'idTaille'=>$_POST['size'], 
				'idPropriete'=>$_POST['ownership_type_id'], 
				'idSecteurActivite'=>$_POST['secteur'], 
				'telephone'=>$_POST['telephone'], 
				'adresse'=>$_POST['adresse'], 
				'description'=>$_POST['comment'], 
				'mail'=>$_POST['email'], 
				'nom'=>$_POST['nom'], 
				'pays'=>$_POST['pays'], 
				'region'=>$_POST['region'], 
				'ville'=>$_POST['ville'], 
				'idSociete'=>$idCompagny, 
				'logo'=>$fileName, 
			);		
			//print_r($company);
			$this->Compagny->update($company);	 
			redirect('/Home/index');
		}else $this->compagny();
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
	private function verifUpdate(){	 
		$this->form_validation->set_error_delimiters('<div style="position:absolute;top:-12px;background:linear-gradient(#d9534f,#d70872);border:0;font-family:Roboto;font-size:0.8em;padding:5px 10px;" class="label">', '</div>');
		$this->form_validation->set_rules('nom', 'nom', 'trim|required|min_length[3]|max_length[50]',array(
				'required'=>$this->lang->line('EnterCompanyName'),
				'max_length'=>$this->lang->line('Max50Char'),
				'min_length'=>$this->lang->line('Min3Char')
			));
		$this->form_validation->set_rules('email', $this->lang->line('Email'), 'trim|required|valid_email',array(
				'required'=>$this->lang->line('EnterMail'),
				'valid_email'=>$this->lang->line('ErrMail')
			));	
		$this->form_validation->set_rules('size', 'size', 'required',array(
				'required'=>$this->lang->line('SelectValue'),
			));
		$this->form_validation->set_rules('ownership_type_id', 'ownership_type_id', 'required',array(
				'required'=>$this->lang->line('SelectValue'),
			));
		$this->form_validation->set_rules('secteur', 'secteur', 'required',array(
				'required'=>$this->lang->line('SelectValue'),
			));
		$this->form_validation->set_rules('telephone', 'telephone', 'trim|required',array(
				'required'=>$this->lang->line('EnterValue'),
			));
		$this->form_validation->set_rules('adresse', 'adresse', 'trim|required',array(
				'required'=>$this->lang->line('EnterValue'),
			));
		$this->form_validation->set_rules('comment', 'comment', 'trim|required',array(
				'required'=>$this->lang->line('EnterValue'),
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
	
	private function compagny(){ 	
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
	private function getOut(){
		$data=array(
			'page'=>'signIn',
			'accountFalse'=>'y',
			'listCat'=>$this->listCat,
		);  
		$this->load->view('log-in',$data);
	}
	
}
