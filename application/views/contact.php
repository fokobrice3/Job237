<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html >
	<?php include('static/head.php'); ?>
	<body id="mainBlock" data-spy="scroll" data-target=".navbar" data-offset="50">
		<?php
			require_once('static/header.php');    
			//require_once('static/breadcumb.php'); ?> 
			
		<div id="contactBread" style="background-color: #f6f8f9;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-12 col-lg-4 text-center mb-40 mb-lg-0">
                        <span class="mb-20 icon-rounded position-relative">
                            <i class="fa fa-map-marker"></i>
                        </span>
                        <h2 class="h6-font">Address</h2>
                        <p class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:1em;">BP : 14 832, Yaoundé-Nsam</p>
                    </div>
                    <!-- end of col -->
                    <div class="col-12 col-sm-12 col-lg-4 text-center mb-40 mb-lg-0">
                        <span class="mb-20 icon-rounded position-relative">
                            <i class="fa fa-envelope-o"></i>
                        </span>
                        <h2 class="h6-font">Email</h2>
                        <a class="lead text-justify" style="color:#2196f3;font-family:Roboto;font-weight:100;font-size:1em;" href="mailto:info@ceo-group.com" class="btn-text-hover">info@ceo-group.com</a>
                    </div>
                    <!-- end of col -->
                    <div class="col-12 col-sm-12 col-lg-4 text-center  mb-40 mb-lg-0">
                        <span class="mb-20 icon-rounded position-relative">
                            <i class="fa fa-phone"></i>
                        </span>
                        <h2 class="h6-font">Phone Number</h2>
						<a class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:1em;" href="tell:" class="btn-text-hover">+(237) 655 090 713</a><br>
						<a class="lead text-justify" style="color:#777;font-family:Roboto;font-weight:100;font-size:1em;" href="tell:" class="btn-text-hover">+(237) 650 634 273</a>
                    </div>
                    <!-- end of col -->                     
                </div>
            </div>
		</div>
		
		<?php	
			require_once('static/contactForm.php');    
			require_once('static/footer.php');
		?> 
	</body>
</html>