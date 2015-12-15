<?php $title = "Cambiar contraseña";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>
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
			
	<form method="post" action="index.php?action=changePasswordData" id="frmUsuario" name="frmUsuario">
		
		
		<div class="form-group col-sm-12 rows">
		<div class="form-group col-sm-4">
			<label class="control-label">Contraseña Actual</label>
			<input type="password"
				name='passwordAnterior' class='form-control'
				value="">	
		</div>
		<div class="form-group col-sm-4">
			<label class="control-label">Nueva Contraseña</label>
			<input type="password"
				name='password' class='form-control'
				value="">
	
		</div>
		<div class="form-group col-sm-4">
			<label class="control-label">Repetir Contraseña</label>
			<input type="password"
				name='password1' class='form-control'
				value="">	
		</div>
	</div>
		
		<div class="form-group rowBottom" >
		<button type="submit" class="btn btn-info">Cambiar Contraseña</button>
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
			passwordAnterior: {
				message: 'La Contraseña Anterior no es válida',
				validators: {
					notEmpty: {
						message: 'La Contraseña Anterior no puede ser vacía.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9-_ \.]+$/,
						message: 'Ingrese una Contraseña Anterior válida.'
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