<!doctype html>
<html lang="en">
	<?php include('static/head.php'); ?>
	<body id="mainBlock" data-spy="scroll" data-target=".navbar" data-offset="50">
		<?php require_once('static/header.php');  ?>
        <section style="padding:50px;text-align:justify;font-family:Lato;line-height:2em;background:#fff" class="wide-tb-80"> <br><br>           
            <div class="col-lg-12">
                <div class="row">
					<div class="container">						 
						<div style="padding:0 2rem;" class="col-12 col-sm-12">
							<h1 class="h2 text-center mb-30 titleText"><?php echo $this->lang->line("ForgotPwd")?></h1>
							<form action="<?php echo site_url("Pwd_forgot/resetPassword")?>" method="POST">
								<div class="form-group mb-20">
									<label style="font-family:Roboto,'Open Sans';line-height:2em;" class="label-control mb-10" for="email">Email Address:</label>
									<input type="email" class="form-control" name="email" id="email" placeholder="i.e. ceo-group@gmail.fr" required>
								</div>
								<div class="form-group d-flex align-items-center justify-content-between"> 
									<button type="submit" class="btn btn--bg-primary btn-splash-hover btn-3d-hover"><span class="btn__text"><?php echo $this->lang->line("Send")?></span></button>
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
	</body>
</html>