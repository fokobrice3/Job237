<!-- Dashboard Employer Section -->
<div id="Mainsec" class="col-md-10 col-sm-12">		
	<div class="Block">
		<form action="<?php echo site_url('User/updateEmployeur'); ?>" class="form-horizontal" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-10 col-sm-12">
					<h5 style="background:#00abe6;">Information Civil</h5>  
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
					<div class="form-group">
						<label class="control-label col-sm-2" for="nom"><?php echo $this->lang->line('Name')?>*</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="nom" id="nom" placeholder="<?php echo $nom; ?>" value="<?php echo $nom; ?>">
							<div class="col-sm-12"><?php echo form_error('nom'); ?></div>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-2" for="sexe"><?php echo $this->lang->line('Sex')?>*</label>
						<div class="col-sm-10">
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
					<div class="form-group">
						<label class="control-label col-sm-2" for="langue"><?php echo $this->lang->line('Language')?>*</label>
						<div class="col-sm-10">
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
					<br><br>
				</div>
				<div class="col-md-10 col-sm-12">
					<h5 style="background:#00abe6;">Localisation</h5>
					<div class="form-group">
						<label class="control-label col-sm-2" for="pays">Résidence*</label>
						<div class="col-sm-10">
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
					<div class="form-group">
						<label class="control-label col-sm-2" for="adresse"><?php echo $this->lang->line('Adress')?>*</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="adresse" id="adresse" placeholder="<?php echo $adresse; ?>" value="<?php echo $adresse; ?>">
							<div class="col-sm-12"><?php echo form_error('adresse'); ?></div>
						</div>
					</div>	
					<div class="form-group">
						<label class="control-label col-sm-2" for="telephone"><?php echo $this->lang->line('Tel')?>*</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" name="telephone" id="telephone" placeholder="<?php echo $telephone; ?>" value="<?php echo $telephone; ?>">
							<div class="col-sm-12"><?php echo form_error('telephone'); ?></div>
						</div>
					</div>						
					<br><br><br>
					<div class="col-md-12 col-sm-12">
						<input type="submit" class="btn-outline info-outline btn-block btn btn-primary btn-lg" value="Update Profile"/>
					</div>
				</div> 
			</div>
		</form>
	</div>
</div>   
<script> 
function bs_input_file() {
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
});
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
</script>