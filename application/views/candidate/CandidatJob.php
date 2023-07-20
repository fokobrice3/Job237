<!-- Jobs Candidate Section -->
<section id="Dashboard" style="border:none;background:#fff;"> 
	<div class="row"> 
		<div id="Mainsec" class="Block  col-md-9 col-sm-12" style="background:transparent;">	 	
			<div class="container">
				<h5 style="background:#2e0f3f;color:#fff"><?php echo $this->lang->line("MyJobs") ?></h5>  
				<div class="col-sm-12">
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
							$description = truncate($row['descriptionOffre'],400); 
							echo '<li style="background:#fafafa;margin:15px 0px;">
									<div class="row">
										<div class="col-md-9 col-sm-9">
											<div class="jobimg"><img src="'.img_url("logo/".$row["logo"]).'" alt="'.$row["societe"].'_logo" title="'.$row["societe"].'"></div>
											<div class="jobinfo">
												<h3 class="title-job green-txt">'.$row["poste"].'</h3>
												<div class="companyName"><a href="'.site_url("Home/Company/".$row["idSociete"]).'">'.$row["societe"].'</a></div>
												<div class="location"><span class="label label-warning">contrat '.$row["contrat"].'</span> | <span><i class="fa fa-home"></i>  '.$pays.', '.$region.'-'.$row["nom_ville"].'</span></div>
												<div class=""><span class="label label-success">'.$metier.'</span> ';									
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
						echo '<div class="col-sm-12"><p class="lead text-center" style="color:#616161">Aucun resultat</p><br><br></div>	';
					}
					?>		
					</ul>								
				</div>					 	
			</div>
		</div>
	</div>		
</section>	