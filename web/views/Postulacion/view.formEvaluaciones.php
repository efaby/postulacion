
<div class="table-responsive">
	<table class="table table-th-block table-hover">
		<thead>
			<tr>
				<th style="width: 30px;">No</th>
				<th style="width: 110px;">Nombre Etapa</th>
				<th>Fecha</th>
				<th>Calificación</th>
				<th>Observaciones</th>
				<th>Accion</th>
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
						<a href="index.php?action=downloadFile&nameFile=<?php echo $dato["url"];?>" class="btn btn-info btn-xs">Descargar</a>
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

				<div class="form-group">
					<label class="control-label">Designar Ganador de la Postulacion</label> 
					<select class='form-control' name="aprobado" id="aprobado" style="width: 220px;">
				<option value="" >Seleccione</option>
				<option value="1"  >Si</option>
				<option value="2" >No</option>
			</select>
				</div>
				
				<div class="form-group ">
					<input type='hidden' name='postulacion_id' class='form-control' value="<?php echo $postulacion; ?>">
					<input type='hidden' name='etapa_id' class='form-control' value="<?php echo $opcion; ?>">
					<input type='hidden' name='valor' class='form-control' value="10">
					<input type='hidden' name='observaciones' class='form-control' value="">
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
				