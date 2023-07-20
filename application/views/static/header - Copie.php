<header>
	<!-- Menu Section --> 
	<section data-spy="affix" data-offset-top="150" <?php if($_SESSION['connected']=="yes") echo 'style="margin-bottom:-58px;height:58px;background:rgba(33,33,33,1);border-bottom:5px solid #1e1b1d;"'; ?>>
		<div class="col-md-2 col-sm-2"> 
			<a href="<?php echo site_url('Welcome/index');?>">
				<h4 class="logo"> 
					<img alt="logo" id="logo" src="<?php echo img_url('logo2.png'); ?>"> 
				</h4>
			</a>
		</div>
		<div class="col-md-10 col-sm-10">
			<nav class="menu">
				<div id="main2" class="col-sm-6">
					<a href="javascript:void(0);" class="link btn btn-block btn-lg" onclick="openNav()">
						<i class="fa fa-bars"></i> &nbsp;&nbsp;Menu
					</a>
				</div>
				<div class="7">				
					<ul>
						<li class="<?php if($page=="accueil") echo "active";?>"><a href="<?php echo site_url('Welcome/index');?>" ><?php echo $this->lang->line('Home');?></a></li>
						<li class="<?php if($page=="qui_sommes_nous") echo "active";?>"><a href="<?php echo site_url('Welcome/qui_sommes_nous');?>" ><?php echo $this->lang->line('WWA');?></a></li>
						<li class="<?php if($page=="formation" || $page=="formation2") echo "active";?>"> <a href="<?php echo site_url('Welcome/AllFormation');?>"><?php echo $this->lang->line('Formation');?></a></li> 
						<?php 
						if(isset($_SESSION['compte'])){
							echo '<li class="dropdown';
							if($page=="postjobs_db" || $page=="postjobs_add" || $page=="candidate_job" || $page=="findJob" || $page=="postJob" || $page=="postjobs_edit" || $page=="jobs_seeking_details" || $page=="jobs_seeking_bd") echo " active";
							echo '"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$this->lang->line('Jobs').'<span class="caret"></span></a>
									<ul class="dropdown-menu">';
							if($_SESSION['compte']=="employer"){
								echo '<li><a class="secondl" href="'.site_url('Home/jobs').'"><i class="fa fa-tags" aria-hidden="true"></i> '.$this->lang->line('FindMyJob').'</a></li>
									<li><a class="secondl" href="'.site_url('Home/postJob').'"><i class="fa fa-sticky-note" aria-hidden="true"></i> '.$this->lang->line('PostJob').'</a></li>
									<li><a class="secondl" href="'.site_url('Home/seekJobs/all').'"><i class="fa fa-random" aria-hidden="true"></i> '.$this->lang->line('FindJob').'</a></li>'; 
							}else if($_SESSION['compte']=="candidate"){
								echo '<li><a class="secondl" href="'.site_url('Home/seekJobs/all').'"><i class="fa fa-random" aria-hidden="true"></i> '.$this->lang->line('AllJobs').'</a></li>';
								echo '<li><a class="secondl" href="'.site_url('Home/seekJobs/myJobs').'"><i class="fa fa-suitcase" aria-hidden="true"></i> '.$this->lang->line('MyJobs').'</a></li>';
							}								
							echo'</ul></li> ';
						}else{
							echo '<li ';
							if($page=="jobs_seeking_bd" || $page=="jobs_seeking_details") echo 'class="active"';
							echo '><a href="'.site_url('Home/seekJobs/all').'">'.$this->lang->line('FindJob').'</a></li>'; 
						}
						?>  			 		
						<li class="<?php if($page=="contact") echo "active";?>"> <a href="<?php echo site_url('Welcome/contact');?>"><?php echo $this->lang->line('Contact')?></a></li>
					</ul> 
				</div>
				<div class="5">
					<ul class="ulright">
					<?php 
					if($_SESSION['connected']=="yes"){
						if($_SESSION['compte']=="employer"){
						//<li><a class="secondl" href="'.site_url('Home/messages').'"><i class="fa fa-envelope" aria-hidden="true"></i> '.$this->lang->line('Messages').'</a></li>	
							echo '<li class="dropdown">
								<a class="sign-up" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<i class="fa fa-tachometer" aria-hidden="true"></i>'.$this->lang->line('Dashboard').'<span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a class="secondl" href="'.site_url('Home/index').'"><i class="fa fa-tachometer" aria-hidden="true"></i> '.$this->lang->line('Dashboard').'</a></li>
									<li><a class="secondl" href="'.site_url('Home/profile').'"><i class="fa fa-id-card" aria-hidden="true"></i> '.$this->lang->line('Profil').'</a></li>
									<li><a class="secondl" href="'.site_url('Home/jobs').'"><i class="fa fa-handshake-o" aria-hidden="true"></i> '.$this->lang->line('Jobs').'</a></li>
									<li><a class="secondl" href="'.site_url('Home/compagny').'"><i class="fa fa-building" aria-hidden="true"></i> '.$this->lang->line('MyCompagny').'</a></li>
								</ul>
							</li> ';  	
						}else{
							echo '<li class="dropdown">
									<a class="sign-up" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-tachometer" aria-hidden="true"></i>'.$this->lang->line('Dashboard').'<span class="caret"></span></a>
									<ul class="dropdown-menu">
										<li><a class="secondl" href="'.site_url('Home/index').'"><i class="fa fa-tachometer" aria-hidden="true"></i> '.$this->lang->line('Dashboard').'</a></li>
										<li><a class="secondl" href="'.site_url('Home/profile').'"><i class="fa fa-id-card" aria-hidden="true"></i> '.$this->lang->line('Profil').'</a></li>
										<li><a class="secondl" href="'.site_url('Home/seekJobs/all').'"><i class="fa fa-random" aria-hidden="true"></i> '.$this->lang->line('FindJob').'</a></li>
										<li><a class="secondl" href="'.site_url('Home/seekJobs/myJobs').'"><i class="fa fa-suitcase" aria-hidden="true"></i> '.$this->lang->line('MyJobs').'</a></li>
										<li><a class="secondl" href="'.site_url('Home/resume').'"><i class="fa fa-sticky-note" aria-hidden="true"></i> '.$this->lang->line('MyResume').'</a></li>
									</ul>
								</li> ';
						}
						echo '<li><a class="sign-out" href="'.site_url("Welcome/signOut").'"><i class="fa fa-sign-out" aria-hidden="true"></i>'.$this->lang->line("SignOut").'</a></li>';  	
					}else{					
						echo '<li><a class="sign-in" id="sign-in" href="#">'.$this->lang->line("SignIn").'</a></li>'; 
						echo '<li><a class="sign-up" href="'.site_url("Welcome/signUp").'">'.$this->lang->line("SignUp").'</a></li>';						
					}
					?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">						
								<span class="lang-link" style="font-family:Bariol-Bold">
								<?php 
								if($_SESSION["site_lang"]=="french") echo "<span style='font-weight:400;background:#2196f3;padding:4px;'>Fr</span><span style='color:#222;font-weight:400;background:#fafafa;padding:4px;'>Eng</span>";
								else echo "<span style='color:#222;font-weight:400;background:#fafafa;padding:4px;'>Fr</span><span style='color:#fff;font-weight:400;background:#2196f3;padding:4px;'>Eng</span>";							
								?>
								</span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu">
								<li><a class="secondl" href="<?php echo site_url('LanguageSwitcher/switchLang/french');?>"><?php echo $this->lang->line('French')?></a></li>
								<li><a class="secondl" href="<?php echo site_url('Index.php/LanguageSwitcher/switchLang/english');?>"><?php echo $this->lang->line('English')?></a></li> 
							</ul>
						</li>
					</ul>
				</div>
			</nav>  
		</div>
	</section> 
	<!-- Login Modal -->
	<?php
		if($_SESSION['connected']=="no"){
			if($page!="signIn") include("login.php");
		}
	?>



	<!-- Banner Section Main Page -->
	<?php if($page=="accueil") echo'
	<section class="hero" id="hero">
		<h2 class="hero_header">'.$this->lang->line('TitleBan').'</h2>
		<p class="tagline0">'.$this->lang->line('SlogBan').'</p>
		<p class="tagline">'.$this->lang->line('MessBan').'</p>
		<div class="formBanner">
			<form method="GET" action="'.site_url("Home/seekJobs/all").'" role="search" id="searchFreelancers" class="c-hero__searchB" data-url="" runat="server">
				<div class="form-group">
					<input type="search" placeholder="'.$this->lang->line('QSearchJob').'" name="title" id="title">
					<button type="submit" name="form-title"><i class="fa fa-search" aria-hidden="true"></i></button>
				</div>				
			</form>	
		</div> 				
	</section>';
	?>
	<!-- Banner Section Qui sommes nous Page -->
	<?php if($page=="qui_sommes_nous") echo'
	<section style="padding-bottom:0px;padding-left:0;padding-right:0;" class="hero13">
		<div style="padding-top:0px;padding-bottom:0px;padding-left: 200px;	padding-right: 200px;">
			<h2 style="top:30px;" class="hero_header">'.$this->lang->line('WWATitle').'</h2> 
			<p style="top:30px;font-size:1em;" class="tagline2"> &nbsp;&nbsp;&nbsp;'.$this->lang->line('WWASlogan').'</p>
		</div>
		<img src="'.img_url("shape-bg3.png").'" style="position:relative;top:5px;left:0;" alt="shape image" class="img-responsive" style="width: 100%;"/>
	</section>';
	?>
	<!-- Banner Section Formation Page -->
	<?php if($page=="formation") echo'
	<section style="padding-bottom:0px;padding-left:0;padding-right:0;" class="hero2">
		<div style="padding-top:0px;padding-bottom:0px;padding-left: 200px;	padding-right: 200px;">
			<h2 class="hero_header">'.$this->lang->line('Formation').'</h2> 
			<p class="text-left tagline2" style="color:#fdfdfd;font-family:Roboto;font-weight:100;font-size:1em;">'.$this->lang->line('OurFormationMsg').'</p><br><br>
		</div>
	</section>';
	?>
	<!-- Banner Section Formation2 les details Page -->
	<?php if($page=="formation2") echo'
	<section style="padding-bottom:0px;padding-left:0;padding-right:0;" class="hero14">
		<div style="padding-top:0px;padding-bottom:0px;padding-left: 200px;	padding-right: 200px;">
			<h2 class="hero_header">'.$this->lang->line('Formation').'</h2> 
			<p class="tagline2 text-left" style="color:#fdfdfd;font-family:Roboto;font-weight:100;font-size:1em;">'.$this->lang->line('OurFormationMsg').'</p><br><br>	
		</div>
	</section>';
	?>
	<!-- Banner Section FindJob Page -->
	<?php if($page=="findJob") echo'
	<section class="hero2">
		<h2 class="hero_header">'.$this->lang->line('FindJob').'</h2> 
		<p class="tagline2">'.$this->lang->line('MesgFindJob').'</p>	
	</section>';
	?>
	<!-- Banner Section PostJob Page -->
	<?php if($page=="postJob") echo'
	<section class="hero2">
		<h2 class="hero_header">'.$this->lang->line('PostJob').'</h2> 
		<p class="tagline2">'.$this->lang->line('MesgPostJob').'</p>	
	</section>';
	?>
	<!-- Banner Section Contact Page -->
	<?php if($page=="contact") echo'
	<section class="hero12">
		<img id="supportImg" alt="jobs" src="'.img_url("icon/support.png").'"> 
		<h2 class="hero_header">'.$this->lang->line('CustomerSupport').'</h2> 
		<p class="lead" style="color:#fdfdfd;font-family:Roboto;font-weight:100;font-size:1em;">'.$this->lang->line('MesgContact').'</p>	
	</section>';
	?>
	<!-- Banner Section SignIn Page -->
	<?php if($page=="signIn") echo'
	<section class="hero5"> 
	</section>';
	?>
	<!-- Banner Section SignUp Page -->
	<?php if($page=="signUp") echo'
	<section class="hero11"> 
		<h2 class="hero_header">'.$this->lang->line('Record').'</h2> 
	</section>';
	?>
	<!-- Banner Section Home Page -->
	<?php if($page=="home") echo'
	<section class="hero3" style="margin-top:58px;"> 
		<h2 class="hero_header2">'.$this->lang->line('Dashboard').'</h2> 
		<p class="tagline2">'.$this->lang->line('MsgDashboard').'</p>	
	</section>';
	?>
	<!-- Banner Section profile Page -->
	<?php if($page=="profile") echo'
	<section class="hero11" style="margin-top:58px; padding-top: 50px;padding-bottom: 60px;"> 
		<h2 class="hero_header2">'.$this->lang->line('Profil').'</h2> 
		<p class="tagline2">'.$this->lang->line('MsgDashboard').'</p>	
	</section>';
	?>
	<!-- Banner Section Messages Page -->
	<?php if($page=="messages") echo'
	<section class="hero3" style="margin-top:58px;"> 
		<h2 class="hero_header2">'.$this->lang->line('Messages').'</h2> 
		<p class="tagline2">'.$this->lang->line('MsgDashboard').'</p>	
	</section>';
	?>
	<!-- Banner Section PostJob-dashboard Page -->
	<?php if($page=="postjobs_db" || $page=="postjobs_add" || $page=="postjobs_edit") echo'
	<section class="hero10" style="margin-top:58px;padding-top:50px;padding-bottom:60px;"> 
		<h2 class="hero_header2">'.$this->lang->line('Jobs').'</h2> 
		<p class="tagline2">'.$this->lang->line('MsgDashboard').'</p>	
	</section>';
	?>
	<!-- Banner Section Compagny Page -->
	<?php if($page=="compagny") echo'
	<section class="hero9" style="margin-top:58px; padding-top:60px;padding-bottom:50px;"> 
		<h2 class="hero_header2">'.$this->lang->line('MyCompagny').'</h2> 
		<p class="tagline2">'.$this->lang->line('MsgDashboard').'</p>	
	</section>';//40-30
	?>
	<!-- Banner Section Resume Page -->
	<?php if($page=="resume" || $page=="experience" || $page=="education") echo'
	<section class="hero4" style="margin-top:58px; padding-top:50px;padding-bottom:60px;"> 
		<h2 class="hero_header2">'.$this->lang->line('MyResume').'</h2> 
		<p class="tagline2">'.$this->lang->line('MsgDashboard').'</p>	
	</section>';
	?>
	<!-- Banner Section SeekJob Page -->
	<?php if($page=="jobs_seeking_bd"){ 
		echo'<section class="hero4"';
		if($_SESSION['connected']=="yes") echo 'style="margin-top:58px; padding-top:50px;padding-bottom:60px;"'; 
		echo'><h2 class="hero_header2">'.$this->lang->line('FindJob').'</h2> 
		<p class="tagline2">'.$this->lang->line('MsgFindJob').'</p>	
	</section>';
	}
	?>
	<!-- Banner Section SeekJob-details Page -->
	<?php if($page=="jobs_seeking_details"){ 
		echo'<section class="hero4"';
		if($_SESSION['connected']=="yes") echo 'style="margin-top:58px; padding-top:50px;padding-bottom:60px;"'; 
		echo'><h2 class="hero_header2">'.$this->lang->line('JobDetail').'</h2>  
		<p class="tagline2">'.$this->lang->line('MsgJobDetail').'</p>	
	</section>';
	}
	?>
	<!-- Banner Section MyJob-details Page -->
	<?php if($page=="candidate_job"){ 
		echo'<section class="hero8"';
		if($_SESSION['connected']=="yes") echo 'style="margin-top:58px; padding-top:50px;padding-bottom:60px;"'; 
		echo'><h2 class="hero_header2">'.$this->lang->line('MyJobs').'</h2>  
		<p class="tagline2">'.$this->lang->line('MsgDashboard').'</p>	
	</section>';
	}
	?>
	<!-- Banner Section Company-details Page -->
	<?php if($page=="company_details"){ 
		echo'<section class="hero9"';
		if($_SESSION['connected']=="yes") echo 'style="margin-top:58px; padding-top:50px;padding-bottom:60px;"'; 
		echo'><h2 class="hero_header2">'.$this->lang->line('Company').'</h2>   
	</section>';
	}
	?>
	<!-- Banner Section Company-details Page -->
	<?php if($page=="tnc"){ 
		echo'<section style="padding-bottom:0px;padding-left:0;padding-right:0;" class="hero14">
		<div style="text-align:center;padding-top:0px;padding-bottom:0px;padding-left: 200px;	padding-right: 200px;">
			<h2 style="text-align:center;" class="hero_header">Terms & Conditions</h2> 
			<p class="lead text-center" style="color:#fdfdfd;font-family:Roboto;font-weight:100;font-size:1em;">Iterative approaches to corporate strategy foster collaborative<br> thinking to further the overall value proposition.</p><br><br>	
		</div>
	</section>';
	}
	?>
	<!-- Banner Section Company-details Page -->
	<?php if($page=="passforget"){ 
		echo'<section style="padding-bottom:0px;padding-left:0;padding-right:0;" class="hero5">
		<div style="text-align:center;padding-top:0px;padding-bottom:0px;padding-left: 200px;padding-right: 200px;">		
		</div>
	</section>';
	}
	?>
	<script>
		var _state=0;
		function openNav() {
			if(_state==0){
				_state=1;
				document.getElementById("NavMobile").style.width = "300px";  
			}else{
				_state=0;
				document.getElementById("NavMobile").style.width = "0";  
			} 
		}
	</script>
</header>
<div id="NavMobile">
	<center><img src="<?php echo img_url('ceo-logo.png'); ?>" alt="Logo" class="logo"/></center>
	<h4>CeoGroup SARL</h4>
	<ul>
		<li class="<?php if($page=="accueil") echo "active";?>"><a href="<?php echo site_url('Welcome/index');?>" ><?php echo $this->lang->line('Home');?></a></li>
		<li class="<?php if($page=="qui_sommes_nous") echo "active";?>"><a href="<?php echo site_url('Welcome/qui_sommes_nous');?>" ><?php echo $this->lang->line('WWA');?></a></li>
		<li class="<?php if($page=="formation" || $page=="formation2") echo "active";?>"> <a href="<?php echo site_url('Welcome/AllFormation');?>"><?php echo $this->lang->line('Formation');?></a></li> 	
		<?php 
		if(isset($_SESSION['compte'])){
			echo '<li class="dropdown';
			if($page=="postjobs_db" || $page=="postjobs_add" || $page=="candidate_job" || $page=="findJob" || $page=="postJob" || $page=="postjobs_edit" || $page=="jobs_seeking_details" || $page=="jobs_seeking_bd") echo " active";
				echo '"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$this->lang->line('Jobs').'<span class="caret"></span></a>
					<ul class="dropdown-menu">';
				if($_SESSION['compte']=="employer"){
					echo '<li><a class="secondl" href="'.site_url('Home/jobs').'"><i class="fa fa-tags" aria-hidden="true"></i> '.$this->lang->line('FindMyJob').'</a></li>
						<li><a class="secondl" href="'.site_url('Home/postJob').'"><i class="fa fa-sticky-note" aria-hidden="true"></i> '.$this->lang->line('PostJob').'</a></li>
						<li><a class="secondl" href="'.site_url('Home/seekJobs/all').'"><i class="fa fa-random" aria-hidden="true"></i> '.$this->lang->line('FindJob').'</a></li>'; 
				}else if($_SESSION['compte']=="candidate"){
					echo '<li><a class="secondl" href="'.site_url('Home/seekJobs/all').'"><i class="fa fa-random" aria-hidden="true"></i> '.$this->lang->line('AllJobs').'</a></li>';
					echo '<li><a class="secondl" href="'.site_url('Home/seekJobs/myJobs').'"><i class="fa fa-suitcase" aria-hidden="true"></i> '.$this->lang->line('MyJobs').'</a></li>';
				}								
				echo'</ul></li> ';
			}else{
				echo '<li ';
				if($page=="jobs_seeking_bd" || $page=="jobs_seeking_details") echo 'class="active"';
				echo '><a href="'.site_url('Home/seekJobs/all').'">'.$this->lang->line('FindJob').'</a></li>'; 
			}
		?>  			 		
		<li class="<?php if($page=="contact") echo "active";?>"> <a href="<?php echo site_url('Welcome/contact');?>"><?php echo $this->lang->line('Contact')?></a></li>
	</ul>
	<hr>
	<ul>
	<?php 
		if($_SESSION['connected']=="yes"){
			if($_SESSION['compte']=="employer"){
				echo '
				<li><a  class="" href="'.site_url('Home/index').'"><i class="fa fa-tachometer" aria-hidden="true"></i> '.$this->lang->line('Dashboard').'</a></li>
				<li><a class="" href="'.site_url('Home/profile').'"><i class="fa fa-id-card" aria-hidden="true"></i> '.$this->lang->line('Profil').'</a></li>
				<li><a class="" href="'.site_url('Home/jobs').'"><i class="fa fa-handshake-o" aria-hidden="true"></i> '.$this->lang->line('Jobs').'</a></li>
				<li><a class="" href="'.site_url('Home/compagny').'"><i class="fa fa-building" aria-hidden="true"></i> '.$this->lang->line('MyCompagny').'</a></li>';  	
			}else{
				echo '<li><a class="" href="'.site_url('Home/index').'"><i class="fa fa-tachometer" aria-hidden="true"></i> '.$this->lang->line('Dashboard').'</a></li>
				<li><a class="" href="'.site_url('Home/profile').'"><i class="fa fa-id-card" aria-hidden="true"></i> '.$this->lang->line('Profil').'</a></li>
				<li><a class="" href="'.site_url('Home/messages').'"><i class="fa fa-envelope" aria-hidden="true"></i> '.$this->lang->line('Messages').'</a></li>
				<li><a class="" href="'.site_url('Home/seekJobs/all').'"><i class="fa fa-random" aria-hidden="true"></i> '.$this->lang->line('FindJob').'</a></li>
				<li><a class="" href="'.site_url('Home/seekJobs/myJobs').'"><i class="fa fa-suitcase" aria-hidden="true"></i> '.$this->lang->line('MyJobs').'</a></li>
				<li><a class="" href="'.site_url('Home/resume').'"><i class="fa fa-sticky-note" aria-hidden="true"></i> '.$this->lang->line('MyResume').'</a></li>';
			}
			echo '<li><a class="" href="'.site_url("Welcome/signOut").'"><i class="fa fa-sign-out" aria-hidden="true"></i>'.$this->lang->line("SignOut").'</a></li>';  	
		}else{					
			echo '<li><a class="" id="sign-in" href="'.site_url("Welcome/SignIn").'">'.$this->lang->line("SignIn").'</a></li>'; 
			echo '<li><a class="" href="'.site_url("Welcome/signUp").'">'.$this->lang->line("SignUp").'</a></li>';						
		}
	?>
	</ul> 
	<hr>	
	<center><a style="padding:10px 25px;border:1px solid #fafafa;border-radius:4px;width:80%" href="javascript:void(0)" class="closebtn" onclick="openNav()"><?php echo $this->lang->line("Close")?></a></center>
</div>	
