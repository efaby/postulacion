<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Sentir, Responsive admin and dashboard UI kits template">
		<meta name="keywords" content="admin,bootstrap,template,responsive admin,dashboard template,web apps template">
		<meta name="author" content="Ari Rusmanto, Isoh Design Studio, Warung Themes">
		<title>Postulación Docente</title>
 
		<!-- BOOTSTRAP CSS (REQUIRED ALL PAGE)-->
		<link href="<?php echo $urlWeb . 'assets/css/bootstrap.min.css';?>" rel="stylesheet">
		
		<!-- PLUGINS CSS-->
		<link href="<?php echo $urlWeb . 'assets/plugins/magnific-popup/magnific-popup.css';?>" rel="stylesheet">
		<link href="<?php echo $urlWeb . 'assets/plugins/owl-carousel/owl.carousel.css';?>" rel="stylesheet">
		<link href="<?php echo $urlWeb . 'assets/plugins/owl-carousel/owl.theme.css';?>" rel="stylesheet">
		<link href="<?php echo $urlWeb . 'assets/plugins/owl-carousel/owl.transitions.css';?>" rel="stylesheet">
		
		
		<!-- MAIN CSS (REQUIRED ALL PAGE)-->
		<link href="<?php echo $urlWeb . 'assets/plugins/font-awesome/css/font-awesome.min.css';?>" rel="stylesheet">
		<link href="<?php echo $urlWeb . 'assets/css/style.css';?>" rel="stylesheet">
		<link href="<?php echo $urlWeb . 'assets/css/style-responsive.css';?>" rel="stylesheet">
 
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
 
	<body class="tooltips no-padding">
		
		<!--
		===========================================================
		BEGIN PAGE
		===========================================================
		-->
	
		
		<!-- BEGIN TOP NAVBAR -->
		<div class="top-navbar">
			<div class="container">
			
				<!-- Begin logo -->
				<div class="logo">
					<a href="index.html"><img src="assets/img/logo.png" alt="Logo"></a>
				</div><!-- /.logo -->
				<!-- End logo -->				
				<!-- Begin nav menu -->
				<div class="title-menu">				
					<h1>Unidad Educativa "Santa Mariana de Jesús"</h1>
				</div>
				<!-- End nav menu -->
			</div><!-- /.container -->
		</div><!-- /.top-navbar -->
		<!-- END TOP NAVBAR -->
		
		
		
		<!-- BEGIN HEADER FULL IMAGE SLIDE -->
		<div class="full-slide-image" id="full-img-slide">
			<div class="slide-inner more-padding">
				<div class="slide-text-content">
					<div class="container-fluid">
						<h1>SISTEMA DE POSTULACIÓN DOCENTE</h1>
						<div class="clear"></div>
						<h3>
						Presione los siguientes enlaces para acceder al sistema.
						</h3>
						<div class="clear"></div>
						<button class="btn btn-lg btn-warning btn-learn-more btn-border-only">Iniciar Sesión</button>
						<a href="<?php echo $urlWeb."views/Register/index.php";?>" class="btn btn-lg btn-success btn-learn-more">Registrarse</a>
					</div><!-- /.container -->
				</div><!-- /.slide-text-content -->
			</div><!-- /.slide-inner -->
		</div><!-- /.full-slide-image -->
		<!-- END HEADER FULL IMAGE SLIDE -->
		
		
		
		
		
		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col-sm-5">
						Copyright &copy; 2014 <a href="#fakelink">Your company</a>
					</div><!-- /.col-sm-5 -->
					<div class="col-sm-7 text-right">
						<ul class="list-inline">
						  <li><a href="#fakelink">Terms and condition</a></li>
						  <li><a href="#fakelink">Privacy policy</a></li>
						  <li><a href="#fakelink">FAQ</a></li>
						</ul>
					</div><!-- /.col-sm-7 -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.footer -->
		<!-- END FOOTER -->
		
		
		
		<!-- BEGIN BACK TO TOP BUTTON -->
		<div id="back-top">
			<i class="fa fa-chevron-up"></i>
		</div>
		<!-- END BACK TO TOP -->
		
		<!--
		===========================================================
		END PAGE
		===========================================================
		-->
		
		
		
		<!--
		===========================================================
		Placed at the end of the document so the pages load faster
		===========================================================
		-->
		<!-- MAIN JAVASRCIPT (REQUIRED ALL PAGE)-->
		<script src="<?php echo $urlWeb . 'assets/js/jquery.js'; ?>"></script>
		<script src="<?php echo $urlWeb . 'assets/js/bootstrap.min.js'; ?>"></script>
		<script src="<?php echo $urlWeb . 'assets/plugins/retina/retina.min.js'; ?>"></script>
		<script src="<?php echo $urlWeb . 'assets/plugins/backstretch/jquery.backstretch.min.js'; ?>"></script>
		<script src="<?php echo $urlWeb . 'assets/plugins/magnific-popup/jquery.magnific-popup.min.js'; ?>"></script>
		<script src="<?php echo $urlWeb . 'assets/plugins/owl-carousel/owl.carousel.min.js'; ?>"></script>
		<script src="<?php echo $urlWeb . 'assets/plugins/mixitup/jquery.mixitup.js'; ?>"></script>
		<script>
			$("#full-img-slide").backstretch([
			  "<?php echo $urlWeb . 'assets/img/imagen2.jpg'; ?>",
			  "<?php echo $urlWeb . 'assets/img/imagen31.jpg'; ?>"
			  ], {
				fade: 750,
				duration: 6000
			});
		</script>
		<script>
			$(document).ready(function(){
				$(function(){
				 var shrinkHeader = 250;
				  $(window).scroll(function() {
					var scroll = getCurrentScroll();
					  if ( scroll >= shrinkHeader ) {
						   $('.top-navbar').addClass('shrink-nav');
						   $('.top-navbar').addClass('dark-color');
						}
						else {
						   $('.top-navbar').removeClass('shrink-nav');
						   $('.top-navbar').removeClass('dark-color');
						}
				  });
					function getCurrentScroll() {
						return window.pageYOffset || document.documentElement.scrollTop;
					}
				});
			})
		</script>
		<script src="<?php echo $urlWeb . 'assets/js/apps.js'; ?>"></script>
	</body>
</html>