<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {
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

		$this->listCat = $this->Metier->getList(0,15);
				
		session_start();
		if(empty($_SESSION['connected'])) $_SESSION['connected'] = "no";
		if(empty($_SESSION['site_lang'])) $_SESSION['site_lang'] = "french";
		$this->lang->load('information', $_SESSION['site_lang']);
		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');    
    }
	
	public function index(){		
		$list_offres = $this->Offre->getLastestJobs(0, 8); 
		$list_formations = $this->Fmt->get(0, 4);  
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
	public function send_formation($idFormation){	
		$formation = $this->Fmt->getFromID($idFormation);	
		$this->form_validation->set_error_delimiters('<div style="font-size:0.9em;margin:5px 1px;padding:5px 10px;" class="label label-danger">', '</div>');
		$this->form_validation->set_rules('Name', 'Name', 'required',array(
				'required'=>'Entrez le nom',
				'max_length'=>'Le nom doit avoir au plus 20 caractères',
				'min_length'=>'Le nom doit avoir au moins 03 caractères'
			)); 
		$this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email',array(
				'required'=>'Entrez votre email',
				'valid_email'=>'Votre email est invalide'
			)); 
		$this->form_validation->set_rules('formation_message', 'commentaire', 'trim|required',array(
				'required'=>'Laissez un message ou un commentaire'
			));

        if ($this->form_validation->run()){
			$config = Array(       
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1'
			);	
			$mail_data = array( 
				'nom'=> $_POST['Name'],		
				'email'=>$_POST['Email'],		 
				'sujet'=> 'FORMATION : '.$formation->nom, 
				'message'=> $_POST['formation_message']
			);
			
			$this->load->library('email',$config);
			$this->email->set_newline("\r\n");          
			$this->email->initialize($config);
          
			$this->email->from("info@ceo-group.com", "Ceogroup Formation");
			$this->email->to('fokobrice3@gmail.com','info@ceo-group.com','nadinendjock@ceo-group.com','victor.ndjock@ceo-group.com'); 
			$this->email->subject('FORMATION : '.$formation->nom);			 
			
			$body = $this->load->view('static/mailceo.php',$mail_data,TRUE);		
            $this->email->message($body);
			$this->email->send();
			  					
			$this->email->message($body);		 
			echo '<script>alert("Message envoyé")</script>';
			redirect('/Welcome/AllFormation', 'refresh');
        }else{
            $list_categoryFormation = $this->CategoryFormation->getList(0,10);
			$last_formation = $this->Fmt->get(0, 3);
			$list_offres = $this->Offre->getLastestJobs(0, 5); 
			$formation = $this->Fmt->getFromID($idFormation); 
			$list_formations = $this->Fmt->get(0, 4);  
			$data=array(
				'page'=>'formation2', 
				'formation'=>$formation,	
				'list_formations'=>$list_formations,	
				'langue'=>  $_SESSION['site_lang'],
				'listCat'=>$this->listCat,	
				'langue'=>  $_SESSION['site_lang'], 
				'list_categoryFormation'=>$list_categoryFormation,
				'last_formation'=>$last_formation,
				'list_offres'=>$list_offres,
			);  
			$this->load->view('article_formation',$data); 
        } 
	}
	
	public function send(){	
		$data=array( 
			'page'=>'contact',	
			'langue'=>  $_SESSION['site_lang'],
			'listCat'=>$this->listCat,	
		);
		$this->form_validation->set_error_delimiters('<div style="font-size:0.9em;margin:5px 1px;padding:5px 10px;" class="label label-danger">', '</div>'); 
		$this->form_validation->set_rules('name', 'Nom', 'trim|required|min_length[3]|max_length[30]',array(
				'required'=>'Entrez le nom',
				'max_length'=>'Le nom doit avoir au plus 20 caractères',
				'min_length'=>'Le nom doit avoir au moins 03 caractères'
			));  
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email',array(
				'required'=>'Entrez votre email',
				'valid_email'=>'Votre email est invalide'
			)); 
		$this->form_validation->set_rules('subject', 'sujet', 'trim|required|max_length[100]|min_length[3]',array(
				'required'=>'Entrez le sujet',
				'max_length'=>'Utilisez moins de 100 caractères',
				'min_length'=>'Utilisez au moins de 3 caractères'
			)); 
		$this->form_validation->set_rules('message', 'commentaire', 'trim|required',array(
				'required'=>'Laissez un message ou un commentaire'
			));

        if ($this->form_validation->run()){				
			$mail_data = array( 
				'nom'=> $_POST['name'],		
				'email'=>$_POST['email'],		 
				'sujet'=> $_POST['subject'], 
				'message'=> $_POST['message']
			);
			/*$config = array(
                'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
                'smtp_host' => 'smtp.hostinger.fr', 
                'smtp_port' => 587,
                'smtp_user' => 'info@ceo-group.com',
                'smtp_pass' => 'ceo-group',
                'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
                'mailtype' => 'html', //plaintext 'text' mails or 'html'
                'smtp_timeout' => '4', //in seconds
                'charset' => 'utf-8',
                'wordwrap' => TRUE
            );*/
            $config = Array(       
				'mailtype' => 'html',
				'charset' => 'utf-8',
				'priority' => '1'
			);
			//$this->email->set_mailtype("html");
			//$this->email->set_header('Content-Type', 'text/html');
	        $this->load->library('email',$config);
			$this->email->set_newline("\r\n");          
			$this->email->initialize($config);

			$this->email->from("info@ceo-group.com", "Ceogroup Contact Form");
			$this->email->to('fokobrice3@gmail.com','info@ceo-group.com','nadinendjock@ceo-group.com','victor.ndjock@ceo-group.com'); 
			$this->email->subject(''.$_POST["subject"]);			
			$body = $this->load->view('static/mailceo.php',$mail_data,TRUE);			
			$this->email->message($body);
 
			$this->email->send();			
			$data['emission']='oui';
			echo '<script>alert("Message envoyé")</script>';	
        }else{
			$data['emission']='non'; 
			echo '<script>alert("Erreur d\'envoi")</script>';			
        }
		$this->load->view('contact',$data);   
	}
}
		