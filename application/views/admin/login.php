<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<?php require_once("head.php"); ?>
	<body class="bg-gray-900">
		<style>
		.bg-login-image img{
			background:url(<?php echo img_url("profil/nobody.png")?>)!important;
			background-repeat:no-repeat!important;
			background-attachment:fixed!important;
			background-size:contain!important; 
		}
		.log-img img{
			width:100%;
			position:relative;
			margin:auto;
			top:50px;
			left:25px;
		}
		</style>
		<div class="container">
			<div class="row justify-content-center">			 
				<h1 style="font-family:Nunito,Roboto,Lato;color:#fff;letter-spacing:1px;line-height:1.8em;font-weight:100;"><br><center>CEOGroup <br>PANEL D'ADMINISTRATION</center></h1>
				<div class="col-xl-10 col-lg-12 col-md-9">
					<div class="card o-hidden border-0 shadow-lg my-5">
						<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
							<div class="row">
								<div class="col-lg-6 d-none d-lg-block log-img"><center><img src="<?php echo img_url("admin-ceogroup.png");?>"></center></div><!-- bg-login-image -->
								<div class="col-lg-6">
									<div class="p-5">
										<div class="text-center">
											<h1 class="h4 text-gray-900 mb-4">Bienvenue sur <br>CEOGroup ADMIN-PANEL</h1>
										</div>
										<form class="" action="<?php echo site_url("Admin/login") ?>" method="POST">
										<?php if(isset($accountFalse) and $accountFalse=="y") echo '<div style="color:#fff;font-family:Lato;font-size:1.2em;text-align:center;margin:10px 2px;padding:5px 10px;background:linear-gradient(#d9534f,#d70872);border:0;border-radius:100px;">Compte inexistant</div>';	?>
											<div class="form-group">
												<input type="text" class="form-control form-control-user" id="login" name="login"  placeholder="Nom d'utilisateur">
												<div class="col-sm-12"><?php echo form_error('login'); ?></div>
											</div>
											<div class="form-group">
												<input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Mot de passe">
												<div class="col-sm-12"><?php echo form_error('password'); ?></div>
											</div>
											<div class="form-group">	
												<input type="submit" class="form-control btn btn-primary btn-user btn-block" value="Login" >								
											</div> 
											<hr>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	<?php include("script.php"); ?>
</body>

</html>
