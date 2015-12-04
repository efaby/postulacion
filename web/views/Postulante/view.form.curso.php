<form id="frmCurso" method="post" action="index.php?action=saveData">

	<div class="form-group col-sm-12">
		<label class="control-label">Nombre Curso</label> <input type='text'
			name='nombre' class='form-control'
			value="<?php echo $curso['nombre']; ?>">

	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Número Horas</label> <input type='text'
			name='horas' class='form-control'
			value="<?php echo $curso['horas']; ?>">

	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Año</label> <input type='text'
			name='anio' class='form-control'
			value="<?php echo $curso['anio']; ?>">

	</div>




	<div class="form-group col-sm-12">
		<label class="control-label">Respado Digital</label> <input
			type='file' name='url' id="url" class="file">
	</div>
	<div class="form-group">
		<input type='hidden' name='id' class='form-control'
			value="<?php echo $curso['id']; ?>">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>

</form>

<script type="text/javascript">

$(document).ready(function() {
    $('#frmCurso').bootstrapValidator({
    	message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {			
			nombre: {
				message: 'El Nombre del Curso no es válido',
				validators: {
							notEmpty: {
								message: 'El Nombre del Curso no puede ser vacío.'
							},					
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ \.]+$/,
								message: 'Ingrese un Nombre del Curso válido.'
							}
						}
					},
			horas: {
						message: 'El Número de Horas no es válido',
						validators: {
							notEmpty: {
								message: 'El Número de Horas no puede ser vacío.'
							},					
							regexp: {
								regexp: /^[0-9- ]+$/,
								message: 'Ingrese el Número de Horas válido.'
							}
						}
					},
			anio: {
						message: 'El Año no es válido',
						validators: {
							notEmpty: {
								message: 'El Año no puede ser vacío.'
							},					
							regexp: {
								regexp: /^[0-9- ]+$/,
								message: 'Ingrese el Año válido.'
							}
						}
					},	
					url: {
						validators: {
							notEmpty: {
								message: 'Seleccione un Archivo.'
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