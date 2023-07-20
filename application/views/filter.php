<!-- Sidebar Filter seekJob Section -->
<form class="form-inline" method="GET" action="<?php echo site_url('Home/seekJobs'); ?>">
	<div class="sidebar col-md-3 col-sm-12">		
		<div class="widget"> 
			<h4 class="widget-title"><?php echo $this->lang->line('JobsByCountry') ?> </h4>
			<ul class="optionlist">			
			<?php	
				$i=0;
				if(count($list_countryJobs)>3){
					for($i=0;$i<3;$i++){
						if($_SESSION['site_lang']=="french") $comp = $list_countryJobs[$i]['nom']; else $comp = $list_countryJobs[$i]['name']; 
						echo '<li>
							<label class="container-radio">&nbsp; '.$comp.' <span class="badge">'.$list_countryJobs[$i]['nbOffre'].'</span>
								<input value="'.$list_countryJobs[$i]["idPays"].'" type="checkbox" name="country_id[]"';
						if(!empty($pays_check)) if(in_array($list_countryJobs[$i]["idPays"],$pays_check)) echo ' checked ';						
						echo '>
								<span class="square"></span>
							</label>
						</li>';	
					}
					echo '<a href="#country-list"  id="country-a" data-toggle="collapse">'.$this->lang->line('ViewMore').'</a>
					<div id="country-list" class="collapse">';
						for($i=3;$i<count($list_countryJobs);$i++){
							if($_SESSION['site_lang']=="french") $comp = $list_countryJobs[$i]['nom']; else $comp = $list_countryJobs[$i]['name']; 
							echo '<li>
								<label class="container-radio">&nbsp; '.$comp.' <span class="badge">'.$list_countryJobs[$i]['nbOffre'].'</span>
									<input value="'.$list_countryJobs[$i]["idPays"].'" type="checkbox" name="country_id[]"';
							if(!empty($pays_check)) if(in_array($list_countryJobs[$i]["idPays"],$pays_check)) echo ' checked ';						
							echo '>
									<span class="square"></span>
								</label>
							</li>';	
						}
					echo '</div>';
				}else{
					foreach ($list_countryJobs as $row){						
						if($_SESSION['site_lang']=="french") $comp = $row['nom']; else $comp = $row['name']; 
						echo '<li>
							<label class="container-radio">&nbsp; '.$comp.' <span class="badge">'.$row['nbOffre'].'</span>
								<input value="'.$row["idPays"].'" type="checkbox" name="country_id[]"';
						if(!empty($pays_check)) if(in_array($row['idPays'],$pays_check)) echo ' checked ';						
						echo '>
								<span class="square"></span>
							</label>
						</li>';																		
					}
				}
			?>				
			</ul>
		</div>
		<div class="widget"> 
			<h4 class="widget-title"><?php echo $this->lang->line('JobsBySkills') ?> </h4>
			<ul class="optionlist">			
			<?php
				if(count($list_competence)>3){
					for($i=0;$i<3;$i++){
						$nbJob = 0;
						foreach($list_offres_skills as $skills){
							if(in_array($list_competence[$i]['idCompetence'],explode(',',$skills['listCompetences']))) $nbJob +=1;
						}
						if($nbJob>0){
							if($_SESSION['site_lang']=="french") $comp = $list_competence[$i]['nom']; else $comp = $list_competence[$i]['name']; 
							echo '<li>
								<label class="container-radio">&nbsp; '.$comp;	
								if($nbJob) echo ' <span class="badge">'.$nbJob.'</span>';
								echo '<input value="'.$list_competence[$i]["idCompetence"].'" type="checkbox" name="skill_id[]"';
							if(!empty($skills_check)) if(in_array($list_competence[$i]["idCompetence"],$skills_check)) echo ' checked ';						
							echo '>
									<span class="square"></span>
								</label>
							</li>';	
						}
					}
					echo '<a href="#skills-list" id="skills-a" data-toggle="collapse">'.$this->lang->line('ViewMore').'</a>
					<div id="skills-list" class="collapse">';
						for($i=3;$i<count($list_competence);$i++){
							$nbJob = 0;
							foreach($list_offres_skills as $skills){
								if(in_array($list_competence[$i]['idCompetence'],explode(',',$skills['listCompetences']))) $nbJob +=1;
							}
							if($nbJob>0){
								if($_SESSION['site_lang']=="french") $comp = $list_competence[$i]['nom']; else $comp = $list_competence[$i]['name']; 
								echo '<li>
									<label class="container-radio">&nbsp; '.$comp;
									if($nbJob) echo ' <span class="badge">'.$nbJob.'</span>';
								echo '<input value="'.$list_competence[$i]["idCompetence"].'" type="checkbox" name="skill_id[]"';
							if(!empty($skills_check)) if(in_array($list_competence[$i]["idCompetence"],$skills_check)) echo ' checked ';						
							echo '>
										<span class="square"></span>
									</label>
								</li>';
							}	
						}
					echo '</div>';
				}else{
					foreach ($list_competence as $row){
						$nbJob = 0;
						foreach($list_offres_skills as $skills){
							if(in_array($row['idCompetence'],explode(',',$skills['listCompetences']))) $nbJob +=1;
						}
						if($nbJob>0){
							if($_SESSION['site_lang']=="french") $comp = $row['nom']; else $comp = $row['name']; 
							echo '<li>
								<label class="container-radio">&nbsp; '.$comp;
							if($nbJob) echo ' <span class="badge">'.$nbJob.'</span>';
								echo '<input value="'.$row["idCompetence"].'" type="checkbox" name="skill_id[]"';
							if(!empty($skills_check)) if(in_array($row["idCompetence"],$skills_check)) echo ' checked ';						
							echo '>
									<span class="square"></span>
								</label>
							</li>';
						}																		
					}
				}
			?>				
			</ul>
		</div>
		<div class="widget"> 
			<h4 class="widget-title"><?php echo $this->lang->line('JobsByProfession') ?> </h4>
			<ul class="optionlist">			
			<?php	 
				if(count($list_profession)>3){
					for($i=0;$i<3;$i++){
						if($_SESSION['site_lang']=="french") $comp = $list_profession[$i]['nom']; else $comp = $list_profession[$i]['name']; 
						echo '<li>
							<label class="container-radio">&nbsp; '.$comp.' <span class="badge">'.$list_profession[$i]['nbOffre'].'</span>
								<input value="'.$list_profession[$i]["idMetier"].'" type="checkbox" name="metier_id[]"';
							if(!empty($metiers_check)) if(in_array($list_profession[$i]["idMetier"],$metiers_check)) echo ' checked ';						
							echo '>
								<span class="square"></span>
							</label>
						</li>';	
					}
					echo '<a href="#profession-list" id="profession-a" data-toggle="collapse">'.$this->lang->line('ViewMore').'</a>
					<div id="profession-list" class="collapse">';
						for($i=3;$i<count($list_profession);$i++){
							if($_SESSION['site_lang']=="french") $comp = $list_profession[$i]['nom']; else $comp = $list_profession[$i]['name']; 
							echo '<li>
								<label class="container-radio">&nbsp; '.$comp.' <span class="badge">'.$list_profession[$i]['nbOffre'].'</span>
									<input value="'.$list_profession[$i]["idMetier"].'" type="checkbox" name="metier_id[]"';
							if(!empty($metiers_check)) if(in_array($list_profession[$i]["idMetier"],$metiers_check)) echo ' checked ';						
							echo '>
									<span class="square"></span>
								</label>
							</li>';	
						}
					echo '</div>';
				}else{
					foreach ($list_profession as $row){
						if($_SESSION['site_lang']=="french") $comp = $row['nom']; else $comp = $row['name']; 
						echo '<li>
							<label class="container-radio">&nbsp; '.$comp.' <span class="badge">'.$row['nbOffre'].'</span>
								<input value="'.$row["idMetier"].'" type="checkbox" name="metier_id[]"';
							if(!empty($metiers_check)) if(in_array($row["idMetier"],$metiers_check)) echo ' checked ';						
							echo '>
								<span class="square"></span>
							</label>
						</li>';																		
					}
				}
			?>				
			</ul>			
		</div>
		<div class="widget"> 
			<h4 class="widget-title"><?php echo $this->lang->line('JobsByCompany') ?> </h4>
			<ul class="optionlist">			
			<?php	  
				if(count($list_company)>3){
					for($i=0;$i<3;$i++){
						$comp = $list_company[$i]['nom']; 
						echo '<li>
							<label class="container-radio">&nbsp; '.$comp.' <span class="badge">'.$list_company[$i]['nbOffre'].'</span>
								<input value="'.$list_company[$i]["idSociete"].'" type="checkbox" name="company_id[]"';
							if(!empty($company_check)) if(in_array($list_company[$i]["idSociete"],$company_check)) echo ' checked ';						
							echo '>
								<span class="square"></span>
							</label>
						</li>';	
					}
					echo '<a href="#company-list" id="company-a"  data-toggle="collapse">'.$this->lang->line('ViewMore').'</a>
					<div id="company-list" class="collapse">';
						for($i=3;$i<count($list_company);$i++){
							$comp = $list_company[$i]['nom']; 
							echo '<li>
								<label class="container-radio">&nbsp; '.$comp.' <span class="badge">'.$list_company[$i]['nbOffre'].'</span>
									<input value="'.$list_company[$i]["idSociete"].'" type="checkbox" name="company_id[]"';
							if(!empty($company_check)) if(in_array($list_company[$i]["idSociete"],$company_check)) echo ' checked ';						
							echo '>
									<span class="square"></span>
								</label>
							</li>';	
						}
					echo '</div>';
				}else{
					foreach ($list_company as $row){ 
						$comp = $row['nom']; 
						echo '<li>
							<label class="container-radio">&nbsp; '.$comp.' <span class="badge">'.$row['nbOffre'].'</span>
								<input value="'.$row["idSociete"].'" type="checkbox" name="company_id[]"';
							if(!empty($company_check)) if(in_array($row["idSociete"],$company_check)) echo ' checked ';						
							echo '>
								<span class="square"></span>
							</label>
						</li>';																		
					}
				}
			?>				
			</ul>			
		</div>		
		<div class="widget"> 
			<h4 class="widget-title"><?php echo $this->lang->line('JobsBySector') ?> </h4>
			<ul class="optionlist">			
			<?php	 
				if(count($list_secteur)>3){
					for($i=0;$i<3;$i++){
						if($_SESSION['site_lang']=="french") $comp = $list_secteur[$i]['libelle']; else $comp = $list_secteur[$i]['name']; 
						echo '<li>
							<label class="container-radio">&nbsp; '.$comp.' <span class="badge">'.$list_secteur[$i]['nbOffre'].'</span>
								<input value="'.$list_secteur[$i]["idSecteur"].'" type="checkbox" name="sector_id[]"';
							if(!empty($secteur_check)) if(in_array($list_secteur[$i]["idSecteur"],$secteur_check)) echo ' checked ';						
							echo '>
								<span class="square"></span>
							</label>
						</li>';	
					}
					echo '<a href="#sector-list" id="sector-a" data-toggle="collapse">'.$this->lang->line('ViewMore').'</a>
					<div id="sector-list" class="collapse">';
						for($i=3;$i<count($list_secteur);$i++){
							if($_SESSION['site_lang']=="french") $comp = $list_secteur[$i]['libelle']; else $comp = $list_secteur[$i]['name']; 
							echo '<li>
								<label class="container-radio">&nbsp; '.$comp.' <span class="badge">'.$list_secteur[$i]['nbOffre'].'</span>
									<input value="'.$list_secteur[$i]["idSecteur"].'" type="checkbox" name="sector_id[]"';
							if(!empty($secteur_check)) if(in_array($list_secteur[$i]["idSecteur"],$secteur_check)) echo ' checked ';						
							echo '>
									<span class="square"></span>
								</label>
							</li>';	
						}
					echo '</div>';
				}else{
					foreach ($list_secteur as $row){
						if($_SESSION['site_lang']=="french") $comp = $row['libelle']; else $comp = $row['name']; 
						echo '<li>
							<label class="container-radio">&nbsp; '.$comp.' <span class="badge">'.$row['nbOffre'].'</span>
								<input value="'.$row["idSecteur"].'" type="checkbox" name="sector_id[]"';
							if(!empty($secteur_check)) if(in_array($row["idSecteur"],$secteur_check)) echo ' checked ';						
							echo '>
								<span class="square"></span>
							</label>
						</li>';																		
					}
				}
			?>				
			</ul>			
		</div>
		<div class="widget">
			<label class="container-radio">&nbsp; <span class="widget-title"><?php echo $this->lang->line('Freelance') ?> <span class="badge"><?php echo $freelance_number;?></span></span>
				<input value="1" type="checkbox" name="freelance" <?php if(!empty($freelance_check)) echo ' checked ';?> >
				<span class="square"></span>
			</label>
		</div>		
		<div class="widget"> 
			<h4 class="widget-title"><?php echo $this->lang->line('Degree') ?> </h4>
			<ul class="optionlist">			
			<?php	  
				if(count($list_degree)>3){
					for($i=0;$i<3;$i++){
						$comp = $list_degree[$i]['nom']; 
						echo '<li>
							<label class="container-radio">&nbsp; '.$comp.'
								<input value="'.$list_degree[$i]["idNiveauEtude"].'" type="checkbox" name="degree_id[]"';
							if(!empty($degree_check)) if(in_array($list_degree[$i]["idNiveauEtude"],$degree_check)) echo ' checked ';						
							echo '>
								<span class="square"></span>
							</label>
						</li>';	
					}
					echo '<a href="#degree-list" id="degree-a" data-toggle="collapse">'.$this->lang->line('ViewMore').'</a>
					<div id="degree-list" class="collapse">';
						for($i=3;$i<count($list_degree);$i++){
							$comp = $list_degree[$i]['nom']; 
							echo '<li>
								<label class="container-radio">&nbsp; '.$comp.'
									<input value="'.$list_degree[$i]["idNiveauEtude"].'" type="checkbox" name="degree_id[]"';
							if(!empty($degree_check)) if(in_array($list_degree[$i]["idNiveauEtude"],$degree_check)) echo ' checked ';						
							echo '>
									<span class="square"></span>
								</label>
							</li>';	
						}
					echo '</div>';
				}else{
					foreach ($list_degree as $row){ 
						$comp = $row['nom']; 
						echo '<li>
							<label class="container-radio">&nbsp; '.$comp.'
								<input value="'.$row["idNiveauEtude"].'" type="checkbox" name="degree_id[]"';
							if(!empty($degree_check)) if(in_array($row["idNiveauEtude"],$degree_check)) echo ' checked ';						
							echo '>
								<span class="square"></span>
							</label>
						</li>';																		
					}
				}
			?>				
			</ul>			
		</div>
		<div class="widget">
			<h4 class="widget-title"><?php echo $this->lang->line('Experience') ?> </h4>
			<ul class="optionlist">			
				<li>
					<label class="container-radio">&nbsp; 1 <?php echo $this->lang->line('Year') ?>
						<input value="1" type="radio" name="xp_id"  <?php if($xp_check=='1') echo ' checked ';?> >
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container-radio">&nbsp; 2 <?php echo $this->lang->line('Years') ?>
						<input value="2" type="radio" name="xp_id"  <?php if($xp_check=='2') echo ' checked ';?>>
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container-radio">&nbsp; 3 <?php echo $this->lang->line('Years') ?>
						<input value="3" type="radio" name="xp_id"  <?php if($xp_check=='3') echo ' checked ';?>>
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container-radio">&nbsp; 4 <?php echo $this->lang->line('Years') ?>
						<input value="4" type="radio" name="xp_id"  <?php if($xp_check=='4') echo ' checked ';?>>
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container-radio">&nbsp; 5 <?php echo $this->lang->line('Years') ?>
						<input value="5" type="radio" name="xp_id"  <?php if($xp_check=='5') echo ' checked ';?>>
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container-radio">&nbsp; 6 <?php echo $this->lang->line('Years') ?>
						<input value="6" type="radio" name="xp_id"  <?php if($xp_check=='6') echo ' checked ';?>>
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container-radio">&nbsp; 7 <?php echo $this->lang->line('Years') ?>
						<input value="7" type="radio" name="xp_id"  <?php if($xp_check=='7') echo ' checked ';?>>
						<span class="checkmark"></span>
					</label>
				</li>
				<li>
					<label class="container-radio">&nbsp; 8+ <?php echo $this->lang->line('Years') ?>
						<input value="8" type="radio" name="xp_id"  <?php if($xp_check=='8') echo ' checked ';?>>
						<span class="checkmark"></span>
					</label>
				</li>
			</ul>
		</div>		
		<div class="col-sm-12">
			<input type="submit" class="btn btn-primary btn-outline info-outline btn-block"  name="form-filter" value="<?php echo $this->lang->line("Search") ?>">
		</div>
	</div>
</form>
<script>
$('#degree-a').click(function () {
    $('#degree-a').hide();
});
$('#sector-a').click(function () {
    $('#sector-a').hide();
});
$('#skills-a').click(function () {
    $('#skills-a').hide();
});
$('#country-a').click(function () {
    $('#country-a').hide();
});
$('#profession-a').click(function () {
    $('#profession-a').hide();
});
$('#country-a').click(function () {
    $('#country-a').hide();
});
</script>