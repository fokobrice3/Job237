<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html >
	<?php include('static/head.php'); ?>
	<body id="mainBlock" data-spy="scroll" data-target=".navbar" data-offset="50">
		<?php
			require_once('static/header.php');    
			//require_once('static/breadcumb.php');   
		?> 
		<section id="FormationSection2">
			<div class="row"> 
				<div class="container"> 
				<?php  
					require_once('static/article.php');
					require_once('static/sideBarFormation.php');
				?> 					
				</div>				
			</div> 
		</section>	
		<section style="padding:0;" class="bg-bottom"> 
			<img src="<?php echo img_url("piq.png"); ?>" alt="shape image" class="img-responsive" style="width: 100%;top:-5px;left:0;position:relative;"/> 
			<div style="padding-left: 200px;padding-right: 200px;padding-top:4rem;padding-bottom: 4rem;" class="row">
                <div class="col-12 col-sm-12 text-center mx-auto reveal">
					<div class="clientname">Nadine NDJOCK</div>
					<div class="row">
						<div class="col-sm-1">
							<span class="blockquote-icon"><i class="fa fa-quote-left"></i></span>
						</div>
						<div class="col-sm-10">
							<p class="" style="font-style:italic;line-height:2em;color:#fff;margin-bottom:20px;font-size:1.05em;font-weight:300;font-family:Roboto,poppins-regular,'Open Sans';" ><?php echo $this->lang->line('MsgBgBottom')?></p>
						</div>
						<div class="col-sm-1">
							<span class="blockquote-icon"><i class="fa fa-quote-right"></i></span>
						</div>
					</div>
					<div class="clientinfo"><span style="color:#dd5246">CEO Group SARL</span> - <span style="color:#00a8ff">Chief Executive Officer</span></div>					
               </div> 
            </div>
		</section>
		<?php   
			require_once('static/footer.php');
		?> 
	</body>
</html>