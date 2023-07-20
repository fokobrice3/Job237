<!-- Dashboard Candidate Section -->
<div id="Mainsec" class="col-md-10 col-sm-12">		
	<div class="row">
		<div class="col-md-1">
			<img class="logoprofile" src="<?php echo img_url('profil/'.$photoProfil); ?>" alt="profil">
		</div>
		<div class="col-md-4">
			<p class="name"><?php echo $this->lang->line('Welcome')?><br> &nbsp;<span class='ith'><?php echo $nom; ?></span></p>
		</div>
	</div>
	<?php
		if(!$profilOk) echo'<div class="alert alert-info fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times-circle"></i></a>
			<strong><i class="fa fa-exclamation-triangle"></i> ATTENTION!</strong> Pensez à <a href="'.site_url("Home/profile").'">remplir votre profil</a>
		</div>';  
		if(!$CVOk) echo'<div class="alert alert-danger fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times-circle"></i></a>
			<strong><i class="fa fa-exclamation-triangle"></i> ATTENTION!</strong> Pensez à <a href="'.site_url("Home/resume").'">compléter les informations sur votre CV</a>	
		</div>';
	?>	 
	<hr style="top:-15px;position:relative;margin-bottom:2px;">
	<div class="row">
		<div class="col-lg-4 col-md-6">
			<div class="box_infos">
				<div class="row box_infos-header">
					<div class="col-sm-4"><div class=""><img src="<?php echo img_url("icon/analytics.png");?>"></div></div>
					<div class="col-sm-8">
						<div class="numbers">
							<p class="box-category"><?php echo $this->lang->line('JobExperiences')?></p> 
							<h3 class="box-title"><?php echo  number_format($JobXp); ?></h3>
						</div>
					</div>
				</div> 
				<div class="box_infos-footer">
					<a href="<?php echo site_url('Home/seekJobs/xp')?>" class="btn btn-default btn-sm btn-block"><?php echo $this->lang->line('Details')?></a> 
					<a href="<?php echo site_url('Home/seekJobs/all')?>" class="btn btn-default btn-sm btn-block"><?php echo $this->lang->line('BrowseAll')?></a> 
				</div>
			</div>
		</div> 
		<div class="col-lg-4 col-md-6">
			<div class="box_infos">
				<div class="row box_infos-header">
					<div class="col-sm-4"><div class=""><img src="<?php echo img_url("icon/certificate2.png");?>"></div></div>
					<div class="col-sm-8">
						<div class="numbers">
							<p class="box-category"><?php echo $this->lang->line('JobDegree')?></p> 
							<h3 class="box-title"><?php echo  number_format($JobDegree); ?></h3>
						</div>
					</div>
				</div> 
				<div class="box_infos-footer">
					<a href="<?php echo site_url('Home/seekJobs/degree')?>" class="btn btn-default btn-sm btn-block"><?php echo $this->lang->line('Details')?></a> 
					<a href="<?php echo site_url('Home/seekJobs/all')?>" class="btn btn-default btn-sm btn-block"><?php echo $this->lang->line('BrowseAll')?></a> 
				</div>
			</div>
		</div> 
		<div class="col-lg-4 col-md-6">
			<div class="box_infos">
				<div class="row box_infos-header">
					<div class="col-sm-4"><div class=""><img src="<?php echo img_url("icon/skills.png");?>"></div></div>
					<div class="col-sm-8">
						<div class="numbers">
							<p class="box-category"><?php echo $this->lang->line('JobSkills')?></p> 
							<h3 class="box-title"><?php echo  number_format($JobSkills); ?></h3>
						</div>
					</div>
				</div> 
				<div class="box_infos-footer">
					<a href="<?php echo site_url('Home/seekJobs/skills')?>" class="btn btn-default btn-sm btn-block"><?php echo $this->lang->line('Details')?></a> 
					<a href="<?php echo site_url('Home/seekJobs/all')?>" class="btn btn-default btn-sm btn-block"><?php echo $this->lang->line('BrowseAll')?></a> 
				</div>
			</div>
		</div> 
		<!--<div class="col-lg-4 col-md-6">
			<div class="box_infos">
				<div class="row box_infos-header">
					<div class="col-sm-4"><div class=""><img src="<?php echo img_url("icon/msg.png");?>"></div></div>
					<div class="col-sm-8">
						<div class="numbers">
							<p class="box-category">New Messages</p> 
							<h3 class="box-title">00</h3>
						</div>
					</div>
				</div> 
				<div class="box_infos-footer">
					<a href="" class="btn btn-default btn-sm btn-block">Open Message</a>
					<a href="" class="btn btn-default btn-sm btn-block">Send Message</a> 
				</div>
			</div>
		</div> -->
		<div class="col-lg-4 col-md-6">
			<div class="box-infos-text table-responsive"> 
				<table class="table">
					<tr>
						<td><p class="firtP">Last connexion</p></td>
						<td><p class="secondP"><?php echo $lastConnexion;?></p></td>
					</tr>					
					<tr>
						<td><p class="firtP">Profile completed</p></td>
						<td><p class="secondP"><?php 
							if($profilOk) echo '<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
							else  echo'<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';?></p></td>
					</tr>
					<tr>
						<td><p class="firtP">Resume uploaded</p></td>
						<td><p class="secondP"><?php 
							if($CVOk) echo '<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
							else  echo '<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';?></p></td>
					</tr> 
				</table> 
			</div>
		</div> 
	</div>
</div> 