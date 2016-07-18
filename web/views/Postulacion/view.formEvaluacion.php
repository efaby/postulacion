<div class="table-responsive">
		<div class="form-group  col-sm-6">
			<label class="control-label">Identificación:</label>&nbsp;&nbsp; 
			<?php echo $usuario["numero_identificacion"]; ?>
		</div>
		<div class="form-group  col-sm-6">
			<label class="control-label">Nombre:</label>&nbsp;&nbsp; 
			<?php echo $usuario["nombres"]." ".$usuario["apellidos"]; ?>
		</div>
	<table class="table table-th-block table-hover">
		<thead>
			<tr>
				<th style="width: 30px;">No</th>
				<th style="width: 110px;">Nombre Etapa</th>
				<th>Fecha</th>
				<th>Calificación</th>
				<th>Observaciones</th>
				<th>Acción</th>
			</tr>
		</thead>
		<tbody>
			<?php $contador = 1;?>
			<?php foreach ($evaluaciones as $dato): ?>
			<tr>
				<td><?php echo $contador; ?></td>
				<td><?php echo $dato["nombre"]; ?></td>
				<td><?php echo $dato["fecha"]; ?></td>
				<td align="center"><?php echo $dato["valor"]; ?></td>
				<td><?php echo $dato["observacion"]; ?></td>
				<td>
					<?php if($dato["url"]!=''):?>
						<a href="index.php?action=downloadFile&nameFile=<?php echo $dato["url"];?>" class="btn btn-info btn-xs">Ver / Descargar</a>
					<?php endif;?>
					<?php if($dato["etapa_id"]==3):?>
					<form action="../Evaluacion/index.php?action=imprimir" method="post" target="_blank">
							<input name="id" id="id" value="<?php echo $dato["postulacion_id"]; ?>" type="hidden">
							<input  name="vacante" id="vacante_id" value="<?php echo $vacante; ?>" type="hidden"> 
							<button type="submit" class="btn btn-info btn-xs">Ver / Descargar</button>
							
							</form>
					<?php endif;?>
				</td>
				<?php $contador++;?>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
<!-- /.table-responsive -->

<form action="index.php?action=saveEvaluacion" method="post" id="frmEvaluacion" enctype="multipart/form-data">
	<div >				
		<div class="form-group col-sm-6" >				

			<label class="control-label">Calificación</label> <input type='text'
						name='valor' id='valor' class='form-control' >			
		</div>
		<div class="col-sm-6" style="padding-top: 30px;">
                                  Para pasar Siguiente Etapa es necesario tener una evaluación de 8 a 10 puntos. 		
					
		</div>
				
		<div class="form-group col-sm-12">
					<label class="control-label">Observaciones</label> <textarea name='observaciones' id='observaciones' class='form-control' ></textarea>			
				</div>
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
								message: 'La Calificación no puede ser vacía.'
							},					
							regexp: {
								regexp: /^[1-9]{1}$|^10$/,
								message: 'Ingrese una Calificación válida.'
							}
						}
					},			
			observaciones: {
						message: 'La Observación no es válida',
						validators: {												
									regexp: {
										regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.]+$/,
										message: 'Ingrese una observación válida.'
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
				