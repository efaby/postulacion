<?php $url = ($opcion == 1)?'../Area/':'';?>
<form id="frmCategoria" method="post" action="<?php echo $url; ?>index.php?action=saveData">

	<div class="form-group">
		<label class="control-label">Nombre</label> <input type='text'
			name='nombre' class='form-control'
			value="<?php echo $area['nombre']; ?>">

	</div>

	<div class="form-group">
		<label class="control-label">Descripción</label>
		<textarea name='descripcion' class='form-control'><?php echo $area['descripcion']; ?></textarea>

	</div>
	
	

	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $area['id']; ?>">
<input type='hidden' name='opcion' class='form-control' value="<?php echo $opcion; ?>">
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
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9_ \.]+$/,
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
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9_ ,-\.]+$/,
						message: 'Ingrese una descripción válida.'
					}
				}
			},
							
		}
	});

});
</script>