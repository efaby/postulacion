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
					<?php if($_SESSION['SESSION_USER']['tipo_usuario_id']==3):?>
						<li class="parent"><a href="../Postulante/index.php">Hoja de Vida</a></li>
					<?php endif;?>
					<?php if($_SESSION['SESSION_USER']['tipo_usuario_id']==3):?>
						<li class="parent"><a href="../Postulante/index.php">Postulaciones</a></li>
					<?php endif;?>
					<?php if($_SESSION['SESSION_USER']['tipo_usuario_id']==3):?>
						<li class="parent"><a href="../Postulante/index.php">Buscar Ofertas</a></li>
					<?php endif;?>
					<!--  
					<li class="parent">
						<a href="../Usuario/index.php">Usuarios</a>	
					</li>
					<li class="parent">
						<a href="../Pregunta/index.php">Preguntas</a>						
					</li>
					<li class="parent">
						<a href="../Categoria/index.php">Categorias</a>						
					</li>
					<li class="parent">
						<a href="../Vacante/index.php">Vacantes</a>						
					</li>
					-->
					<li class="parent"><a href="../Secure/index.php?action=closeSession">Salir</a></li>
					
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
		