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
		<!-- Formation Section -->
		<section id="FormationSection">
			<div class="row">
				<div class="container">
					<!--<h1><?php echo $this->lang->line('OurFormation')?></h1> -->
					<div class="col-sm-12">
						<p class="lead text-center" style="color:#777;font-family:Roboto;font-weight:100;font-size:1em;">"<?php echo $this->lang->line('OurArticleMsg')?>"</p><br><br>						
					</div>   
					<div class="row">
					<?php   
						require_once('static/sideArticle.php');
					?> 	
					<!-- List Articles --> 
					<div class="col-12 col-sm-12 col-md-8 col-lg-8 mb-60 mb-lg-0 order-lg-2">
						<div class="row" style="flex-wrap:wrap;margin-right:-15px;margin-left:-15px;display:flex;">
							<div class="container">
							<?php							
							if(count($list_articles)>0){
								foreach($list_articles as $article){									
									$date = explode("-", $article['DateCreation']);			
									$dateArticle = date("d M Y",mktime(0,0,0,$date[1], $date[2], $date[0]));
									echo'<a href="'.article_url($article["Fichier"]).'" style="margin:10px 5px;border:1px solid #eee;box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1);border-bottom-right-radius: 10px;border-bottom-left-radius: 10px;" class="col-sm-12">
											<div class="col-sm-3">
												<br><img style="width:100%;vertical-align: middle;border-style:none;" src="'.img_url("pdf.png").'">  
											</div>
											<div class="col-sm-9">
												<div class="row">
													<div class="col-sm-12"><h2 style="
														font-weight: 600;
														font-size: 1em;
														color: #29303b;
														line-height: 20px;
														font-family: Poppins-Bold,Bariol-Bold,Roboto;
														padding: 10px;
														text-transform:uppercase;
														text-align: center;">'.$article["Titre"].'</h2></div>
													<div class="col-sm-12"><p style="
														line-height: 1.3em;
														color: #565656;
														font-size: 1em; 
														height: 100px;
														text-decoration: none;
														display: -webkit-box !important;
														-webkit-box-orient: vertical;
														overflow: hidden; 
														white-space: normal;
														margin-bottom: 15px;
														font-family: Roboto,"Open Sans",Lato;
														padding: 2px 10px;
														color: #777;
														text-align: justify;">'.$article["resume"].'</div>
													<div style="color:#777;font-size:0.9em;height:25px;" class="col-sm-12"><span style="float:left">Par <em style="font-weight:700">'.$article["Auteur"].'</em></span> <span style="float:right">le '.$dateArticle.'</span></div>
												</div>
											</div>
										</a>'; 
								}
							}else{
								echo"<p class='text_lastFormation' style='text-align:center'> Aucun Resultat</p>";				
							}
							?>
							</div>       
						</div>
						<!-- end of post row -->
						<div class="row">
							<div class="col-12 col-sm-12" >			
									<nav aria-label="Page navigation">
										<ul class="pagination">
										<center>
										<?php
											if($currentPage>1){echo '<li class="page-item">
												<a class="page-link" href="'.site_url("Welcome/Article/".($currentPage-1)).'">
													<i class="fa fa-long-arrow-left mr-10"></i> '.$this->lang->line("Previous").'</a></li>';
											}
											$i=0;
											if($currentPage>3){
												echo '<li class="page-item"><a href="'.site_url("Welcome/Article/".(1)).'" class="page-link">1</a></li>';
												echo '<li class="page-item"><span class="page-link">...</span></li>';
											} 
											if($currentPage>1){
												echo'<li class="page-item"><a class="page-link" href="'.site_url("Welcome/Article/".($currentPage-1)).'">'.($currentPage-1).'</a></li>';
											} 
											for($i=$currentPage;$i<=$currentPage+1;$i++){
												if($i<$nbPage+1){
													echo'<li class="page-item';
													if($i==$currentPage) echo' active';
													echo'"><a class="page-link" href="'.site_url("Welcome/Article/".($currentPage+1)).'">'.$i.'</a></li>';
												}
											}
											if($nbPage>1 && $currentPage+2<$nbPage){echo '<li class="page-item"><span class="page-link">...</span></li>';}
											if($nbPage>1 && $currentPage+1<$nbPage){
												echo'<li class="page-item';
												if($currentPage==$nbPage) echo' active';
												echo'"><a class="page-link" href="'.site_url("Welcome/Article/".($nbPage)).'">'.$nbPage.'</a></li>';
											} 						
											if($nbPage>1 && $currentPage<$nbPage){
												echo'<li class="page-item">
												<a class="page-link" href="'.site_url("Welcome/Article/".($currentPage+1)).'">
												'.$this->lang->line("Next").'<i class="fa fa-long-arrow-right ml-10"></i></a></li>';
											}
											
										?>
											<!--<li class="page-item"><a class="page-link" href="#">1</a></li>
											<li class="page-item"><a class="page-link" href="#">2</a></li>
											<li class="page-item active"><a class="page-link" href="#">...</a></li>
											<li class="page-item"><a class="page-link" href="#">10</a></li>-->
											</center>
										</ul>
									</nav>			
							</div>
							<!-- end of pagination col -->
						</div>
					<!-- end of pagination row -->
					</div>					
					</div>
				</div>
			</div> 
		</section>	
		<section style="padding:0;" class="bg-bottom"> 
			<img src="<?php echo img_url("flip-horizontal-inv.png"); ?>" style="position:relative;top:-5px;width: 100%;"alt="shape image" class="img-responsive" /> 
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
					<div class="clientinfo"><span style="color:#dd5246">CEOGroup</span> - <span style="color:#00a8ff">Chief Executive Officer</span></div>					
               </div> 
            </div>
		</section>
		<?php  
			require_once('static/footer.php');
		?> 
	</body>
</html>