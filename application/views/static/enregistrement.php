<!-- SignUp Section -->
<section id="SignUpSection">	 
	<div class="row">	
		<div class="col-md-1 col-sm-12"></div>		
		<div class="col-md-5 col-sm-12" style="z-index: 2;>	
			<div class="SignUpHeadBar">
				<p><?php echo $this->lang->line('CreateYourAccount')?></p>
			</div>
			<form id="formSignUp" action="<?php echo site_url('User/add');?>" method="POST"> 
				<?php  if(isset($emailExist) and $emailExist=="y") echo '<div style="color:#fff;font-family:Lato;font-size:1.2em;
									text-align:center;margin:10px 2px;padding:5px 10px;background:linear-gradient(#d9534f,#d70872);
									border:0;border-radius:100px;">'.$this->lang->line('AlreadyUse').'</div>';?>
				<section class="row sectionUserType">				
					<div class="col-md-12 col-sm-12">
						<p class="tagline3 left"><?php echo $this->lang->line('UseMsg')?></p><br>
					</div>
					<div class="col-md-6 col-sm-6 userType">
						<input type="radio" id="control_01" name="comptetype" value="employer" checked>
						<label for="control_01"> 
							<p><?php echo $this->lang->line('IWantToHire')?></p>
						</label>
					</div>
					<div class="col-md-6 col-sm-6 userType">
						<input type="radio" id="control_02" name="comptetype" value="candidate">
						<label for="control_02"> 
							<p><?php echo $this->lang->line('IWantToWork')?></p>
						</label>
					</div>
				</section>
				<br>					
				<div class="wrap-input2 validate-input  " data-validate="Name is required">
					<input class="input2" type="text" name="fullname" maxlength="50">
					<span class="focus-input2" data-placeholder="<?php echo $this->lang->line('FullName')?>"></span>
					<div class="col-sm-12"><?php echo form_error('fullname'); ?></div>
				</div> 
				<div class="wrap-input2 validate-input" data-validate="Valid password is required: ex@abc.xyz">
					<input class="input2" type="email" name="email" maxlength="50">
					<span class="focus-input2" data-placeholder="<?php echo $this->lang->line('EmailAdress')?>"></span>
					<div class="col-sm-12"><?php echo form_error('email'); ?></div>
				</div>
				<div class="wrap-input2 validate-input" data-validate = "Valid password is required">
					<input class="input2" type="password" name="password" maxlength="50">
					<span class="focus-input2" data-placeholder="<?php echo $this->lang->line('Password')?>"></span>
					<div class="col-sm-12"><?php echo form_error('password'); ?></div>
				</div>
				<label class="contain"><span><?php echo $this->lang->line('IHaveReadAndIAccept');?> :</span>
					<input type="checkbox" name="accept_terms">
					<span class="checkmark"></span>
					<div class="col-sm-12"><?php echo form_error('accept_terms'); ?></div>
				</label>
					<a href="<?php echo site_url("Welcome/tnc");?>">les conditions d'utilisation, la politique de confidentialité et la politique de propriété intellectuelle.</a>
				<hr>
				<center><input type="submit" class="button2" name="submit" value="<?php echo $this->lang->line('SignUp')?>"></center>
				<hr>  
			</form>
		</div>
		<div class="col-md-4" style="z-index: 1;padding:0 30px;">
			<br><center><img class="SignUp_img" alt="register" src="<?php echo img_url('icon/resume.png'); ?>"></center>	
			<br><br>
			<h4 class="titleText"><?php  echo $this->lang->line('WelcomeToCeoGroup'); ?></h4>
			<p class="tagline3 MarginTop0 justify"><?php echo $this->lang->line('WWASlogan')?></p>
			<br><br>
			<h4 class="titleText"><?php  echo $this->lang->line('RegisterWithEase'); ?></h4>
			<p class="tagline3 MarginTop0 justify"><?php echo $this->lang->line('RegisterEase')?></p>
			<br><br>
			<h4 class="titleText"><?php  echo $this->lang->line('CompleteYourInformation'); ?></h4>
			<p class="tagline3 MarginTop0 justify"><?php echo $this->lang->line('CompleteInfos')?></p><br>
			<br><br>
			<h4 class="titleText"><?php  echo $this->lang->line('TakeAdvantageOfOurSystem'); ?></h4>
			<p class="tagline3 MarginTop0 justify"><?php echo $this->lang->line('Advantage')?></p><br>
		</div>
		<div class="col-md-2 col-sm-12"></div>
	</div>
</section>
<script src="<?php echo js_url('contactForm') ;?>" ></script>  