<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
	<?php require_once("head.php"); ?>
	<body id="page-top">
		<style>
			#wrapper #content-wrapper {
				background-color: #f3f8fb;
				background:url(<?php echo img_url("overlay6.png")?>), url(<?php echo img_url("ab20.jpg")?>);			
				background-size:cover; 
				background-repeat:no-repeat!important;
			}
		</style>
		<?php $index=true;?>
		<!-- Page Wrapper -->
		<div id="wrapper">
			<?php require_once("left-navbar.php"); ?>	
			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">
			  <!-- Main Content -->
			  <div id="content">
				<?php require_once("top-navbar.php"); ?>
				<!-- Begin Page Content -->
				<div class="container-fluid">
				  <!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-title">TABLEAU DE BORD</h1>
						<!--<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
					</div>

					<!-- Content Row -->
					<div style="" class="container-fluid">
						<div class="row">
							<div class="col-xl-2 col-md-6 mb-4">
								<div class="card-02 c-blue shadow h-100 py-2 x1">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<h2 class="text-xs font-weight-bold text-primary text-uppercase mb-1"> EMPLOYEURS</h2>
												<div class="h5 mb-0 font-weight-bold text-gray-800 h2m"><?php echo $nbEmployeur;?></div>
											</div>
											<div class="div-icon">
												<i class="fa fa-user fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-2 col-md-6 mb-4">
								<div class="card-02 c-green-light shadow h-100 py-2 x1">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<h2 class="text-xs font-weight-bold text-primary text-uppercase mb-1">CANDIDATS</h2>
												<div class="h5 mb-0 font-weight-bold text-gray-800 h2m"><?php echo $nbCandidat;?></div>
											</div>
											<div class="div-icon">
												<i class="fas fa-user fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-2 col-md-6 mb-4">
								<div class="card-02 c-red shadow h-100 py-2 x1">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<h2 class="text-xs font-weight-bold text-primary  text-uppercase mb-1">EMPLOIS</h2>
												<div class="h5 mb-0 font-weight-bold text-gray-800 h2m"><?php echo $nbJobs;?></div>
											</div>
											<div class="div-icon">
												<i class="fa fa-list fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-2 col-md-6 mb-4">
								<div class="card-02 c-yellow shadow h-100 py-2 x1">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<h2 class="text-xs font-weight-bold text-primary text-uppercase mb-1">METIERS</h2div>
												<div class="h5 mb-0 font-weight-bold text-gray-800 h2m"><?php echo $nbMetier;?></div>
											</div>
											<div class="div-icon">
												<i class="fas fa-globe fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-md-6 mb-4">
								<div class="card-02 c-green shadow h-100 py-2 x1">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<h2 class="text-xs font-weight-bold text-primary text-uppercase mb-1">DEMANDES EMPLOIS</h25>
												<div class="h5 mb-0 font-weight-bold text-gray-800 h2m"><?php echo $nbDemande;?></div>
											</div>
											<div class="div-icon">
												<i class="fas fa-cogs fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-xl-4 col-md-6 mb-4">
								<div class="card-02 c-violet shadow h-100 py-2 x1">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<h2 class="text-xs font-weight-bold text-primary text-uppercase mb-1">FORMATIONS</h2>
												<div class="h5 mb-0 font-weight-bold text-gray-800 h2m"><?php echo $nbFormation;?></div>
											</div>
											<div class="div-icon">
												<i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>	
							<div class="col-xl-4 col-md-6 mb-4">
								<div class="card-02 c-blue2 shadow h-100 py-2 x1">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<h2 class="text-xs font-weight-bold text-primary text-uppercase mb-1">Articles</h2>
												<div class="h5 mb-0 font-weight-bold text-gray-800 h2m"><?php echo $nbFormation;?></div>
											</div>
											<div class="div-icon">
												<i class="fa fa-file fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>		
							<div class="col-xl-4 col-md-6 mb-4">
								<div class="card-02 c-red2 shadow h-100 py-2 x1">
									<div class="card-body">
										<div class="row no-gutters align-items-center">
											<div class="col mr-2">
												<h2 class="text-xs font-weight-bold text-primary text-uppercase mb-1">POSTES ATTRIBUES AUX CANDIDATS</h2>
												<div class="h5 mb-0 font-weight-bold text-gray-800 h2m"><span class="float-right"><?php echo number_format($nbPosteAccorded)."<span style='color:#121212;'> / ".number_format($nbPoste)."</span>";?></span></div>
											</div>
											<div class="div-icon2">
												<i class="fa fa-cog fa-2x text-gray-300"></i>
											</div>
										</div>
									</div>
								</div>
							</div>					
							<div class="col-lg-6 col-sm-12 mb-4">
								<!--<div class="card bg-warning-card text-white shadow mb-4">
									<div class="card-body"><h5>POSTE ATTRIBUES AUX CANDIDATS <span class="float-right"><?php echo number_format($nbPosteAccorded)."<span style='color:#121212;'> / ".number_format($nbPoste)."</span>";?></span></h5></div>
								</div>-->
								<div class="card shadow mb-4 x1" style="border:none">
									<div style="background:#333333" class="card-header py-3">
										<h6 style="color:#fff" class="m-0 font-weight-bold"><i class="fa fa-exclamation"></i> NOTES</h6>
									</div>
									<div class="card-body">
										<p>CeoGroup Admin est le panel d'aministration dédié à CeoGroup afin d'assurer son fonctionnement. Utilisez le avec précautions.</p>
										<ul>
											<li>Pensez à vérifier les informations remplis par les sociétés puis valider leurs inscriptions sur CeoGroup selon votre jugement.</li> 
											<li>Assurez vous de vous déconnecter avant de quitter le panel d'administration.</li>
										</ul> 
									</div>
								</div> 
								<div class="card shadow mb-4 x1">
									<div class="card-header py-3">
									<h6 class="m-0 font-weight-bold text-primary">STATS CEOGROUP</h6>
									</div>
									<div class="card-body">
										<h4 class="small font-weight-bold">Société active <span class="float-right"><?php $v=($nbCompanyActive/$nbEmployeur)*100; echo number_format($v,2);?>%</span></h4> 
										<div class="progress mb-4">
											<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo number_format($v); ?>%" aria-valuenow="<?php echo number_format($v); ?>" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<h4 class="small font-weight-bold">Profil employeur valide<span class="float-right"><?php $v=($nbEmployerValide/$nbEmployeur)*100; echo number_format($v,2);?>%</span></h4>
										<div class="progress mb-4">
											<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo number_format($v); ?>%" aria-valuenow="<?php echo number_format($v); ?>" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<h4 class="small font-weight-bold">Profil candidat valide <span class="float-right"><?php $v=($nbCandidateValide/$nbCandidat)*100; echo number_format($v,2);?>%</span></h4>
										<div class="progress mb-4">
											<div class="progress-bar" role="progressbar" style="width: <?php echo number_format($v); ?>%" aria-valuenow="<?php echo number_format($v); ?>" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<h4 class="small font-weight-bold">Emplois en ligne valide <span class="float-right"><?php $v=($nbJobsValide/$nbJobs)*100; echo number_format($v,2);?>%</span></h4>
										<div class="progress mb-4">
											<div class="progress-bar bg-info" role="progressbar" style="width: <?php echo number_format($v); ?>%" aria-valuenow="<?php echo number_format($v); ?>" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<h4 class="small font-weight-bold">Offres d'emplois complètement traitée <span class="float-right"><?php $v=($nbJobsAttribuer/$nbJobs)*100; echo number_format($v,2);?>%</span></h4>
										<div class="progress mb-4">
											<div class="progress-bar bg-gray-500" role="progressbar" style="width: <?php echo number_format($v); ?>%" aria-valuenow="<?php echo number_format($v); ?>" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<h4 class="small font-weight-bold">Postes attribué <span class="float-right"><?php $v=($nbPosteAccorded/$nbPoste)*100; echo number_format($v,2);?>%</span></h4>
										<div class="progress mb-4">
											<div class="progress-bar bg-info-2" role="progressbar" style="width: <?php echo number_format($v); ?>%" aria-valuenow="<?php echo number_format($v); ?>" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
										<h4 class="small font-weight-bold">Demandes des candidat traitée <span class="float-right"><?php $v=($nbDemandeOK/$nbDemande)*100; echo number_format($v,2);?>%</span></h4>
										<div class="progress">
											<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo number_format($v); ?>%" aria-valuenow="<?php echo number_format($v); ?>" aria-valuemin="0" aria-valuemax="100"></div>
										</div>
									</div>
								</div>								
							</div>
							<div class="col-lg-6 mb-4">
								<div class="card shadow mb-4 x2" style="max-height:880px;">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">DERNIERS EMPLOYEURS ENREGISTRES</h6>
									</div>
									<div class="card-body">	
										<p>Listes des dernières(10) entreprises à avoir rejoins CEOGroup. Après avoir vérifier leurs information, pensez à les activer pour qu'elles puissent utiliser pleinement le programme.</p> 
										<div class="table-responsive container">
											<table class="table">
												<thead>
													<tr>
														<th>NOM</th>
														<th>EMAIL</th> 
														<th>DATE</th>
														<th>ACTIF ?</th>
														<th>ACTION</th>
													</tr>
												</thead>
												<tbody>
												<?php
													foreach($lastEmployers as $employer){
														if($employer['active']) $actif='<i style="color:#82b440;font-size:1.6em;" class="fa fa-check-circle"></i>';
														else $actif='<i style="color:#6c6c6c;font-size:1.6em;" class="fa fa-times-circle"></i>';
														
														$dateTime = explode(" ", $employer['dateCreation']);
														$date = explode("-", $dateTime[0]);
														$time = explode(":", $dateTime[1]); 
														$DC = date("M d, Y à H\h i",mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0])); 	
						
						
														echo '<tr>
															<td>'.$employer['nom'].'</td>
															<td>'.$employer['email'].'</td> 
															<td>'.$DC.'</td>
															<td>'.$actif.'</td>
															<td><a href="'.site_url("Admin/list_employeur/read/".$employer['idEmployeur']).'" class="btn btn-light btn-icon-split">
																<span class="icon text-gray-600">
																<i class="fas fa-arrow-right"></i>
																</span>
																<span class="text">Détails</span>
															</a>
															</td>
														</tr>';
													}
												?>																						 
												</tbody>
											</table>
										</div>										
										<a rel="nofollow" href="<?php echo site_url("Admin/list_employeur") ?>">Voir tous les employeurs</a>
									</div>
								</div>								
							</div>						
							<div class="col-lg-6 mb-4">
								<div class="card shadow mb-4 x2">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">Derniers Emplois Enregistré</h6>
									</div>
									<div class="card-body">
										<div class="table-responsive container" style="max-height:700px;overflow-y:scroll;">
										<table class="table">
											<thead>
												<tr>
													<th>POSTE</th> 
													<th>SOCIETE</th>
													<th>POSTE</th>
													<th>ACTION</th>
												</tr>
											</thead>
											<tbody>
											<?php
											foreach($lastJobs as $jobs){									
												echo '<tr>
														<td>'.$jobs['poste'].'</td>
														<td><img style="width:48px;height:50px;border-radius:50%;" src="'.img_url("logo/".$jobs['logo']).'" alt="logo"> &nbsp;&nbsp;'.$jobs['nom'].'</td> 
														<td>'.$jobs['nbPoste'].'</td> 
														<td><a href="'.site_url("Admin/list_emplois/read/".$jobs['idOffre']).'" class="btn btn-light btn-icon-split">
															<span class="icon text-gray-600">
															<i class="fas fa-arrow-right"></i>
															</span>
															<span class="text">Détails</span>
														</a>
														</td>
													</tr>';
												}
											?>												 
											</tbody>
										</table>
									</div>	
									</div>
								</div>
							</div>
							<div class="col-lg-6 mb-4">
								<div class="card shadow mb-4 x2">
									<div class="card-header py-3">
										<h6 class="m-0 font-weight-bold text-primary">Dernières Demandes d'emplois</h6>
									</div>
									<div class="card-body">
										<div class="table-responsive container" style="max-height:700px;overflow-y:scroll;">
											<table class="table">
												<thead>
													<tr>
														<th>CANDIDAT</th>
														<th>POSTE</th> 
														<th>SOCIETE</th>
														<th>ACTION</th>
													</tr>
												</thead>
												<tbody>
												<?php
												foreach($lastDemande as $demande){									
													echo '<tr>
															<td><img style="background:#fff;width:48px;height:50px;border-radius:50%;" src="'.img_url("profil/".$demande['photo']).'" alt="logo"> &nbsp;&nbsp;'.$demande['nom_candidat'].'</td>
															<td>'.$demande['poste'].'</td>
															<td><img style="width:48px;height:50px;border-radius:50%;" src="'.img_url("logo/".$demande['logo']).'" alt="logo"> &nbsp;&nbsp;'.$demande['nom_societe'].'</td>  
															<td><a href="'.site_url("Admin/voir_details_demande/".$demande['idDemande']).'" class="btn btn-light btn-icon-split">
																<span class="icon text-gray-600">
																<i class="fas fa-arrow-right"></i>
																</span>
																<span class="text">Détails</span>
															</a>
															</td>
														</tr>';
													}
												?>										 
												</tbody>
											</table>
										</div>		
									</div>
								</div>
							</div>						
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
	</body>
</html>
