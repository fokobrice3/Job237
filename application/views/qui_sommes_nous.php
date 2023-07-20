<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html >
	<?php include('static/head.php'); ?>
	<body id="mainBlock" data-spy="scroll" data-target=".navbar" data-offset="50">
		<?php
			require_once('static/header.php');    
			//require_once('static/breadcumb.php');     
		?>
		<!-- WWA Section -->
		<section id="WWASection"> 
			<div style="max-width:1600px" class="container"> 						
				<div class="row">
					<h1><center><?php echo $this->lang->line('WWA')?> </center></h1>
					<div class="col-md-4 col-sm-12">
						<center><img style="position:relative;margin:auto;max-width:360px" class="" src="<?php echo img_url("ceo5.png");?>" alt="ceo group sarl"></center> <!-- class="ceo_logo" -->
					</div>
					<div class="col-md-8 col-sm-12">
						<p class="lead text-justify" style="color:#262c42;font-family:Roboto;font-weight:100;font-size:1em;"><?php echo $this->lang->line('AboutMsgQSN')?></p>
						<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:1em;"><?php echo $this->lang->line('AboutTeam')?></p><br><br>
					</div>	 
					<div class="col-sm-12">
						<i style="display:inline-block;color:#a8d815;font-size:24px;line-height:1;margin-right:10px;" class="fa fa-check-circle" aria-hidden="true"></i>
						<h3 style="font-family:lato;display:inline-block;font-size:1em;line-height:2.4rem;color:#262c42;text-transform:uppercase"><?php echo $this->lang->line('OurMission')?></h3>
						<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:1em;"><?php echo $this->lang->line('OurMissionMsg')?></p>
					</div> 
					<div class="col-sm-12">
						<i style="display:inline-block;color:#a8d815;font-size:24px;line-height:1;margin-right:10px;" class="fa fa-check-circle" aria-hidden="true"></i>
						<h3 style="font-family:lato;display:inline-block;font-size:1em;line-height:2.4rem;color:#262c42;text-transform:uppercase"><?php echo $this->lang->line('OurVision')?></h3> 
						<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:1em;"><?php echo $this->lang->line('OurVisionMsg')?></p> 
					</div> 
					<div class="col-sm-12">
						<i style="display:inline-block;color:#a8d815;font-size:24px;line-height:1;margin-right:10px;" class="fa fa-check-circle" aria-hidden="true"></i>
						<h3 style="font-family:lato;display:inline-block;font-size:1em;line-height:2.4rem;color:#262c42;text-transform:uppercase"><?php echo $this->lang->line('OurGoal')?></h3>  
						<?php echo $this->lang->line('OurGoalMsg')?><br><br>
					</div>
				</div> 			 
				<div class="container-fluid">
					<br><br><br>
					<h1 style="text-align:center"><?php echo $this->lang->line('OurServices')?></h1> 					
					<div class="col-sm-12">
						<p class="lead" style="text-align:center;color:#777;font-family:Roboto;font-weight:100;font-size:1em;"><?php echo $this->lang->line('AboutMsg')?></p>
						<div class="row servicesList">	
						<?php 
						echo '<div class="col-sm-12">';
						if(count($list_service_pole) > 0){	
							$titrePolePrec="";							
							foreach ($list_service_pole as $row){ 
								if($langue=="french") { 
									$titrePole=$row['titreFR']; 
									$titreService=$row['titFR']; 
									$description=$row['descFR'];
								}else{ 
									$titrePole=$row['titreENG'];
									$titreService=$row['titENG'];  
									$description=$row['descENG'];
								}
								if($titrePolePrec != $titrePole){
									echo '<br><br><i style="display:inline-block;color:#6747c7;font-size:24px;line-height:1;margin-right:10px;" class="fa fa-check-circle" aria-hidden="true"></i>
									<h3 style="font-family:lato;display:inline-block;font-size:1em;line-height:2.4rem;color:#6747c7;text-transform:uppercase">'.$titrePole.'</h3><br>';
								}			
								echo'<div class="container" style="padding:15px 0 0 50px">';
								echo '<p style="line-height:1.5em;font-family:lato;padding:5px">
											<i style="display:inline-block;color:#168de9;font-size:24px;line-height:1;margin-right:10px;" class="fa fa-hand-o-right" aria-hidden="true"></i> 
											<span style="font-family:Lato;font-size:0.9em;color:#168de9;text-transform:uppercase;font-weight:400;">'.$titreService.' : </span> 
											<span class="lead" style="text-align:justify;font-size:0.95em;font-family:Roboto;font-weight:100;">'.$description.'</span></p>'; 
								echo'</div>';	
								$titrePolePrec = $titrePole;																						
							}  
						}						
						echo'</div>';
							/*												
							<div class="card col-sm-12 col-md-3">
								<p class="lead text-left" style="color:#262c42;font-family:Roboto;font-weight:400;font-size:1em;"><?php echo $this->lang->line('Placement')?></p>
								<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:0.9em;"><?php echo $this->lang->line('PlacementMsg')?></p><br>
							</div>
							<div class="col-md-1 col-sm-0"></div>
							<div class="card col-sm-12 col-md-3">
								<p class="lead text-left" style="color:#262c42;font-family:Roboto;font-weight:400;font-size:1em;"><?php echo $this->lang->line('Recrutement')?></p>
								<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:0.9em;"><?php echo $this->lang->line('RecrutementMsg')?></p><br>
							</div>
							<div class="col-md-1 col-sm-0"></div>
							<div  class="card col-sm-12 col-md-3">
								<p class="lead text-left" style="color:#262c42;font-family:Roboto;font-weight:400;font-size:1em;"><?php echo $this->lang->line('Formation')?></p>
								<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:0.9em;"><?php echo $this->lang->line('FormationMsg')?></p><br>
							</div>
							<div class="col-md-1 col-sm-0"></div>
							<div class="card col-sm-12 col-md-3">
								<p class="lead text-left" style="color:#262c42;font-family:Roboto;font-weight:400;font-size:1em;"><?php echo $this->lang->line('CO_RH')?></p>
								<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:0.9em;"><?php echo $this->lang->line('CO_RHMsg')?></p><br>
							</div>
							<div class="col-md-1 col-sm-0"></div>
							<div class="card col-sm-12 col-md-3">
								<p class="lead text-left" style="color:#262c42;font-family:Roboto;font-weight:400;font-size:1em;"><?php echo $this->lang->line('AdminPerso')?></p>
								<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:0.9em;"><?php echo $this->lang->line('AdminPersoMsg')?></p><br>
							</div>
							<div class="col-md-1 col-sm-0"></div>
							<div  class="card col-sm-12 col-md-3">
								<p class="lead text-left" style="color:#262c42;font-family:Roboto;font-weight:400;font-size:1em;"><?php echo $this->lang->line('RSE')?></p>
								<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:0.9em;"><?php echo $this->lang->line('RSEMsg')?></p><br>
							</div>
							<div class="col-md-1 col-sm-0"></div>
							<div class="card col-sm-12 col-md-3">
								<p class="lead text-left" style="color:#262c42;font-family:Roboto;font-weight:400;font-size:1em;"><?php echo $this->lang->line('GestionPaie')?></p>
								<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:0.9em;"><?php echo $this->lang->line('GestionPaieMsg')?></p><br>
							</div>
							<div class="col-md-1 col-sm-0"></div>
							<div class="card col-sm-12 col-md-3">
								<p class="lead text-left" style="color:#262c42;font-family:Roboto;font-weight:400;font-size:1em;"><?php echo $this->lang->line('BilanComp')?></p>
								<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:0.9em;"><?php echo $this->lang->line('BilanCompMsg')?></p><br>
							</div> 
							<div class="col-md-1 col-sm-0"></div>
							<div class="card col-sm-12 col-md-3">
								<p class="lead text-left" style="color:#262c42;font-family:Roboto;font-weight:400;font-size:1em;"><?php echo $this->lang->line('AnaStats')?></p>
								<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:0.9em;"><?php echo $this->lang->line('AnaStatsMsg')?></p><br>
							</div>
							<div class="col-md-1 col-sm-0"></div>
							<div class="card col-sm-12 col-md-3">
								<p class="lead text-left" style="color:#262c42;font-family:Roboto;font-weight:400;font-size:1em;"><?php echo $this->lang->line('Coaching')?></p>
								<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:0.9em;"><?php echo $this->lang->line('CoachingMsg')?></p><br>
							</div>
							<div class="col-md-1 col-sm-0"></div>
							<div  class="card col-sm-12 col-md-3">
								<p class="lead text-left" style="color:#262c42;font-family:Roboto;font-weight:400;font-size:1em;"><?php echo $this->lang->line('SIRH')?></p>
								<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:0.9em;"><?php echo $this->lang->line('SIRHMsg')?></p><br>
							</div> 
							<div class="col-md-1 col-sm-0"></div>
							<div  class="card col-sm-12 col-md-3">
								<p class="lead text-left" style="color:#262c42;font-family:Roboto;font-weight:400;font-size:1em;"><?php echo $this->lang->line('GestionCarr')?></p>
								<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:0.9em;"><?php echo $this->lang->line('GestionCarrMsg')?></p><br>
							</div>
							*/?>
						</div>
						<br><br><br><br>
					</div>	
				</div> 
				<div class="row">
					<br><br><br>
					<h1 style="text-align:center"><?php echo $this->lang->line('OurValor')?></h1> 					
					<div class="col-sm-12">
						<div class="row">
							<div class="col-md-1 col-sm-0"></div>
							<div class="col-md-2 col-sm-4">							
							<?php 
								if($langue=="french") echo '<img class="serviceImg" src="'.img_url("valeur/confiance.png").'" alt="" title="">';
								else echo '<img class="serviceImg" src="'.img_url("valeur/confiance2.png").'" alt="" title="">';
							?>
							</div>
							<div class="col-md-2 col-sm-4">
							<?php 
								if($langue=="french") echo '<img class="serviceImg" src="'.img_url("valeur/confidentialite.png").'" alt="" title="">';
								else echo '<img class="serviceImg" src="'.img_url("valeur/confidentialite2.png").'" alt="" title="">';
							?>
							</div>
							<div class="col-md-2 col-sm-4">
							<?php 
								if($langue=="french") echo '<img class="serviceImg" src="'.img_url("valeur/integrite.png").'" alt="" title="">';
								else echo '<img class="serviceImg" src="'.img_url("valeur/integrite2.png").'" alt="" title="">';
							?>
							</div>
							<div class="col-md-2 col-sm-4">
							<?php 
								if($langue=="french") echo '<img class="serviceImg" src="'.img_url("valeur/engagement.png").'" alt="" title="">';
								else echo '<img class="serviceImg" src="'.img_url("valeur/engagement2.png").'" alt="" title="">';
							?>
							</div>
							<div class="col-md-2 col-sm-4">
							<?php 
								if($langue=="french") echo '<img class="serviceImg" src="'.img_url("valeur/innovation_originalite.png").'" alt="" title="">';
								else echo '<img class="serviceImg" src="'.img_url("valeur/innovation_originalite.png").'" alt="" title="">';
							?>
							</div> 
						</div>
						<br><br><br><br><br>
						<div class="row chefWord">
							<?php 
								if($langue=="french"){
									echo '<h4 style="font-size:1.5em;font-weight:600;color:#dd5347;font-family:bariol-bold;line-height:2em;">Mot du Chief Executive officer</h4>';
									echo '<p class="lead" style="text-indent:24px;font-style:italic;color:#777;font-family:Roboto;font-weight:100;font-size:1em;text-align:justify">
											Chers partenaires,</p>';
									echo '<p class="lead" style="text-indent:24px;font-style:italic;color:#777;font-family:Roboto;font-weight:100;font-size:1em;text-align:justify">
											Après plusieurs années d’expérience j’ai fait plusieurs constats :</p>';
									echo '									
										<ul>
											<li>Les entreprises disparaissent à une vitesse fort curieuse ; </li>
											<li>L’expertise RH parait inaccessible et réservée à certaine catégorie d’entreprises et par conséquent, seules celles-ci parviennent à relever les défis de la performance et de la compétitivité ; </li>
											<li>Plusieurs activités opérationnelles sans véritable plus-value, vu le temps qu’elles nécessitent, étouffent énormément la dimension stratégique des RH et empiétant ainsi sur le rendement de l’entreprise ; </li>
											<li>L’absence d’information entre les employeurs et les compétences disponibles est la conséquence immédiate du sous-emploi, voire du chômage au Cameroun ; </li>
											<li>Les difficultés d’harmonisation des stratégies inter-directions sont légions dans pratiquement toutes les entreprises. </li>
										</ul>';
									echo "<p class='lead' style='text-indent:24px;font-style:italic;color:#666;font-family:Roboto;font-weight:100;font-size:1em;text-align:justify'>
											Cette réalité des choses a développé en moi l’envie de participer activement au développement de notre continent, en apportant une touche 
											originale et en créant de la valeur. En effet ceci a révélé mon ambition d’accompagner les entreprises dans l’élaboration de leurs
											stratégies. Et pour cela, je me suis donné les moyens, en me qualifiant au travers des grandes écoles de renommées internationales et 
											d’une expérience unique et, en m’entourant d’une équipe ambitieuse, dynamique et motivée.
										</p>";
									echo "<p class='lead' style='text-indent:24px;font-style:italic;color:#666;font-family:Roboto;font-weight:100;font-size:1em;text-align:justify'>
											Aujourd’hui, pour chaque entreprise, rêver et être compétitif devient un droit et une évidence ; car désormais, l’expertise jadis ‘’mystifier’’ est disponible
											pour tous. Et nous nous positionnons comme votre stratège d’aujourd’hui et de demain pour vous accompagner. Nos valeurs nous précèdent, et nous nous évertuerons 
											à vous apporter satisfaction. 
										</p>";
									echo '<p class="lead" style="text-indent:24px;font-style:italic;color:#666;font-family:Roboto;font-weight:300;font-size:1em;text-align:justify">
										Merci de votre confiance.</p>';									
									echo '<p class="lead" style="float:right;color:#7698e6;text-indent:24px;font-style:italic;font-family:Roboto;font-weight:400;font-size:1em;text-align:justify">
										Nadine NDJOCK</p>';										
								}else{
									echo '<h4 style="font-size:1.5em;font-weight:600;color:#dd5347;font-family:bariol-bold;line-height:2em;">A word from the Chief Executive Officer </h4>';
									echo '<p class="lead" style="text-indent:24px;font-style:italic;color:#777;font-family:Roboto;font-weight:100;font-size:1em;text-align:justify">
											Dear partners, </p>';
									echo '<p class="lead" style="text-indent:24px;font-style:italic;color:#777;font-family:Roboto;font-weight:100;font-size:1em;text-align:justify">
											After several years of experience, I have made several observations: </p>';
									echo '									
										<ul>
											<li>Companies are disappearing at a very curious rate; </li>
											<li>HR expertise seems inaccessible and reserved for certain categories of companies and consequently, only they can meet the challenges of performance and competitiveness; </li>
											<li>Several operational activities without real added value, given the time they require, greatly stifle the strategic dimension of HR and thus encroach on the company\'s performance; </li>
											<li>The lack of information between employers and available skills is the immediate consequence of underemployment or even unemployment in Cameroon;  </li>
											<li>Difficulties in harmonising inter-directorate strategies are common in almost all companies. </li>
										</ul>';
									echo "<p class='lead' style='text-indent:24px;font-style:italic;color:#666;font-family:Roboto;font-weight:100;font-size:1em;text-align:justify'>
											This reality has developed in me the desire to actively participate in the development of our continent, bringing an original touch and creating value. Indeed, 
											this revealed my ambition to support companies in the development of their strategies. And for that, I have given myself the means, by qualifying through the
											major international renowned schools and a unique experience and by surrounding myself with an ambitious, dynamic and motivated team. 
										</p>";
									echo "<p class='lead' style='text-indent:24px;font-style:italic;color:#666;font-family:Roboto;font-weight:100;font-size:1em;text-align:justify'>
											Today, for every company, dreaming and being competitive becomes a right and an obvious thing; because from now on, the expertise
											formerly known as \"mystifying\" is available to everyone. And we position ourselves as your strategist of today and tomorrow 
											to support you. Our values precede us, and we will do our best to satisfy you. 
										</p>";
									echo '<p class="lead" style="text-indent:24px;font-style:italic;color:#666;font-family:Roboto;font-weight:300;font-size:1em;text-align:justify">
										Thank you for your confidence. </p>';									
									echo '<p class="lead" style="float:right;color:#7698e6;text-indent:24px;font-style:italic;font-family:Roboto;font-weight:400;font-size:1em;text-align:justify">
										Nadine NDJOCK</p>';	
								}  
							?> 
						</div>
						<div class="row">
							<div class="col-sm-12">
								<i style="display:inline-block;color:#a8d815;font-size:24px;line-height:1;margin-right:10px;" class="fa fa-check-circle" aria-hidden="true"></i>
								<h3 style="font-family:lato;display:inline-block;font-size:1em;line-height:2.4rem;color:#262c42;text-transform:uppercase"><?php echo $this->lang->line('OurAddedValue')?></h3>
								<p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:1em;"><?php echo $this->lang->line('OurAddedValueMSG')?></p>
							</div>
						</div>
					</div>	
				</div>  
			</div>
		</section> 
		<?php  
			require_once('static/partners-fliph.php');  		
			require_once('static/footer.php');
		?> 
		<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();   
		});
		</script>
	</body>
</html>