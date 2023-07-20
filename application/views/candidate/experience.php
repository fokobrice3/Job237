<!-- CV Candidat Section -->
<div id="Mainsec" class="col-md-10 col-sm-12">		
	<div class="Block container" style="margin:0;"> 
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h5  style="background:#2e0f3f;color:#fff">Curriculum vitae</h5>  							
				<div class="col-sm-12"><p class="title-job">EXPERIENCE</p></div> 				
				<div class="col-sm-12 container">	 	 
					<form action="<?php echo site_url('Resume/UpdateExperience/'.$experience->idExperience); ?>" method="POST" class="">
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-6 compagny-label" for="poste">Titre</label> 
								<input type="text" class="form-control" name="poste" id="poste" placeholder="" required value="<?php echo $experience->poste ?>">									
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-6 compagny-label" for="Company">Société</label> 
								<input type="text" class="form-control" name="company" id="company" placeholder="" required value="<?php echo $experience->company ?>">									
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-12 compagny-label" for="mois">Expérience(Mois)</label> 
								<input type="number" class="form-control" name="mois" min="1" max="360" id="mois" required placeholder="" value="<?php echo $experience->nbAnnee ?>">									
							</div>
						</div> 
						<div class="col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-2 compagny-label" for="job"><?php echo $this->lang->line('Job'); ?></label> 
								<select class="form-control" id="job" name="job">	
									<option value="" selected>Autre</option>
								<?php 
									foreach($list_job as $row){
										if($experience->idMetier==$row['idMetier']) $select="selected"; else $select="";
										if($_SESSION['site_lang']=="french") $nomType =$row['nom'];
										else $nomType =$row['name'];
										echo '<option value="'.$row['idMetier'].'" '.$select.'>'.$nomType.'</option>';
									}
								?>																	
								</select>
							</div>
						</div>
						<div class="col-md-12">
							<div class="form-group">
								<label for="profil compagny-label">Description</label> 
								<textarea value="" class="" rows="8" id="description" name="description" required placeholder="" value="<?php echo $experience->description ?>" > 
									<?php echo $experience->description ?>								
								</textarea> 
							</div>
						</div>
						<div class="col-sm-12">
							<br><input type="submit" name="submit-xp" value="Send"  class="btn btn-primary btn-outline info-outline btn-block" />				
						</div>								
					</form> 
				</div> 	
			</div>
		</div> 
	</div>
</div>    

<!-- EDITOR -->
<link href='<?php echo froala("css/froala_editor.css")?>' rel='stylesheet' type='text/css' />
<link href='<?php echo froala("css/froala_style.css")?>' rel='stylesheet' type='text/css' />   
<link href='<?php echo froala("css/themes/gray.css")?>' rel='stylesheet' type='text/css' />    
  
<link href='<?php echo froala("css/plugins/draggable.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/colors.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/emoticons.min.css")?>' rel='stylesheet' type='text/css' />   
<link href='<?php echo froala("css/plugins/line_breaker.min.css")?>' rel='stylesheet' type='text/css' />   
<link href='<?php echo froala("css/plugins/char_counter.min.css")?>' rel='stylesheet' type='text/css' />   
<link href='<?php echo froala("css/plugins/fullscreen.min.css")?>' rel='stylesheet' type='text/css' />   
<link href='<?php echo froala("css/plugins/help.min.css")?>' rel='stylesheet' type='text/css' />   
<link href='<?php echo froala("css/plugins/special_characters.min.css")?>' rel='stylesheet' type='text/css' />   
  
  
<script type="text/javascript" src="<?php echo froala("js/froala_editor.min.js"); ?>" ></script>

<script type="text/javascript" src="<?php echo froala("js/plugins/align.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/char_counter.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/code_beautifier.min.js"); ?>" ></script> 
<script type="text/javascript" src="<?php echo froala("js/plugins/colors.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/draggable.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/emoticons.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/entities.min.js"); ?>" ></script> 
<script type="text/javascript" src="<?php echo froala("js/plugins/font_size.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/fullscreen.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/font_family.min.js"); ?>" ></script> 
<script type="text/javascript" src="<?php echo froala("js/plugins/link.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/lists.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/paragraph_format.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/paragraph_style.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/quote.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/save.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/url.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/help.min.js"); ?>" ></script> 
<script type="text/javascript" src="<?php echo froala("js/plugins/special_characters.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/word_paste.min.js"); ?>" ></script>  
 
 <!-- UI -->
<link  href='<?php echo ui("jquery-ui.min.css")?>' rel='stylesheet' type='text/css' />
<script src="<?php echo ui('jquery-ui.min.js'); ?>"></script>   
<script> 
$(document).ready(function(){  
	$( "#mois" ).spinner();
	$('#description').froalaEditor({
		theme: 'gray',
		fontFamily: {
			"Roboto,sans-serif": 'Roboto',
			"Lato,sans-serif": 'Lato',
			"Bariol-Bold,sans-serif": 'Bariol-Bold',
			"Oswald,sans-serif": 'Oswald',
			"Montserrat,sans-serif": 'Montserrat',
			"'Open Sans Condensed',sans-serif": 'Open Sans Condensed'
		   },
		   fontFamilySelection: true,
		heightMin:100,
		heightMax:400,
		placeholderText:"<?php echo $this->lang->line('DescribeExperience');?>"
	});	
});	
</script>