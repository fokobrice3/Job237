<!-- Dashboard Employer Section -->
<div id="Mainsec" class="col-md-10 col-sm-12">		
	<div class="Block">
		<form action="<?php echo site_url("Company/update/".$idCompagny) ?>" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<h5 style="background:#00abe6;">Compagny information</h5>  
					<div class="form-group">					
						<div class="avatar-upload">
							<div class="avatar-edit">
								<input type='file' id="imageUpload" name="logo" accept=".png, .jpg, .jpeg" />	
								<label for="imageUpload"></label>							
							</div>
							<div class="avatar-preview-square">
								<div id="imagePreview" style="background-image:url(<?php echo img_url("logo/".$logo) ?>);">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label class="control-label compagny-label" for="nom"><?php echo $this->lang->line('CompanyName')?>*</label> 
							<input type="text" class="form-control" name="nom" id="nom" placeholder="<?php echo $this->lang->line('EnterName')?>" value="<?php if(empty($nomCompagny)) echo set_value('nom'); else echo $nomCompagny; ?>">
							<div class="col-sm-12"><?php echo form_error('nom'); ?></div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label class="control-label compagny-label" for="email">Email*</label>
							<input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $this->lang->line('EnterName')?>" value="<?php if(empty($mailCompagny)) echo set_value('email'); else echo $mailCompagny; ?>">
								<div class="col-sm-12"><?php echo form_error('email'); ?></div>
						</div>
					</div>					
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label class="control-label compagny-label" for="ctype"><?php echo $this->lang->line('OwnershipType')?>*</label>
							<select class="form-control" id="ownership_type_id" name="ownership_type_id">
								<?php
								if(!$idPropriete) echo '<option  disabled selected value="">Select Ownership type</option>';
								else echo '<option  disabled value="">Select Ownership type</option>';								
								foreach($Ownerships as $row){									 
									if($row['idPropriete']==$idPropriete) $select='selected'; else $select='';
									if($langue=="french") echo '<option value="'.$row['idPropriete'].'" '.$select.'>'.$row['nom'].'</option>';
									else echo '<option value="'.$row['idPropriete'].'" '.$select.'>'.$row['name'].'</option>';
								}	
								?>	
							</select>
							<div class="col-sm-12"><?php echo form_error('ownership_type_id'); ?></div>
						</div>
					</div>	
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label class="control-label compagny-label" for="secteur"><?php echo $this->lang->line('Sector')?>*</label>
							<select class="form-control" name="secteur" id="secteur"> 
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
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label class="control-label compagny-label" for="size"><?php echo $this->lang->line('Size')?>*</label>
							<select class="form-control" id="size" name="size">
								<?php
								if(!$idTaille) echo '<option  disabled selected value="">Select size</option>';
								else echo '<option  disabled value="">Select size</option>';								
								foreach($size_compagny as $row){									 
									if($row['idTaille']==$idTaille) $select='selected'; else $select='';
									if($langue=="french") echo '<option value="'.$row['idTaille'].'" '.$select.'>'.$row['nom'].'</option>';
									else echo '<option value="'.$row['idTaille'].'" '.$select.'>'.$row['name'].'</option>';
								}	
								?>								
							</select>
								<div class="col-sm-12"><?php echo form_error('size'); ?></div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label class="control-label compagny-label" for="telephone"><?php echo $this->lang->line('Tel')?>*</label>
							<input type="number" class="form-control" name="telephone" id="telephone" placeholder="" value="<?php if(empty($telephone)) echo set_value('telephone'); else echo $telephone; ?>">
							<div class="col-sm-12"><?php echo form_error('telephone'); ?></div>
						</div>
					</div>					
					<div class="col-sm-12">
						<div class="form-group">
							<label class="control-label compagny-label" for="adresse"><?php echo $this->lang->line('Adress')?>*</label>
							<input type="text" class="form-control" name="adresse" id="adresse" placeholder="" value="<?php if(empty($adresse)) echo set_value('adresse'); else echo $adresse; ?>">
							<div class="col-sm-12"><?php echo form_error('adresse'); ?></div>
						</div>
					</div>					
					<div class="col-md-12">
						<div class="form-group">
							<label for="comment compagny-label">Description </label> 
							<textarea class="" rows="8" id="edit" name="comment" placeholder=""> 
								<?php if(empty($description)) echo set_value('comment'); else echo $description; ?>
							</textarea>
						</div><div class="col-sm-12"><?php echo form_error('comment'); ?></div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label class="control-label compagny-label" for="email"><?php echo $this->lang->line('Country')?>*</label>
							<select class="form-control" name="pays" id="pays"> 
								<?php
								if(!$idPays) echo '<option  disabled selected value="">Select Country</option>';
								else echo '<option  disabled value="">Select Country</option>';											
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
							<label class="control-label compagny-label" for="region"><?php echo $this->lang->line('State')?>*</label>
							<select class="form-control" name="region" id="region"> 
								<?php 
								if(!$idRegion) echo '<option  disabled selected value="">Select State</option>';
								else echo '<option  disabled value="">Select State</option>';	
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
							<label class="control-label compagny-label" for="ville"><?php echo $this->lang->line('City')?>*</label> 
							<select class="form-control" name="ville" id="ville"> 
								<?php 
								if(!$idVille) echo '<option  disabled selected value="">Select City</option>';
								else echo '<option  disabled value="">Select City</option>';	
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
					<div class="col-md-12 col-sm-12">
						<br><br>
						<input type="submit" class="btn-outline info-outline btn-block btn btn-primary btn-lg" value="Update Compagny's Profile"/>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>  

	
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
<script type="text/javascript" src="<?php echo froala("js/plugins/paragraph_format.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/paragraph_style.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/quote.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/save.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/url.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/help.min.js"); ?>" ></script> 
<script type="text/javascript" src="<?php echo froala("js/plugins/special_characters.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/word_paste.min.js"); ?>" ></script>  
 
  
<script>
$(document).ready(function(){  
	$("#pays").change(function() {			
		$("#region").load("<?php echo site_url("Ajax/list_region/")?>"+$("#pays").val());
		$("#ville").load("<?php echo site_url("Ajax/list_villeP/")?>"); 
	});
	$("#region").change(function() {			
		$("#ville").load("<?php echo site_url("Ajax/list_ville/")?>"+$("#region").val());
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
		heightMin:150,
		heightMax:500,
		placeholderText:"<?php echo $this->lang->line('DescribeCompagny');?>"
	});
	
	$("#imageUpload").change(function() {
		readURL(this);
	});
});	
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#imagePreview').css('background-image', 'url('+e.target.result +')');
            $('#imagePreview').hide();
            $('#imagePreview').fadeIn(650);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

</script>