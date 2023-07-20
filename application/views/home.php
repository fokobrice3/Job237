<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html >
	<?php include('static/head.php'); ?>
	<body id="mainBlock" data-spy="scroll" data-target=".navbar" data-offset="50">
		<?php
			require_once('static/header.php');     
			require_once('static/breadcumb.php');    
			 			
			if($_SESSION['compte']=="candidate"){
				echo'<section id="Dashboard">		
						<br>
						<div class="row">';
						include('candidate/sidebar.php');
						if($page=="home") include('candidate/dashboard.php');	
						else if($page=="resume") include('candidate/resume.php');	
						else if($page=="experience") include('candidate/experience.php');	
						else if($page=="education") include('candidate/education.php');	
						else if($page=="profile") include('candidate/profile.php');	 	
						else if($page=="candidate_job") include('candidate/CandidatJob.php');	 	
					echo'</div>
					</section>';		
			}else if($_SESSION['compte']=="employer"){
				echo'
				<section id="Dashboard">		
					<br>
					<div class="row">';
					include('employer/sidebar.php');
					if($page=="home") include('employer/dashboard.php');	
					else if($page=="compagny") include('employer/compagny.php');	
					else if($page=="profile") include('employer/profile.php');	
					else if($page=="postjobs_db"){
						if($_SESSION['active']=="yes"){
							if($societeOk) include('employer/jobs.php');
							else echo'<div id="Mainsec" class="col-md-10 col-sm-12">
										<div class="Block-jobs">										
											<div class="jumbotron">
												<div class="col-md-2 col-sm-12"><img src="'.img_url("icon\locker.png").'"></div>
												<div class="col-md-10 col-sm-12">
													<p class="title-job">'.$this->lang->line("CompanyNotComplete").'</p>
												</div>
												<br><br><br> 
											</div>
										</div>
									</div>';	
						}else echo'<div id="Mainsec" class="col-md-10 col-sm-12">
										<div class="Block-jobs"> 
											<p class="title-job">'.$this->lang->line("AccountNotActivate").'</p>
											<div class="jumbotron">
												<div class="col-md-2 col-sm-12"><img src="'.img_url("icon\locker.png").'"></div>
												<div class="col-md-10 col-sm-12">
													<p style="line-height:1.8em;text-align:center;">'.$this->lang->line("ContactForActivate").'</p>
												</div>
												<br><br><br> 
											</div>
										</div>
									</div>';								
					}else if($page=="postjobs_add"){
						if($_SESSION['active']=="yes"){
							if($societeOk) include('employer/jobs_add.php');	
							else echo'<div id="Mainsec" class="col-md-10 col-sm-12">
										<div class="Block-jobs">										
											<div class="jumbotron">
												<div class="col-md-2 col-sm-12"><img src="'.img_url("icon\locker.png").'"></div>
												<div class="col-md-10 col-sm-12">
													<p class="title-job">'.$this->lang->line("CompanyNotComplete").'</p>
												</div>
												<br><br><br> 
											</div>
										</div>
									</div>';	
						}else echo'<div id="Mainsec" class="col-md-10 col-sm-12">
										<div class="Block-jobs"> 
											<p class="title-job">'.$this->lang->line("AccountNotActivate").'</p>
											<div class="jumbotron">
												<div class="col-md-2 col-sm-12"><img src="'.img_url("icon\locker.png").'"></div>
												<div class="col-md-10 col-sm-12">
													<p style="line-height:1.8em;text-align:center;">'.$this->lang->line("ContactForActivate").'</p>
												</div>
												<br><br><br> 
											</div>
										</div>
									</div>';
					}else if($page=="postjobs_edit"){
						if($_SESSION['active']=="yes"){
							if($societeOk) include('employer/jobs_edit.php');	
							else echo'<div id="Mainsec" class="col-md-10 col-sm-12">
											<div class="Block-jobs">										
												<div class="jumbotron">
													<div class="col-md-2 col-sm-12"><img src="'.img_url("icon\locker.png").'"></div>
													<div class="col-md-10 col-sm-12">
														<p class="title-job">'.$this->lang->line("CompanyNotComplete").'</p>
													</div>
													<br><br><br> 
												</div>
											</div>
										</div>';	
						}else echo'<div id="Mainsec" class="col-md-10 col-sm-12">
										<div class="Block-jobs"> 
											<p class="title-job">'.$this->lang->line("AccountNotActivate").'</p>
											<div class="jumbotron">
												<div class="col-md-2 col-sm-12"><img src="'.img_url("icon\locker.png").'"></div>
												<div class="col-md-10 col-sm-12">
													<p style="line-height:1.8em;text-align:center;">'.$this->lang->line("ContactForActivate").'</p>
												</div>
												<br><br><br> 
											</div>
										</div>
									</div>';
					} 
				echo'</div>
				</section>'; 
			}else;
			
			require_once('static/footer.php');
		?> 
	</body>
</html> 