<!-- ContactUs Section -->
<section id="ContactUs"> 	
	<div class="row">
		<div  class="container">
			<p class="lead" style="color:#777;font-family:Roboto;font-weight:100;font-size:1em;text-align:center" class="tagline3"><?php echo $this->lang->line('IntroMsg')?></p>
			<br><br><br>
			<div class="col-md-8 col-sm-12">	
				<div class="SignUpHeadBar">
					<p><?php echo $this->lang->line('MailContactForm')?></p>
				</div>
				<form id="formContact" action="<?php echo site_url('Mail/send');?>" method="POST"><br>
					<div class="wrap-input2 validate-input" >
						<input class="input2" type="text" name="name" maxlength="50">
						<span class="focus-input2" data-placeholder="<?php echo $this->lang->line('YourName')?>"></span>
						<div class="col-sm-12"><?php echo form_error('name'); ?></div>
					</div><br>
					<div class="wrap-input2 validate-input" >
						<input class="input2" type="text" name="email" maxlength="50">
						<span class="focus-input2" data-placeholder="<?php echo $this->lang->line('YourMail')?>"></span>
						<div class="col-sm-12"><?php echo form_error('email'); ?></div>
					</div><br>
					<div class="wrap-input2 validate-input" >
						<input class="input2" type="text" name="subject" maxlength="50">
						<span class="focus-input2" data-placeholder="<?php echo $this->lang->line('Subjet')?>"></span>
						<div class="col-sm-12"><?php echo form_error('subject'); ?></div>
					</div><br>
					<div class="wrap-input2 validate-input" >
						<textarea class="input2" name="message" rows="10"></textarea>
						<span class="focus-input2" data-placeholder="<?php echo $this->lang->line('LeaveYourMessage')?>"></span>
						<div class="col-sm-12"><?php echo form_error('message'); ?></div>
					</div> 					 
					<center><input type="submit" class="button2" name="submit" value="<?php echo $this->lang->line('Send')?>"></center><br>
				</form>
			</div>
			<div class="contactField col-md-4 col-sm-12">
				 
			</div>
		</div>
	</div><br><br>
</section>
<script src="<?php echo js_url('contactForm') ;?>" ></script>  