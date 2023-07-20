<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<?php require_once("head.php"); ?>
	<body id="page-top" class="sidebar-toggled">
		<style>
			#wrapper #content-wrapper {
				background-color: #e1e3e6;
				background:url(<?php echo img_url("overlay3.png")?>), url(<?php echo img_url("ab16.jpg")?>);
				background-size:cover;
				background-repeat:no-repeat;	
			}
		</style> 
		<div id="wrapper">
			<?php require_once("left-navbar.php"); ?>	 
			<div id="content-wrapper" class="d-flex flex-column"> 
			  <div id="content">
				<?php require_once("top-navbar.php"); ?> 
				<div class="container-fluid"> 
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-title"><?php echo strtoupper($_SESSION["page"]);?></h1>  
					</div> 
					<div class="row" style="">
						<div style="width:100%;height:1px;color:#fff;background:#fff"></div>	
						<div style="padding:20px 0px;overflow-x:scroll">
							<?php echo $output; ?>
						</div>
					</div>
				</div>
			</div>
			
			<?php include("footer.php"); ?>
		</div>
	</div>	
	  <a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	  </a>
		<?php include("script.php"); ?>
		<?php foreach($js_files as $file): ?>
			<script src="<?php echo $file; ?>"></script>
		<?php endforeach; ?>
	</body>
</html>
