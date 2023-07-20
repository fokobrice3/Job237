<!-- Formation Section -->
<section style="" id="FormationSection">	
	<div class="row">
		<div class="container">
			<h1><?php echo $this->lang->line('OurFormation')?></h1> 
			<div class="col-sm-12">
				<p class="lead text-center" style="color:#777;font-family:Roboto;font-weight:100;font-size:1em;">"<?php echo $this->lang->line('OurFormationMsg')?>"</p><br><br>
            </div>			
			<div class="row">
			<?php
			if(count($list_formations)>0){
				foreach($list_formations as $formation){
					if($langue=="french"){
						$titre = $formation["nom"];
						$description = $formation["Description"];
					}else{
						$titre = $formation["name"];
						$description = $formation["description_eng"];
						$description = $formation["description_eng"];
					} 
					$date = explode("-", $formation['dateDebut']);			
					$dateFormation = date("d M Y",mktime(0,0,0,$date[1], $date[2], $date[0]));
					echo'<div class="col-sm-6 col-md-3">
							<div class="card"> 
								<a href="'.site_url("Welcome/Article/".$formation["idFormation"]).'">
									<div class="course-img">
										<img src="'.img_url("formation/".$formation["image"]).'">  
										<div style="bottom:4px;" class="tag">'.$dateFormation.'</div>
									</div> 
									<div class="card-content">
										<h5>'.$titre.'</h5> 
										<p class="subtitle">'.$description.'</p>								
									</div>
									<div class="price">'.number_format($formation["price"]).' FCFA
									</div>							
								</a>
								<div class="course-hover"> 
									<center><a href="'.site_url("Welcome/Formation_details/".$formation["idFormation"]).'" class="btn btn-primary btn-outline info-outline small">Details</a></center>
								</div>
							</div>
						</div>';
				}
			}else{
				echo"<p class='text_lastFormation' style='text-align:center'> Aucun Resultat</p>";				
			}
			?>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<div class="text-center">
						<br><br><a href="<?php echo site_url("Welcome/AllFormation")?>" class="btn btn-primary large  btn-outline info-outline" style="margin-top: 8px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Voir Plus&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
					</div>
				</div><!--
				<div class="col-sm-12 col-md-3">
					<div class="card"> 
						<a href="#">
							<div class="course-img">
								<img src="<?php echo img_url("formation/form.jpg")?>">  
							</div> 
							<div class="card-content">
								<h5>Python Programming for Beginners</h5> 
								<p class="subtitle">Recently updated with new, better Python development content for beginners</p>								
							</div>
							<div class="price">100.000 FCFA 
							</div>							
						</a>
						<div class="course-hover"> 
							<center><a href="#" class="btn btn-primary btn-outline info-outline small">Details</a></center>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-3">
					<div class="card"> 
						<a href="#">
							<div class="course-img">
								<img src="<?php echo img_url("formation/form2.jpg")?>">  
							</div> 
							<div class="card-content">
								<h5>Low Poly Blender Character Modeling</h5> 
								<p class="subtitle">Follow this course to learn blender character modeling techniques and create a low poly character</p>								
							</div>
							<div class="price">150.000 FCFA 
							</div>							
						</a>
						<div class="course-hover"> 
							<center><a href="#" class="btn btn-primary btn-outline info-outline small">Details</a></center>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-3">
					<div class="card"> 
						<a href="#">
							<div class="course-img">
								<img src="<?php echo img_url("formation/form3.jpg")?>">  
							</div> 
							<div class="card-content">
								<h5>Mac Linux Command Line Kick Start</h5> 
								<p class="subtitle">Get started with learning terminal commands on your Mac and Linux system</p>								
							</div>
							<div class="price">85.000 FCFA 
							</div>							
						</a>
						<div class="course-hover"> 
							<center><a href="#" class="btn btn-primary btn-outline info-outline small">Details</a></center>
						</div>
					</div>
				</div>
				<div class="col-sm-12 col-md-3">
					<div class="card"> 
						<a href="#">
							<div class="course-img">
								<img src="<?php echo img_url("formation/form5.jpg")?>">  
							</div> 
							<div class="card-content">
								<h5>Data Scientist</h5> 
								<p class="subtitle">Data Scientist</p>								
							</div>
							<div class="price">160.000 FCFA 
							</div>							
						</a>
						<div class="course-hover"> 
							<center><a href="#" class="btn btn-primary btn-outline info-outline small">Details</a></center>
						</div> 
					</div>
				</div>
				<div class="text-center">
					<br><br><a href="#" class="btn btn-primary large  btn-outline info-outline" style="margin-top: 8px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Voir Plus&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
				</div>-->
			</div>
			<br>
		</div> 
	</div> 
</section>