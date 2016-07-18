<form id="frmPregunta" method="post" action="index.php?action=saveData">

	<div class="form-group">
		<label class="control-label">Nombre</label> <input type='text'
			name='nombre' class='form-control'
			value="<?php echo $pregunta['nombre']; ?>">
	</div>

	<div class="form-group">
		<label class="control-label">Descripción</label>
		<textarea name='descripcion' class='form-control'><?php echo $pregunta['descripcion']; ?></textarea>
	</div>
	<div class="form-group">
		<label class="control-label">Orden</label>
		<input type='text'
			name='orden' class='form-control'
			value="<?php echo $pregunta['orden']; ?>">
	</div>
	<div class="form-group">
		<label class="control-label">Estado</label>
		<?php
			$estadop="";
			if (($pregunta['estado']) == 1)
			{
				$estadop="checked='checked'";
			}
		?>
		<input type="checkbox" name="estado" <?php echo $estadop;?> value="1" />		
	</div>	
	
	<div class="form-group">
		<label class="control-label">Categoría</label>
		
			<select class="form-control" name="categoria">
				<option value="" selected="selected">-- Seleccione --</option>
				<?php
					foreach ($categoria as $valor)
					{
						$select = "";	
						if (is_null($pregunta['categoria_id']))
						{
							$select = "";							
						}
						else
						{
							if ($pregunta['categoria_id'] == $valor['id']) 
							{
								$select = "selected = 'selected'";
							}
						}
						echo"<option value=".$valor['id']." ".$select.">".$valor['nombre']."</option>";
					}
				?>
			</select>
		
	</div>	

	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $pregunta['id']; ?>">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>

</form>

<script type="text/javascript">

$(document).ready(function() {
    $('#frmPregunta').bootstrapValidator({
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
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9-_ \.]+$/,
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
			orden: {
				validators: {
					notEmpty: {
						message: 'El orden no puede ser vacía.'
					},					
					regexp: {
						regexp: /^[0-9]+$/,
						message: 'Ingrese un orden válido.'
					}
				}
			},
			categoria: {
				validators: {
					notEmpty: {
						message: 'Seleccione una categoría'
					}
				}
			},		
		}
	});

});
</script>