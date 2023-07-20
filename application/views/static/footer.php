<footer>
	<!-- Footer Section -->
	<section  id="footer_banner"> 
		<div class="row" >					
			<div class="col-md-4 col-sm-12">
				<div class="col-md-12 col-sm-12">
					<h5 class="footer_title"><?php echo $this->lang->line('QuickLinks'); ?></h5>
					<div class="box_footer">
						<ul class="quicklinks">
							<li class="listFooter"><a href="<?php echo site_url('Welcome/index')?>"><?php echo $this->lang->line('Home'); ?></a></li>
							<li class="listFooter"><a href="<?php echo site_url('Welcome/formation')?>"><?php echo $this->lang->line('Formation'); ?></a></li>
							<li class="listFooter"><a href="<?php echo site_url('Welcome/index#ContactMainSection')?>"><?php echo $this->lang->line('Contact'); ?></a></li>
							<li class="listFooter"><a href="<?php echo site_url('Welcome/SignIn')?>"><?php echo $this->lang->line('PostJob'); ?></a></li>
							<li class="listFooter"><a href="<?php echo site_url('Home/seekJobs/all')?>"><?php echo $this->lang->line('SeekJob'); ?></a></li>
							<li class="listFooter"><a href="<?php echo site_url('Welcome/index#FAQSection')?>"><?php echo $this->lang->line('FAQ'); ?></a></li>
						</ul>
					</div>	
				</div>
				<div class="col-md-12 col-sm-12">
					<br><br><h5 class="footer_title"><?php echo $this->lang->line('AboutUs'); ?></h5>
					<div class="box_footer">
						<p class="text2"><?php echo $this->lang->line('AboutMsg'); ?><p> 
					</div>
				</div>
			</div>		
			<div class="col-md-4 col-sm-12">
				<h5 class="footer_title"><?php echo $this->lang->line('JobsByCategory'); ?></h5>
				<div class="box_footer">
					<ul class="quicklinks">
					<?php						
						foreach($listCat as $cat){
							if($_SESSION["site_lang"]=="french") $nom = $cat["nom"];
							else $nom = $cat["name"];
							echo '<li class="listFooter"><a href="'.site_url("Home/seekJobs/cat/".$cat["idMetier"]).'">'.$nom.'</a></li>';
						}
					?>						
					</ul>
				</div>
			</div>		
			<div class="col-md-4 col-sm-12"> 				
				<h5 class="footer_title"><?php echo $this->lang->line('Contact'); ?></h5>
				<div class="box_footer">
					<p class="text2" style="line-height:2em;"><em> 
					CEO Group SARL au capital de 1.000 000 F CFA<br>    
					RCCM : RC/YAO/2019/B/54 <br>
					<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;BP : 14 832 siège, social Yaoundé-Nsam (à côté de Vision 4)<br> 
					<i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('Tel'); ?> : (237) 655 090 713 - 650 634 273<br> 
					<i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;<?php echo $this->lang->line('Email'); ?> : info@ceo-group.com<br>
					Site internet : www.CEO-Group.com</em>	      
					</p> 		
					<div class="col-md-12"><br>
						<ul class="link_icon">
							<li><a href="https://www.facebook.com/ceogroupsarl/">
								<img alt="facebook" src="<?php echo img_url('icon/if_facebook_2308066.png'); ?>"></a></li> 
							<li><a href="https://www.instagram.com/ceogroupsarl5/">
								<img alt="instagram" src="<?php echo img_url('icon/if_instagram_2141634.png'); ?>"></a></li> 
							<li><a href="https://www.linkedin.com/company/ceo-group-sarl">
								<img alt="linkedin" src="<?php echo img_url('icon/if_linkedin_2141633.png'); ?>"></a></li> 
						</ul>
					</div>
					<div style="padding:10px;" class="col-md-12">
						<center><img style="max-width:300px" src="<?php echo img_url("ceo5.png");?>" alt="hero-image" class="img-responsive"></center>
					</div>
				</div>
			</div> 
		</div>
	</section>
  
  <!-- Copyrights Section -->
  <div class="copyright">
	<img alt="logo" class="footLogo" src="<?php echo img_url('logof.png'); ?>"> 
		<?php echo $this->lang->line('AllRightReserved').' 2018 | '.$this->lang->line('ProudlyPoweredBy').'<strong> Newbase Technologies</strong>'; ?>
	<img alt="logo" class="footLogo" src="<?php echo img_url('logof.png'); ?>"> 
  </div>
</footer>

<style>
a[href="https://elfsight.com/whatsapp-chat-widget/?utm_source=websites&utm_medium=clients&utm_content=whatsapp-chat&utm_term=ceo-group.com&utm_campaign=free-widget"] {
    display: none!important;
}
</style>
<script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div style="position: fixed;" class="elfsight-app-3e832777-0dde-4513-9e33-9c09356db1df"></div>