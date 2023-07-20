<!-- Formation details Section -->
<?php
	if($langue=="french"){
		$nom = $formation->nom;
		$description = $formation->Description; 
	}else{
		$nom = $formation->name;
		$description = $formation->description_eng; 				
	}
?> 
<style>p{display:block;position:relative;}</style>
<div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-60 mb-lg-0 order-lg-2">
	<div class="row content">
		<div class="col-sm-12"><a href="<?php echo site_url("Welcome/Allformation");?>" style="display:block;font-family:Roboto;color:#777!important;margin-bottom:10px;"><i class="fa fa-chevron-left"></i> <?php echo $this->lang->line("Previous"); ?></a></div>
        <div style="margin-bottom:14px" class="col-sm-12"><br><br>
            <div class="col-12 col-sm-12"> 
                <img style="height:auto;max-height:480px;width:720px;max-width:90%;vertical-align:middle;border-radius:.25rem;" src="<?php echo img_url("formation/".$formation->image) ?>" alt="Image">
			</div>
        </div>
        <div  style="margin-bottom:30px" class="col-sm-12">
            <h1 style="font-family:poppins-regular;color:#262c42;text-align:left;text-shadow:none;"><?php echo $nom ?></h1>
            <div class="d-flex">
				<p class="lead text-left" style="margin-bottom:10px;color:#777;font-size:0.9em;"><?php echo $this->lang->line("Begin").': '.$formation->dateDebut; ?> &nbsp; | &nbsp; <?php echo $this->lang->line("End").': '.$formation->dateFin; ?></p>
				<p style="display:block;font-family:Roboto;color:#5036a2!important;margin-bottom:10px;"><?php echo $description; ?></p>	
				<p style="display:inline-block;background:#f48040;color:#fafafa;padding:5px 10px;font-weight:bold;border-radius:4px;"><?php echo $this->lang->line("Price").": ".number_format($formation->price)." FCFA"; ?></p>
        	</div>
        </div>
        <div style="margin-bottom:50px;display:block;" class="row">
            <div style="padding:15px;font-family:Roboto!important;" class="col-sm-12">
                <h1 style="font-family:poppins-regular;color:#281483;text-align:left;font-size:1.4em;">
					<span style="background: #281483 !important;display: inline-flex;min-width: 2.75rem;
						min-height: 2.75rem;box-shadow: 0 1px 2px 0 rgba(0,0,0,0.12);text-align: center;
						border-radius:25rem;align-items: center;justify-content: center;color:#fff">
						<i style="font-size: 1.2rem;" class="fa fa-file-archive-o"></i> 
                    </span>		
					<?php echo $this->lang->line("Details");?>			
				</h1>				 
			</div>
			<div class="col-sm-12">			
				<div id="details" style="padding:0px 20px;height:auto;"><?php echo trim($formation->Contenu); ?></div>
			</div>
        </div>  
		<div class="row">
			<div style="padding:15px;font-family:Lato!important;" class="col-sm-12">
				<hr>
				<br>
				<h1 style="font-family:poppins-regular;color:#474547;text-align:center;text-shadow:none;font-size:1.6em;"><?php echo $this->lang->line("Contact")?></h1>
				<p class="lead" style="text-align:center;font-style:italic;color:#777;font-family:Roboto;font-weight:100;font-size:1em;"><?php echo $this->lang->line("SubscribeFormation")?></p> 			 
			</div>
			<div>
				<div class="row">
                   	<form class="formation_form" action="<?php echo site_url('Mail/send_formation/'.$formation->idFormation);?>" method="POST">
						<div class="col-md-6">
							<input class="formation_input" type="text" name="Name" placeholder="Name" required>
						</div>
						<div class="col-md-6">
							<input class="formation_input" type="text" name="Email" placeholder="Email" required>
						</div>
						<div class="col-md-12">
							<textarea class="formation_message" name="formation_message" placeholder="Message" rows="8" required></textarea>
						</div>
						<center><input type="submit" class="button" value="<?php echo $this->lang->line("Send")?>"></center>
					</form>
				</div>
			</div>
			<br>
		</div>  
    </div>
</div> 