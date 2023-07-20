<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resume extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->database();  
		$this->load->model('Candidat');   
		$this->load->model('Activity'); 	
		$this->load->model('Skills'); 	
		$this->load->model('Degree'); 	
		$this->load->model('Metier'); 	 
		
		$this->listCat = $this->Metier->getList(0,15);
		
		session_start();
		if(empty($_SESSION['site_lang'])) $_SESSION['site_lang'] = "french";
		$this->lang->load('information', $_SESSION['site_lang']);	
		$this->lang->load('form_validation', $_SESSION['site_lang']);	
    }
	
	public function EditExperience($idExperience){	 
		if($_SESSION['connected']=="yes"){
			$user = $this->Candidat->getCandidat($_SESSION['email']); 
			$experience = $this->Candidat->getExperienceFromID($idExperience); 
			$data=array(
				'page'=>'experience',			 
				'experience'=>$experience,			
				'list_job'=>$this->Metier->getAll(),
				'listCat'=>$this->listCat, 	
			);  		
			$this->load->view('home',$data); 
		}else $this->getOut();
    }
	public function EditEducation($idEducation){	 
		if($_SESSION['connected']=="yes"){
			$user = $this->Candidat->getCandidat($_SESSION['email']); 
			$education = $this->Candidat->getEducationFromID($idEducation);
			$data=array(
				'page'=>'education',			 
				'education'=>$education,
				'list_degree'=>$this->Degree->getAll(),				
				'list_job'=>$this->Metier->getAll(),				
				'list_type_degree'=>$this->Degree->getAllType(),
				'listCat'=>$this->listCat, 	
			);  		
			$this->load->view('home',$data); 
		}else $this->getOut();
    }
	
	public function updateCV(){	 
		$user = $this->Candidat->getCandidat($_SESSION['email']); 
		if(!empty($_FILES["file"]["name"])){
			$target_dir = "assets/resume/";
			$target_file = $target_dir . basename($_FILES["file"]["name"]); 
			$ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
			$fileName = $user->idCandidat."-".date("ymdHis").".".$ext; 
			if($ext=="jpg" or $ext=="jpeg" or $ext=="png" or $ext=="pdf"){
				move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir."/".$fileName);				
				$this->Candidat->updateCV($fileName,$user->idCandidat);	 
			}else{
				$fileName=$user->CV;	
			}			 
		}else{
			$fileName=$user->CV;	
		}  	
		redirect('/Home/resume');
    }
	public function updateSkills(){	 
		$user = $this->Candidat->getCandidat($_SESSION['email']); 
		if(isset($_POST['skills'])) $listCompetences=$_POST['skills'];
		else $listCompetences=null;
		$this->Candidat->updateSkills($listCompetences,$user->idCandidat);	 		
		redirect('/Home/resume');
    }
	public function UpdateExperience($idExperience){	 
		if($_SESSION['connected']=="yes"){
			$user = $this->Candidat->getCandidat($_SESSION['email']); 
			if(isset($_POST['poste'], $_POST['mois'], $_POST['description'], $_POST['company'])){ 
				$this->Candidat->UpdateExperience($_POST['poste'],$_POST['mois'],$_POST['description'],$_POST['company'],$user->idCandidat,$idExperience,$_POST['job']);	 
			}else{echo'<script>alert("REMPLIR TOUS LES CHAMPS")</script>';}		
			redirect('/Home/resume');
		}else $this->getOut();	
    }
	public function UpdateEducation($idEducation){	 
		if($_SESSION['connected']=="yes"){ 
			if(isset($_POST['degree'],$_POST['degreeType'],$_POST['degreeTitre'],$_POST['institution'],$_POST['dateObtention'],$_POST['mention'])){ 
				$this->Candidat->UpdateEducation($_POST['degree'],$_POST['degreeType'],$_POST['degreeTitre'],$_POST['institution'],$_POST['dateObtention'],$_POST['mention'],$idEducation);	 
			}else{echo'<script>alert("REMPLIR TOUS LES CHAMPS")</script>';}		 	
			redirect('/Home/resume');
		}else $this->getOut();	
    }
	
	public function addLanguage(){	 
		$user = $this->Candidat->getCandidat($_SESSION['email']); 
		if(isset($_POST['langage'],$_POST['parle'],$_POST['ecris'])) {
			$this->Candidat->addLanguage($_POST['langage'],$_POST['parle'],$_POST['ecris'],$user->idCandidat);	 
		}		
		redirect('/Home/resume');
    }	
	public function addEducation(){	 
		$user = $this->Candidat->getCandidat($_SESSION['email']); 
		if(isset($_POST['degree'],$_POST['degreeType'],$_POST['degreeTitre'],$_POST['institution'],$_POST['dateObtention'],$_POST['mention'])) {
			$this->Candidat->addEducation($_POST['degree'],$_POST['degreeType'],$_POST['degreeTitre'],$_POST['institution'],$_POST['dateObtention'],$_POST['mention'],$user->idCandidat);	 
		}else{echo'<script>alert("REMPLIR TOUS LES CHAMPS")</script>';}		
		redirect('/Home/resume');
    }
	public function addExperience(){	 
		$user = $this->Candidat->getCandidat($_SESSION['email']); 
		if(isset($_POST['poste'], $_POST['mois'], $_POST['description'], $_POST['company'])){ 
			$this->Candidat->addExperience($_POST['poste'],$_POST['mois'],$_POST['description'],$_POST['company'],$user->idCandidat,$_POST['job']);	 
		}else{echo'<script>alert("REMPLIR TOUS LES CHAMPS")</script>';}		
		redirect('/Home/resume');
    }	
	
	
	public function deleteLanguage($idLanguage){	 
		if($_SESSION['connected']=="yes"){
			$user = $this->Candidat->getCandidat($_SESSION['email']); 
			$language = $this->Candidat->getLanguageFromID($idLanguage);
			if($language->idCandidat==$user->idCandidat){
				$this->Candidat->deleteLanguage($idLanguage);
				echo'<script>alert("DELETE")</script>';
			}else{
				echo'<script>alert("ACCESS DENIED")</script>';
			}			
			redirect('/Home/resume');
		}else $this->getOut();		
    }	
	public function deleteEducation($idEducation){	 
		if($_SESSION['connected']=="yes"){
			$user = $this->Candidat->getCandidat($_SESSION['email']); 
			$education = $this->Candidat->getEducationFromID($idEducation);
			if($education->idCandidat==$user->idCandidat){
				$this->Candidat->deleteEducation($idEducation);
				echo'<script>alert("DELETE")</script>';
			}else{
				echo'<script>alert("ACCESS DENIED")</script>';
			}			
			redirect('/Home/resume');
		}else $this->getOut();		
    }	
	public function DeleteExperience($idExperience){	 
		if($_SESSION['connected']=="yes"){
			$user = $this->Candidat->getCandidat($_SESSION['email']); 
			$education = $this->Candidat->getExperienceFromID($idExperience);
			if($education->idCandidat==$user->idCandidat){
				$this->Candidat->DeleteExperience($idExperience);
				echo'<script>alert("DELETE")</script>';
			}else{
				echo'<script>alert("ACCESS DENIED")</script>';
			}			
			redirect('/Home/resume');
		}else $this->getOut();		
    }	
	
	private function getOut(){
		$data=array(
			'page'=>'signIn',  
			'langue'=>$_SESSION['site_lang'],
			'listCat'=>$this->listCat, 	
		);  
		$this->load->view('log-in',$data); 
	}
}
