<!-- SignIn Section -->
<section id="SignInSection">	  
	<p class="tagline4"><i class="fa fa-user-circle" aria-hidden="true"></i> &nbsp;<?php echo $this->lang->line('SignIn')?></p>
	<br>
	<div class="row">	
		<div class="col-md-2 col-sm-1"><!--<br><br><br><br><br><br>-->
		</div>
		<div class="col-md-8 col-sm-12">	
			<div class="SignUpHeadBar">
				<img class="logIn_img" style="width:40px;float:left;top:0px;left:10px;" alt="camtel" src="<?php echo img_url('icon/log-in.png'); ?>">
				<p><?php echo $this->lang->line('ConnectYourself')?></p>
			</div>
			<form class="formLogIn" id="formLogIn" action="<?php echo site_url('User/login');?>" method="POST">
			<?php  if(isset($accountFalse) and $accountFalse=="y") echo '<div style="color:#fff;font-family:Lato;font-size:1.2em;
					text-align:center;margin:10px 2px;padding:5px 10px;background:linear-gradient(#d9534f,#d70872);
					border:0;border-radius:100px;">'.$this->lang->line('FalseAccount').'</div>';?>
				<section class="row sectionUserType" style="text-align:center;position:relative;margin:auto;">
					<div class="col-md-6 col-sm-6 userType">
						<input type="radio" id="control_01" name="comptetype" value="employer" checked>
						<label for="control_01"> 
							<p><?php echo $this->lang->line('IAmEmployer')?></p>
						</label>
					</div>
					<div class="col-md-6 col-sm-6 userType">
						<input type="radio" id="control_02" name="comptetype" value="candidate">
						<label for="control_02"> 
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
				<a href="<?php echo site_url("Pwd_forgot/index")?>" style="float:right;"><?php echo $this->lang->line('ForgetPassword');?></a>
				<a href="<?php echo site_url('Welcome/signUp');?>" style="float:left;"><?php echo $this->lang->line('NotRegisted');?></a>
			</form>
		</div>
		
	</div>
</section>
<script src="<?php echo js_url('contactForm') ;?>" ></script>  