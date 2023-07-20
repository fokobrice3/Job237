<!-- CV Candidat Section -->
<div id="Mainsec" class="col-md-10 col-sm-12">		
	<div class="Block container" style="margin:0;"> 
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h5 style="background:#2e0f3f;color:#fff">Curriculum Vitae</h5>   
				<div class="col-sm-12 container">
					<form action="<?php echo site_url('Resume/updateCV'); ?>" method="POST" enctype="multipart/form-data">
				<?php
				if(!empty($resume)){ 
					echo '
						<div class="col-sm-1"><img style="width:80px;" src="'.img_url("icon/curriculum2.png").'"></div>
						<div class="col-md-2 col-sm-3"><br>
							<a target="_blank" class="btn-outline info-outline small default-outline btn-default btn-block" href="'.resume_url($resume).'">Open Curriculum</a>
						</div>
						<div class="col-sm-12">
							<div class="col-md-6 col-sm-8"><span class="label label-info">Only images and pdf</span>
								<input type="file" name="file" id="file" class="inputfile" />
								<label class="btn-outline info-outline small btn-primary btn-block" for="file"><i class="fa fa-file"></i>&nbsp;&nbsp;<strong><span id="value">Change Curriculum</span></strong></label>	
							</div> 
							<div class="col-md-2 col-sm-2"><br> 
								<input type="submit" name="submit-file" value="'.$this->lang->line('Send').'"  class="btn-outline success-outline btn-block btn btn-success small" />
							</div>
						</div>
					';
				}else{ 
					echo '	
						<div class="col-sm-1"><img style="width:80px;" src="'.img_url("icon/curriculum2.png").'"></div> 
						<div class="col-md-6 col-sm-8"><br>
							<span class="label label-info">Only images and pdf</span>
							<input type="file" name="file" id="file" class="inputfile" />
							<label class="btn-outline info-outline small btn-primary btn-block" for="file"><i class="fa fa-file"></i>&nbsp;&nbsp;<strong><span id="value">Add Curriculum</span></strong></label>	
						</div> 
						<div class="col-md-2 col-sm-2">
							<br><br>
							<input type="submit" name="submit-file" value="'.$this->lang->line('Send').'"  class="btn-outline success-outline btn-block btn btn-success small" />
						</div>
					';
				}
				?>	
					</form>				
				</div>				
				<div class="col-sm-12"><br> <p class="title-job"><br><br>EXPERIENCE</p></div> 				
				<div class="col-sm-12">
				<?php
				if($_SESSION['site_lang']=="french"){ $an = "an(s)";$mois="mois";}
				else{  $an = "year(s)";$mois="month";}
				foreach ($xp_list as $row){							
					$nm = $row['nbAnnee']%12;
					$na = intdiv($row['nbAnnee'],12); 
					if($_SESSION['site_lang']=="french") $nomMetier = $row['nom'];
					else  $nomMetier =$row['name'];
					if(empty($nomMetier)) $nomMetier="/";
					echo'<div class="col-md-6 col-sm-12">
							<div class="panel panel-warning">
								<div class="panel-heading"><span style="color:#121221">'.strtoupper($row['poste']).'</span></div>
								<div class="panel-body">
									<p style="font-weight:bold;color:#b50068;padding:5px;">'.$nomMetier.'</p>
									<p style="font-weight:bold;color:#545454;padding:5px;"> <i class="fa fa-building"></i> '.$row['company'].' - '.$na.' '.$an.' - '.$nm.' '.$mois.'</p>
									<br>'.$row['description'].'</div>
								<div class="panel-footer">
									<a class="" href="'.site_url("Resume/EditExperience/".$row['idExperience']).'">&nbsp; Edit &nbsp;</a>&nbsp;&nbsp;&nbsp;
									<a class="" href="'.site_url("Resume/DeleteExperience/".$row['idExperience']).'">&nbsp; Delete &nbsp;</a>  	
								</div>
							</div>
						</div>';
					}
				?>	<div class="col-sm-12"></div>	
					<div class="col-md-4 col-sm-12"><button data-toggle="collapse" data-target="#form_experience" class="btn btn-default btn-outline default-outline small smallp btn-block">Add Experience <i class="fa fa-caret-down"></i></button></div>	
					<div id="form_experience" class="collapse col-sm-12">
						<form action="<?php echo site_url('Resume/addExperience'); ?>" method="POST">
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label class="control-label col-sm-6 compagny-label" for="poste">Titre</label> 
									<input type="text" class="form-control" name="poste" id="poste" placeholder="" required value="">									
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label class="control-label col-sm-6 compagny-label" for="Company">Société</label> 
									<input type="text" class="form-control" name="company" id="company" placeholder="" required value="">									
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label class="control-label col-sm-12 compagny-label" for="mois">Expérience(Mois)</label> 
									<input type="number" class="form-control" name="mois" min="1" max="360" id="mois" required placeholder="" value="">									
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group">
									<label class="control-label col-sm-2 compagny-label" for="job"><?php echo $this->lang->line('Job'); ?></label> 
									<select class="form-control" id="job" name="job">	
										<option value="" selected>Autre</option>
									<?php 										
										foreach($list_job as $row){
											if($_SESSION['site_lang']=="french") $nomType =$row['nom'];
											else $nomType =$row['name'];
											echo '<option value="'.$row['idMetier'].'">'.$nomType.'</option>';
										}
									?>																	
									</select>
								</div>
							</div>	 
							<div class="col-md-12">
								<div class="form-group">
									<label for="profil compagny-label">Description</label> 
									<textarea value="" class="" rows="8" id="description" name="description" required placeholder="" >   
									</textarea> 
								</div>
							</div>
							<div class="col-sm-12">
								<input type="submit" name="submit-xp" value="<?php echo $this->lang->line('Send'); ?>"  class="btn btn-success btn-outline success-outline small btn-block" />				
							</div>								
						</form> 
					</div>
				</div> 				
				<div class="col-sm-12"><p class="title-job"><br><br><br> EDUCATION</p></div>
				<div class="col-sm-12">
				<?php
					foreach ($education_list as $row){ 
						$degree = $row["degree"];
						$degreeLevel = $row["degreeLevel"];
						if($_SESSION['site_lang']=="french") $degreeType = $row["degreeTypefr"];
						else $degreeType = $row["degreeTypeeng"];
						$mention = $row["mention"];
						$institution = $row["institution"];
						$date = $row["date"]; 						
						echo'<div class="col-md-6 col-sm-12">
								<div class="panel panel-info">
									<div class="panel-heading" style="color:#121221">'.$degreeLevel.' / '.$degreeType.' [ '.date('d M, Y',strtotime($date)).' ]</div>
									<div class="panel-body">
										Titre : <span class="sub-info" style="color:#6f9a37;font-weight:bold;">'.$degree.' </span> <br> Mention : <span class="sub-info"> '.$mention.' </span><br>Institution :<span class="sub-info"> '.$institution.' </span>
									</div>
									<div class="panel-footer">
										<a class="" href="'.site_url("Resume/EditEducation/".$row['idEducation']).'">&nbsp; Edit &nbsp;</a>&nbsp;&nbsp;&nbsp;
										<a class="" href="'.site_url("Resume/DeleteEducation/".$row['idEducation']).'">&nbsp; Delete &nbsp;</a>  	
									</div>
								</div>
							</div>';
					}
				?>	<div class="col-sm-12"></div>					
					<div class="col-md-4 col-sm-12"><button data-toggle="collapse" data-target="#form_education" class="btn btn-default btn-outline default-outline small smallp btn-block">Add Education <i class="fa fa-caret-down"></i></button></div>
					<div id="form_education" class="collapse col-sm-12">
						<form action="<?php echo site_url('Resume/addEducation'); ?>" method="POST">
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label class="control-label col-sm-6 compagny-label" for="degree">Degree Level</label> 
									<select class="form-control" id="degree" name="degree">	
										<?php foreach($list_degree as $row) echo '<option value="'.$row['idNiveauEtude'].'">'.strtoupper($row['nom']).'</option>';	?>																										
									</select>
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label class="control-label col-sm-2 compagny-label" for="degreeType">Type</label> 
									<select class="form-control" id="degreeType" name="degreeType">	
									<?php 										
										foreach($list_type_degree as $row){
											if($_SESSION['site_lang']=="french") $nomType =$row['nom'];
											else $nomType =$row['name'];
											echo '<option value="'.$row['idTypeEducation'].'">'.$nomType.'</option>';
										}
									?>																	
									</select>
								</div>
							</div>	 
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label class="control-label col-sm-2 compagny-label" for="degreeTitre">Title</label> 
									<input type="text" class="form-control" name="degreeTitre" id="degreeTitre" placeholder="" required value="">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label class="control-label col-sm-2 compagny-label" for="institution">Institution</label> 
									<input type="text" class="form-control" name="institution" id="institution" placeholder="" required value="">
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label class="control-label col-sm-2 compagny-label" for="dateObtention">Date</label> 
									<input id="dateObtention" name="dateObtention" class="form-control" value="" required type="" >
								</div>
							</div>
							<div class="col-md-4 col-sm-12">
								<div class="form-group">
									<label class="control-label col-sm-2 compagny-label" for="mention">Mention</label> 
									<input type="text" class="form-control" name="mention" id="mention" placeholder="" required value="">
								</div>
							</div>
							<div class="col-sm-12">
								<input type="submit" name="submit-skills" value="<?php echo $this->lang->line('Send'); ?>"  class="btn btn-success btn-outline success-outline small btn-block" />				
							</div>								
						</form> 
					</div> 					
				</div>  
				<div class="col-sm-12"><p class="title-job"><br><br><br> SKILLS</p></div>
				<div class="col-sm-12"> 
					<div class="container">
						<div style="padding:5px 0 5px 0;position:relative;width:95%" ><?php 
						foreach ($my_skills as $row){ 
							echo "<span class='label label-primary'>".$row["nom"]."</span>&nbsp;";
						}
						?> 
						</div>
						<form action="<?php echo site_url('Resume/updateSkills'); ?>" method="POST">	 
							<input type="text" name="skills" id="skills" style="display:none;">
							<span class="autocomplete-select"></span>								
							<input type="submit" name="submit-skills" value="Update skills"  class="btn-outline success-outline btn btn-success small" />
						</form>
					</div>
				</div> 
				<div class="col-sm-12"><p class="title-job"><br><br><br> LANGUAGE</p></div>
				<div class="col-sm-12">	 
					<div class="container">
						<table class="table table-condensed table-striped table-responsive">   						
							<tbody>
							<?php
							foreach ($languages_list as $row){ 
								echo '<tr>
									<td class="td"><p>'.$row["langue"].'</p></td>
									<td class="td"><p>'.$row["parle"].'</p></td>
									<td class="td"><p>'.$row["ecris"].'</p></td>
									<td class="td2"> 
										<a class="btn btn-danger btn-outline danger-outline small smallp" href="'.site_url('Resume/deleteLanguage/'.$row["idLanguage"]).'">Delete &nbsp;</a>
									</td>
								</tr>';	
							}						
							?>					
							</tbody>
						</table>
					</div>
					<form action="<?php echo site_url('Resume/addLanguage'); ?>" method="POST">
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-2 compagny-label" for="langage">Langage</label> 
								<select class="form-control" id="langage" name="langage">	
									<option value="Français">Français</option>
									<option value="Anglais">Anglais</option>
									<option value="Chinois">Chinois</option>
									<option value="Allemand">Allemand</option>
									<option value="Espagnol">Espagnol</option>
									<option value="Latin">Latin</option>
									<option value="Italien">Italien</option>
									<option value="Russe">Russe</option>																
								</select>
							</div>
						</div>
						<div class="col-md-2 col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-2 compagny-label" for="parle">Parle?</label> 
								<select class="form-control" id="parle" name="parle">	
									<option value="Non">Non</option>
									<option value="Passable">Passable</option>
									<option value="Bien">Bien</option>																	
									<option value="Excellent">Excellent</option>																	
								</select>
							</div>
						</div>	 
						<div class="col-md-2 col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-2 compagny-label" for="ecris">Ecrit?</label> 
								<select class="form-control" id="ecris" name="ecris">	
									<option value="Non">Non</option>
									<option value="Passable">Passable</option>
									<option value="Bien">Bien</option>																	
									<option value="Excellent">Excellent</option>															
								</select>
							</div>
						</div>	 
						<div class="col-sm-12">
							<input type="submit" name="submit-skills" value="Add/Update Language"  class="btn btn-success btn-outline success-outline  small" />				
						</div>								
					</form> 
				</div>	
			</div>
		</div> 
	</div>
</div>  
</div>
<style>  
td p{
	font-size:1em;
	padding:5px 10px;
	font-family:Lato;
	color:#2b0b3d;
}
.td{
	background:#fff; 
}
.td2{
	background:#fcfcfc; 
}

.label-primary{
	font-size:0.8em;
	padding:5px 10px;
	border-radius:40px;
	position:relative;
	display:inline-block;
	margin:2px 1px;
}
.smallp{
	padding:5px 10px;
}
.select-pure__select {
	align-items: center;
	background: #f9f9f8;
	border-radius: 1px;
	border: 1px solid rgba(0, 0, 0, 0.15);
	box-shadow: 0 2px 4px rgba(0, 0, 0, 0.04);
	box-sizing: border-box;
	color: #363b3e;
	cursor: pointer;
	display: flex;
	font-size: 16px;
	font-weight: 500;
	justify-content: left;
	min-height: 40px;
	padding: 5px 10px;
	position: relative;
	transition: 0.2s;
	width: 100%;
	margin:5px 0 4px 0;
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
	height: 40px;
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
	var autocomplete = new SelectPure(".autocomplete-select", {
        options: [
		<?php  
		foreach ($list_competence as $row){
			if($_SESSION['site_lang']=="french") $comp = $row['nom']; 
			else $comp = $row['name']; 
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
	  
	$(".inputfile").change(function(e) {	 
		var fileName = '';		
		if(this.files && this.files.length > 1) fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
		else if( e.target.value ) fileName = e.target.value.split( '\\' ).pop();
		$("#value").html(""+fileName);		
	}); 
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
	
	$("#imageUpload").change(function() {
		readURL(this);
	});
	$( "#dateObtention" ).datepicker({ altFormat: "yy-mm-dd", autoSize: true,  dateFormat: "yy-mm-dd",defaultDate:-2190,
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