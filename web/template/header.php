<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Sentir, Responsive admin and dashboard UI kits template">
		<meta name="keywords" content="admin,bootstrap,template,responsive admin,dashboard template,web apps template">
		<meta name="author" content="Ari Rusmanto, Isoh Design Studio, Warung Themes">
		<title><?php echo $title; ?></title>
 
		<!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
		<link href="<?php echo PATH_CSS . '/bootstrap.min.css';?>" rel="stylesheet">
		
		<!-- PLUGINS CSS-->
		<link href="<?php echo PATH_CSS . '/../plugins/magnific-popup/magnific-popup.css';?>" rel="stylesheet">
		<link href="<?php echo PATH_CSS . '/../plugins/owl-carousel/owl.carousel.css';?>" rel="stylesheet">
		<link href="<?php echo PATH_CSS . '/../plugins/owl-carousel/owl.theme.css';?>" rel="stylesheet">
		<link href="<?php echo PATH_CSS . '/../plugins/owl-carousel/owl.transitions.css';?>" rel="stylesheet">
		
		
		<!-- MAIN CSS (REQUIRED ALL PAGE)-->
		<link href="<?php echo PATH_CSS . '/../plugins/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet">
		<link href="<?php echo PATH_CSS . '/style.css';?>" rel="stylesheet">
		<link href="<?php echo PATH_CSS . '/style-responsive.css';?>" rel="stylesheet">
 
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
 
	<body class="tooltips">
		
		<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
	
		
		<!-- BEGIN TOP NAVBAR -->
		<div class="top-navbar dark-color">
			<div class="container">
			
				<!-- Begin logo -->
				<div class="logo">
					<a href="index.html"><img src="<?php echo PATH_CSS . '../img/logo.png';?>" alt="Logo"></a>
				</div><!-- /.logo -->
				<!-- End logo -->
				
				
				
				<!-- Begin nav menu -->
				<ul class="menus">
					<li class="parent">
						<a href="../Secure/index.php?action=welcome">Inicio</a>						
					</li>
					<li class="parent">
						<a href="#fakelink">Pages</a>						
					</li>
					<li class="parent">
						<a href="shortcodes.html">Shortcodes</a>
					</li>
					<li class="parent">
						<a href="#fakelink">Portfolio</a>						
					</li>
					<li class="parent">
						<a href="#fakelink">Blog</a>						
					</li>
					<li class="parent"><a href="contact.html">Contact</a></li>
					
				</ul>
				<!-- End nav menu -->
			</div><!-- /.container -->
		</div><!-- /.top-navbar -->
		<!-- END TOP NAVBAR -->
		
		
		
		<!-- BEGIN BERADCRUMB AND PAGE TITLE -->
		<div class="page-title-wrap">
			<div class="container">				
			<h2 class="page-title"><?php echo $title; ?></h2>
			</div><!-- /.container -->
			
			<div class="border-bottom">
				<div class="container">
					<div class="border-bottom-color bg-info"></div>
				</div><!-- /.container -->
			</div><!-- /.border-bottom -->
		</div><!-- /.page-title-wrap -->
		<!-- END BERADCRUMB AND PAGE TITLE -->
		
	

<!--  
<header><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
	<div class="header" id="header_page">
		<div class="wrapp">
			<div class="logo">
				<a href="../Secure/index.php?action=welcome" style="text-decoration:none;">
				<img style="height: 80px; margin: 5px 10px 0px;" alt="logo" src="../../images/escudo.png">
				<img src="../../images/logo.png" alt="logo"></a>
			</div>
			<div class="menu">
			<?php if(isset($_SESSION['SESSION_USER'])):?>
			<?php $url = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"web/views/")+10);
				if(isset($_GET['action'])){
					$redirect = $_GET['action'];
					$url .= "?action=".$redirect;
				}
			?>
				<ul>				
					<li><a href="../Secure/index.php?action=welcome" <?php if('Secure/index.php?action=welcome' == $url):?> class="linked" <?php endif;?>>Inicio</a></li>	
				<?php if($_SESSION['SESSION_USER']['user_type_id']==1):?>
					<li><a href="../Register/index.php?action=editData" <?php if('Register/index.php?action=editData' == $url):?> class="linked" <?php endif;?>>Perfil</a></li>
				<?php endif;?>			
				<?php if($_SESSION['SESSION_USER']['user_type_id']==1):?>	
					<li><a href="../Upload/index.php" <?php if('Upload/index.php' == $url):?> class="linked" <?php endif;?>>Hoja de Vida</a></li>
					<?php endif;?>
				<?php if($_SESSION['SESSION_USER']['user_type_id']==1):?>
					<li><a href="../Message/index.php" <?php if('Message/index.php' == $url):?> class="linked" <?php endif;?>>Mensajes</a></li>
					<?php endif;?>
				<?php if($_SESSION['SESSION_USER']['user_type_id']==2):?>
					<li><a href="../Register/index.php?action=editDataCompany" <?php if('Register/index.php?action=editDataCompany' == $url):?> class="linked" <?php endif;?>>Perfil</a></li>
				<?php endif;?>
				<?php if($_SESSION['SESSION_USER']['user_type_id']==2):?>
					<li><a href="../Search/index.php" <?php if('Search/index.php' == $url):?> class="linked" <?php endif;?>>Buscar Profesional</a></li>
				<?php endif;?>
				<?php if($_SESSION['SESSION_USER']['user_type_id']==3):?>
					<li><a href="../Area/index.php" <?php if('Area/index.php' == $url):?> class="linked" <?php endif;?>>Administrar Areas</a></li>
				<?php endif;?>
				<?php if($_SESSION['SESSION_USER']['user_type_id']==3):?>
					<li><a href="../Secure/index.php?action=displayList" <?php if('Secure/index.php?action=displayList' == $url):?> class="linked" <?php endif;?>>Administrar Usuarios</a></li>
				<?php endif;?>
				<?php if($_SESSION['SESSION_USER']['user_type_id']==3):?>
					<li><a href="../Report/index.php" <?php if('Report/index.php' == $url):?> class="linked" <?php endif;?>>Reporte</a></li>
				<?php endif;?>
					<li><a href="../Secure/index.php?action=changePassword" <?php if('Secure/index.php?action=changePassword' == $url):?> class="linked" <?php endif;?>>Cambiar Contraseña</a></li>
					<li><a href="../Secure/index.php?action=closeSession">Salir</a></li>	
				</ul>
			<?php endif;?>
			</div>
		</div>
		</div>
	</header>
	
	-->