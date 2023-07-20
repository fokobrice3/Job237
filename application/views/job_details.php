<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html >
	<?php include('static/head.php'); ?>
	<body>
		<?php
			require_once('static/header.php');     
			require_once('static/breadcumb.php');  
		?>	
		<div class="container">
			<section id="Dashboard" style="border:none;background:#f2f2f2;margin:15px 0px;padding:10px 30px 80px 30px;"> 
				<div class="row"> 
					<!-- Entete Job -->
					<div class="job-header box-jobDetails">
						<div class="jobinfo">
							<div class="row">								
								<div class="col-md-2 col-sm-2">
									<div class="companyinfo">
										<div class="companylogo"><a href="<?php echo site_url("Welcome/company/".$offre->idSociete); ?>"><img src="<?php echo img_url("logo/".$offre->logo);?>" alt="<?php echo $offre->societe;?>" title="<?php echo $offre->societe;?>"></a></div>		
									</div>
								</div>
								<div class="col-md-10 col-sm-10">
									<h2><?php echo $offre->poste;?></h2>
									<div class="title"><a href="<?php echo site_url("Welcome/company/".$offre->idSociete); ?>"><?php echo $offre->societe?></a></div>  
									<div class="ptext">
									<?php
										$date = explode("-", $offre->datePublication);											
										echo $this->lang->line("PublicationDate").': '; 
										echo "<b style='color:#4d4e53'>".date("M d, Y",mktime(0,0,0,$date[1], $date[2], $date[0]))."</b>";
									?>
									</div> 
									<div class="ptext">
									<?php
										$date = explode("-", $offre->dateDepot);											
										echo $this->lang->line("ValidUntil").': '; 
										echo "<b style='color:#4d4e53'>".date("M d, Y",mktime(0,0,0,$date[1], $date[2], $date[0]))."</b>";
									?>
									</div> 
									<div class="ptext">
									<?php
										 if($offre->motivation) echo "<em style='color:#dd5968;'>Lettre de motivation requise pour cet emplois</em>";
									?>
									</div> 
								</div>
							</div>
						</div>
						<div class="jobButtons">
							<?php
								if($_SESSION['connected']=="yes"){
									if($_SESSION['compte']=="candidate"){
										if($CVOk){
											if(!empty($idDemande)){
												if($EtatDemande=="en cours"){
													echo'<span class="alert alert-default accord"><i class="fa fa-spin fa-spinner" aria-hidden="true"></i> '.$this->lang->line("InProgress").'</span>';	
													if($offre->motivation) echo '<a target="_blank" href="'.lettre_motivation($lettremotivation).'" class="btn btn-outline btn-default default-outline"><i class="fa fa-file" aria-hidden="true"></i> '.$this->lang->line("MotivationLetter").'</a> ';
													echo '<a href="'.site_url("Offer/deleteDemande/".$idDemande.'/'.$offre->idOffre).'" class="btn btn-outline btn-danger danger-outline"><i class="fa fa-times-circle" aria-hidden="true"></i> '.$this->lang->line("Cancel").'</a> ';
													echo '<a href="'.site_url("Home/seekJobs/myJobs").'" style="float:right;" class="btn btn-outline btn-primary info-outline"><i class="fa fa-angle-double-left" aria-hidden="true"></i> '.$this->lang->line("Previous").'</a> ';			
												}else if($EtatDemande=="rejetée"){ 
													echo'<span style="background:#d24848;color:#fff;" class="alert alert-default accord"><i class="fa fa-times" aria-hidden="true"></i> '.$this->lang->line("Rejected").'</span>';
													echo '<a href="'.site_url("Home/seekJobs/myJobs").'" style="float:right;position:relative;top:-20px;" class="btn btn-outline btn-primary info-outline"><i class="fa fa-angle-double-left" aria-hidden="true"></i> '.$this->lang->line("Previous").'</a> ';		
												}else if($EtatDemande=="accordée"){
													echo'<span style="background:#86b833;color:#fff;" class="alert alert-default accord"><i class="fa fa-check" aria-hidden="true"></i> '.$this->lang->line("Granted").'</span>';
													echo '<a href="'.site_url("Home/seekJobs/myJobs").'" style="float:right;position:relative;top:-20px;" class="btn btn-outline btn-primary info-outline"><i class="fa fa-angle-double-left" aria-hidden="true"></i> '.$this->lang->line("Previous").'</a> ';		
												} 												
											}else{
												if($offre->motivation) echo '<button type="button" class="btn btn-outline btn-success success-outline apply" data-toggle="modal" data-target="#myModal">'.$this->lang->line("Apply").'</button>'; 
												else echo '<a href="'.site_url("Offer/Send/".$offre->idOffre).'" class="btn btn-outline btn-success success-outline apply"><i class="fa fa-paper-plane" aria-hidden="true"></i> '.$this->lang->line("Apply").'</a> '; 
												echo '<a href="'.site_url("Home/seekJobs/all").'" style="float:right;position:relative;top:10px;" class="btn btn-outline btn-primary info-outline"><i class="fa fa-angle-double-left" aria-hidden="true"></i> '.$this->lang->line("Previous").'</a> ';	
											}	
										}else echo'<span class="alert alert-danger report"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i>'.$this->lang->line("YourResumeIsIncomplete").'</span>';				
									}else{
										echo '<a href="'.site_url("Home/jobs").'" class="btn btn-outline btn-primary info-outline small"><i class="fa fa-angle-double-left" aria-hidden="true"></i> '.$this->lang->line("Previous").'</a> ';										
									}
								}else{
									echo'<span class="alert alert-warning report"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> '.$this->lang->line("YouAreNotRegistered").'</span>';
									echo '<a href="'.site_url("Home/seekJobs/all").'" style="float:right" class="btn btn-outline btn-primary info-outline small"><i class="fa fa-angle-double-left" aria-hidden="true"></i> '.$this->lang->line("ListJobs").'</a> ';											
								}
							?>
							
						</div>
					</div>
					<!-- Formulaire Lettre de motivation -->
					 	<!-- Modal -->
						<div class="modal fade" id="myModal" role="dialog">
							<div class="modal-dialog modal-sm">							
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header" style="font-family:Lato;background-color: #5cb85c;color:white !important;text-align: center;font-size: 20px;padding:35px 50px;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4><span class="glyphicon glyphicon-lock"></span> POSTULER A CE JOB</h4>
								</div> 
								<div class="modal-body">
									<form action="<?php echo site_url('Offer/Send_lettreMotivation/'.$offre->idOffre)?>" method="POST" enctype="multipart/form-data">
										<div class="col-md-12 col-sm-12"><br>
											<p id="ml-name"></p>
											<span class="label label-info">Uniquement les images et Pdf</span>
											<input type="file" name="file" id="file" class="inputfile" />
											<label class="btn-outline info-outline small btn-primary btn-block" for="file"><i class="fa fa-file"></i>&nbsp;&nbsp;<strong><span id="value">Joindre la lettre de motivation</span></strong></label>	
										</div> 
										<div class="col-md-12 col-sm-12">
											<br> 
											<input type="submit" name="submit-file" value="<?php echo $this->lang->line('Send') ?>"  class="btn-outline success-outline btn-block btn btn-success" />
										</div>
									</form><br><br><br><br><br><br><br><br>
								</div>
								<div class="modal-footer">
									<center><button type="button" class="btn btn-danger btn-default" data-dismiss="modal">Annuler</button></center>
								</div>
							</div>							
							</div>
						</div>
					<!-- Details Job -->
					<div class="row">
						<div class="col-md-4"> 
							<!-- Job Detail start -->
							<div class="job-header">
								<div class="jobdetail">
									<h3><?php echo $this->lang->line("JobDetail"); ?></h3><hr>
									<?php
									if($langue=="french") { 
										$pays=$offre->nom_pays; 
										$region=$offre->nom_region;
										$metier=$offre->nom_metier;
										$secteur=$offre->nom_secteur;
										$etude = $offre->etudefr;
									}else{ 
										$pays=$offre->name_pays;
										$region=$offre->name_region;
										$metier=$offre->name_metier;
										$secteur=$offre->name_secteur;
										$etude = $offre->etudeeng;
									}
									$experience = $offre->experience.' '.$this->lang->line("Years");
									if($offre->experience==0) $experience = '/';
									?>
									<ul class="jbdetail">
										<li class="row">
											<div class="col-md-4 col-xs-5"><?php echo $this->lang->line("Job") ?></div>
											<div class="col-md-8 col-xs-7"><span style="color:#7969ae;"><?php echo $metier; ?></span></div>
										</li>
										<li class="row">
											<div class="col-md-4 col-xs-5"><?php echo $this->lang->line("Sector") ?></div>
											<div class="col-md-8 col-xs-7"><span><?php echo $secteur; ?></span></div>
										</li>
										<li class="row">										
											<div class="col-md-4 col-xs-5"><?php echo $this->lang->line("Location") ?></div>
											<div class="col-md-8 col-xs-7">
												<span><?php	echo $offre->nom_ville.','.$region.'-'.strtoupper($pays);?></span>
											</div>
										</li>
										<li class="row">
											<div class="col-md-4 col-xs-5"><?php echo $this->lang->line("Company") ?></div>
											<div class="col-md-8 col-xs-7"><span><a style="text-align:right" href="<?php echo site_url("Welcome/company/".$offre->idSociete); ?>"><?php echo $offre->societe; ?></a></span></div>
										</li>
										<li class="row">
											<div class="col-md-4 col-xs-5"><?php echo $this->lang->line("Type") ?></div>
											<div class="col-md-8 col-xs-7"><span><?php echo $offre->contrat; ?></span></div>
										</li>
										<li class="row">
											<div class="col-md-4 col-xs-5"><?php echo $this->lang->line("Duration") ?></div>
											<div class="col-md-8 col-xs-7"><span><?php echo $offre->duree.' '.$this->lang->line("Month") ?></span></div>
										</li>
										<li class="row">
											<div class="col-md-4 col-xs-5"><?php echo $this->lang->line("PostAviable") ?></div>
											<div class="col-md-8 col-xs-7"><span><?php echo $offre->nbPoste; ?></span></div>
										</li>
										<li class="row">
											<div class="col-md-4 col-xs-5"><?php echo $this->lang->line("Degree") ?></div>
											<div class="col-md-8 col-xs-7"><span style="color:#e71b47;"><?php echo $offre->niveau_etude ;?></span></div>
										</li> 
										<li class="row">
											<div class="col-md-4 col-xs-5"><?php echo $this->lang->line("Field") ?></div>
											<div class="col-md-8 col-xs-7"><span><?php echo $etude; ?></span></div>
										</li>
										<li class="row">
											<div class="col-md-4 col-xs-5"><?php echo $this->lang->line("Experience") ?></div>
											<div class="col-md-8 col-xs-7"><span><?php echo $experience; ?></span></div>
										</li>
										<li class="row">
											<div class="col-md-4 col-xs-5"><?php echo $this->lang->line("Freelance") ?></div>
											<div class="col-md-8 col-xs-7"><span><?php if($offre->Freelance==1) echo '<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
												else echo'<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';?></span>
											</div>
										</li>
										<li class="row">
											<div class="col-md-6 col-xs-5"><?php echo $this->lang->line("MotivationLetter") ?></div>
											<div class="col-md-6 col-xs-7"><span><?php if($offre->motivation==1) echo '<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
												else echo'<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';?></span>
											</div>
										</li>
										<li class="row">
											<div class="col-md-4 col-xs-5"><?php echo $this->lang->line("SkillsRequired") ?></div>
											<div class="col-md-8 col-xs-7">
												<span style="color:#007acc;">
												<?php 
												foreach ($list_competence as $skills){
													if(in_array($skills['idCompetence'],explode(',',$offre->listCompetences))){
														if($_SESSION['site_lang']=="french") $comp = $skills['nom']; else $comp = $skills['name']; 
														echo ' '.$comp.'<br> ';
													}														
												}
												?>
												</span>
											</div>
										</li>
										<li class="row">
											<div class="col-md-4 col-xs-5"><?php echo $this->lang->line("PublicationDate") ?></div>
											<div class="col-md-8 col-xs-7"><span>
												<?php 	
													$date = explode("-", $offre->datePublication);	
													echo date("M d, Y",mktime(0,0,0,$date[1], $date[2], $date[0]));
												?>
											</div>
										</li>
										<li class="row">
											<div class="col-md-4 col-xs-5"><?php echo $this->lang->line("ValidUntil") ?></div>
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
						<div class="col-md-8"> 
							<!-- Job Description start -->
							<div class="job-header">
								<div class="contentbox">
									<h2><?php echo $this->lang->line("JobDescription") ?></h2>
									<div class="box-jobDetails"><?php echo $offre->descriptionOffre; ?></div>
									<hr>		 
									<h2><?php echo $this->lang->line("RequiredProfile") ?></h2>
									<div class="box-jobDetails"><?php echo $offre->descriptionProfil; ?></div>
								</div>
							</div>
							
							<!-- RelatedJobs start --> 
							<?php if($_SESSION['connected']=="yes"){
									if($_SESSION['compte']=="employer"){
										$list_offres = array();
									}
								}
							?>
							<div class="relatedJobs">
								<?php 
									if($_SESSION['connected']=="yes"){
										if($_SESSION['compte']!="employer"){
											echo '<h2>'.$this->lang->line("RelatedJobs").'</h2>';
										}
									}else echo '<h2>'.$this->lang->line("RelatedJobs").'</h2>';
								?>
								<ul class="searchList">
								<?php	
								function truncate($str, $len) {
									$tail = max(0, $len-10);
									$trunk = substr($str, 0, $tail);
									$trunk .= strrev(preg_replace('~^..+?[\s,:]\b|^...~', '...', strrev(substr($str, $tail, $len-$tail))));
									return $trunk;
								}
								if(count($list_offres) > 0){									
									foreach ($list_offres as $row){ 
										if($langue=="french") { 
											$pays=$row['nom_pays']; 
											$region=$row['nom_region'];
											$metier=$row['nom_metier'];
											$secteur=$row['nom_secteur'];
										}else{ 
											$pays=$row['name_pays'];
											$region=$row['name_region'];
											$metier=$row['name_metier'];
											$secteur=$row['name_secteur'];
										}
										$description = truncate($row['descriptionOffre'],300); 
										echo '<li>
												<div class="row">
													<div class="col-md-9 col-sm-9">
														<div class="jobimg"><img src="'.img_url("logo/".$row["logo"]).'" alt="'.$row["societe"].'_logo" title="'.$row["societe"].'"></div>
														<div class="jobinfo">
															<h3 class="title-job green-txt">'.$row["poste"].'</h3>
															<div class="companyName"><a href="'.site_url("Welcome/Company/".$row["idSociete"]).'">'.$row["societe"].'</a></div>
															<div class="location"><span class="label label-warning">contrat '.$row["contrat"].'</span> | <span><i class="fa fa-home"></i>  '.$pays.', '.$region.'-'.$row["nom_ville"].'</span></div>
															<div class="companyName"><span  class="label label-success">'.$metier.'</span> ';									
												if(!empty($secteur)) echo ' <span class="label label-primary">'.$secteur.'</span> ';
												if($row['Freelance']==1) echo ' <span class="label label-info">Freelance</span> ';
												if(!empty($row['niveau_etude'])) echo ' <span class="label label-danger">'.$row['niveau_etude'].'</span> '; 
														echo '</div>
														</div>
													</div>
													<div class="col-md-3 col-sm-3" style="padding:5px">
														<div><a class="btn btn-success btn-outline success-outline listbtn small" href="'.site_url("Offer/Check/".$row["idOffre"]).'">'.$this->lang->line("ViewDetails").'</a></div>
													</div>
												</div>
												<div style="padding:0px;margin:0px;">'.$description.'</div>									
												<div class="compList">';
										foreach ($list_competence as $skills){
											if(in_array($skills['idCompetence'],explode(',',$row['listCompetences']))){
												if($_SESSION['site_lang']=="french") $comp = $skills['nom']; else $comp = $skills['name']; 
												echo '<span class="label label-default">'.$comp.'</span> ';
											}														
										}
											echo'</div>
										</li>';																					
									}  
								}else{
									if($_SESSION['connected']=="yes"){
										if($_SESSION['compte']!="employer"){
											echo '<div class="col-sm-12"><p class="lead text-center" style="color:#616161">Aucun resultat</p><br><br></div>	';
										}
									}else echo '<div class="col-sm-12"><p class="lead text-center" style="color:#616161">Aucun resultat</p><br><br></div>	';									
								}
								?>		
								</ul>
							</div>
						</div>
					</div>				
				</div>
			</section>	
		</div>		
		<?php require_once('static/footer.php'); ?>	
		<script>
			$(".inputfile").change(function(e) {	 
				var fileName = '';		
				if(this.files && this.files.length > 1) fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
				else if( e.target.value ) fileName = e.target.value.split( '\\' ).pop();
				//$("#ml-name").html(""+fileName);
				$("#value").html(""+fileName);	
			}); 
		</script>
	</body>
</html> 