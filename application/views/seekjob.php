<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html >
	<?php include('static/head.php'); ?>
	<body>
		<?php
			require_once('static/header.php');     
			require_once('static/breadcumb.php');  
			if(isset($_SESSION['compte'])){
				echo'<section id="Dashboard" style="border:none;background:#f2f2f2;">	
						<div class="row"><br>';
				if($_SESSION['compte']=="candidate"){ include('candidate/sidebar.php'); $color='style="background:#2e0f3f;"';}
				else {include('employer/sidebar.php');$color='style="background:#00abe6;"';}
						echo'<div class="container">';
						echo '<h5 class="titre5" '.$color.'>'.$this->lang->line("FindJob").'</h5>';
						include('filter.php'); 
						include('jobseek_page.php');
						echo'</div>';						
					echo'</div>
					</section>';
			}else{
				echo'<div class="container">
						<section id="Dashboard" style="border:none;background:#f2f2f2;margin:15px 0px;padding:10px 30px 80px 30px;"> 
							<div class="row">'; 
							include('filter.php'); 
							include('jobseek_page.php'); 				
				echo '		</div>
						</section>	
					</div>';
			}
			require_once('static/footer.php'); 
		?>	
	</body>
</html> 