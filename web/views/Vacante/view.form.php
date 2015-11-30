<form id="frmVacante" method="post" action="index.php?action=saveData">

	<div class="form-group">
		<label class="control-label">Nombre del Área</label> <input type='text'
			name='nombre' class='form-control'
			value="<?php echo $vacante['nombre_area']; ?>">

	</div>

	<div class="form-group">
		<label class="control-label">Título</label>
		<input type='text'
			name='titulo' class='form-control'
			value="<?php echo $vacante['titulo']; ?>">
	</div>
	
	<div class="form-group">
		<label class="control-label">Número de Vacantes</label>
		<input type='text'
			name='titulo' class='form-control'
			value="<?php echo $vacante['numero_vacantes']; ?>">
	</div>
	
	<div class="form-group">
		<label class="control-label">Años de Experiencia</label>
		<input type='text'
			name='titulo' class='form-control'
			value="<?php echo $vacante['experiencia_requerida']; ?>">
	</div>
	
	<div class="form-group">
		<label class="control-label">Fecha de Inicio de Concurso</label>
		<input type='text'
			name='titulo' class='form-control'
			value="<?php echo $vacante['experiencia_requerida']; ?>">
	</div>		
	
	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $vacante['id']; ?>">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>

</form>

<script type="text/javascript">

$(document).ready(function() {
    $('#frmCategoria').bootstrapValidator({
    	message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			nombre: {
				message: 'El nombre no es válido',
				validators: {
					notEmpty: {
						message: 'El nombre no puede ser vacío.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9_ \.]+$/,
						message: 'Ingrese un nombre válido.'
					}
				}
			},
			descripcion: {
				validators: {
					notEmpty: {
						message: 'La Descripción no puede ser vacía.'
					},					
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9_ ,-\.]+$/,
						message: 'Ingrese una descripción válida.'
					}
				}
			}			
		}
	});

});
</script>