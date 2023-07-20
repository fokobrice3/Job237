<!-- Dashboard Employer Section -->
<div id="Mainsec" class="col-md-10 col-sm-12">		
	<div class="Block">
		<form action="" method="POST" enctype="multipart/form-data">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<h5>Compagny information</h5>  
					<div class="form-group">					
						<div class="avatar-upload">
							<div class="avatar-edit">
								<input type='file' id="imageUpload" name="photo" accept=".png, .jpg, .jpeg" />
								<label for="imageUpload"></label>
							</div>
							<div class="avatar-preview-square">
								<div id="imagePreview" style="background-image:url(<?php echo img_url("logo/logo.png") ?>);">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-4 col-sm-12">
						<div class="form-group">
							<label class="control-label compagny-label" for="email">Name</label>
							<input type="text" class="form-control" name="nom" id="nom" placeholder="<?php echo $this->lang->line('EnterName')?>" value="<?php echo $page; ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label compagny-label" for="email">Email</label>
							<input type="text" class="form-control" name="nom" id="nom" placeholder="<?php echo $this->lang->line('EnterName')?>" value="<?php echo $page; ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label compagny-label" for="ctype">Ownership type</label>
							<select class="form-control" id="ownership_type_id" name="ownership_type_id">
								<option value="">Select Ownership type</option>
								<option value="1">Sole Proprietorship</option>
								<option value="2">Public</option>
								<option value="3" selected="selected">Private</option>
								<option value="4">Government</option>
								<option value="5">Non Governmental Organization</option>
							</select>
						</div>
					</div>	
					<div class="col-md-12">
						<div class="form-group">
							<label for="comment compagny-label">Description </label> 
							<textarea class="form-control" rows="8" id="edit" name="comment">
								<h1>Textarea</h1>
								<p>The editor can also be initialized on a textarea.</p>      
							</textarea>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label compagny-label" for="email">Compagny Name</label>
							<input type="text" class="form-control" name="nom" id="nom" placeholder="" value="<?php echo $page; ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label compagny-label" for="email">Compagny Email</label>
							<input type="text" class="form-control" name="nom" id="nom" placeholder="" value="<?php echo $page; ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label compagny-label" for="email">Compagny Name</label>
							<input type="text" class="form-control" name="nom" id="nom" placeholder="" value="<?php echo $page; ?>">
						</div><br>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label compagny-label" for="email">Compagny Name</label>
							<input type="text" class="form-control" name="nom" id="nom" placeholder="" value="<?php echo $page; ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label compagny-label" for="email">Compagny Email</label>
							<input type="text" class="form-control" name="nom" id="nom" placeholder="" value="<?php echo $page; ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label class="control-label compagny-label" for="email">Compagny Name</label>
							<input type="text" class="form-control" name="nom" id="nom" placeholder="" value="<?php echo $page; ?>">
						</div><br>
					</div>
					<br><br>
					<div class="col-md-12 col-sm-12">
						<input type="submit" class="btn btn-info btn-block" value="Update Prodile"/>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>  

	
<link href='<?php echo froala("css/froala_editor.min.css")?>' rel='stylesheet' type='text/css' />
<link href='<?php echo froala("css/froala_style.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/code_view.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/draggable.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/colors.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/emoticons.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/image_manager.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/image.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/line_breaker.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/table.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/char_counter.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/video.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/fullscreen.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/file.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/help.min.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/third_party/spell_checker.css")?>' rel='stylesheet' type='text/css' />  
<link href='<?php echo froala("css/plugins/special_characters.min.css")?>' rel='stylesheet' type='text/css' />  
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.3.0/codemirror.min.css">
  
<script type="text/javascript" src="<?php echo froala("js/froala_editor.min.js"); ?>" ></script>

<script type="text/javascript" src="<?php echo froala("js/plugins/align.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/char_counter.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/code_beautifier.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/code_view.min.js"); ?>" ></script>
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
<script type="text/javascript" src="<?php echo froala("js/plugins/video.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/help.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/print.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/special_characters.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/word_paste.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/quick_insert.min.js"); ?>" ></script>
<script type="text/javascript" src="<?php echo froala("js/plugins/quick_insert.min.js"); ?>" ></script> 
<script type="text/javascript" src="<?php echo froala("js/third_party/spell_checker.min.js"); ?>" ></script> 
 
  
<script>
//Text Editor Froala
	$('#edit').froalaEditor();
	
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