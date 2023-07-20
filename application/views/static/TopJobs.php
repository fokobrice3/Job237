<!-- Formation Section -->
<section id="TobJobsSection"> 
	<div class="row">
		<div class="container"><br>
			<h1><?php echo $this->lang->line('LastJob')?></h1>   
			<div class="col-sm-12">
				<p class="lead text-center" style="color:#777;font-family:Roboto;font-weight:100;font-size:1em;">"<?php echo $this->lang->line('OurLastJobMsg')?>"</p>
            </div>	
			<div class="row LastestJobsList"> 	
			<?php	
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
					echo '<div class="col-md-6 col-sm-12" style="padding:10px;"><div class="ltj">
							<div class="col-md-9 col-sm-9">
								<div class="jobimg"><img src="'.img_url("logo/".$row["logo"]).'" alt="'.$row["societe"].'_logo" title="'.$row["societe"].'"></div>
								<div class="jobinfo">
									<h3 class="title-job green-txt">'.$row["poste"].'</h3>
									<div class="companyName"><a href="'.site_url("Welcome/Company/".$row["idSociete"]).'">'.$row["societe"].'</a></div>
									<div class="location"><span><i class="fa fa-home"></i>  '.$pays.', '.$region.'-'.$row["nom_ville"].'</span></div>									
								</div>								
							</div>
							<div class="col-md-3 col-sm-3" style="padding:5px">
								<div><a style="left:-12px;position:relative;" class="btn btn-primary  btn-outline info-outline listbtn small btn-block" href="'.site_url("Offer/Check/".$row["idOffre"]).'">'.$this->lang->line("Details").'</a></div>
							</div>
							<div class="col-sm-12">
								<div class="companyName">
									<span class="label label-warning">contrat '.$row["contrat"].'</span> 
									<span  class="label label-success">'.$metier.'</span> ';									
									if(!empty($secteur)) echo ' <span class="label label-primary">'.$secteur.'</span> ';
									if($row['Freelance']==1) echo ' <span class="label label-info">Freelance</span> ';
									if(!empty($row['niveau_etude'])) echo ' <span class="label label-danger">'.$row['niveau_etude'].'</span> '; 
								echo '</div>
								<div>';
								foreach ($list_competence as $skills){
									if(in_array($skills['idCompetence'],explode(',',$row['listCompetences']))){
										if($_SESSION['site_lang']=="french") $comp = $skills['nom']; else $comp = $skills['name']; 
										echo '<span class="label label-default" style="padding:2px 3px;">'.$comp.'</span> ';
									}														
								}
							echo'</div>
							</div>	
						</div></div>';																			
				}  
			}else{
				echo '<div class="col-sm-12"><p class="lead text-center" style="color:#616161">Aucun resultat</p><br><br></div>';
			}
			?>	
			<div class="col-sm-12">
				<div class="text-center">
					<a href="<?php echo site_url("Home/seekJobs/all")?>" class="btn btn-primary large  btn-outline info-outline" style="margin-top: 8px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Voir Plus&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				</div>
			</div>	
		</div><br><br>		
	</div>
</section>