<!-- Dashboard Employer Section -->
<div id="Mainsec" class="col-md-10 col-sm-12">		
	<div class="Block"> 
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<div class="col-sm-12"> 
					<a class="btn-outline info-outline small info-outline btn-block btn btn-primary" href="<?php echo site_url("Home/postJob")?>"><?php echo $this->lang->line('PostJob')?> </a>
				</div>
				<div class="col-md-12 col-sm-12"><br><h5><?php echo $this->lang->line('JobsOnline')?></h5></div>   
				<div class="col-md-12 col-sm-12 Block-jobs">					
<?php
	function truncate($str, $len) {
		$tail = max(0, $len-10);
		$trunk = substr($str, 0, $tail);
		$trunk .= strrev(preg_replace('~^..+?[\s,:]\b|^...~', '...', strrev(substr($str, $tail, $len-$tail))));
		return $trunk;
	}
	if(count($list_offres) > 0){
		foreach ($list_offres as $row){ 
			$description = truncate($row['descriptionOffre'],1000); 
			$profil = truncate($row['descriptionProfil'],500); 
			if($langue=="french"){
				$metier =$row["nom_metier"];
				$pays = $row["nom_pays"];
				$region = $row["nom_region"]; 
			}else{
				$metier =$row["name_metier"];
				$pays = $row["name_pays"];
				$region = $row["name_region"]; 
			}
			echo'
				<div class="col-sm-12 item-jobs">
					<div class="col-sm-12"> 
						<div class="col-sm-2 logoC"><img class="img-thumbnail" src="'.img_url('logo/'.$logo).'"></div>
						<div class="col-sm-5">
							<p class="title-job">'.$row["poste"].'</p>
							<p class="domaine-job">'.$metier.'</p> 
							<p class="ref-job"><span class="label label-warning">ref</span>&nbsp;&nbsp;&nbsp;'.$row["reference"].'</p> 
							<p class="contrat-job"><span class="label label-danger">contrat</span>&nbsp;'.$row["contrat"].'</p>  
						</div>
						<div class="col-sm-5 infos2">
							<p class=""><i class="fa fa-home"></i> '.$pays.', '.$region.'-'.$row["nom_ville"].'</p> 
							<p class=""><span class="label label-success">Post Ouvert</span> &nbsp;&nbsp'.$row["nbPoste"].'</p>
							<p class=""><span class="label label-default">Date publication</span>&nbsp;&nbsp;'.date('M d, Y',strtotime($row["datePub"])).'</p>  
							<p class=""><span class="label label-default">Date fin du Delai</span>&nbsp;&nbsp;'.date('M d, Y',strtotime($row["dateFin"])).'</p>  
						</div>  
						<div class="col-sm-12 action">
							
						<a class="btn-outline info-outline small inline-block" href="'.site_url("Offer/Check/".$row["idOffre"]).'">'.$this->lang->line('ViewDetails').'</a>&nbsp;&nbsp;&nbsp;
						<a class="btn-outline warning-outline small inline-block" href="'.site_url("Offer/edit/".$row["idOffre"]).'">'.$this->lang->line('Edit').'</a>&nbsp;&nbsp;&nbsp;
							<a class="btn-outline danger-outline small inline-block" href="'.site_url("Offer/delete/".$row["idOffre"]).'">'.$this->lang->line('Delete').'</a>&nbsp;&nbsp;&nbsp;
						</div>
						<div class="col-md-6 col-sm-12">		 			
							<div style="background:#fafafa;border-radius:0 5px 5px 0;padding:8px 15px;">
								<br><p class="title-job">Description</p>
								<div class="descrition">'.$description.'</div>
							</div>	
						</div>	
						<div class="col-md-6 col-sm-12">
							<div style="background:#fafafa;border-radius:0 5px 5px 0;padding:8px 15px;">
								<br><p class="title-job">PROFIL</p>
								<div class="descrition">'.$profil.'</div>
							</div>	
						</div>					
					</div> 
				</div>';
		}
	}
?>
				</div> 
			</div> 
		</div>
	</div>  
</div>
<script>
</script>