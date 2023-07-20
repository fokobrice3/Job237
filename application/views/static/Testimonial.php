<!-- Testimonial Section remplacé par contact-->
<section id="ContactMainSection">
	<div class="row">
		<div class="container">
			<h1><?php echo $this->lang->line('ContactUs')?></h1>
			<div class="col-sm-12">
				<p class="lead text-center" style="color:white"><?php echo $this->lang->line('ContactUsMsg')?></p>
            </div>
			<div class="col-sm-12">
				<form action="<?php echo site_url('Mail/send');?>" method="POST"><br>  
					<div class="form-group col-md-6">
						<label for="name"><?php echo $this->lang->line('YourName')?></label>
						<input type="text" class="form-control inpt1" id="name" name="name" maxlength="50">
					</div>
					<div class="form-group col-md-6">
						<label for="email"><?php echo $this->lang->line('YourMail')?></label>
						<input type="email" class="form-control inpt1" id="email" name="email" maxlength="50">
					</div>
					<div class="form-group col-md-12">
						<label for="subject"><?php echo $this->lang->line('Subjet')?></label>
						<input type="text" class="form-control inpt1" id="subject" name="subject" maxlength="50">
					</div>
					<div class="form-group col-md-12">
						<label for="message"><?php echo $this->lang->line('LeaveYourMessage')?></label><br>
						<textarea class="form-control inpt2" name="message" id="message" rows="10"></textarea> 
					</div>
					<br>
					<center><input type="submit" class="button2" name="submit" value="<?php echo $this->lang->line('Send')?>"></center><br>
				</form>
			</div>
			<div class="col-sm-12">
				<p class="lead text-center" style="color:white"><?php echo $this->lang->line('ContactUsMsgNumber')?></p>
            </div>
		</div> 
	</div>
</section>