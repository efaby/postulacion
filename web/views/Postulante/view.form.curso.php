<form id="frmUsuario" method="post" action="index.php?action=saveData">

	<div class="form-group col-sm-12">
		<label class="control-label">Nombre Curso</label> <input type='text'
			name='numero_identificacion' class='form-control'
			value="<?php echo $usuario['nombre']; ?>">

	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Horas</label> <input type='text'
			name='horas' class='form-control'
			value="<?php echo $usuario['horas']; ?>">

	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Año</label> <input type='text'
			name='anio' class='form-control'
			value="<?php echo $usuario['anio']; ?>">

	</div>
	

	
	
	<div class="form-group col-sm-12">
		<label class="control-label">Respado Digital</label> 
		<input type='file' name='url' id="url" class="file">
	</div>
	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $usuario['id']; ?>">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>

</form>

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
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ \.]+$/,
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
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ \.]+$/,
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
			tipo_usuario: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Tipo de Usuario'
					}
				}
			},
			capacidad: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Capacidad Especial'
					}
				}
			},	
			estado: {
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
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9-_ \.]+$/,
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
.col-sm-6, .col-sm-12 {
	padding-right: 0px;
}
</style>