<!-- Dashboard Employer Section -->
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
		if($_SESSION['active']=="no") echo"<div class='alert alert-warning fade in'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'><i class='fa fa-times-circle'></i></a>
			<strong><i class='fa fa-exclamation-triangle'></i> ATTENTION!</strong> Votre compte n'est pas actif. Pensez à <a href='".site_url("Welcome/index#ContactMainSection")."'>contacter l'administrateur</a></div>";
		if(!$societeOk) echo'<div class="alert alert-danger fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close"><i class="fa fa-times-circle"></i></a>
			<strong><i class="fa fa-exclamation-triangle"></i> ATTENTION!</strong> Pensez à <a href="'.site_url("Home/compagny").'">compléter les informations sur votre société	</a>
		</div>';
	?>	 
	<hr style="top:-15px;position:relative;margin-bottom:2px;">
	<div class="row">
		<div class="col-lg-4 col-md-6">
			<div class="box_infos">
				<div class="row box_infos-header">
					<div class="col-sm-4"><div class=""><img src="<?php echo img_url("icon/jobs.png");?>"></div></div>
					<div class="col-sm-8">
						<div class="numbers">
							<p class="box-category">Your Jobs Online</p> 
							<h3 class="box-title"><?php  printf("%03d",  $nbJobs); ?></h3>
						</div>
					</div>
				</div> 
				<div class="box_infos-footer">
					<a href="<?php echo site_url('Home/postJob')?>" class="btn-outline small default-outline btn-default btn-block"><?php echo $this->lang->line('Add')?></a>
					<a href="<?php echo site_url('Home/jobs')?>" class="btn-outline small default-outline btn-default btn-block"><?php echo $this->lang->line('UpdateDelete')?></a> 
				</div>
			</div>
		</div> 
		<!--<div class="col-lg-4 col-md-6">
			<div class="box_infos">
				<div class="row box_infos-header">
					<div class="col-sm-4"><div class=""><img src="<?php echo img_url("icon/mail.png");?>"></div></div>
					<div class="col-sm-8">
						<div class="numbers">
							<p class="box-category">New Messages</p> 
							<h3 class="box-title">00</h3>
						</div>
					</div>
				</div> 
				<div class="box_infos-footer">
					<a href="" class="btn-outline small default-outline btn-default btn-block">Open Message</a>
					<a href="" class="btn-outline small default-outline btn-default btn-block">Send Message</a> 
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
						<td><p class="firtP">Account activated</p></td>
						<td><p class="secondP"><?php 
							if($_SESSION['active']=="yes") echo '<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
							else  echo '<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';?></p>
						</td>
					</tr>
					<tr>
						<td><p class="firtP">Profile completed</p></td>
						<td><p class="secondP"><?php 
							if($profilOk) echo '<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
							else  echo'<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';?></p></td>
					</tr>
					<tr>
						<td><p class="firtP">Compagny's profile <br>completed</p></td>
						<td><p class="secondP"><?php 
							if($societeOk) echo '<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
							else  echo '<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';?></p></td>
					</tr> 
				</table> 
			</div>
		</div> 
	</div>
</div> 