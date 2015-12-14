<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Sentir, Responsive admin and dashboard UI kits template">
		<meta name="keywords" content="admin,bootstrap,template,responsive admin,dashboard template,web apps template">
		<meta name="author" content="Ari Rusmanto, Isoh Design Studio, Warung Themes">
		<title>Registro Postulante</title>
 
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
			
		<!-- BEGIN BERADCRUMB AND PAGE TITLE -->
		<div class="page-title-wrap">
			<div class="container">				
			<h2 class="page-title">Registro Postulante</h2>
			</div><!-- /.container -->
			
			<div class="border-bottom">
				<div class="container">
					<div class="border-bottom-color bg-info"></div>
				</div><!-- /.container -->
			</div><!-- /.border-bottom -->
		</div><!-- /.page-title-wrap -->
		<!-- END BERADCRUMB AND PAGE TITLE -->

<!-- BEGIN TOP NAVBAR -->
	<div class="top-navbar dark-color">
		<div class="container">

			<!-- Begin logo -->
			<div class="logo">
				<a href="index.html"><img src="assets/img/logo.png" alt="Logo"></a>
			</div>
			<!-- /.logo -->
			<!-- End logo -->
			<!-- Begin nav menu -->
			<div class="title-menu">
				<h1>Unidad Educativa "Santa Mariana de Jesús"</h1>
			</div>
			<!-- End nav menu -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /.top-navbar -->
	<!-- END TOP NAVBAR -->


<div class="section">
<div class="content">
<div class="container">

<div class="title-home">
	<?php if($activo):?>
	<?php $boton = "Iniciar Sesión";  echo "Su Usuario ha sido Activado. Por favor inicie sesión en el sitema para que complete sus datos y pueda postular por alguna vacante.";?>
<?php else:?>
<?php $boton = "Regresar"; echo "Su registro ha sido procesado con éxito. Por favor revice su correo electrónico para que pueda activar su cuenta.";?>
<?php endif;?>	
	<p>
	<br>
	<a href="../../index.php" class="btn btn-info btn-learn-more"><?php echo $boton; ?></a></p>
</div>


</div>
</div>
</div>
<?php include_once PATH_TEMPLATE.'/footer.php';?>
</body>
</html>