<!-- Formation SideBar --> 
<div class="col-12 col-sm-12 col-md-4 col-lg-4 order-lg-1 pr-xl-5">
	<div class="widget2">
		<h3 class="title-job" style="color:#2b0b3d"><?php echo $this->lang->line('RecentTraining') ?></h3><br>
		<?php
			if(count($last_formation)>0){
				foreach($last_formation as $formation){
					if($langue=="french") $titre = $formation["nom"]; 
					else $titre = $formation["name"]; 
					echo'<article class="row article d-flex align-items-center mb-3">
						<span class="col-sm-2 formation_thumbnail mr-20">
							<img style="width:55px;height:55px;border-radius:0.3125rem;" src="'.img_url("formation/".$formation["image"]).'" alt="formation-image">
						</span>
						<a class="col-sm-10 text_lastFormation" href="'.site_url("Welcome/Formation_details/".$formation["idFormation"]).'">'.$titre.'</a>
					</article><br>';					 
				}
			}else{
				echo"<p> Aucun Resultat</p>";
			}
		?> 
	</div> 

	<hr style="border-color:#007acc;margin-bottom: 3rem;border-width: 2px;">
	<div class="widget2">
	<h3 class="title-job" style="color:#2b0b3d"><?php echo $this->lang->line('Category') ?></h3><br>
		<?php
		if(count($list_catform)>0){
			$i=0;
			foreach($list_catform as $cat){ 
				foreach($list_categoryFormation as $category){
					if($cat["idCategory"]==$category["idCategory"]){
						if($langue=="french") $titre = $category["nom"]; 
						else $titre = $category["name"]; 
						echo'<a href="'.site_url("Welcome/AllFormation/1/".$cat["idCategory"]).'" class="row article d-flex align-items-center mb-3"> 
							<p class="col-sm-10 text_lastFormation">'.$titre.' <span class="badge" style="background:#4272d7;color:#fafafa;float:right">'.$cat["nbFormation"].'</span></p>
						</a>';	
						$i++;
						if($i<count($list_categoryFormation)) echo'<hr>';
					}
				} 			 
			} 
		}else{
			echo"<p> Aucun Resultat</p>";
		}
		?><br>		 
	</div>    

	<hr style="border-color:#007acc;margin-bottom: 3rem;border-width: 2px;"> 
	<div class="widget2">
		<h3 class="title-job" style="color:#2b0b3d"><?php echo $this->lang->line('RecentJobs') ?></h3><br>
		<?php
			function truncate($str, $len) {
				$tail = max(0, $len-10);
				$trunk = substr($str, 0, $tail);
				$trunk .= strrev(preg_replace('~^..+?[\s,:]\b|^...~', '...', strrev(substr($str, $tail, $len-$tail))));
				return $trunk;
			}
			if(count($list_offres)>0){
				foreach($list_offres as $offre){ 
					echo'<article class="row article d-flex align-items-center mb-3">
						<span class="col-sm-2 formation_thumbnail">
							<img style="width:55px;height:55px;border-radius:0.3125rem;" src="'.img_url("logo/".$offre["logo"]).'" alt="formation-image">
						</span>
						<a href="'.site_url("Offer/Check/".$offre["idOffre"]).'" class="col-sm-10">
							<p class="col-sm-12 text_lastFormation" >'.strtoupper($offre["poste"]).'</p>
							<p class="col-sm-12" style="color:#777;font-family:Roboto;font-weight:100;font-size:0.9em;line-height:18px;">'.strip_tags(truncate($offre['descriptionOffre'],100)).'</p>
						</a>										
					</article><br>';					 
				}
			}else{
				echo"<p class='text_lastFormation'>Aucun Resultat</p>";
			}
		?> <br><br><br>
	</div> 
<!-- end of recent comment -->
</div>