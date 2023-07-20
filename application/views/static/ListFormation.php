<!-- List Formation --> 
<div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-60 mb-lg-0 order-lg-2">
	<div class="row" style="flex-wrap:wrap;margin-right:-15px;margin-left:-15px;display:flex;">
		<div class="container">
		<?php
		if($catSelect){  
			if($langue=="french") $nomCat = $nomCat->nom; else $nomCat = $nomCat->name;
			echo "<div class=''>
				<h4 style='color: #2b0b3d;
				text-transform: uppercase;
				font-family: Bariol-Bold, Lato, Roboto, sans-serif;
				font-size: 2.2em; 
				padding-bottom: 25px;
				padding-top: 25px; 
				margin: auto;
				margin-bottom: 15px;
				position: relative;
				font-weight: 100;'>Formations en ".$nomCat."</h4><br> 
			</div>"; 
		}
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
				echo'<div style="margin-bottom:3.75rem;" class="col-sm-6 col-md-4">
						<div class="card"> 
							<a href="'.site_url("Welcome/Formation_details/".$formation["idFormation"]).'">
								<div class="course-img">
									<img style="vertical-align: middle;border-style:none;" src="'.img_url("formation/".$formation["image"]).'">  
									<div class="tag">'.$dateFormation.'</div>
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
			echo"<div class='col-sm-12'><p class='text_lastFormation' style='text-align:center'>Aucun Resultat</p></div><br><br>";
		} 
		?>
		</div>       
	</div>
	<!-- end of post row -->
	<div style="padding-bottom: 1.25rem;"></div>
	<div class="row">
		<div class="col-12 col-sm-12" >			
				<nav aria-label="Page navigation">
					<ul class="pagination">
					<center>
					<?php
						if($currentPage>1){echo '<li class="page-item">
							<a class="page-link" href="'.site_url("Welcome/AllFormation/".($currentPage-1)).'/'.$idCategory.'">
								<i class="fa fa-long-arrow-left mr-10"></i> '.$this->lang->line("Previous").'</a></li>';
						}
						$i=0;
						if($currentPage>3){
							echo '<li class="page-item"><a href="'.site_url("Welcome/AllFormation/".(1)).'" class="page-link">1</a></li>';
							echo '<li class="page-item"><span class="page-link">...</span></li>';
						} 
						if($currentPage>1){
							echo'<li class="page-item"><a class="page-link" href="'.site_url("Welcome/AllFormation/".($currentPage-1)).'/'.$idCategory.'">'.($currentPage-1).'</a></li>';
						} 
						for($i=$currentPage;$i<=$currentPage+1;$i++){
							if($i<$nbPage+1){
								echo'<li class="page-item';
								if($i==$currentPage) echo' active';
								echo'"><a class="page-link" href="'.site_url("Welcome/AllFormation/".($currentPage+1)).'/'.$idCategory.'">'.$i.'</a></li>';
							}
						}
						if($nbPage>1 && $currentPage+2<$nbPage){echo '<li class="page-item"><span class="page-link">...</span></li>';}
						if($nbPage>1 && $currentPage+1<$nbPage){
							echo'<li class="page-item';
							if($currentPage==$nbPage) echo' active';
							echo'"><a class="page-link" href="'.site_url("Welcome/AllFormation/".($nbPage)).'/'.$idCategory.'">'.$nbPage.'</a></li>';
						} 						
						if($nbPage>1 && $currentPage<$nbPage){
							echo'<li class="page-item">
							<a class="page-link" href="'.site_url("Welcome/AllFormation/".($currentPage+1)).'/'.$idCategory.'">
							'.$this->lang->line("Next").'<i class="fa fa-long-arrow-right ml-10"></i></a></li>';
						}
						
					?>
						<!--<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item"><a class="page-link" href="#">2</a></li>
						<li class="page-item active"><a class="page-link" href="#">...</a></li>
						<li class="page-item"><a class="page-link" href="#">10</a></li>-->
						</center>
					</ul>
				</nav>			
		</div>
		<!-- end of pagination col -->
	</div>
<!-- end of pagination row -->
</div>