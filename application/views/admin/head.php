<head>
 	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  	<meta name="description" content="">
  	<meta name="author" content="">
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->config->item('charset'); ?>" />
	<meta name="keywords" content="Ceogroup , responsive, html5, business, job, company, corporate, services, shipping, candidate, employer, emplois, employeur, formation">

  	<title>CEoGroup Administration</title>

  <!-- Custom fonts for this template-->
  	<link href="<?php echo vendor("fontawesome-free/css/all.min.css"); ?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="<?php echo css_url('font-awesome.min'); ?>" /> 
  	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,300italic,100,400italic,500italic,500,700italic,900,700,900italic,100italic' rel='stylesheet' type='text/css'>
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">	
	<link href='https://fonts.googleapis.com/css?family=Oswald:400,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,300italic,700&subset=latin,greek,greek-ext,vietnamese,cyrillic-ext,cyrillic,latin-ext' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template-->
  	<link href="<?php echo css_url("sb-admin-2.min"); ?>" rel="stylesheet">	
	<link rel="shortcut icon" href="<?php echo img_url('favicon.ico'); ?>" > 
  <!-- GROCERY CRUD -->
	 <?php 
	foreach($css_files as $file): ?>
		<link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
	<?php endforeach; ?>

	<style>
	/* GROCERY CSS */
		#form-button-save, .add_button{
			border: 2px solid #398439;
			background: #4caf50;
			color: #fff;			 
			text-align:center;
			cursor: pointer;  
			font-weight:bold;
			font-family:nunito;
		}
		#form-button-save:hover, .add_button:hover{
			background: linear-gradient(#87b92d 50%,#398439 50%);
			color: #fafafa;
			border: 2px solid #1a531a;
		}
		.ui-state-default .ui-icon, .ui-state-default .ui-icon:hover{
			background-image: url(<?php echo asset_url("grocery_crud/css/ui/simple/images/ui-icons_333333_256x240.png") ?>);
		}
		thead .ui-state-default{			
			border:none!important;
			background: #e6e6e6 url(images/ui-bg_glass_75_e6e6e6_1x400.png) 50% 50% repeat-x;
			background: #dcb000!important;
		} 
		table.display thead th div.DataTables_sort_wrapper { 
			padding-right: 10px!important;
			font-size: 1em!important;
			font-family: Poppins,Lato,Roboto,nunito!important;
			color: #111111!important;
			text-align:center!important;
		}
		table.dataTable td {
			color: #444!important;
			font-family: Poppins,Lato,Roboto,nunito!important;
			border: 1px solid white!important;
			text-align:center!important;
			font-size: 0.9em!important;
		}
		.delete_button{
			border: 2px solid #fe746a;
			background: #f44336;
			color: #fff;			 
			text-align:center;
			cursor: pointer;  
			font-weight:bold;
			font-family:nunito;
		}
		.delete_button:hover{
			background: linear-gradient(#f44336 50%,#d9534f 50%);
			color: #fafafa;
			border: 2px solid #c64844;
		}
		.edit_button{
			border: 2px solid #eee;
			background: #fafafa;
			color: #121212;			 
			text-align:center;
			cursor: pointer;  
			font-weight:bold;
			font-family:nunito;
		}
		.edit_button:hover{
			border: 2px solid #aaa;
			background: linear-gradient(to bottom, #fafafa 50%, #ddd 50%);
			color: #444;
			font-weight: bold;
			font-family:nunito;
		} 
		
		.actions a:first-child{
			border: 2px solid #257fc7;
			background: #2196f3;
			color: #fafafa;			 
			text-align:center;
			cursor: pointer;  
			font-weight:bold;
			font-family:nunito; 	
		} 
		.actions a:first-child:hover{
			border: 2px solid #1564a3;
			background: linear-gradient(to bottom, #4da2e5 50%, #1873bb 50%);
			font-weight: bold;
			font-family:nunito;	
		}  
		.ui-icon-attrib{background-position: -32px -80px;}
		.ui-icon-active{background-position: -62px -145px;}
		table.dataTable td {
			color: #444;
			font-family:nunito;
		}
		table.dataTable tr.odd,table.dataTable tr.odd td.sorting_1 {
			background-color: #f6f7f9;
			color: #444;
			border:1px solid eee;
		} 
		table.dataTable tr.even td.sorting_1 {
			background-color: #fff;
			color: #444;
		}
		.report-div.error p {
			font-size: 10px;
		}
		.DTTT_button.ui-button {
			margin-right: 0px !important;
			margin-left: 4px !important;
			background: #fff;
			box-shadow: none;
			border: 1px solid #111;
		}
		.DTTT_button.ui-button:hover {
			background: linear-gradient(#fff 50%,#ddd 50%);
		}
		.label,input {
			font-family:nunito;
		}
		.ui-widget-header {
			border: 1px solid #aaa;
			background: linear-gradient(to bottom, #fafafa 50%, #eee 50%);
			color: #444;
			font-weight: bold;
			font-family:nunito;
		}
		.groceryCrudTable tfoot tr th input[type=text], .datatables div.form-div input[type=text], .datatables div.form-div textarea { 
			height: auto;
			line-height: 1.5em;
			padding: 5px;
			font-family:nunito; 
		} 
		.report-div.success { 
			background: #fff;
			border-radius:4px;
		}
		.report-div.success p {
			background: #fff; 
		}
		table.display thead th div.DataTables_sort_wrapper {
			position: relative;
			padding-right: 20px;
			padding-right: 20px;
			font-size: 0.9em;
			font-family:nunito; 
			color:#444;
		}
		table.dataTable thead th { 
			border-bottom: none; 
		}
		.ui-widget-header {
			border: none; 
		}
		table.dataTable tfoot th {
			border-top: none;
		}
		.groceryCrudTable tfoot tr th input[type=number]:focus, .datatables div.form-div input[type=number]:focus {
			outline: 0;
			border-color: rgba(82, 168, 236, 0.8);
			-webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1),0 0 8px rgba(82, 168, 236, 0.6);
			-moz-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1),0 0 8px rgba(82, 168, 236, 0.6);
			box-shadow: inset 0px 1px 3px rgba(0,0,0,0.1), 0px 0px 8px rgba(82,168,236,0.6);
		}
		.datatables div.form-div input[type=number]:hover, .datatables div.form-div input[type=number]:focus{
			border: 1px solid #444;
			background: #fff;
			line-height: 1.5em;
			padding: 5px;
			font-family: nunito;
		}
		.groceryCrudTable tfoot tr th input[type=number], .datatables div.form-div input[type=number]{
			line-height: 1.5em;
			padding: 5px;
			font-family: nunito;
			border-radius:4px;
			color:#444;
			border: 1px solid #ccc;
			border-radius: 3px;
		}
		.grocerycrud-container {
			font-family:Nunito,Arial,sans-serif; 
			min-width: 1000px!important;
			width: 90vw!important;
		}
		div.dataTables_wrapper .ui-widget-header { 
			font-weight: 300!important;
			background: #282828;/* 21a366 007acc 93095c 282828 */
			color: #fafafa;
			font-size: 1.1em; 
			font-family: lato, sans-serif; 
		}
		.ui-widget-header select { 
			padding: 2px 5px;
			margin: 0px 2px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
			font-family: sans-serif;
  			font-weight: bold;
		}
		.ui-widget-header input[type="text"]{
			padding: 2px 5px;
			margin: 0px 2px;
			display: inline-block;
			border: 1px solid #ccc;
			box-sizing: border-box;
			font-family: sans-serif;
  			font-weight: bold;
		}
		
		/*form*/
		.ui-widget-content{
			border:none!important;
			box-shadow: 0px 2px 5px 0px rgba(0, 0, 0, 0.1)!important;
		}
		.form-title {
			border: 1px solid #d3d3d3!important;
			background: #93095c!important;/* 21a366 007acc 93095c 282828 */ 
			font-weight: 700!important;
			background: #282828;/* 21a366 007acc 93095c 282828 */		
			font-size: 1.1em!important; 
			font-family: lato, sans-serif!important; 
			min-height:40px!important;
		}
		.form-title a{text-transform:uppercase;color: #fafafa!important;}
		.form-display-as-box{
			font-family: Lato, Roboto, sans-serif!important; 
		}
		.datatables div.form-div input[type=text], .form-div textarea {
			height: auto!important;
			line-height: 1.5em!important; 
			font-family: Lato, Roboto, sans-serif!important;
			padding: 5px 15px!important;
			margin: 0px 2px!important;
			display: inline-block!important;
			border: 1px solid #ccc!important;
			box-sizing: border-box!important;  
		}
	/* ADMIN CSS */	
		.sidebar.toggled .nav-item .collapse, .sidebar.toggled .nav-item .collapsing {
			z-index: 9999;
		}
		.bg-left{
			background:#343a40;
			background:linear-gradient(to bottom right,#343a40,#212529)!important;
		} 
		.bg-footer{
			background:linear-gradient(to bottom right,#5c2687,#4d198e)!important;
		}
		.bg-top{ 			
			background:linear-gradient(to bottom right,#5c2687,#4d198e)!important;
			background:linear-gradient(to bottom right,#fff,#ddd)!important; 	
			background:linear-gradient(to bottom right,#343a40,#212529)!important;	
			background:linear-gradient(to bottom right,#00abe7,#6e95c5)!important;	
		}
		.topbar, .topbar .nav-item .nav-link {
    		height: 2.75rem!important;
		}
		.shadow2{
			box-shadow: 0 .24rem .6rem 0 rgba(58,59,69,.5)!important;
		}		
		.card-02 {
			position: relative;
			display: -webkit-box;
			display: -ms-flexbox;
			display: flex;
			-webkit-box-orient: vertical;
			-webkit-box-direction: normal;
			-ms-flex-direction: column;
			flex-direction: column;
			min-width: 0;
			word-wrap: break-word;
			background-color: #00b26f;			
			background-clip: border-box;  
			border-radius: .35rem;	 	
			overflow:hidden!important;	
		}
		.div-icon,.div-icon2{
			display: inline-block;
			position: absolute;
			bottom: -10px;
			right: 5px; 
		}
		.div-icon2{ 
			bottom: -50px;
			left: 0px; 
		}
		.div-icon i, .div-icon2 i {
			font-size: 100px;
			color: #fff!important;
			opacity: .8;
			line-height: 1;
			vertical-align: baseline;
		}
		.div-icon2 i {
			font-size: 120px;
		}
		.c-blue2{
			background: linear-gradient(159deg, rgb(77, 77, 253) 0%, rgb(108, 143, 234) 100%);
			background-image: -webkit-linear-gradient(90deg, #5786e8 0%, #0ed5d4 100%);
		}
		.c-blue{
			background: linear-gradient(159deg, rgb(77, 77, 253) 0%, rgb(108, 143, 234) 100%);
			background-image: -webkit-linear-gradient(90deg, #4d4ddf 0%, #00b4ec 100%);
		}
		.c-violet{
			background: linear-gradient(159deg,  #3f5efb 0%, #fc466b 100%);
			background-image: -webkit-linear-gradient(90deg, #5b76d7 0%, #d209fa 100%);
		}
		.c-red{
			background: linear-gradient(159deg, #ff7474  0%, #b24a00  100%);
			background-image: -webkit-linear-gradient(90deg, #b24a00 0%, #ff7474 100%);
		}
		.c-red2{
			background: linear-gradient(159deg, #ff7474  0%, #b24a00  100%);			
			background-image: -webkit-linear-gradient(90deg, #ff6a00 0%, #ee0979 100%);
		}
		.c-white{
			background-image: -webkit-linear-gradient(90deg, #232323 0%, #777 100%);
		}
		.c-green-light{
			background: linear-gradient(159deg, #45b649  0%, #dce35b  100%);
			background-image: -webkit-linear-gradient(90deg, #45b649 0%, #dce35b 100%);
		}
		.c-yellow{
			background: linear-gradient(31deg, rgb(254, 208, 63) 0%, rgb(230, 190, 63) 110%);
			background-image: -webkit-linear-gradient(90deg, #c6ac00 0%, #ffe074 100%);
		}
		.c-green{
			background-image: -webkit-linear-gradient(90deg, #11998e 0%, #38ef7d 100%);
		} 
		.card-02 h2{
			font-weight: 600!important;
			color: #fff!important;
			font-size: 1.3em!important;
			line-height: 1!important;
			margin-bottom: 5px!important;
		}
		.bg-left{						
			background:url(<?php echo img_url("overlay6.png")?>), url(<?php echo img_url("bg-04.jpg")?>)!important;
			background-repeat:no-repeat!important;
			background-attachment:fixed!important;
			background-size:cover!important;
			border-bottom: 2px solid #222!important;
		} 
		.x2{
			background-color: rgba(255,255,255,0.8)!important; 
			border: 1px solid #e3e6f0;
			border-radius: 0 .5em !important;
			color:#121212!important;
		}
		.x2 table{
			color:#373534;
		}
		.text-xs {
			font-size: 0.9em;
		}
		.h2m{
			font-size: 2em!important;
			color:#121212!important;
			font-weight:bold!important;
		}
		.border-left-info{
			border-left:4px solid #00aae5!important;
		}
		.text-black{
			color:#121212;
		}
		.container-fluid{
			width:97%;
		}
		.text-title{
			color:#fff;
			font-weight:bold;
		}
		.bg-warning-card{
			background:linear-gradient(to bottom, #f6b284, #fa6900) !important;
			padding:0px;
		}
		.bg-warning-card h5{
			color:#121221;
			font-weight:bold;
		}
		.bg-warning-card h5 span{
			color:#fafafa;
			font-weight:bold;
		}
		.bg-info-2{
			background:#00aae5;
		}
		.scroll-to-top{
			background:linear-gradient(to bottom, #f6b284, #fa6900) !important;
			color:#fff!important;
			font-weight:bold!important;
			border:2px solid #fff;
		}
		.table-data3 tbody td {
			border-bottom: 1px solid #f5f5f5;
			background: #fff;
			font-size: 14px;
			color: #808080;
			padding: 12px 40px;
			padding-right: 10px;
		} 
		.card-body p{
			font-family:Roboto,Lato,poppins;
			color:#666;
		}
	</style>
</head>