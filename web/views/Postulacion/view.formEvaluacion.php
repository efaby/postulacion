<form action="index.php?action=saveEvaluacion" method="post" id="frmEvaluacion" enctype="multipart/form-data">
				<div class="form-group col-sm-6">
					<label class="control-label">Calificación</label> <input type='text'
						name='valor' id='valor' class='form-control' >			
				</div>
				<div class="form-group col-sm-6">
					<label class="control-label">Pasa a Siguiente Etapa</label> 
					<select class='form-control' name="aprobado" id="aprobado">
				<option value="" >Seleccione</option>
				<option value="1"  >Si</option>
				<option value="2" >No</option>
			</select>
				</div>
				<div class="form-group col-sm-12">
					<label class="control-label">Observaciones</label> <textarea name='observaciones' id='observaciones' class='form-control' ></textarea>			
				</div>
				<div class="form-group col-sm-12">
		<label class="control-label">Respado Digital</label> 		
		
			<input type='file' name='url' id="url" class="file">	
		
	</div>
				<div class="form-group">
		<input type='hidden' name='postulacion_id' class='form-control' value="<?php echo $postulacion; ?>">
		<input type='hidden' name='etapa_id' class='form-control' value="<?php echo $opcion; ?>">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>
				</form>
<script type="text/javascript">
$(document).ready(function() {
    $('#frmEvaluacion').bootstrapValidator({
    	message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			valor: {
				message: 'El Número de Identificación no es válido',
				validators: {
							notEmpty: {
								message: 'la califiación no puede ser vacía.'
							},					
							regexp: {
								regexp: /^[0-9\.]+$/,
								message: 'Ingrese una Calificación válida.'
							}
						}
					},			
			observaciones: {
						message: 'La observación no es válida',
						validators: {												
									regexp: {
										regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
										message: 'Ingrese una observación válida.'
									}
								}
							},	
						
			aprobado: {
				validators: {
					notEmpty: {
						message: 'Seleccione si pasa a la siguiente etapa.'
					}
				}
			},
			url: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Archivo.'
					},
					file: {
	                    extension: 'pdf,docx,doc',
	                    message: 'Seleccione un archivo válido. (pdf, doc, docx)'
	                }
				}
			},
		}
	});

});
</script>
				