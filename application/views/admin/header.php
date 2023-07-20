<div id="navMain">
	<center><img src="<?php echo img_url('logoGrayscale.png'); ?>" alt="Logo" class="logo"/></center>
	<h4>Rexcocam-FRANCE</h4>
	<a class="<?php if($page=="accueil") echo "active2"; ?>" href="<?php echo site_url('Welcome/index/accueil');?>" >Accueil</a>
	<a class="<?php if($page=="membres") echo "active2"; ?>" href="<?php echo site_url('Welcome/index/membres');?>" >Nos membres</a>
	<a class="<?php if($page=="valeurs") echo "active2"; ?>" href="<?php echo site_url('Welcome/index/valeurs');?>" >Nos valeurs</a>
	<a class="<?php if($page=="missions") echo "active2"; ?>" href="<?php echo site_url('Welcome/index/missions');?>" >Nos missions</a>
	<a class="<?php if($page=="atouts") echo "active2"; ?>" href="<?php echo site_url('Welcome/index/atouts');?>" >Vos atouts</a>
	<a class="<?php if($page=="reseau") echo "active2"; ?>" href="<?php echo site_url('Welcome/index/reseau');?>" >Notre réseau</a>
	<a class="<?php if($page=="contact") echo "active2"; ?>" href="<?php echo site_url('Welcome/index/contact');?>" >Contactez-nous</a>	
</div>	
<header>
    <div class="preHeader">
	     <div class="linkContainer">
			<p id="slogan" style="">
				Réseau des Experts-comptables et des Commissaires aux comptes d’origine Camerounaise
			</p>
			<p id="adress" style="">
				<a href="<?php echo site_url('Welcome/index/contact');?>"><i class="fa fa-envelope" aria-hidden="true"></i>contact@rexcocam-france.fr</a></p>			
          <!-- <ul>		
				<li>
					<a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> contact@rexcocam-france.fr</a>
				</li>
			</ul>-->
        </div>
    </div>	
	<div class="header" style="">	
		<div class="row" style="position:absolute;width:100vw;">
			<div class="col-md-1 col-sm-2" style="position:absolute;margin-left:20px;"><img src="<?php echo img_url('logo.png'); ?>" alt="Logo" class="logo"/></div>	
			<div id="main" class="col-md-12 col-sm-12" style="margin-left:14%;top:15px;">
				<a class="link <?php if($page=="accueil") echo "active"; ?>" href="<?php echo site_url('Welcome/index/accueil');?>" >Accueil</a>
				<a class="link <?php if($page=="membres") echo "active"; ?>" href="<?php echo site_url('Welcome/index/membres');?>" >Nos membres</a>
				<a class="link <?php if($page=="valeurs") echo "active"; ?>" href="<?php echo site_url('Welcome/index/valeurs');?>" >Nos valeurs</a>
				<a class="link <?php if($page=="missions") echo "active"; ?>" href="<?php echo site_url('Welcome/index/missions');?>" >Nos missions</a>
				<a class="link <?php if($page=="atouts") echo "active"; ?>" href="<?php echo site_url('Welcome/index/atouts');?>" >Vos atouts</a>
				<a class="link <?php if($page=="reseau") echo "active"; ?>" href="<?php echo site_url('Welcome/index/reseau');?>" >Notre réseau</a>
				<a class="link <?php if($page=="contact") echo "active"; ?>" href="<?php echo site_url('Welcome/index/contact');?>" >Contactez-nous</a>
			</div>
			<div id="main2" class="col-md-6 col-sm-6" style="margin-left:25%;top:35px;">
				<a href="javascript:void(0);" class="link btn btn-block btn-lg" onclick="openNav()">
					<i class="fa fa-bars"></i> Menu
				</a>
			</div>
			<div class="col-md-1 col-sm-2" style="position:absolute;top:8px;left:90vw;float:right;margin-right:100px;">
				<img src="<?php echo img_url('flag-crm.png'); ?>" alt="LogoCam" class="logoCam" style="position:relative;left:-50px;"/>
				<p style="color:#ff7800;font-weight:bold;display:block;width:250px;text-align:center;font-size:0.8em;top:-5px;position:relative;left:-140px;">Au service de l’entrepreneuriat au Cameroun !</p>
			</div>
		</div> 
	</div>
</header> 
<script>
var _state=0;
function openNav() {
    if(_state==0){
		_state=1;
		document.getElementById("navMain").style.width = "300px";
		document.getElementById("mainBlock").style.marginLeft = "300px";
	}else{
		_state=0;
		document.getElementById("navMain").style.width = "0";
		document.getElementById("mainBlock").style.marginLeft= "0"; 
	} 
}
</script>