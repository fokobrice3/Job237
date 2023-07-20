<!-- CV Candidat Section -->
<div id="Mainsec" class="col-md-10 col-sm-12">		
	<div class="Block container" style="margin:0;"> 
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h5 style="background:#2e0f3f;color:#fff">Curriculum vitae</h5>  							
				<div class="col-sm-12"><p class="title-job">EDUCATION</p></div> 				
				<div class="col-sm-12 container">	 	 
					<form action="<?php echo site_url('Resume/UpdateEducation/'.$education->idEducation); ?>" method="POST" class="">
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-6 compagny-label" for="degree">Degree Level</label> 
								<select class="form-control" id="degree" name="degree">	
									<?php 
									foreach($list_degree as $row){
										echo '<option value="'.$row['idNiveauEtude'].'"';
										if($row['idNiveauEtude']==$education->idNiveauEtude) echo "selected";
										echo '>'.strtoupper($row['nom']).'</option>';
									}
									?>																										
								</select>
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-2 compagny-label" for="degreeType">Type</label> 
								<select class="form-control" id="degreeType" name="degreeType">	
								<?php 										
									foreach($list_type_degree as $row){
										if($_SESSION['site_lang']=="french") $nomType =strtoupper($row['nom']);
										else $nomType =strtoupper($row['name']);
										echo '<option value="'.$row['idTypeEducation'].'"';
										if($row['idTypeEducation']==$education->idTypeEducation) echo "selected";
										echo '>'.$nomType.'</option>';
									}
								?>																	
								</select>
							</div>
						</div>	 
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-2 compagny-label" for="degreeTitre">Title</label> 
								<input type="text" class="form-control" name="degreeTitre" id="degreeTitre" placeholder="" required value="<?php echo $education->titre ?>">
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-2 compagny-label" for="institution">Institution</label> 
								<input type="text" class="form-control" name="institution" id="institution" placeholder="" required value="<?php echo $education->institution ?>">
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-2 compagny-label" for="dateObtention">Date</label> 
								<input id="dateObtention" name="dateObtention" class="form-control" value="<?php echo $education->date ?>" required type="" >
							</div>
						</div>
						<div class="col-md-4 col-sm-12">
							<div class="form-group">
								<label class="control-label col-sm-2 compagny-label" for="mention">Mention</label> 
								<input type="text" class="form-control" name="mention" id="mention" placeholder="" required value="<?php echo $education->mention ?>">
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
 
 <!-- UI -->
<link  href='<?php echo ui("jquery-ui.min.css")?>' rel='stylesheet' type='text/css' />
<script src="<?php echo ui('jquery-ui.min.js'); ?>"></script>   
<script> 
$(document).ready(function(){  
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