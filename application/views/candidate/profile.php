<!-- Dashboard Candidat Section -->
<div id="Mainsec" class="col-md-10 col-sm-12">		
	<div class="Block">
		<form action="<?php echo site_url('User/updateCandidat'); ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-10 col-sm-12">
					<h5>Information Civil</h5>  
					<div class="form-group">
						<div class="col-md-1"></div> 
						<div class="col-md-4">
							<div class="avatar-upload">
								<div class="avatar-edit">
									<input type='file' id="imageUpload" name="photo" accept=".png, .jpg, .jpeg" />
									<label for="imageUpload"></label>
								</div>
								<div class="avatar-preview">
									<div id="imagePreview" style="background-image:url(<?php echo img_url("profil/".$photoProfil) ?>);">
									</div>
								</div>
							</div>
						</div>						
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="email">Email</label>
						<div class="col-sm-10">
							<p class="form-control" style="background:#ddd"> <?php echo $email; ?></p>
						</div>
					</div> 
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label class="control-label col-sm-2 compagny-label" for="nom">Nom</label> 
							<input type="text" class="form-control" name="nom" id="nom" placeholder="<?php echo $nom; ?>" value="<?php echo $nom; ?>">
							<div class="col-sm-12"><?php echo form_error('nom'); ?></div> 
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label class="control-label col-sm-2 compagny-label" for="prenom">Prenom</label> 
							<input type="text" class="form-control" name="prenom" id="prenom" placeholder="<?php echo $prenom; ?>" value="<?php echo $prenom; ?>">
							<div class="col-sm-12"><?php echo form_error('prenom'); ?></div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label class="control-label col-sm-2 compagny-label" for="nationalite">Nationalité</label> 
							<select class="form-control" name="nationalite" id="nationalite">								
							<?php 
							if(!$idNationalite) echo '<option  disabled selected value="">Select Nationality</option>';
								else echo '<option  disabled value="">Select Nationality</option>';											
								foreach ($list_pays as $row){
									if($idNationalite==$row['idPays']) $select='selected'; else $select='';
									if($langue=="french") echo '<option value="'.$row['idPays'].'" '.$select.'>'.$row['nationalite'].'</option>';
									else echo '<option value="'.$row['idPays'].'" '.$select.'>'.$row['nationality'].'</option>';															
								}  								
							?>			
							</select>
							<div class="col-sm-12"><?php echo form_error('nationalite'); ?></div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label compagny-label" for="dateNaissance">Date de naissance (AAAA-MM-JJ)</label>
								<input id="dateNaissance" name="dateNaissance" class="form-control" value="<?php echo $dateNaissance; ?>" type="" >
								<div class="col-sm-12"><?php echo form_error('dateNaissance'); ?></div>
							</div>
						</div>
					<div class="col-md-4 col-sm-12">	
						<div class="form-group">
							<label class="control-label col-sm-2 compagny-label" for="sexe">Sexe</label>
							<div class="col-sm-12">
								<div class="col-md-6 col-sm-6 radioType">
									<input type="radio" id="control_01" name="sexe" value="H"  <?php if($sexe=="H") echo"checked"; ?>> 
									<label for="control_01"> 
										<p><?php echo $this->lang->line('Man')?></p>
									</label>
								</div>
								<div class="col-md-6 col-sm-6 radioType">
									<input type="radio" id="control_02" name="sexe" value="F"  <?php if($sexe=="F") echo"checked"; ?>> 
									<label for="control_02"> 
										<p><?php echo $this->lang->line('Woman')?></p>
									</label>
								</div> 
								<div class="col-sm-12"><?php echo form_error('sexe'); ?></div>
							</div>
						</div> 
					</div>
					<div class="col-md-4 col-sm-12">	
						<div class="form-group">
							<label class="control-label col-sm-2 compagny-label" for="langue">Langue</label>
							<div class="col-sm-12">
								<div class="col-md-6 col-sm-6 radioType">
									<input type="radio" id="control_03" name="langue" value="french" <?php if($langue=="french") echo"checked"; ?>> 
									<label for="control_03"> 
										<p><?php echo $this->lang->line('French')?></p>
									</label>
								</div>
								<div class="col-md-6 col-sm-6 radioType">
									<input type="radio" id="control_04" name="langue" value="english" <?php if($langue=="english") echo"checked"; ?>> 
									<label for="control_04"> 
										<p><?php echo $this->lang->line('English')?></p>
									</label>
								</div> 
							</div>
							<div class="col-sm-12"><?php echo form_error('langue'); ?></div>
						</div> 
					</div>					
				</div>
				<div class="col-md-10 col-sm-12">
					<br><br>
					<h5>Localisation</h5>
					<div class="col-md-4 col-sm-12">	
						<div class="form-group">
							<label class="control-label col-sm-12 compagny-label" for="pays">Pays de résidence</label>
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
								<label class="control-label compagny-label" for="region">Région</label>
								<select class="form-control" name="region" id="region">
									<option <?php if(!$idRegion) echo "selected" ?> disabled value="">Select State</option>
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
								<label class="control-label compagny-label" for="ville">Ville</label> 
								<select class="form-control" name="ville" id="ville">
									<option  <?php if(!$idVille) echo "selected" ?> disabled value="">Select City</option>
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
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-2" for="telephone">Téléphone</label>
								<input type="number" class="form-control" name="telephone" id="telephone" placeholder="<?php echo $telephone; ?>" value="<?php echo $telephone; ?>">
								<div class="col-sm-12"><?php echo form_error('telephone'); ?></div> 
							</div>	
						</div>
					<br><br><br>
					<div class="col-md-12 col-sm-12">
						<br><input type="submit" class="btn-outline info-outline btn-block btn btn-primary btn-lg" value="Update Profile"/>
					</div>
				</div> 
			</div>
		</form>
	</div>
</div>   

<link  href='<?php echo ui("jquery-ui.min.css")?>' rel='stylesheet' type='text/css' />
<script src="<?php echo ui('jquery-ui.min.js'); ?>"></script> 
<script> 
/*function bs_input_file() {
	$(".input-file").before(
		function() {
			if ( ! $(this).prev().hasClass('input-ghost') ) {
				var element = $("<input type='file' class='input-ghost' style='visibility:hidden; height:0'>");
				element.attr("name",$(this).attr("name"));
				element.change(function(){
					element.next(element).find('input').val((element.val()).split('\\').pop());
				});
				$(this).find("button.btn-choose").click(function(){
					element.click();
				});
				$(this).find("button.btn-reset").click(function(){
					element.val(null);
					$(this).parents(".input-file").find('input').val('');
				});
				$(this).find('input').css("cursor","pointer");
				$(this).find('input').mousedown(function() {
					$(this).parents('.input-file').prev().click();
					return false;
				});
				return element;
			}
		}
	);
}
$(function() {
	bs_input_file();
});*/
//Preview Photo
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
$("#imageUpload").change(function() {
    readURL(this);
});
$(document).ready(function(){ 
//Date
	$("#dateNaissance" ).datepicker({ altFormat: "yy-mm-dd", autoSize: true,  dateFormat: "yy-mm-dd", 
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

//Pays Region Ville update
	$("#pays").change(function() {		
		$("#region").load("<?php echo site_url("Ajax/list_region/")?>"+$("#pays").val());
		$("#ville").load("<?php echo site_url("Ajax/list_villeP/")?>"); 
	});
	$("#region").change(function() {			
		$("#ville").load("<?php echo site_url("Ajax/list_ville/")?>"+$("#region").val());
	});
});
</script>