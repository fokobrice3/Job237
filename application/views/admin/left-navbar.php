<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion bg-left <?php if(!isset($index)) echo 'toggled';?>" id="accordionSidebar">

	<!-- Sidebar - Brand --><br>
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo site_url("Admin/index")?>">
		<div class="sidebar-brand-icon">
			<img style="position:relative;width:90%;padding:5px 0 0 0;" src="<?php echo img_url("filiLogo3.png");?>">			
		</div>
	</a>

	<!-- Divider -->
	<!-- <hr class="sidebar-divider my-0"> -->

	<!-- Nav Item - Dashboard 
	<li class="nav-item active">
		<a class="nav-link" href="<?php echo site_url("Admin/index");?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<span>Tableau de bord</span>
		</a>
	</li>
	-->
	<!-- Divider -->
	<br>
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">Membres</div>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-fw fa-cog"></i>
			<span>Employeurs</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Gestion des Employeurs:</h6>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_employeur")?>"><i class="fas fa-fw fa-th-list"></i> Lister</a>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_employeur/add")?>"><i class="fas fa-fw fa-plus"></i> Ajouter</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-fw fa-wrench"></i>
			<span>Candidats</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Gestion des Candidats:</h6>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_candidat")?>"><i class="fas fa-fw fa-th-list"></i> Lister</a>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_candidat/add")?>"><i class="fas fa-fw fa-plus"></i> Ajouter</a>
			</div>
		</div>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">Emplois</div>
	<li class="nav-item">
		<a class="nav-link" href="<?php echo site_url("Admin/list_societe")?>">
			<i class="fas fa-fw fa-plus"></i>
			<span>Sociétés</span>
		</a>		
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEmplois" aria-expanded="true" aria-controls="collapseEmplois">
			<i class="fas fa-fw fa-folder"></i>
			<span>Emplois</span>
		</a>
		<div id="collapseEmplois" class="collapse" aria-labelledby="headingEmplois" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Gestion des Emplois :</h6>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_emplois")?>"><i class="fas fa-fw fa-th-list"></i> Lister</a>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_emplois/add")?>"><i class="fas fa-fw fa-plus"></i> Ajouter</a> 		
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="<?php echo site_url("Admin/list_demande")?>">
			<i class="fas fa-fw fa-plus"></i>
			<span>Demandes d'Emplois</span>
		</a>
	</li>

	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Heading -->
	<div class="sidebar-heading">Config</div>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseform" aria-expanded="true" aria-controls="collapseform">
			<i class="fas fa-fw fa-table"></i>
			<span>Formations</span>
		</a>
		<div id="collapseform" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Gestion formations:</h6>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_formations")?>"><i class="fas fa-fw fa-th-list"></i> Lister formations</a>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_formations/add")?>"><i class="fas fa-fw fa-plus"></i> Ajouter formations</a>
				<hr class="sidebar-divider d-none d-md-block">
				<a class="collapse-item" href="<?php echo site_url("Admin/list_catF")?>"><i class="fas fa-fw fa-th-list"></i> Lister categories</a>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_catF/add")?>"><i class="fas fa-fw fa-plus"></i> Ajouter categories</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseArti" aria-expanded="true" aria-controls="collapseArti">
			<i class="fas fa-fw fa-table"></i>
			<span>Articles</span>
		</a>
		<div id="collapseArti" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Gestion articles:</h6>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_articles")?>"><i class="fas fa-fw fa-th-list"></i> Lister Articles</a>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_articles/add")?>"><i class="fas fa-fw fa-plus"></i> Ajouter Articles</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
			<i class="fa fa-fw fa-safari"></i>
			<span>Localisation</span>
		</a>
		<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="<?php echo site_url("Admin/list_pays")?>"><i class="fas fa-fw fa-globe"></i> Pays</a>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_region")?>"><i class="fas fa-fw fa-plus"></i> Region</a>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_ville")?>"><i class="fas fa-fw fa-plus"></i> Ville</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEdu" aria-expanded="true" aria-controls="collapseEdu">
			<i class="fas fa-fw fa-table"></i>
			<span>Education</span>
		</a>
		<div id="collapseEdu" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Gestion education:</h6>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_discipline")?>"><i class="fas fa-fw fa-plus"></i> Disciplines</a>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_degree")?>"><i class="fas fa-fw fa-plus"></i> Diplomes et Certificats</a>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_skills")?>"><i class="fas fa-fw fa-plus"></i> Compétences</a>
			</div>
		</div>
	</li>
	<li class="nav-item">
	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRecru" aria-expanded="true" aria-controls="collapseRecru">
			<i class="fas fa-fw fa-table"></i>
			<span>Recrutement</span>
		</a>
		<div id="collapseRecru" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Gestion education:</h6>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_secteur")?>"><i class="fas fa-fw fa-plus"></i> Secteur d'activites</a>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_metier")?>"><i class="fas fa-fw fa-plus"></i> Métiers</a>
				<!--<a class="collapse-item" href="<?php echo site_url("Admin/list_professions")?>"><i class="fas fa-fw fa-list"></i> Lister Profession</a>-->
			</div>
		</div>
	</li> 
	<li class="nav-item">
	<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePole" aria-expanded="true" aria-controls="collapsePole">
			<i class="fa fa-map"></i>
			<span>Pôles et services</span>
		</a>
		<div id="collapsePole" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<h6 class="collapse-header">Gestion education:</h6>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_poles")?>"><i class="fas fa-fw fa-plus"></i> Pôles</a>
				<a class="collapse-item" href="<?php echo site_url("Admin/list_services")?>"><i class="fas fa-fw fa-plus"></i> Services</a> 
			</div>
		</div>
	</li> 
	<hr class="sidebar-divider d-none d-md-block">
	
	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div> 
</ul>
<!-- End of Sidebar -->
