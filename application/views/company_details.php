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
			function truncate($str, $len) {
				$tail = max(0, $len-10);
				$trunk = substr($str, 0, $tail);
				$trunk .= strrev(preg_replace('~^..+?[\s,:]\b|^...~', '...', strrev(substr($str, $tail, $len-$tail))));
				return $trunk;
			}
		?>	
		<div class="container">
			<section id="Dashboard" style="border:none;background:#f2f2f2;margin:15px 0px;padding:10px 30px 80px 30px;"> 
				<div class="row"> 
					<!-- Entete Company -->
					<div class="job-header  box-jobDetails">
						<div class="jobinfo">
							<div class="row">								
								<div class="col-md-3 col-sm-3">
									<div class="companyinfo">
										<div class="companylogo">
											<img style="max-width:230px;border:10px solid #eee; " src="<?php echo img_url("logo/".$societe->logo);?>" alt="<?php echo $societe->nom;?>" title="<?php echo $societe->nom;?>">
										</div>		
									</div>
								</div>
								<div class="col-md-9 col-sm-9">
									<?php
										if($langue=="french") { 
											if($pays) $pays=$pays->nom; 
											if($region) $region=$region->nom;								
											if($secteur) $secteur=$secteur->libelle;
											if($ville) $ville = $ville->nom;
											if($taille) $taille = $taille->nom;
											if($propriete) $propriete = $propriete->nom;
										}else{ 
											if($pays) $pays=$pays->name; 
											if($region) $region=$region->name;								
											if($secteur) $secteur=$secteur->name;
											if($ville) 	$ville = $ville->name;
											if($taille) $taille = $taille->name;
											if($propriete) $propriete = $propriete->name;
										} 
									?>	
									<h2 style="font-family:Bariol-Bold;letter-spacing:2px"><?php echo $societe->nom;?></h2>
									<div style="font-size: 20px;color: #709f40;margin-top: 10px;" class="title"><?php echo $secteur; ?></div>  
									<div style="font-size: 18px;color: #ffa200;margin-top: 10px;" class="title"><?php echo $taille; ?>, <em style="font-size: 18px;color: #666;margin-top: 10px;"><?php echo $propriete; ?></em></div>  
									<div class="ptext">
										<?php
										$date = explode("-", $societe->dateCreation);											
										echo '<i style="color:#9dcaf7"class="fa fa-history" aria-hidden="true"></i> '.$this->lang->line("MemberSince").' '; 
										echo "<b style='color:#4d4e53'>".date("M d, Y",mktime(0,0,0,$date[1], $date[2], $date[0]))."</b>";
										?>
									</div> 
									<div class="ptext">
										<?php
										$date = explode("-", $societe->dateCreation);											
										echo '<i style="color:#9dcaf7"class="fa fa-envelope-o" aria-hidden="true"></i> '.$societe->mail;  
										?>
									</div> 
									<div class="ptext">
										<?php
										$date = explode("-", $societe->dateCreation);											
										echo '<i style="color:#9dcaf7"class="fa fa-map-marker" aria-hidden="true"></i> '.$societe->adresse.', '.$ville.'-'.$region.', '.$pays;  
										?>
									</div> 									
								</div>
							</div>
						</div>						
					</div>
					
					<!-- Job + Description -->
					<div class="row">
						<div class="col-md-4 col-sm-12"> 
							<!-- Job Detail start -->
							<div class="job-header">
								<div class="jobdetail">
									<h3>Description</h3><hr>
									<div class="row">
										<div style="min-height:230px" class="col-sm-12">
											<?php echo $societe->description; ?> 
										</div>	
									</div>									
								</div>
							</div>
						</div>
						<div style="background:#f0f0f0;border:1px solid #e4e4e4" class="col-md-8 col-sm-12"> 
							<div class="job-header">
								<div  class="contentbox">
									<h2 style="font-size:18px;font-family:'Open Sans',Roboto"><?php echo $this->lang->line("LastJob") ?></h2> 	
									<div class="row LastestJobsList"><?php	
									if(count($offres) > 0){									
										foreach ($offres as $row){ 
											if($langue=="french") { 											
												$metier=$row['nom'];
											}else{ 
												$metier=$row['name'];
											}
											$description = truncate($row['descriptionOffre'],300); 
											echo '<div class="col-md-12 col-sm-12" style="padding:5px;">
													<div class="ltj">
														<div class="col-md-10 col-sm-9">
															<div class="jobimg">
																<img src="'.img_url("logo/".$societe->logo).'" alt="'.$societe->nom.'_logo" title="'.$societe->logo.'">
															</div>
															<div class="jobinfo">
																<h3 class="title-job green-txt">'.$row["poste"].'</h3>'	;
																echo'<span class="label label-success">'.$metier.'</span>					
																 <span class="label label-warning">contrat '.$row["contrat"].'</span>';
															 	if($row['Freelance']) echo ' <span class="label label-danger">freelance</span>'; 			
																echo'<div class="ptext">'; 
																$date = explode("-", $row['datePublication']);											
																echo $this->lang->line("PublicationDate").': '; 
																echo "<b style='color:#4d4e53'>".date("M d, Y",mktime(0,0,0,$date[1], $date[2], $date[0]))."</b><br>";
																$date = explode("-",  $row['dateDepot']);											
																echo $this->lang->line("ValidUntil").': '; 
																echo "<b style='color:#4d4e53'>".date("M d, Y",mktime(0,0,0,$date[1], $date[2], $date[0]))."</b></div>"; 														  
																echo'<div class="ptext">'.strip_tags($description).'</div>';  				
														echo'</div>								
														</div>
														<div class="col-md-2 col-sm-3" style="padding:2px">
															<div><a style="left:-12px;position:relative;" class="btn btn-primary  btn-outline info-outline listbtn small btn-block" href="'.site_url("Offer/Check/".$row["idOffre"]).'">'.$this->lang->line("Details").'</a></div>
														</div>
													</div>
												</div>';																	
										}  
									}
									?></div>  
								</div> 
							</div>						
						</div>
					</div>				
				</div>
			</section>	
		</div>		
		<?php require_once('static/footer.php'); ?>			
	</body>
</html> 