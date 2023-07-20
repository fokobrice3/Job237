<!-- SignIn Modal -->
	<!-- Modal login  href="'.site_url("Welcome/signIn").'" --> 
	<!-- script modal -->
	<script>		
		$(document).ready(function(){		
			<?php 
				if(isset($accountFalse)) {
					if($accountFalse=="y") echo "$('#SignInModal').modal();";
				}			
			?>
			$("#sign-in").click(function(){
				$("#SignInModal").modal();
			});
			$("#try-now").click(function(){
				$("#SignInModal").modal();
			});			
		});
	</script>

    <!-- Modal content-->
	<div class="modal fade" id="SignInModal" role="dialog">
		<div class="modal-dialog">		
			<div class="modal-content" id="formLogInBox" style="border-radius:0px 0px 4px 4px;">
				<div class="modal-header" id="SignInHeader">
					<img class="logIn_img" style="width:40px;float:left;top:0px;left:10px;" alt="camtel" src="<?php echo img_url('icon/log-in.png'); ?>">
					<p class="SignInTitle"><?php echo $this->lang->line('ConnectYourself')?></p>
				</div>
				<div class="modal-body" style="padding:40px 50px;">
					<form id="formLogIn" action="<?php echo site_url('User/login');?>" method="POST">
						<?php  if(isset($accountFalse) and $accountFalse=="y") echo '<div style="color:#fff;font-family:Lato;font-size:1.2em;
								text-align:center;margin:10px 2px;padding:5px 10px;background:linear-gradient(#d9534f,#d70872);
								border:0;border-radius:100px;">'.$this->lang->line('FalseAccount').'</div>';?>
							<section class="row sectionUserType" style="text-align:center;position:relative;margin:auto;">
								<div class="col-md-6 col-sm-6 userType">
									<input type="radio" id="control_03" name="comptetype" value="employer" checked>
									<label for="control_03"> 
										<p><?php echo $this->lang->line('IAmEmployer')?></p>
									</label>
								</div>
								<div class="col-md-6 col-sm-6 userType">
									<input type="radio" id="control_04" name="comptetype" value="candidate">
									<label for="control_04"> 
										<p><?php echo $this->lang->line('IAmCandidate'); ?></p>
									</label>
								</div>
							</section>
							<br>
							<div class="wrap-input2 validate-input" data-validate="Valid email is required: ex@abc.xyz">
								<input class="input2" type="email" name="email" maxlength="50">
								<span class="focus-input2" data-placeholder="<?php echo $this->lang->line('EmailAdress')?>"></span>
								<div class="col-sm-12"><?php echo form_error('email'); ?></div>
							</div>
							<div class="wrap-input2 validate-input" data-validate = "">
								<input class="input2" type="password" name="password" maxlength="50">
								<span class="focus-input2" data-placeholder="<?php echo $this->lang->line('Password')?>"></span>
								<div class="col-sm-12"><?php echo form_error('password'); ?></div>
							</div>
							
							<input type="submit" class="button2 btn-block" name="submit" value="<?php echo $this->lang->line('SignIn')?>">
							<hr>
							<div class="col-md-6 col-sm-6">
								<button type="submit" class="btn btn-primary btn-outline info-outline small" data-dismiss="modal">
									<span class="glyphicon glyphicon-remove"></span> Fermer
								</button>
							</div>	
							<div class="col-md-6 col-sm-6" style="text-align:right;top:-5px;position:relative;">
								<ul>
									<li style="list-style:none;"><a href="<?php echo site_url("Pwd_forgot/index")?>"><?php echo $this->lang->line('ForgetPassword');?></a></li>
									<li style="list-style:none;"><a href="<?php echo site_url('Welcome/signUp');?>"><?php echo $this->lang->line('NotRegisted');?></a></li>
								</ul>
							</div>							
							<br>				
					</form>						 
				</div> 
			</div>		
		</div>
  	</div> 
