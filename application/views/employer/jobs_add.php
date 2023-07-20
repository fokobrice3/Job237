<!-- Dashboard Employer Section -->
<div id="Mainsec" class="col-md-10 col-sm-12">		
	<div class="Block"> 
		<form action="<?php echo site_url('Offer/addOffer'); ?>" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12 col-sm-12">		
					<h5 style="background:#00abe6;"><?php echo $this->lang->line('PostJob')?></h5> 
					<div class="col-md-12 col-sm-12 Block-jobs">	 
						<div class="col-sm-12"><p class="title-job">Identification du poste</p></div>
						<div class="col-md-8 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="email"><?php echo $this->lang->line('JobName')?><b>*</b></label>
								<input type="text" class="form-control" name="nom" id="nom" placeholder="<?php echo $this->lang->line('EnterName')?>" value="<?php echo set_value('nom'); ?>">
								<div class="col-sm-12"><?php echo form_error('nom'); ?></div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="metier">Métier <b>*</b></label>
								<select class="form-control" id="metier" name="metier">
									<option disabled selected value="">Select Metier</option>
									<?php 
									foreach($list_metier as $row){									 
										if($langue=="french") echo '<option value="'.$row['code'].'" '.$select.'>'.$row['nom'].'</option>';
										else echo '<option value="'.$row['code'].'" '.$select.'>'.$row['name'].'</option>';
									}		
									?>									 
								</select>
								<div class="col-sm-12"><?php echo form_error('metier'); ?></div>
							</div>
						</div>	
						<div class="col-sm-12"><br><p class="title-job">Détails de l'offre</p></div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="ctype"><?php echo $this->lang->line('ContratType')?><b>*</b></label>
								<select class="form-control" id="ctype" name="ctype">  
									<option selected value="CDD">CDD</option>
									<option value="CDI">CDI</option> 
								</select>
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="duree"><?php echo $this->lang->line('Duration')?><b>*</b></label> 
								<input id="duree" name="duree" class="form-control" min="1" max="180" value="<?php echo set_value('duree'); ?>" type="number">
								<div class="col-sm-12"><?php echo form_error('duree'); ?></div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="reference">Reference</label>
								<input id="reference" name="reference" class="form-control" value="" type="text" readonly>	 							
							</div>
						</div> 
						<div class="col-sm-12"></div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="nbPoste"><?php echo $this->lang->line('PostNumber')?><b>*</b></label> 
								<select class="form-control" id="nbPoste" name="nbPoste">
									<?php for($i=1;$i<=100;$i=$i+1) echo '<option value="'.$i.'">'.$i.'</option>'; ?>
								</select> 
							</div>
						</div>						
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="datePub"><?php echo $this->lang->line('Start')?><b>*</b></label>
								<input id="datePub" name="datePub" class="form-control" value="<?php echo set_value('datePub'); ?>" type="" >
								<div class="col-sm-12"><?php echo form_error('datePub'); ?></div>
							</div>
						</div>	
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="dateFin"><?php echo $this->lang->line('Expiration')?><b>*</b></label>
								<input id="dateFin" name="dateFin" class="form-control" value="<?php echo set_value('dateFin'); ?>" type="" >
								<div class="col-sm-12"><?php echo form_error('dateFin'); ?></div>
							</div>
						</div>
						<div class="col-sm-12"></div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="pays"><?php echo $this->lang->line('Country')?><b>*</b></label>
								<select class="form-control" name="pays" id="pays">
									<option <?php if($idPays) echo "selected" ?> disabled value="">Select Country</option>
									<?php						
									foreach ($list_pays as $row){
										if($idPays==$row['idPays']) $select='selected'; else $select='';
										if($langue=="french") echo '<option value="'.$row['idPays'].'" '.$select.'>'.$row['nom'].'</option>';
										else echo '<option value="'.$row['idPays'].'" '.$select.'>'.$row['name'].'</option>';															
									}  
									?>			
								</select> 
								<div class="col-sm-12"><?php echo form_error('pays'); ?></div>
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="region"><?php echo $this->lang->line('State')?><b>*</b></label>
								<select class="form-control" name="region" id="region">
									<option <?php if($idRegion) echo "selected" ?> disabled value="">Select State</option>
									<?php 
									if($idPays!=null){
										foreach ($list_region as $row){
											if($idRegion==$row['idRegion']) $select='selected';else $select='';
											if($langue=="french") echo '<option value="'.$row['idRegion'].'" '.$select.'>'.$row['nom'].'</option>';
											else echo '<option value="'.$row['idRegion'].'" '.$select.'>'.$row['name'].'</option>';															
										}
									}
									?>
								</select>
								<div class="col-sm-12"><?php echo form_error('region'); ?></div>
							</div>
						</div>	
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="ville"><?php echo $this->lang->line('City')?><b>*</b></label> 
								<select class="form-control" name="ville" id="ville">
									<option  <?php if($idVille) echo "selected" ?> disabled value="">Select City</option>
									<?php 
									if($idVille!=null){
										foreach ($list_ville as $row){
											if($idVille==$row['idVille']) $select='selected';else $select='';
											echo '<option value="'.$row['idVille'].'" '.$select.'>'.$row['nom'].'</option>'; 													
										}
									} 
									?>
								</select>
								<div class="col-sm-12"><?php echo form_error('ville'); ?></div>
							</div>
						</div>	
						<div class="col-md-12">
							<div class="form-group">
								<label for="comment" class="control-label compagny-label">Resumé de l'offre - Tâches à éffectuer - Mission - etc...</label>								
								<textarea  value="<?php echo set_value('comment'); ?>" class="" rows="8" id="edit" name="comment" placeholder="" >  
								<?php echo set_value('comment'); ?>
								</textarea>
							</div><div class="col-sm-12"><?php echo form_error('comment'); ?></div>
						</div>
						<div class="col-sm-12"><br><p class="title-job">Type de profil recherché</p></div>
						<div class="col-md-3 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="niveau_etude">Niveau Etude</label>
								<select class="form-control" id="niveau_etude" name="niveau_etude">									
									<option value="">/</option>
								<?php foreach($list_degree as $row) echo '<option value="'.$row['idNiveauEtude'].'">'.$row['nom'].'</option>';	?>	
								</select>
							</div>
						</div>
						<div class="col-md-3 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="type_education">Domaine d'étude des candidats</label>
								<select class="form-control" id="type_education" name="type_education">									
									<option selected disabled value="">/</option>
									<?php foreach($list_type_degree as $row){
										if($langue=="french") $nom = $row['nom']; else $nom=$row['name'];
										echo '<option value="'.$row['idTypeEducation'].'">'.$nom.'</option>';
										} 
									?>	
								</select>
							</div>
						</div>
						<div class="col-md-3 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="specialite">Spécialité<b>*</b></label>
								<select class="form-control" id="specialite" name="specialite">	
									<option value="">/</option>
									<?php 
									foreach($list_secteur as $row){									
										if($row['idSecteur']==$secteurID) $select='selected'; else $select='';
										if($langue=="french") echo '<option value="'.$row['idSecteur'].'" '.$select.'>'.$row['libelle'].'</option>';
										else echo '<option value="'.$row['idSecteur'].'" '.$select.'>'.$row['name'].'</option>';
									}		
									?>								
								</select>
							</div>
						</div>						
						<div class="col-md-3 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="experience"><?php echo $this->lang->line('Experience')?></label>
								<select class="form-control" id="experience" name="experience">									
									<option value="">/</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
									<option value="7">7</option>
									<option value="8">8+</option>
								</select>
							</div>
						</div>						
						<div class="col-md-3 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="motivationLetter">Lettre de motivation obligatoire ?</label><br>
								<div class="col-md-4 col-sm-6 radioType">
									<input type="radio" id="control_03" name="motivationLetter" value="1"> 
									<label for="control_03"> 
										<p><?php echo $this->lang->line('Yes')?></p>
									</label>
								</div>
								<div class="col-md-4 col-sm-6 radioType">
									<input type="radio" id="control_04" name="motivationLetter" value="0" checked> 
									<label for="control_04"> 
										<p><?php echo $this->lang->line('No')?></p>
									</label>
								</div> 
							</div> 
						</div>			
						<div class="col-md-3 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="freelance">Freelance?</label><br>
								<div class="col-md-4 col-sm-6 radioType">
									<input type="radio" id="control_01" name="freelance" value="1" checked> 
									<label for="control_01"> 
										<p><?php echo $this->lang->line('Yes')?></p>
									</label>
								</div>
								<div class="col-md-4 col-sm-6 radioType">
									<input type="radio" id="control_02" name="freelance" value="0"> 
									<label for="control_02"> 
										<p><?php echo $this->lang->line('No')?></p>
									</label>
								</div> 
							</div> 
						</div>		
						<div class="col-md-12 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="skills">Différentes compétences attendues</label>
								<input type="text" name="skills" id="skills" style="display:none;">
								<span class="autocomplete-select"></span>								
							</div>
						</div>						
						<div class="col-md-12">
							<div class="form-group">
								<label for="profil compagny-label">Détails du profil : savoir faire, savoir être, pièces jointes, autres...</label> 
								<textarea value="<?php echo set_value('profil'); ?>" class="" rows="8" id="edit2" name="profil" placeholder="" >  
								<?php echo set_value('profil'); ?>
								</textarea>
							</div><div class="col-sm-12"><?php echo form_error('profil'); ?></div>
						</div>
						<div class="col-md-12 col-sm-12">
							<br><br>
							<input type="submit" class="btn-outline info-outline btn-block btn btn-primary btn-lg" value="Send Job"/>
						</div>
					</div> 
				</div> 
			</div>
		</form>
	</div>  
</div> 
<style>  
.select-pure__select {
	align-items: center;
	background: #f9f9f8;
	border-radius: 4px;
	border: 1px solid rgba(0, 0, 0, 0.15);
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
	box-sizing: border-box;
	color: #363b3e;
	cursor: pointer;
	display: flex;
	font-size: 16px;
	font-weight: 500;
	justify-content: left;
	min-height: 44px;
	padding: 5px 10px;
	position: relative;
	transition: 0.2s;
	width: 100%;
}
.select-pure__options {
	border-radius: 4px;
	border: 1px solid rgba(0, 0, 0, 0.15);
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
	box-sizing: border-box;
	color: #363b3e;
	display: none;
	left: 0;
	max-height: 221px;
	overflow-y: scroll;
	position: absolute;
	top: 50px;
	width: 100%;
	z-index: 5;
}
.select-pure__select--opened .select-pure__options {
	display: block;
}
.select-pure__option {
	background: #fff;
	border-bottom: 1px solid #e4e4e4;
	box-sizing: border-box;
	height: 44px;
	line-height: 25px;
	padding: 10px;
}
.select-pure__option--selected {
	color: #e4e4e4;
	cursor: initial;
	pointer-events: none;
}
.select-pure__option--hidden {
	display: none;
}
.select-pure__selected-label {
	background: #5e6264;
	border-radius: 4px;
	color: #fff;
	cursor: initial;
	display: inline-block;
	margin: 5px 10px 5px 0;
	padding: 3px 7px;
}
.select-pure__selected-label:last-of-type {
	margin-right: 0;
}
.select-pure__selected-label i {
cursor: pointer;
display: inline-block;
margin-left: 7px;
}
.select-pure__selected-label i:hover {
	color: #e4e4e4;
}
.select-pure__autocomplete {
	background: #f9f9f8;
	border-bottom: 1px solid #e4e4e4;
	border-left: none;
	border-right: none;
	border-top: none;
	box-sizing: border-box;
	font-size: 16px;
	outline: none;
	padding: 10px;
	width: 100%;
}   
</style>
<!-- MULTI SELECT -->
<script src="<?php echo js_url('bundle.min'); ?>"></script> 
<!-- TEXT EDITOR FROALE -->
<link href='<?php echo froala("css/froala_editor.css")?>' rel='stylesheet' type='text/css' />
<link href='<?php echo froala("css/froala_style.css")?>' rel='stylesheet' type='text/css' />   
<link href='<?php echo froala("css/themes/gray.css")?>' rel='stylesheet' type='text/css' />    	
<link href='<?php echo froala("css/plugins/draggable.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/colors.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/emoticons.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/image_manager.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/image.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/line_breaker.min.css")?>' rel='stylesheet' type='text/css' />   
<link href='<?php echo froala("css/plugins/char_counter.min.css")?>' rel='stylesheet' type='text/css' />   
<link href='<?php echo froala("css/plugins/fullscreen.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/file.min.css")?>' rel='stylesheet' type='text/css' />  
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
<script type="text/javascript" src="<?php echo froala("js/plugins/file.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/font_size.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/fullscreen.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/font_family.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/image.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/image_manager.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/link.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/lists.min.js"); ?>" ></script>
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
	$("#ctype").change(function() {		
		if(	$("#ctype").val()=="CDI"){
			$("#duree").hide();
			$("#duree").val(1);
		}else{
			$("#duree").show(); 
		} 
	});
	$("#reference").val($("#metier").val()+"/<?php  printf("%04d",  $numero_offre); echo "/".date('ymd'); ?>");   
	$("#pays").change(function() {			
		$("#region").load("<?php echo site_url("Ajax/list_region/")?>"+$("#pays").val());
		$("#ville").load("<?php echo site_url("Ajax/list_villeP/")?>"); 
	});
	$("#region").change(function() {			
		$("#ville").load("<?php echo site_url("Ajax/list_ville/")?>"+$("#region").val());
	});
	$("#metier").change(function() {			
		cde_metier = $("#metier").val()+"/<?php printf("%04d",  $numero_offre); echo "/".date('ymd'); ?>";   
		$("#reference").val(cde_metier);
	});
	$('#edit').froalaEditor({
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
		heightMax:500,
		placeholderText:"<?php echo $this->lang->line('DescribeOffer');?>"
	});
	$('#edit2').froalaEditor({
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
		heightMin:150,
		heightMax:500,
		placeholderText:"<?php echo $this->lang->line('DescribeSeekingProfil');?>"
	});
	var autocomplete = new SelectPure(".autocomplete-select", {
        options: [
		<?php  
		foreach ($list_competence as $row){
			if($_SESSION['site_lang']=="french") $comp = $row['nom']; else $comp = $row['name']; 
			echo '{
				label:"'.$comp.'",
				value:"'.$row['idCompetence'].'",
			},';																	
		}								
		?> 
        ],
        value: [],
        multiple: true,
        autocomplete: true,
        icon: "fa fa-times",
        onChange: value => { console.log(value); document.getElementById("skills").value=value; },
      });
	//$("#duree").spinner();  
	$( "#dateFin" ).datepicker({ altFormat: "yy-mm-dd", autoSize: true,  dateFormat: "yy-mm-dd", 
		beforeShow: function(input, inst) {
			var cal = inst.dpDiv;
			var top  = $(this).offset().top - $(this).outerHeight() - 185;
			var left = $(this).offset().left;
			setTimeout(function() {
				cal.css({
					'top' : top,
					'left': left
				});
			}, 10)
		}
	 });
	$( "#datePub" ).datepicker({ altFormat: "yy-mm-dd", autoSize: true,  dateFormat: "yy-mm-dd",
		beforeShow: function(input, inst) {
			var cal = inst.dpDiv;
			var top  = $(this).offset().top - $(this).outerHeight() - 185;
			var left = $(this).offset().left;
			setTimeout(function() {
				cal.css({
					'top' : top,
					'left': left
				});
			}, 10)
		} 
	});
});
</script>