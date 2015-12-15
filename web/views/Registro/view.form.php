<?php $title = "Registro Postulante";?>
<?php include_once PATH_TEMPLATE.'/header.public.php';?>
<div class="section">
	<div class="content">
		<div class="container">
		<?php if (isset($_SESSION['message'])&& ($_SESSION['message'] != '')):?>
		<div class="alert alert-success fade in alert-dismissable">
				<button type="button" class="close" data-dismiss="alert"
					aria-hidden="true">&times;</button>
								  <?php echo $_SESSION['message'];$_SESSION['message'] = ''?>
								</div>
		<?php endif;?>
		<div class="the-box">
<form id="frmUsuario" method="post" action="index.php?action=saveData">

	<div class="form-group col-sm-12 rows">
	<div class="form-group col-sm-6">
		<label class="control-label">Número de Identificación</label> <input type='text'
			name='numero_identificacion' class='form-control'
			value="<?php echo $usuario['numero_identificacion'];?>">
		</div>
	</div>
	<div class="form-group col-sm-12 rows">
		<div class="form-group col-sm-6">
			<label class="control-label">Nombres</label> <input type='text'
				name='nombres' class='form-control'
				value="<?php echo $usuario['nombres'];?>">
	
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label">Apellidos</label> <input type='text'
				name='apellidos' class='form-control'
				value="<?php echo $usuario['apellidos'];?>">
	
		</div>
	</div>
	<div class="form-group col-sm-12">
		<label class="control-label">Email</label>
		<input type='text'
			name='email' class='form-control'
			value="<?php echo $usuario['email'];?>">

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
