<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<?php require_once("head.php"); ?>
	<body id="page-top">
		<style>
			#wrapper #content-wrapper {
				background-color: #e1e3e6;
				background:url(<?php echo img_url("overlay3.png")?>), url(<?php echo img_url("ab16.jpg")?>);
				background-size:cover;
				background-repeat:no-repeat;	
			}		 
			.companyinfo .companylogo img{
				float: left;
				width: 100px;	
				height: auto;
				background: #fff;
				margin-left: 0px;
				border: 1px solid #eee; 
			}
			.job-header .jobinfo h2 {
				text-transform:uppercase;
				letter-spacing:1px;
				font-size: 24px;
				color: #444;
			}
			.job-header .jobinfo  .title {
				margin-top: 10px;
				font-size: 18px;
				font-weight: 600;
				color: #86b832;
			} 
			.job-header .jobinfo .ptext {
				color: #999;
				margin: 10px 0;
			}
			.job-header .jobinfo {
				padding: 5px 0px; 
			}
			.job-header{
				padding:5px;
			}
			.box-jobDetails, .jobdetail {
				background: #fff; 
				text-align:justify;
				color:#1e3642;
				font-family:"Open Sans", Roboto;
				font-size:0.87em!important; 
				height:auto; 
				line-height:1.5em;
				text-align:justify;
			}
			.jobdetail h3 {
				font-size: 16px;
				color: #2e0f3f;
				font-weight: 700;
				font-family:"Open Sans", Roboto;
				text-transform:uppercase;
			} 
			.jbdetail li {
				margin-bottom: 20px;
				color: #908f8f;
				list-style:none;
			}
			.jbdetail li a {
				color:#86b832;
				font-weight:bold;
				font-family:Poppins-Medium, Lato, Roboto;
				text-align:right;
			}
			.jbdetail li span {
				display: block;
				text-align: right;
				color: #000;
				font-weight: 600;
			}
			.relatedJobs {
				margin-bottom: 30px;
			}
			.relatedJobs h2, .job-header .contentbox h2 {
				font-size: 1.2em;
				font-weight: 700;
				color: #2e0f3f;
				margin-bottom: 10px;
				font-family:Nunito, Bariol-Bold, Poppins-Medium, Lato, Roboto;
				text-transform:uppercase;
			} 
			
			/* MODAL IMAGE*/
			.profil {
			  border-radius: 5px;
			  cursor: pointer;
			  transition: 0.3s;
			}
			.profil:hover {opacity: 0.7;}

			/* The Modal (background) */
			.modal,.modal_details {
			  display: none; /* Hidden by default */
			  position: fixed; /* Stay in place */
			  z-index: 1; /* Sit on top */
			  padding-top: 100px; /* Location of the box */
			  left: 0;
			  top: 0;
			  width: 100%; /* Full width */
			  height: 100%; /* Full height */
			  overflow: auto; /* Enable scroll if needed */
			  background-color: rgb(0,0,0); /* Fallback color */
			  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
			} 
			.modal_details{padding-top:25px;}
			/* Modal Content (image) */
			.modal-content, #candidat_details {
			  margin: auto;
			  display: block;
			  width: 80%;
			  max-width: 600px;
			  border:5px solid #fafafa;
			}
			#candidat_details {			  
			  max-width: 1200px;  
			  background:#fff;	
			  border-radius:4px;
			  padding:10px;
			}
			/* Caption of Modal Image */
			#caption {
			  margin: auto;
			  display: block;
			  width: 80%;
			  max-width: 600px;
			  text-align: center;
			  color: #ccc;
			  padding: 10px 0;
			  height: 150px;
			}
			/* Add Animation */
			.modal-content, #caption, #candidat_details {  
			  -webkit-animation-name: zoom;
			  -webkit-animation-duration: 0.6s;
			  animation-name: zoom;
			  animation-duration: 0.6s;
			}
			@-webkit-keyframes zoom {
			  from {-webkit-transform:scale(0)} 
			  to {-webkit-transform:scale(1)}
			}
			@keyframes zoom {
			  from {transform:scale(0)} 
			  to {transform:scale(1)}
			}
			/* The Close Button */
			.close_profil {
			  position: absolute;
			  top: 15px;
			  right: 35px;
			  color: #f1f1f1;
			  font-size: 50px;
			  font-weight: bold;
			  transition: 0.3s;
			}
			.close_profil:hover,
			.close_profil:focus {
			  color: #bbb;
			  text-decoration: none;
			  cursor: pointer;
			}
			/* 100% Image Width on Smaller Screens */
			@media only screen and (max-width: 700px){
			  .modal-content {
				width: 100%;
			  }
			}
			.candidat_details_img{
				float: left;
				width: 100%;	
				height: auto;
				background: #fff;
				margin-left: 0px;
				border: 1px solid #eee; 
			}
			.table td, .table th {
				padding: .2rem; 
			}
		</style>
		<!-- Page Wrapper -->
		<div id="wrapper">
			<?php require_once("left-navbar.php"); ?>	
			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">
			  <!-- Main Content -->
			  <div id="content">
				<?php require_once("top-navbar.php"); ?>
				<!-- Begin Page Content -->
				<div class="container-fluid">
				  <!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-title">LISTE DES CANDIDATS AYANT UN PROFIL PROCHE POUR L'OFFRE</h1>
						<!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
					</div>

					<!-- Content Row -->
					<div class="row">
						<div class="col-lg-4 col-sm-12 mb-4"> 
							<div class="card shadow mb-4 x1">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">OFFRE D'EMPLOIS</h6>
								</div>
								<div class="card-body">
									<div class="row">								
										<div class="col-md-3 col-sm-4">
											<div class="companyinfo">
												<div class="companylogo"><a href=""><img src="<?php echo img_url("logo/".$offre->logo);?>" alt="<?php echo $offre->societe;?>" title="<?php echo $offre->societe;?>"></a></div>		
											</div>
										</div>
										<div class="col-md-9 col-sm-10">
											<h2 style="font-size:24px;color:#7b6baf;"><?php echo $offre->poste;?></h2>
											<div  style="color:#82b440;" class="title"><?php echo $offre->societe?></div>  
											
										</div>
									</div>
								</div>
							</div>
							<div class="card shadow mb-4 x1">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">DETAILS DE L'OFFRE D'EMPLOI</h6>
								</div>
								<div class="card-body">
									<div class="job-header">
										<div class="jobdetail">												
										<?php
										$pays=$offre->nom_pays; 
										$region=$offre->nom_region;
										$metier=$offre->nom_metier;
										$secteur=$offre->nom_secteur;			
										$etude = $offre->etudefr;										
										$experience = $offre->experience.' An';
										if($offre->experience==0) $experience = '/';
										?>
											<ul class="jbdetail" style="position:relative;left:-30px;">
												<li class="row">
													<div class="col-md-4 col-xs-5">Métier</div>
													<div class="col-md-8 col-xs-7"><span style="color:#7969ae;"><?php echo $metier; ?></span></div>
												</li>  
												<li class="row">
													<div class="col-md-4 col-xs-5">Secteur activité </div>
													<div class="col-md-8 col-xs-7"><span><?php echo $secteur; ?></span></div>
												</li>
												<li class="row">										
													<div class="col-md-4 col-xs-5">Localisation</div>
													<div class="col-md-8 col-xs-7">
														<span><?php	echo $offre->nom_ville.','.$region.'-'.strtoupper($pays);?></span>
													</div>
												</li>
												<li class="row">
													<div class="col-md-4 col-xs-5">Société</div>
													<div class="col-md-8 col-xs-7"><span style="text-align:right;color:#82b440;" ><?php echo $offre->societe; ?></span></div>
												</li>
												<li class="row">
													<div class="col-md-4 col-xs-5">Type de contrat</div>
													<div class="col-md-8 col-xs-7"><span><?php echo $offre->contrat; ?></span></div>
												</li>
												<li class="row">
													<div class="col-md-4 col-xs-5">Durée du contrat</div>
													<div class="col-md-8 col-xs-7"><span><?php echo $offre->duree.' Mois' ?></span></div>
												</li>
												<li class="row">
													<div class="col-md-4 col-xs-5">Poste Total</div>
													<div class="col-md-8 col-xs-7"><span><?php echo $offre->nbPoste; ?></span></div>
												</li>
												<li class="row">
													<div class="col-md-4 col-xs-5">Poste Attribué</div>
													<div class="col-md-8 col-xs-7"><span><?php echo $offre->nbPosteAttribue; ?></span></div>
												</li>
												<li class="row">
													<div class="col-md-4 col-xs-5">Poste Disponible</div>
													<div class="col-md-8 col-xs-7"><span><?php echo ($offre->nbPoste - $offre->nbPosteAttribue); ?></span></div>
												</li>
												<li class="row">
													<div class="col-md-4 col-xs-5">Diplôme/Certificat</div>
													<div class="col-md-8 col-xs-7"><span style="color:#e71b47;"><?php echo $offre->niveau_etude ;?></span></div>
												</li>
												<li class="row">
													<div class="col-md-4 col-xs-5">Etude faites en </div>
													<div class="col-md-8 col-xs-7"><span style="color:#e58451;font-weight:bold;"><?php echo $etude; ?></span></div>
												</li>
												<li class="row">
													<div class="col-md-4 col-xs-5">Expérience</div>
													<div class="col-md-8 col-xs-7"><span><?php echo $experience; ?></span></div>
												</li>
												<li class="row">
													<div class="col-md-4 col-xs-5">Freelance</div>
													<div class="col-md-8 col-xs-7"><span><?php if($offre->Freelance==1) echo '<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
														else echo'<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';?></span>
													</div>
												</li>
												<li class="row">
													<div class="col-md-4 col-xs-5">Compétences requises</div>
													<div class="col-md-8 col-xs-7">
														<span style="color:#007acc;">
														<?php 
														foreach ($list_competence as $skills){
															if(in_array($skills['idCompetence'],explode(',',$offre->listCompetences))){ 
																echo ' '.$skills['nom'].'<br> ';
															}														
														}
														?>
														</span>
													</div>
												</li>
												<li class="row">
													<div class="col-md-4 col-xs-5">Publié le </div>
													<div class="col-md-8 col-xs-7"><span>
														<?php 	
															$date = explode("-", $offre->datePublication);	
															echo date("M d, Y",mktime(0,0,0,$date[1], $date[2], $date[0]));
														?>
													</div>
												</li>
												<li class="row">
													<div class="col-md-4 col-xs-5">Valide jusqu'au</div>
													<div class="col-md-8 col-xs-7">
														<span>
														<?php 	
															$date = explode("-", $offre->dateDepot);	
															echo date("M d, Y",mktime(0,0,0,$date[1], $date[2], $date[0]));
														?>
														</span>
													</div>
												</li>
											</ul>
										</div>
									</div>
								</div>					
							</div>
							<div class="card shadow mb-4 x1">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">DESCRIPTION OFFRE</h6>
								</div>
								<div class="card-body">
									<div class="job-header">
										<div class="contentbox"> 
											<div class="box-jobDetails"><?php echo $offre->descriptionOffre; ?></div>
										</div>
									</div>
								</div>
							</div>
							<div class="card shadow mb-4 x1">
								<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">PROFIL CANDIDAT</h6>
								</div>
								<div class="card-body">
									<div class="job-header">
										<div class="contentbox"> 
											<div class="box-jobDetails"><?php echo $offre->descriptionProfil; ?></div>
										</div>
									</div>
								</div>
							</div> 
						</div>	
						<div class="col-lg-8 col-sm-12 mb-4">
							<div class="card-header py-3">
								<h6 class="m-0 font-weight-bold text-primary">LISTE DES CANDIDATS INSCRITS COMPATIBLE A LA DEMANDE &nbsp;&nbsp;&nbsp;&nbsp;<span class="badge" style="background:red;color:white;"><?php echo count($listCandidat)?></span></h6>
							</div>						
							<div class="table-responsive">
								<table class="table table-bordered dataTable" id="dataTable" style="width: 100%;background:#fff" width="100%" cellspacing="0">
									<thead class="bg-gray-100 text-gray-800 text-xs">
										<tr> 
											<th>PHOTO</th>
											<th>NOM</th>
											<th>SEXE</th>
											<th>AGE</th> 
											<th>TELEPHONE</th>
											<th>EMAIL</th>  
											<th>ACTION</th>
										</tr>
									</thead>
									<tbody>
									<?php							
									if(count($listCandidat))
										foreach($listCandidat as $candidat){ 									
										if(!empty($candidat["dateNaissance"])){
											$birthDate = explode("-", $candidat["dateNaissance"]);
											$age = (date("md", date("U", mktime(0, 0, 0, $birthDate[2], $birthDate[1], $birthDate[0]))) > date("md") ? ((date("Y") - $birthDate[0]) - 1) : (date("Y") - $birthDate[0]));
										}else $age=" - ";
											echo '<tr>
													<td><center><img style="width:48px;height:50px;border-radius:5%;" class="profil" src="'.img_url("profil/".$candidat['photo']).'" alt="'.strtoupper($candidat['nom']).' '.$candidat['prenom'].'"></center></td>
													<td><span style="top:10px;position:relative">'.strtoupper($candidat['nom']).' '.$candidat['prenom'].'</span></td>
													<td><span style="top:10px;position:relative"><center>'.$candidat['sexe'].'</center></span></td> 
													<td><span style="top:10px;position:relative;">'.$age.' an</span></td>
													<td><span style="top:10px;position:relative">'.$candidat['telephone'].'</span></td>
													<td><span style="top:10px;position:relative">'.$candidat['email'].'</span></td> 
													<td class="bg-gray-200">';
													if(!empty($candidat['CV'])) echo'
														<a href="'.resume_url("".$candidat['CV']).'" target="_blank" class="btn btn-light btn-icon-split">
															<span class="icon text-gray-600">
																<i class="fas fa-arrow-right"></i>
															</span>
															<span class="text">&nbsp; CV &nbsp;</span>
														</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
													else echo '<span class="btn btn-danger btn-icon-split">																	
																<span class="text">Aucun CV</span>
															</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
														echo '<span value="'.$candidat['idCandidat'].'" style="cursor:pointer" class="btn btn-secondary btn-icon-split details">
															<span class="icon text-gray-600">
																<i class="fas fa-arrow-right"></i>
															</span>
															<span class="text">Détails</span>
														</span>
													</td>
												</tr>';
										} 
									else echo'<p><center style="color:#bbb">Aucun Candidat</center></p>'
									?>																						 
									</tbody>
								</table>
							</div>
						</div>  
					</div>
				</div>
			</div>			
			<?php include("footer.php"); ?>
		</div>
	</div>
		<div id="myModal" class="modal">
			<!-- The Close Button -->
			<span class="close_profil">&times;</span>
			<!-- Modal Content (The Image) -->
			<img class="modal-content" id="img01">
			<!-- Modal Caption (Image Text) -->
			<div id="caption"></div>
		</div> 
		<div id="myModal_details" class="modal_details">
			<!-- The Close Button -->
			<span class="close_profil">&times;</span>
			<!-- Modal Content (The Image) -->
			<div id="candidat_details">
				
			</div>  
		</div>
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>
		<?php include("script.php"); ?>
		<script src="<?php echo js_url('jquery-1.11.2.min') ;?>" ></script>		
		<script>
			$(document).ready(function(){  
				$(".profil").click(function(){					 
					$("#myModal").css("display","block"); 
					$("#img01").attr("src",$(this).attr("src"));  
					$("#caption").text($(this).attr("alt"));  
				});
				$(".close_profil").click(function(){					 
					$("#myModal").css("display","none");   
					$("#myModal_details").css("display","none"); 
				});
				$(".details").click(function(){					 
					$("#myModal_details").css("display","block");  
					$("#candidat_details").load("<?php echo site_url("Ajax/candidat_details/")?>"+$(this).attr("value"));
				}); 
			});
		</script>
	</body>
</html>
