<!-- BreadCumb Section -->
<section class="fil_ariane"
<?php 
	if(isset($_SESSION['compte'])){ 
		if($_SESSION['compte']=="employer") echo 'style="background:#00abe6;"'; 
		else echo 'style="background:linear-gradient(#07bf7c, #07bf3b);"';
	} 
?>>
  	<ul class="breadcrumb">
		<li><a href="<?php echo site_url('Welcome/index');?>">CeoGroup</a></li> 
		<li><!-- Niveau1 -->
		<?php 
			if($page=="qui_sommes_nous")echo '<a href="'.site_url('Welcome/qui_sommes_nous').'">'.$this->lang->line('WWA').'</a>';
			else if($page=="formation" || $page=="formation2") echo '<a href="'.site_url('Welcome/AllFormation').'">'.$this->lang->line('Formation').'</a>'; 
			else if($page=="findJob" || $page=="jobs_seeking_bd" || $page=="jobs_seeking_details" || $page=="candidate_job") echo '<a href="'.site_url('Home/seekJobs/all').'">'.$this->lang->line('Jobs').'</a>'; 
			else if($page=="contact") echo $this->lang->line('Contact');
			else if($page=="resume" || $page=="experience" || $page=="education") echo '<a href="'.site_url('Home/resume').'">'.$this->lang->line('MyResume').'</a>';
			else if($page=="signIn") echo $this->lang->line('SignIn');
			else if($page=="signUp") echo $this->lang->line('SignUp'); 
			else if($page=="company_details") echo $this->lang->line('Company'); 
			else if($page=="home" || $page=="profile" || $page=="postJob"  || $page=="postjobs_db" || $page=="postjobs_add" || $page=="messages" || $page=="compagny") echo '<a href="'.site_url('Home/index').'">'.$this->lang->line('Dashboard').'</a>';	
		?>
		</li>
		<?php //level 1
		
			if($page=="findJob" || $page=="jobs_seeking_bd") echo'<li><a style="color:#fff;" href="'.site_url('Home/seekJobs/all').'">'.$this->lang->line('FindJob').'</a></li>';
			else if($page=="jobs_seeking_details") echo'<li><a href="'.site_url('Home/seekJobs/all').'">'.$this->lang->line('FindJob').'</a></li>';
			else if($page=="postJob") echo'<li>'.$this->lang->line('PostJob').'</li>'; 
			else if($page=="profile") echo'<li>'.$this->lang->line('Profil').'</li>'; 
			else if($page=="postjobs_db") echo'<li>'.$this->lang->line('MyJobs2').'</li>'; 
			else if($page=="postjobs_add") echo'<li>'.$this->lang->line('PostJob').'</li>'; 
			else if($page=="postjobs_edit") echo'<li>'.$this->lang->line('UpdateJob').'</li>'; 
			else if($page=="messages") echo'<li>'.$this->lang->line('Messages').'</li>'; 
			else if($page=="compagny") echo'<li>'.$this->lang->line('MyCompagny').'</li>'; 
			else if($page=="experience") echo '<li>'.$this->lang->line('Experience').'</li>';
			else if($page=="education") echo '<li>'.$this->lang->line('Education').'</li>';
			else if($page=="candidate_job") echo'<li>'.$this->lang->line('MyJobs').'</li>'; 
			else if($page=="formation2"){
				if($langue=="french") $nom_form = $formation->nom; else $nom_form = $formation->name;
				echo'<li>'.$nom_form.'</li>'; 
			}
		?>
		<?php //level 2
			if($page=="jobs_seeking_details") echo'<li>'.$this->lang->line('JobDetail').'</li>';
		?>
	</ul>
</section>
	