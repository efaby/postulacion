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
		<div class="the-box">
<form id="frmUsuario" method="post" action="index.php?action=saveData">

	<div class="form-group col-sm-12 rows">
	<div class="form-group col-sm-6">
		<label class="control-label">Número de Identificación</label> <input type='text'
			name='numero_identificacion' class='form-control'
			value="">
		</div>
	</div>
	<div class="form-group col-sm-12 rows">
		<div class="form-group col-sm-6">
			<label class="control-label">Nombres</label> <input type='text'
				name='nombres' class='form-control'
				value="">
	
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label">Apellidos</label> <input type='text'
				name='apellidos' class='form-control'
				value="">
	
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label class="control-label">Email</label>
		<input type='text'
			name='email' class='form-control'
			value="">

	</div>	
	<div class="form-group col-sm-12 rows">
		<div class="form-group col-sm-6">
			<label class="control-label">Contraseña</label>
			<input type="password"
				name='password' class='form-control'
				value="">
	
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label">Repetir Contraseña</label>
			<input type="password"
				name='password1' class='form-control'
				value="">	
		</div>
	</div>

	
	<div class="form-group rowBottom" >
	<input type='hidden' name='id' class='form-control' value="0">
		<button type="submit" class="btn btn-success">Registrarme</button>
		<a href="../../index.php" class="btn btn-info">Regresar</a>
	</div>

</form>
</div>
</div>
</div>
</div>
<?php include_once PATH_TEMPLATE.'/footer.php';?>
<script
	src="<?php echo PATH_CSS . '/../plugins/validator/bootstrapValidator.min.js';?>"></script>
<script src="<?php echo PATH_CSS . '/../js/apps.js';?>"></script>

<script type="text/javascript">

$(document).ready(function() {
    $('#frmUsuario').bootstrapValidator({
    	message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {			
			numero_identificacion: {
				message: 'El Número de Identificación no es válido',
				validators: {
							notEmpty: {
								message: 'El Número de Identificación no puede ser vacío.'
							},					
							regexp: {
								regexp: /^(?:\+)?\d{10,13}$/,
								message: 'Ingrese un Número de Identificación válido.'
							}
						}
					},
			nombres: {
				message: 'Los Nombres no es válido',
				validators: {
					notEmpty: {
						message: 'El Nombre no puede ser vacío.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ \.]+$/,
						message: 'Ingrese un Nombre válido.'
					}
				}
			},
			apellidos: {
				message: 'El Apellido no es válido',
				validators: {
					notEmpty: {
						message: 'El Apellido no puede ser vacío.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ \.]+$/,
						message: 'Ingrese un Apellido válido.'
					}
				}
			},
			genero: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Género'
					}
				}
			},			
			capacidad_especial_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Capacidad Especial'
					}
				}
			},	
			estado_civil_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Estado Civil'
					}
				}
			},	
			password: {
				message: 'La Contraseña no es válida',
				validators: {
					notEmpty: {
						message: 'La Contraseña no puede ser vacía.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9-_ \.]+$/,
						message: 'Ingrese una Contraseña válida.'
					}
				}
			},
			password1: {
				validators: {
					notEmpty: {
						message: 'La contraseña no puede ser vacia.'
					},
					identical: {
						field: 'password',
						message: 'La contraseña debe ser la misma'
					}
				}
			},
			email: {
				message: 'El eEmail no es válido',
				validators: {
					notEmpty: {
						message: 'El Email no puede ser vacío'
					},
					emailAddress: {
						message: 'Ingrese un Email válido.'
					}
				}
			}	
		}
	});

});
</script>
<style>
.col-sm-6, .col-sm-4 {
	padding-left: 0px;
}
.rows{
	padding-right: 0px;
	}
	.rowBottom{
		padding-left: 15px;
	}
</style>
</body>
</html>
