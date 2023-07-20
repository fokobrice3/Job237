<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	 function __construct() {
        parent::__construct();
		$this->load->database(); 
		$this->load->model('AdminCEO'); 
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

		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');  
		$this->load->library('grocery_CRUD');
		
		session_start();
		if(empty($_SESSION['Admin_online'])) $_SESSION['Admin_online'] = false;
    }
	
	public function index(){  
		if($_SESSION['Admin_online']){ 
			$data=array( 
				'nbEmployeur'=>count($this->Employer->getAll()),
				'nbCandidat'=>count($this->Candidat->getAll()),
				'nbJobs'=>count($this->Offre->getAll()),
				'nbDemande'=>count($this->Demande->getAll()),
				'nbMetier'=>count($this->Metier->getAll()),
				'nbFormation'=>0,
				'nbPoste'=>$this->Offre->getAllPosteNumber(),
				'nbPosteAccorded'=>count($this->Demande->getAllAccorded()),
				'nbCompanyActive'=>count($this->Compagny->getAllActive()), 
				'nbEmployerValide'=>count($this->Employer->getAllValide()),
				'nbCandidateValide'=>count($this->Candidat->getAllValide()),
				'nbJobsValide'=>count($this->Offre->getAllAviable()),
				'nbJobsAttribuer'=>count($this->Offre->getAllAttribued()),
				'nbDemandeOK'=>count($this->Demande->getAllAccorded()) + count($this->Demande->getAllRejected()),
				'lastEmployers'=>$this->Employer->getLast(0,10),
				'lastJobs'=>$this->Offre->getLast(0,5),
				'lastDemande'=>$this->Demande->getLast(0,5),
				'js_files' => array() ,
				'css_files' => array()
			); 
			$this->load->view('admin/index',$data);		
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}		   
	public function login(){			 
		if($this->verifFormLogin()){ 
			$user=array( 
				'pass'=>$_POST['password'], 
				'login'=>$_POST['login']
			);
			$Admin = $this->AdminCEO->getAdmin($user['login']); 
			if(!empty($Admin)){
				$hash = $Admin->pass; 
				if (password_verify($user['pass'], $hash)) {
					$this->AdminCEO->updateLastConnexion($Admin->idAdmin);					
					$_SESSION['Admin_online'] = "yes";
					$_SESSION['idAdmin'] = $Admin->idAdmin;
					$this->index();
				}else $this->loginLose(); 
			}else $this->loginLose();		
		}else $this->loginLose();	
	}
	private function verifFormLogin(){	 
		$this->form_validation->set_error_delimiters('<div style="color:#d9534f;border:0;font-family:Roboto;font-size:0.8em;margin:10px 1px;padding:5px 10px;" class="label label-danger">', '</div>');
		$this->form_validation->set_rules('login', 'login', 'trim|required',array(
				'required'=>"Entrez votre Nom d'utilisateur"
			));
		$this->form_validation->set_rules('password', 'password', 'required',array(
				'required'=>"Entrez votre mot de passe"
			));	
        if ($this->form_validation->run()){
			return TRUE;
        }else{ 	
			return FALSE;
        } 
	}
	private function loginLose(){
		$data=array( 
			'accountFalse'=>'y',
			'js_files' => array() ,
			'css_files' => array()
		);  
		$this->load->view('admin/login',$data); 
	}
	public function logout(){    
		session_destroy();
        redirect('/', 'refresh'); 
	}
	
	/*-------------------- CRUD -------------------------*/
	public function list_employeur(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="Employeurs";
			$crud = new grocery_CRUD();
			$crud->set_theme('datatables');
			$crud->set_table('employeur');
			$crud->set_relation('pays','pays','nom');  
			$crud->set_subject('Employeur');
			$crud->set_field_upload('photo','assets/img/profil');
			
			$crud->columns('email','nom','sexe','photo','pays','adresse','telephone','societe','profilOk', 'societeOK', 'active');
			$crud->edit_fields('nom','sexe','pays','adresse','telephone', 'active');
			$crud->add_fields('societe','nom','email','pass','sexe','pays','adresse','telephone','langue','dateCreation','active');
			$crud->required_fields('societe','email','nom','sexe','photo','pays','adresse','telephone','langue','active');		
			
			$crud->change_field_type('dateCreation','invisible');	 
			$crud->display_as('profilOk','infos profil');
			$crud->display_as('societeOK','infos societe');
			$crud->display_as('societe','Nom de la société');
			$crud->unset_clone();	 
			$crud->unset_print();
			
			$crud->callback_add_field('active', function () {
				return '<select name="active"><option value="1">Activer le compte</option><option value="0">Ne pas activer le compte</option></select>';
			});
			$crud->callback_edit_field('active', function () {
				return '<select name="active"><option value="1">Activer le compte</option><option value="0">Ne pas activer le compte</option></select>';
			});
			$crud->callback_add_field('societe',function () {
				return '<input type="text" maxlength="50" value="" name="societe"> <strong>( Editer après création )</strong>';
			});
			$crud->callback_add_field('pass',function () {
				return '<input type="text" maxlength="50" name="pass" value="ceogroup" placeholder="ceogroup" readonly>';
			});			
			$crud->callback_insert(function($post_array){ 				
				$user=array( 
					'nom'=>$post_array['nom'], 
					'pass'=>password_hash("ceogroup", PASSWORD_DEFAULT, ['cost' => 12]), 
					'email'=>$post_array['email'],
					'sexe'=>$post_array['sexe'], 
					'pays'=>$post_array['pays'], 
					'adresse'=>$post_array['adresse'], 
					'telephone'=>$post_array['telephone'], 
					'langue'=>$post_array['langue'], 
					'dateCreation'=>date("Y-m-d H:i:s"),
					'active'=>$post_array['active'], 
					'profilOk'=> 1
				);				
				$this->Employer->add_admin($user);
				$compagny = array(
					'idEmployeur' => $this->Employer->getId(array('email'=>$post_array['email'])),
					'nom' => $post_array['societe'],
					'dateCreation'=> date("Y-m-d"),
					'complete' => 0
				); 
				$this->Compagny->add_admin($compagny);				
			});
			
			
			$crud->callback_column('profilOk',function ($value, $row){
				if($value) $actif='<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
				else $actif='<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';
				return $actif;									 
			});
			$crud->callback_column('societe',function ($value, $row){
				$societe = $this->Compagny->getCompagny($row->idEmployeur);
				if(!empty($societe->nom)) return $societe->nom;	
				else return "/";
			});
			$crud->callback_read_field('profilOk', function ($value, $primary_key) {
				if($value) $actif='<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
				else $actif='<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';
				return $actif;
			});
			$crud->callback_read_field('active', function ($value, $primary_key) {
				if($value) $actif='<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
				else $actif='<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';
				return $actif;
			});
			$crud->callback_read_field('societe', function ($value, $primary_key) {
				$societe = $this->Compagny->getCompagny($primary_key);
				if(!empty($societe->nom)) return $societe->nom;	
				else return "/";
			});
			$crud->callback_column('societeOK',function ($value, $row){
				$societe = $this->Compagny->getCompagny($row->idEmployeur);
				if($societe->complete) $actif='<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
				else $actif='<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';
				return $actif;
			});
			$crud->callback_column('active',function ($value, $row){
				if($value) $actif='<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
				else $actif='<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';
				return $actif;
			});
			
			
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	} 
	public function list_candidat(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="Candidats";
			$crud = new grocery_CRUD();
			$crud->set_theme('datatables');
			$crud->set_table('candidat');
			$crud->set_relation('pays','pays','nom');
			$crud->set_relation('region','region','nom');
			$crud->set_relation('ville','ville','nom');
			$crud->set_relation('idNationalite','pays','nationalite');
			$crud->set_subject('Candidat');
			$crud->set_field_upload('photo','assets/img/profil');
			$crud->set_field_upload('CV','assets/resume');
			
			$crud->columns('email','nom','prenom','dateNaissance','idNationalite','sexe','photo','CV','pays','region','ville','telephone','profilOk');
			$crud->edit_fields('nom','prenom','dateNaissance','idNationalite','sexe','pays','region','ville','telephone','langue');
			$crud->add_fields('email','pass','nom','prenom','dateNaissance','idNationalite','sexe','pays','region','ville','telephone','langue');
			$crud->required_fields('email','nom','dateNaissance','prenom','idNationalite','sexe','pays','region','ville','telephone','langue');			
			
			$crud->callback_column('profilOk',function ($value, $row){
				if($value) $actif='<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
				else $actif='<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';
				return $actif;									 
			});
			$crud->callback_read_field('profilOk', function ($value, $primary_key) {
				if($value) $actif='<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
				else $actif='<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';
				return $actif;
			});
			$crud->callback_read_field('listCompetences', function ($value, $primary_key) {
				$skills = $this->Skills->listForAdmin($primary_key); 
				return $skills;
			});
			$crud->callback_add_field('pass',function () {
				return '<input type="text" maxlength="50" name="pass" value="ceogroup" placeholder="ceogroup" readonly>';
			});	 
			/*$crud->callback_upload(function($files_to_upload,$field_info){
				//move_uploaded_file($files_to_upload[$field_info->encrypted_field_name]['tmp_name'], "assets/resume/"."dsdsq");
				$id = $this->Candidat->getLastID() + 1;
				if(!empty($files_to_upload[$field_info->encrypted_field_name]['tmp_name'])){
					$target_dir = "assets/resume/";
					$target_file = $target_dir . basename($files_to_upload[$field_info->encrypted_field_name]['name']); 
					$ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
					$fileName = "-".date("ymdHis").".".$ext; 
					if($ext=="jpg" or $ext=="jpeg" or $ext=="png" or $ext=="pdf"){
						//move_uploaded_file($_FILES["CV"]["tmp_name"], $target_dir."/".$fileName);		 
					}else{
						//$fileName="s";	
					}			 
				}else{
					//$fileName="s";	
				} 	
			});*/
			$crud->callback_insert(function($post_array){ 	
				$user=array( 
					'dateNaissance'=>$post_array['dateNaissance'],
					'nom'=>$post_array['nom'], 
					'pass'=>password_hash("ceogroup", PASSWORD_DEFAULT, ['cost' => 12]), 
					'email'=>$post_array['email'],
					'sexe'=>$post_array['sexe'], 
					'idNationalite'=>$post_array['idNationalite'], 
					'pays'=>$post_array['pays'], 
					'region'=>$post_array['region'], 
					'ville'=>$post_array['ville'],  
					'telephone'=>$post_array['telephone'], 
					'langue'=>$post_array['langue'], 
					'dateCreation'=>date("Y-m-d H:i:s"), 
					'profilOk'=> 1
				);				
				$this->Candidat->add_admin($user); 		
			});
			
			$crud->change_field_type('dateCreation','invisible');				
			$crud->display_as('profilOk','Profil rempli');
			$crud->display_as('idNationalite','Nationalité');
			$crud->display_as('listCompetences ','Compétences');
			$crud->unset_clone();	 
			
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_societe(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="Societes";
			$crud = new grocery_CRUD();
			$crud->set_theme('datatables');
			$crud->set_table('societe');
			$crud->set_relation('idEmployeur','employeur','nom');
			$crud->set_relation('idSecteurActivite','secteur_activite','libelle');
			$crud->set_relation('idTaille','taille','nom');
			$crud->set_relation('idPropriete','propriete','nom');
			$crud->set_relation('pays','pays','nom');
			$crud->set_relation('region','region','nom');
			$crud->set_relation('ville','ville','nom'); 
			$crud->set_subject('societe'); 
			$crud->set_field_upload('logo','assets/img/logo');
			
			$crud->columns('nom','logo','idEmployeur','idSecteurActivite','idTaille','idPropriete','pays','region','ville','telephone','mail','complete'); 
			$crud->fields('nom','idEmployeur','idSecteurActivite','idTaille','idPropriete','description','pays','region','ville','telephone','mail','complete');			
			$crud->required_fields('nom','idEmployeur','idSecteurActivite','idTaille','idPropriete','description','pays','region','ville','telephone','mail','complete');			
		
			$crud->callback_field('complete', function (){
				return '<select name="complete"><option value="1">Activer le société</option><option value="0">Ne pas activer le société</option></select>';
			});
			$crud->callback_column('complete',function ($value, $row){
				if($value) $actif='<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
				else $actif='<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';
				return $actif;									 
			});
			$crud->callback_read_field('complete', function ($value, $primary_key) {
				if($value) $actif='<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
				else $actif='<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';
				return $actif;
			});
			
			$crud->display_as('idEmployeur','Employeur');
			$crud->display_as('idTaille','Taille');
			$crud->display_as('idPropriete','Type');
			$crud->display_as('idSecteurActivite','Secteur');
			$crud->display_as('complete','infos complète');
			$crud->unset_add();
			$crud->unset_clone();
			$crud->unset_delete();
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_emplois(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="Emplois";
			$crud = new grocery_CRUD();
			$crud->where('valide','1');
			$crud->order_by('dateDepot','asc');
			
			$crud->set_theme('datatables');
			$crud->set_table('offre');
			$crud->set_relation('idEmployeur','employeur','nom');
			$crud->set_relation('idSecteurActivite','secteur_activite','libelle');
			$crud->set_relation('idMetier','metier','nom');
			$crud->set_relation('idSociete','societe','nom');
			$crud->set_relation('idTypeEducation',' type_education','nom');
			$crud->set_relation('pays','pays','nom');
			$crud->set_relation('region','region','nom');
			$crud->set_relation('ville','ville','nom');
			$crud->set_subject('emploi'); 
			$crud->set_relation('idNiveauEtude','niveau_etude','nom');
			$crud->columns('poste','reference','idMetier','nbPoste','nbPosteAttribue','dateDepot','idEmployeur','idSociete','idNiveauEtude','idSecteurActivite');
			$crud->unset_add_fields('nbPosteAttribue','valide','listCompetences','finish','dateCreation');
			$crud->unset_edit_fields('reference','nbPosteAttribue','valide','listCompetences','finish','dateCreation');
			$crud->change_field_type('reference','invisible');	   
			$crud->change_field_type('nbPoste','integer');	 
			$crud->change_field_type('duree','integer');				
			$crud->required_fields('poste','idMetier','nbPoste','dateDepot','idEmployeur','pays','region','ville','contrat','datePublication','descriptionOffre','descriptionProfil','duree');
			
			$crud->callback_read_field('valide', function ($value, $primary_key) {
				if($value) $actif='<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
				else $actif='<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';
				return $actif;
			});
			$crud->callback_read_field('Freelance', function ($value, $primary_key) {
				if($value) $actif='<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
				else $actif='<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';
				return $actif;
			});
			$crud->callback_read_field('finish', function ($value, $primary_key) {
				if($value) $actif='<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
				else $actif='<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';
				return $actif;
			});
			$crud->callback_read_field('listCompetences', function ($value, $primary_key) {
				$skills = $this->Skills->listForOffreAdmin($primary_key); 
				return $skills;
			});
			$crud->callback_add_field('duree',function () {
				return '<input type="number" name="duree">  <strong> Mois </strong>';
			});
			$crud->callback_edit_field('duree',function () {
				return '<input type="number" name="duree">  <strong> Mois </strong>';
			});
			$crud->callback_add_field('nbPoste',function () {
				return '<input type="number"  name="nbPoste">';
			});
			$crud->callback_edit_field('nbPoste',function () {
				return '<input type="number" name="nbPoste">';
			});
			$crud->callback_add_field('Freelance',function () {
				return '<select name="Freelance"><option value="1">Oui</option><option value="0">Non</option></select>';
			});
			$crud->callback_edit_field('Freelance',function () {
				return '<select name="Freelance"><option value="1">Oui</option><option value="0">Non</option></select>';
			});
			$crud->callback_add_field('contrat',function () {
				return '<select name="contrat"><option value="CDD">Contrat à durée déterminée</option><option value="CDI">Contrat à durée interterminée</option></select>';
			});
			$crud->callback_edit_field('contrat',function () {
				return '<select name="contrat"><option value="CDD">Contrat à durée déterminée</option><option value="CDI">Contrat à durée interterminée</option></select>';
			});
			$crud->callback_add_field('experience',function () {
				return '<select name="contrat"><option value="">Aucune</option><option value="1">1 an</option><option value="2">2 ans</option><option value="3">3 ans</option><option value="4">4 ans</option><option value="5">5 ans</option><option value="6">6 ans</option><option value="7">7 ans</option><option value="8">8 ans et plus</option></select>';
			});
			$crud->callback_edit_field('experience',function () {
				return '<select name="contrat"><option value="">Aucune</option><option value="1">1 an</option><option value="2">2 ans</option><option value="3">3 ans</option><option value="4">4 ans</option><option value="5">5 ans</option><option value="6">6 ans</option><option value="7">7 ans</option><option value="8">8 ans et plus</option></select>';
			});
			$crud->callback_before_insert(function ($post_array) {  
				$numero_offre= $this->Offre->getLastNumberFromEmployeur($post_array["idEmployeur"])+1;
				$numero_offre = sprintf("%04d",  $numero_offre);
				$codeMetier = $this->Metier->getCDE($post_array["idMetier"])->code;
				$post_array['reference'] = $codeMetier."/".$numero_offre."/".date('ymd');
				$compagny= $this->Compagny->getCompagny($post_array['idEmployeur']);
				$post_array['idSociete'] = $compagny->idSociete;				
				return $post_array;
			});	
			$crud->callback_delete(function ($primary_key) {  
				$this->Offre->delete($primary_key);
				redirect('Admin/list_emplois', 'refresh');  
			});			 
			
			$crud->add_action('Voir candidats avec profil', '', 'admin/voir_candidat_profil', 'ui-button-icon-primary ui-icon ui-icon-attrib');
			$crud->display_as('idEmployeur','Employeur');
			$crud->display_as('idMetier','Metier');
			$crud->display_as('idSociete','Societe');
			$crud->display_as('idTypeEducation',"Domaine d'étude des candidats");
			$crud->display_as('idSecteurActivite','Secteur candidat');
			$crud->display_as('nbPoste','Nombre de poste');
			$crud->display_as('nbPosteAttribue','Poste attribué');
			$crud->display_as('datePublication','Date Publication');
			$crud->display_as('dateDepot','Date Fin');
			$crud->display_as('duree','Durée (mois)');			
			$crud->display_as('finish','Postes tous attribués');			
			$crud->display_as('idNiveauEtude','Niveau etude demandé');			
			$crud->display_as('listCompetences','Comptétences demandées');			
			$crud->unset_clone();
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_demande(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="Demande d'emplois";
			$crud = new grocery_CRUD();
			$crud->where('accord','en cours');
			$crud->order_by('dateDemande','desc');
			
			$crud->set_theme('datatables');
			$crud->set_table('demande');
			$crud->set_relation('idCandidat','candidat','{nom} {prenom}');
			$crud->set_relation('idOffre','offre','reference'); 
			$crud->set_subject('demande'); 
			 
			$crud->columns('idCandidat','idOffre','accord','dateDemande','motivationLetter');
			 
			$crud->add_action('Details', '', 'admin/voir_details_demande', 'ui-button-icon-primary ui-icon ui-icon-attrib');
			$crud->display_as('idCandidat','Candidat');
			$crud->display_as('idOffre','Reference de l\'offre');
			$crud->display_as('accord','Etat');
			$crud->display_as('motivationLetter','Lettre de motivation');
			$crud->display_as('dateDemande',"Date de la demande"); 
			$crud->unset_clone();
			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_read();
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_pays(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="CONFIG :: Pays";
			$crud = new grocery_CRUD(); 			
			$crud->set_theme('datatables');
			$crud->set_table('pays');			
			$crud->set_subject('pays'); 		 
			$crud->required_fields('nom','name','nationalite','nationality','codeTel','nomCour');
			$crud->unset_read();	 
			$crud->unset_clone();	 
			$crud->unset_print();
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_region(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="CONFIG :: Region";
			$crud = new grocery_CRUD(); 			
			$crud->set_theme('datatables');
			$crud->set_table('region');			
			$crud->set_subject('region'); 
			$crud->set_relation('idPays','pays','nom');  		 
			$crud->required_fields('nom','name','idPays');
			$crud->display_as('idPays','Pays');
			$crud->unset_read();	 
			$crud->unset_clone();	 
			$crud->unset_print();
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_ville(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="CONFIG :: Ville";
			$crud = new grocery_CRUD(); 			
			$crud->set_theme('datatables');
			$crud->set_table('ville');			
			$crud->set_subject('ville'); 
			$crud->set_relation('idRegion','region','nom');  		 
			$crud->required_fields('nom','idRegion');
			$crud->display_as('idRegion','Region');
			$crud->unset_read();	 
			$crud->unset_clone();	 
			$crud->unset_print();
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_discipline(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="CONFIG :: Discipline d'etude academique & professionelle";
			$crud = new grocery_CRUD(); 			
			$crud->set_theme('datatables');
			$crud->set_table('type_education');			
			$crud->set_subject('discipline');  		 
			$crud->required_fields('nom','name');
			$crud->unset_read();	 
			$crud->unset_clone();	 
			$crud->unset_print();
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_degree(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="CONFIG :: Diplomes et certificats";
			$crud = new grocery_CRUD(); 			
			$crud->set_theme('datatables');
			$crud->set_table('niveau_etude');			
			$crud->set_subject('diplome/certificat');  		 
			$crud->required_fields('nom');
			$crud->unset_read();	 
			$crud->unset_clone();	 
			$crud->unset_print();
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_metier(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="CONFIG :: METIER";
			$crud = new grocery_CRUD(); 			
			$crud->set_theme('datatables');
			$crud->set_table('metier');		
			$crud->set_relation('idSecteur','secteur_activite','libelle'); 	
			$crud->set_subject('metier');  		 
			$crud->required_fields('idSecteur','nom','name','code');
			$crud->display_as('code','Code Métier');
			$crud->display_as('idSecteur','Secteur Activité');
			$crud->unset_read();	 
			$crud->unset_clone();	 
			$crud->unset_print();
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_secteur(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="CONFIG :: secteur d'activite / categorie";
			$crud = new grocery_CRUD(); 			
			$crud->set_theme('datatables');
			$crud->set_table('secteur_activite');			
			$crud->set_subject('secteur activite');  		 
			$crud->required_fields('libelle','name');
			$crud->display_as('libelle','nom');
			$crud->unset_read();	 
			$crud->unset_clone();	 
			$crud->unset_print();
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_skills(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="CONFIG :: Compétences";
			$crud = new grocery_CRUD(); 			
			$crud->set_theme('datatables');
			$crud->set_table('competence');			
			$crud->set_subject('competence');  		 
			$crud->required_fields('nom','name');
			$crud->unset_read();	 
			$crud->unset_clone();	 
			$crud->unset_print();
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_typeEducation(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="CONFIG :: Ville";
			$crud = new grocery_CRUD(); 			
			$crud->set_theme('datatables');
			$crud->set_table('ville');			
			$crud->set_subject('ville'); 
			$crud->set_relation('idRegion','region','nom');  		 
			$crud->required_fields('nom','idRegion');
			$crud->unset_read();	 
			$crud->unset_clone();	 
			$crud->unset_print();
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_formations(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="Formations";
			$crud = new grocery_CRUD(); 			
			$crud->set_theme('datatables');
			$crud->set_table('formation');			
			$crud->set_relation('idCategory','catform','nom');  
			$crud->set_subject('formation'); 			
			$crud->set_field_upload('image','assets/img/formation'); 	  
			$crud->columns('image','nom','name','Description','description_eng','Contenu','dateDebut','dateFin','dateCreation','price');  
			$crud->required_fields('image','nom','name','Description','description_eng','Contenu','dateDebut','dateFin','price');  
			 
			$crud->callback_before_insert(function($post_array){				 
				$post_array['idAdmin'] = $_SESSION['idAdmin'];
				$post_array['dateCreation'] = date("Y-m-d H:i:s");
				return $post_array;
			});
			$crud->unset_print();
			$crud->unset_edit_fields('idAdmin');
			$crud->change_field_type('idAdmin','invisible');	  
			$crud->change_field_type('dateCreation','invisible');	  
			
			$crud->display_as('Description','Descripition courte (FR)');
			$crud->display_as('idCategory','Categorie');
			$crud->display_as('description_eng','Descripition courte (ENG)');	
			$crud->display_as('Contenu','Contenu detaille de la formation');
			$crud->display_as('dateDebut','Date debut');
			$crud->display_as('dateFin','Date fin');
			$crud->display_as('price','Prix (FCFA)');
	
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_catF(){   
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="CONFIG :: CATEGORIES FORMATIONS";
			$crud = new grocery_CRUD(); 			
			$crud->set_theme('datatables');
			$crud->set_table('catform');			
			$crud->set_subject('Categorie'); 	
			$crud->required_fields('nom','name'); 	
			$crud->unset_read();	 
			$crud->unset_clone();	  
			$crud->unset_print(); 	     	
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_articles(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="Articles";
			$crud = new grocery_CRUD(); 			
			$crud->set_theme('datatables');
			$crud->set_table('article');			 
			$crud->set_subject('Article'); 			
			$crud->set_field_upload('Fichier','assets/articles'); 	  
			$crud->columns('Titre','resume','Auteur','DateCreation','Fichier');  
			$crud->required_fields('Titre','resume','Auteur','DateCreation','Fichier');   
			 
			 
			$crud->unset_print();    	  
			 	
			$crud->display_as('resume','Resume de l\'article');
			$crud->display_as('DateCreation','Date creation'); 
	
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_poles(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="CONFIG :: Pôles";
			$crud = new grocery_CRUD(); 			
			$crud->set_theme('datatables');
			$crud->set_table('pole');			
			$crud->set_subject('pole'); 			 
			$crud->required_fields('titreFR','titreENG','descriptionFR','descriptionENG');
			$crud->display_as('idPays','Pays'); 
			$crud->unset_clone();	 
			$crud->unset_print();
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function list_services(){  
		if($_SESSION['Admin_online']){  
			$_SESSION['page']="CONFIG :: Services";
			$crud = new grocery_CRUD(); 			
			$crud->set_theme('datatables');
			$crud->set_table('service');			
			$crud->set_subject('service'); 
			$crud->set_relation('idPole','pole','titreFR');  		 
			$crud->required_fields('titreFR','titreENG','descriptionFR','descriptionENG');
			$crud->display_as('idPole','Pôle'); 
			$crud->unset_clone();	 
			$crud->unset_print();
			$output = $crud->render();
			$this->_example_output($output);			 	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	public function _example_output($output = null){
		$this->load->view('admin/crud',(array)$output);
	}	
	/*----------CALLBACK ---------------------*/	 
	function voir_candidat_profil($idOffre) {		  
		if($_SESSION['Admin_online']){  
			$data=array(
				'css_files'=>array(),
				'js_files'=>array(),
				'offre'=>$this->Offre->getValidateFromID($idOffre),  
				'list_pays' => $this->Country->getAll(), 
				'list_competence'=>$this->Skills->getAll(),
				'list_offres_skills'=>$this->Offre->getListSkills(),
				'list_profession'=>  $this->Metier->getAllForJob(),	
				'list_company'=>  $this->Compagny->getAllForJob(),	
				'list_countryJobs'=> $this->Country->getAllForJob(),	
				'freelance_number'=>$this->Offre->getAllfreelance_number(),		
				'list_secteur'=>  $this->Activity->getAllForJob(),		
				'list_degree'=>  $this->Degree->getAll(),	  
				'listCat'=>$this->Metier->getList(0,15),	
				'listCandidat'=>$this->Candidat->getAllForCandidat($idOffre),	
			);
			$this->load->view('admin/list_candidat_profil',$data);	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}	  	 
	} 
	function voir_details_demande($idDemande) {	
		if($_SESSION['Admin_online']){  
			$demande = $this->Demande->getFromID($idDemande);
			$idOffre = $demande->idOffre;
			$candidat = $this->Candidat->getFromID($demande->idCandidat); 	
			$my_skills = $this->Skills->getForCandidate($demande->idCandidat);	
			$languages_list=$this->Candidat->getLanguage($demande->idCandidat);	
			$xp_list=$this->Candidat->getXpList($demande->idCandidat);
			$list_degree=$this->Degree->getAll();
			$education_list=$this->Candidat->getEducationList($demande->idCandidat);		 
			if(!empty($candidat->dateNaissance)){
				$birthDate = explode("-", $candidat->dateNaissance);
				$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
			}else $age=" - ";		
			
			$data=array(
				'css_files'=>array(),
				'js_files'=>array(),
				'candidat'=>$candidat,
				'demande'=>$demande,
				'my_skills'=>$my_skills,
				'languages_list'=>$languages_list,
				'xp_list'=>$xp_list,
				'list_degree'=>$list_degree,
				'education_list'=>$education_list,
				'age'=>$age,
				'offre'=>$this->Offre->getValidateFromID($idOffre),  
				'list_pays' => $this->Country->getAll(), 
				'list_competence'=>$this->Skills->getAll(),
				'list_offres_skills'=>$this->Offre->getListSkills(),
				'list_profession'=>  $this->Metier->getAllForJob(),	
				'list_company'=>  $this->Compagny->getAllForJob(),	
				'list_countryJobs'=> $this->Country->getAllForJob(),	
				'freelance_number'=>$this->Offre->getAllfreelance_number(),		
				'list_secteur'=>  $this->Activity->getAllForJob(),		
				'list_degree'=>  $this->Degree->getAll(),	  
				'listCat'=>$this->Metier->getList(0,15),	
				'listCandidat'=>$this->Candidat->getAllForCandidat($idOffre),	
			);
			$this->load->view('admin/list_demande',$data);	
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	} 
	function accepter_demande($idDemande,$nbPoste,$nbPosteAttribue,$idOffre) {	
		if($_SESSION['Admin_online']){  
			if($nbPoste<=$nbPosteAttribue){
				$this->Demande->rejeter(array('idDemande'=>$idDemande,'motif'=>"Tous les postes sont déjà attribué"));
			}else{
				$nbPosteAttribue+=1;
				if($nbPoste==$nbPosteAttribue) $this->Demande->mark_finish($idOffre);
				$this->Demande->accepter(array('idDemande'=>$idDemande,'idOffre'=>$idOffre,'nbPosteAttribue'=>$nbPosteAttribue)); 
			}
			//$this->Demande->rejeter(array($idDemande));
			$this->list_demande();
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
	function rejeter_demande($idDemande) {	
		if($_SESSION['Admin_online']){  
			$this->Demande->rejeter(array('idDemande'=>$idDemande,'motif'=>"Rejété par l'administrateur"));
			$this->list_demande();
		}else{ 
			$this->load->view('admin/login',array('js_files' => array() ,'css_files' => array()));
		}
	}
}
