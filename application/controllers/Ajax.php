<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->load->database();  
		$this->load->model('Country'); 
		$this->load->model('Candidat'); 	
		$this->load->model('Skills'); 	
		$this->load->model('Degree'); 	
		$this->load->model('Metier');  
		$this->load->model('State'); 
		$this->load->model('City'); 
		
		session_start();
		if(empty($_SESSION['connected'])) $_SESSION['connected'] = "no";
		if(empty($_SESSION['site_lang'])) $_SESSION['site_lang'] = "french";
		$this->lang->load('information',$_SESSION['site_lang']);
    }
	
	public function index(){ 
	}
	public function list_pays($id_pays){
		$countries = $this->Country->getAll();
	}
	public function list_region($idPays){  
		$regions = $this->Country->getRegions($idPays);	
		echo '<option value="" selected disabled >Select State</option>';			
		foreach ($regions->result_array() as $row){
			if($_SESSION['site_lang']=="french") echo '<option value="'.$row['idRegion'].'">'.$row['nom'].'</option>';
			else echo '<option value="'.$row['idRegion'].'">'.$row['name'].'</option>';		 	
		}
	}
	public function list_ville($idRegion){    
		$villes = $this->City->getCityFromRegion($idRegion);	
		echo '<option value="" selected disabled>Select City</option>';			
		foreach ($villes as $row){
			echo '<option value="'.$row['idVille'].'">'.$row['nom'].'</option>';			
		}
	}
	public function list_villeP(){     	
		echo '<option value="" selected disabled>Select City</option>';		
	}
	public function candidat_details($idCandidat){     	
		$candidat = $this->Candidat->getFromID($idCandidat); 	
		$my_skills = $this->Skills->getForCandidate($idCandidat);	
		$languages_list=$this->Candidat->getLanguage($idCandidat);	
		$xp_list=$this->Candidat->getXpList($idCandidat);
		$list_degree=$this->Degree->getAll();
		$education_list=$this->Candidat->getEducationList($idCandidat);		 
		if(!empty($candidat->dateNaissance)){
			$birthDate = explode("-", $candidat->dateNaissance);
			$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
		}else $age=" - ";											
		echo '<div class="row">
					<div class="col-lg-12 col-sm-12 mb-4"> 
						<div class="card shadow">
							<div class="card-header bg-gray-300 py-2">
								<h6 class="m-0 font-weight-bold text-gray-900">IDENTIDICATION</h6>
							</div>
							<div class="card-body">
								<div class="row">								
									<div class="col-md-2 col-sm-4">
										<img class="candidat_details_img" style="background:#444;border-radius:4px" src="'.img_url("profil/".$candidat->photo).'">
									</div>
									<div class="col-md-9 col-sm-10"> 
										<p>Nom &nbsp;&nbsp;&nbsp;: &nbsp;<strong style="color:#222;">'.strtoupper($candidat->nom).' '.$candidat->prenom.'</strong></p>
										<p>AGE &nbsp;&nbsp;&nbsp;: &nbsp;<strong style="color:#222;">'.$age.' an</strong></p>
										<p>SEXE &nbsp;&nbsp;: &nbsp;<strong style="color:#222;">'.$candidat->sexe.'</strong></p>  
										<p>EMAIL : &nbsp;<strong style="color:#222;">'.$candidat->email.'</strong></p>
										<p>TEL  &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;<strong style="color:#222;">'.$candidat->telephone.'</strong></p> 											
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-12 col-sm-12 mb-4"> 
						<div class="card x1">
							<div class="card-header bg-gray-900 py-2">
								<h6 style="color:#fafafa" class="m-0 font-weight-bold">COMPETENCES</h6>
							</div>
							<div class="card-body"><p>';
								foreach ($my_skills as $row){ 
									echo '<span style="color:#222;">'.$row["nom"].', </span>&nbsp;';
								}	
								echo'</p><table class="table table-striped table-condensed table-bordered">
										<thead>
											<tr>
												<th style="color:#111;">Langue</th>
												<th style="color:#111;">Parle?</th>
												<th style="color:#111;">Ecris?</th>
											</tr>
									</thead>';
								foreach ($languages_list as $row){ 
									echo '<tr> 
											<td style="color:#222;">'.$row["langue"].'</td> 
											<td style="color:#222;">'.$row["parle"].'</td> 
											<td style="color:#222;">'.$row["ecris"].'</td>  
									</tr>';	
								}					
							echo'</table></div>	
						</div>					
					</div>
					<div class="col-lg-6 col-sm-12 mb-4"> 
						<div class="card x1">
							<div class="card-header  bg-gray-900 py-2">
								<h6 style="color:#fafafa" class="m-0 font-weight-bold">EXPERIENCE</h6>
							</div>
							<div class="card-body">
								<ul>';
								foreach ($xp_list as $row){							
									$nm = $row['nbAnnee']%12;
									$na = intdiv($row['nbAnnee'],12); 
									$nomMetier = $row['nom'];
									if(empty($nomMetier)) $nomMetier="/";
									
										echo'<li>Poste: <strong><span class="sub-info" style="color:#6f9a37;font-weight:bold;">'.strtoupper($row['poste']).'</span></strong>
											<ul>
												<li>Metier :  <span style="color:#d54c2a;font-weight:bold">'.$nomMetier.'</span></li>
												<li>Société :  <span style="color:#8373b4;font-weight:bold">'.$row['company'].'</span></li>
												<li>Durée :  <span style="color:#333;font-weight:bold">'.$na.' an, '.$nm.' mois</span></li>
												<li><u>Description</u> <span style="color:#333;">'.$row['description'].'</span></li>
											</ul>
										</li>';
									}
								echo'</ul> 
							</div>	
						</div>					
					</div>
					<div class="col-lg-6 col-sm-12 mb-4"> 
						<div class="card x1">
							<div class="card-header  bg-gray-900 py-2">
								<h6 style="color:#fafafa" class="m-0 font-weight-bold">EDUCATION</h6>
							</div>
							<div class="card-body">
								<ul>';
							foreach ($education_list as $row){ 
								$degree = $row["degree"];
								$degreeLevel = $row["degreeLevel"];
								$degreeType = $row["degreeTypefr"];
								$mention = $row["mention"];
								$institution = $row["institution"];
								$date = $row["date"];  							
								echo'<li>Titre: <strong><span class="sub-info" style="color:#6f9a37;font-weight:bold;">'.$degree.'</span></strong>
										<ul>
											<li>Degree : <span style="color:#d54c2a;font-weight:bold">'.$degreeLevel.'</span></li>
											<li>Type : <span style="color:#8373b4;font-weight:bold">'.$degreeType.'</span></li>
											<li>Mention : <span style="color:#c0754f;font-weight:bold">'.$mention.'</span></li>
											<li>Date : <span style="color:#333;">'.$date.'</span></li>
											<li>Lieu : <span style="color:#333">'.$institution.'</span></li>
										</ul>
									</li>';
							}
							echo '</ul> 
							</div>	
						</div>					
					</div>
				</div>';		
	}
}
