<!doctype html>
<html lang="en">
	<?php include('static/head.php'); ?>
	<body id="mainBlock" data-spy="scroll" data-target=".navbar" data-offset="50">
		<?php require_once('static/header.php');  ?>
        <style>
		/* The message box is shown when the user clicks on the password field */
		#message {
			display:hidden; 
			color: #000;
			position: relative;
			padding:0px;
			margin-top:0px;
		}
		#message p {
			font-size: 18px;
		}
		/* Add a green text color and a checkmark when the requirements are right */
		.valid {
			color: green;
		}
		.valid:before {
			position: relative;
			left: -35px;
			content: "✔";
		}
		/* Add a red text color and an "x" when the requirements are wrong */
		.invalid {
			color: red;
		}
		.invalid:before {
			position: relative;
			left: -35px;
			content: "✖";
		}
		#send{
			display:block;
		}
		</style>
		<section style="padding:50px;text-align:justify;font-family:Lato;line-height:2em;background:#fff" class="wide-tb-80"> <br><br>           
            <div class="col-lg-12">
                <div class="row">
					<div class="container">						 
						<div style="padding:0 2rem;" class="col-12 col-sm-12">
							<h1 class="h2 text-center mb-30 titleText"><?php echo $this->lang->line("ForgotPwd")?></h1>
							<form action="<?php echo site_url("Pwd_forgot/validPassword/".$idUser."/".$ctpe."/".$cle)?>" method="POST">
								<div class="form-group mb-20">
									<label style="font-family:Roboto,'Open Sans';line-height:2em;" class="label-control mb-10" for="email"><?php echo $this->lang->line("Password")?></label>
									<input type="password" class="form-control" name="password" id="password"  maxlength="20" required>
									<div class="col-sm-12"><?php echo form_error('password'); ?></div>
								</div>
								<div class="form-group mb-20">
									<label style="font-family:Roboto,'Open Sans';line-height:2em;" class="label-control mb-10" for="email"><?php echo $this->lang->line("ConfirmPassword")?></label>
									<input type="password" class="form-control" name="password2" id="password2"  maxlength="20" required>
									<div class="col-sm-12"><?php echo form_error('password2'); ?></div>
								</div>
								
								<div id="message">
									<p id="letter" class="invalid">Les mots de passes doivent être <b>identique</b></p>
									<p id="length" class="invalid">Le mot de passe doit avoir au moins <b>6 caractères</b></p>
								</div>
								<div class="form-group d-flex align-items-center justify-content-between"> 
									<button id="send" type="submit" class="btn btn-bg-primary btn-splash-hover btn-3d-hover"><span class="btn_text"><?php echo $this->lang->line("Send")?></span></button>
								</div> 
							</form>
						</div>
					</div>
				</div>
			</div><br><br><br><br><br> 
		</section>
		<section style="padding:50px;text-align:justify;font-family:Lato;line-height:2em;background:#fff" class="wide-tb-80"> <br><br> 
	
		</section>
	  <?php require_once('static/footer.php'); ?>  
	  
	  <script> 
			var myInput = document.getElementById("password");
			var myInput2 = document.getElementById("password2"); 
			var letter = document.getElementById("letter");
			var length = document.getElementById("length");
			var pa1=0,pa2=0;
			myInput2.onfocus = function() {
				document.getElementById("message").style.display = "block";
			}
			myInput2.onblur = function() {
				document.getElementById("message").style.display = "none";
			}
			myInput2.onkeyup = function() {  
				//same password
				if(myInput2.value == myInput.value) {
					letter.classList.remove("invalid");
					letter.classList.add("valid");
					pa1=1;
				} else {
					letter.classList.remove("valid");
					letter.classList.add("invalid");
					pa1=0;
				}

				//length
				if(myInput.value.length >= 6) {
					length.classList.remove("invalid");
					length.classList.add("valid");
					pa2=1;
				} else {
					length.classList.remove("valid");
					length.classList.add("invalid");
					pa2=0;
				}

				//Display Send button
				if(pa1==1 && pa2==1){
					document.getElementById("send").style.display = "block";
				}else{
					document.getElementById("send").style.display = "none";
				}
			} 
			
			</script>
	</body>
</html>