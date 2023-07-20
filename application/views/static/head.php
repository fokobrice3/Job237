<head lang="en">
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->config->item('charset'); ?>" />
	<title>CeoGroup</title>	
	<link rel="stylesheet" href="<?php echo css_url('font-awesome.min'); ?>" /> 
	<link rel="stylesheet" href="<?php echo css_url('bootstrap.min'); ?>" />	 
	<link rel="stylesheet" type="text/css"	media="screen" href="<?php echo css_url('style'); ?>" /> 
	<link rel="shortcut icon" href="<?php echo img_url('favicon.ico'); ?>" > 
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,100,400italic,500italic,500,700italic,900,700,900italic,100italic' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">	
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,700,700italic&subset=latin,vietnamese,latin-ext,cyrillic,cyrillic-ext,greek-ext,greek' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>
	<meta name="keywords" content="Ceogroup , responsive, html5, business, job, company, corporate, services, shipping, candidate, employer, emplois, employeur, formation">

	<link rel="stylesheet/less" type="text/css" href="<?php echo less_url('style'); ?>" />	
	
	<script src="<?php echo js_url('jquery-1.11.2.min') ;?>" ></script>
	<script src="<?php echo js_url('bootstrap.min') ;?>" ></script>  
	<script src="<?php echo js_url('jquery.easeScroll.min') ;?>" ></script>  
	<script src="<?php echo js_url('less.min') ;?>" ></script>	 
	<?php 
		if($page=="accueil"){
			echo '<link href="'.css_url("owl.theme.default.min").'" rel="stylesheet">
			<link href="'.css_url("owl.carousel.min").'" rel="stylesheet">			
			<script src="'.js_url('owl.carousel.min').'"></script>
			<script src="'.js_url('scripts').'"></script>';
			
		}
	?>
</head>