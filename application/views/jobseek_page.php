<div id="Mainsec" class="Block Block-jobs col-md-9 col-sm-12" style="background:transparent;">	 				
	<div class="col-sm-12"  style="margin:0px;padding:0px;">
		<form method="GET" action="<?php echo site_url('Home/seekJobs'); ?>">
			<div class="col-md-4 col-sm-12">
				<div class="form-group">
					<label class="control-label sr-only" for="pays"><?php echo $this->lang->line("Country") ?></label>
					<select class="form-control btn-block" name="pays" id="pays">
						<option selected disabled value=""><?php echo $this->lang->line("SelectCountry") ?></option>
						<?php						
						foreach ($list_pays as $row){ 
							if($langue=="french") echo '<option value="'.$row['idPays'].'">'.$row['nom'].'</option>';
							else echo '<option value="'.$row['idPays'].'">'.$row['name'].'</option>';															
						}  
						?>			
					</select>  
				</div>
			</div>
			<div class="col-md-4 col-sm-12">
				<div class="form-group">
					<label class="control-label sr-only" for="region"><?php echo $this->lang->line("State") ?></label>
					<select class="form-control  btn-block" name="region" id="region">
						<option selected disabled value=""><?php echo $this->lang->line("SelectState") ?></option>											
					</select> 
				</div>
			</div>	
			<div class="col-md-4 col-sm-12">
				<div class="form-group">
					<label class="control-label sr-only" for="ville"><?php echo $this->lang->line("City") ?></label> 
					<select class="form-control  btn-block" name="ville" id="ville">
						<option  selected disabled value=""><?php echo $this->lang->line("SelectCity") ?></option>
					</select> 
				</div>
			</div>	
			<div class="col-md-9 col-sm-12">
				<label class="sr-only" for="title">Job Title, Activity or Company</label>
				<input type="text" class="form-control" id="title" name="title" placeholder="Activity, Job Title, company">
			</div> 
			<div class="col-md-3 col-sm-12">
				<input type="submit"  name="form-title" class="btn btn-primary inputsize info-full btn-block"  value="<?php echo $this->lang->line("Search") ?>">
			</div> 
		</form>							
	</div>	
	<div class="col-sm-12" id="List-Job">
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
				echo '<li>
						<div class="row">
							<div class="col-md-9 col-sm-9">
								<div class="jobimg"><img src="'.img_url("logo/".$row["logo"]).'" alt="'.$row["societe"].'_logo" title="'.$row["societe"].'"></div>
								<div class="jobinfo">
									<h3 class="title-job green-txt">'.$row["poste"].'</h3>
									<div class="companyName"><a href="'.site_url("Welcome/Company/".$row["idSociete"]).'">'.$row["societe"].'</a></div>
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
<script>
$(document).ready(function(){ 
	$("#pays").change(function() {			
		$("#region").load("<?php echo site_url("Ajax/list_region/")?>"+$("#pays").val());
		$("#ville").load("<?php echo site_url("Ajax/list_villeP/")?>"); 
	});
	$("#region").change(function() {			
		$("#ville").load("<?php echo site_url("Ajax/list_ville/")?>"+$("#region").val());
	});
});
</script>