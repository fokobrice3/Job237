<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {
	public function index($page="accueil"){		
		$data=array('page'=>$page);
		$this->load->view('index',$data);
	}
	public function send(){		
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		$this->form_validation->set_rules('civilite', 'Civilite', 'required');
		$this->form_validation->set_rules('nom', 'Nom', 'trim|required|min_length[5]|max_length[20]',
			array(
				'required'=>'Vous devez entrez votre nom'
			)
		);
		$this->form_validation->set_rules('prenom', 'Prenom', 'trim|required|max_length[20]');
		$this->form_validation->set_rules('tel', 'numero de telephone', 'trim|required|min_length[8]|max_length[30]|numeric');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('activite', 'activite', 'required');
		$this->form_validation->set_rules('effSalarie', 'Effectif salarie', 'required');
		$this->form_validation->set_rules('comment', 'commentaire', 'trim|required');

        if ($this->form_validation->run()){			
			$this->load->library('email');
			$this->email->from(''.$_POST['email'], ''.$_POST['prenom'].' '.$_POST['nom']);
			$this->email->to('test@rexcocam-france.fr');
			
			$this->email->subject('REXCOCAM-FRANCE.FR');
			$sms="
				CIVILITE :".$_POST['civilite']. "\n
				NOM :".$_POST['nom']. "\n
				PRENOM :".$_POST['prenom']. "\n
				ACTIVITE: ".$_POST['activite']. "\n
				EFFECTIF SALARIE: ".$_POST['effSalarie']. "\n
				TELEPHONE :".$_POST['tel']. "\n\n
			".$_POST['comment'];
			$this->email->message('NOM :  Testing the email class.');
			$this->email->send();    
        }else{
            $data=array('page'=>"contact");
			$this->load->view('index',$data); 
        }
		
		$data=array('page'=>'contact', 'emission'=>'oui'); 
		$this->load->view('index',$data);
	}
	private function ctrl_form($civilite=NULL, $nom=NULL, $prenom=NULL, $tel=NULL, $email=NULL, $activite=NULL, $effSalarie=NULL, $comment=NULL){		
	    $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');

        if ($this->form_validation->run() == FALSE){
			return false;
		}else{
			return true;
        }  
	}
}
		