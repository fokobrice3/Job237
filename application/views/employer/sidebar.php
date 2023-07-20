<!-- Sidebar Employer Section -->
<div id="Leftsec" class="col-md-2 col-sm-12">
	<h3><?php echo $this->lang->line('NavigationMenu') ?></h3>
	<hr>
	<ul class="nav">
		<li class="<?php if($page=="home") echo "active-onglet";?>">
			<a href="<?php echo site_url('Home/index');?>"><p><i class="fa fa-dashboard"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</p></a>
		</li> 
		<li class="<?php if($page=="profile") echo "active-onglet";?>">
			<a href="<?php echo site_url('Home/profile');?>"><p><i class="fa fa-id-card" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->lang->line("MyProfile")?></p></a>
		</li> 
		<?php /*<li class="<?php if($page=="messages") echo "active-onglet";?>">
			<a href="<?php echo site_url('Home/messages');?>"><p><i class="fa fa-envelope" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->lang->line("Messages")?></p></a>
		</li> */?>
		<li class="<?php if($page=="postjobs_db" || $page=="postjobs_add" || $page=="postjobs_edit") echo "active-onglet";?>">
			<a href="<?php echo site_url('Home/jobs');?>"><p><i class="fa fa-handshake-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $this->lang->line("Jobs")?></p></a>
		</li> 
		<li class="<?php if($page=="compagny") echo "active-onglet";?>">
			<a href="<?php echo site_url('Home/compagny');?>"><p><i class="fa fa-building" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->lang->line("MyCompagny")?></p></a>
		</li> 
		<li>
			<a href="<?php echo site_url('Welcome/signOut');?>"><p><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->lang->line("SignOut")?></p></a>
		</li> 
	</ul>
</div> 
