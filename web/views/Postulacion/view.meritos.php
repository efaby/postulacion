<?php $title = "Meritos";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>
<div class="section">
	<div class="content">
		<div class="container">
			<div class="the-box">
				<table width="100%">
					<tr>
						<td width="75%">
							<h1>Postulante</h1>
							<div class="form-group  col-sm-12" style="padding-left: 0px;">
							<div class="form-group  col-sm-6">
								<label class="control-label">Cédula de Identidad:</label> &nbsp;&nbsp;
					<?php echo $usuario["numero_identificacion"]; ?>
				</div>
				<div class="form-group  col-sm-6">
					<a href="index.php?action=downloadFile&nameFile=<?php echo $usuario["url_cedula"];?>" class="btn btn-info btn-xs <?php echo ($usuario["url_cedula"]=='')?'disabled':''; ?>">Cédula</a>
					<a href="index.php?action=downloadFile&nameFile=<?php echo $usuario["url_papeleta"];?>" class="btn btn-info btn-xs <?php echo ($usuario["url_papeleta"]=='')?'disabled':''; ?>">Papeleta Votación</a>
					<a href="index.php?action=downloadFile&nameFile=<?php echo $usuario["url_hoja"];?>" class="btn btn-info btn-xs <?php echo ($usuario["url_hoja"]=='')?'disabled':''; ?>">Hoja de Vida</a>
				</div>
				</div>
				<div class="form-group  col-sm-6">
								<label class="control-label">Nombres:</label>&nbsp;&nbsp; 
					<?php echo $usuario["nombres"]; ?>
				</div>
							<div class="form-group  col-sm-6">
								<label class="control-label">Apellidos:</label>&nbsp;&nbsp; 
					<?php echo $usuario["apellidos"]; ?>
				</div>
				<div class="form-group  col-sm-6">
								<label class="control-label">Dirección:</label>&nbsp;&nbsp; 
					<?php echo $usuario["direccion"]; ?>
				</div>
				<div class="form-group  col-sm-6">
						<label class="control-label">Teléfono:</label>&nbsp;&nbsp; 
				<?php echo $usuario["telefono"]; ?>
				</div>
				<div class="form-group  col-sm-6">
								<label class="control-label">Celular:</label>&nbsp;&nbsp; 
					<?php echo $usuario["celular"]; ?>
				</div>
				<div class="form-group  col-sm-6">
						<label class="control-label">Email:</label>&nbsp;&nbsp; 
					<?php echo $usuario["email"]; ?>
				</div>
						</td>
						<td>
							<div class="thumbnail">
								<img alt="Image"
									src="<?php echo PATH_IMAGES_USER . $usuario['url_foto']; ?>">
							</div>
						</td>
					</tr>
					<tr>
					<td colspan="2">
						<div class="form-group  col-sm-3">
								<label class="control-label">Género:</label>&nbsp;&nbsp; 
						<?php echo ($usuario["genero"]=='m')?"Masculino":"Femenino"; ?>
					</div>
					<div class="form-group  col-sm-3">
									<label class="control-label">Lugar de Nacimiento:</label>&nbsp;&nbsp; 
						<?php echo $usuario["lugar_nacimiento"]; ?>
					</div>
					<div class="form-group  col-sm-3">
									<label class="control-label">Fecha de Nacimiento:</label>&nbsp;&nbsp; 
					
						<?php $fechas = explode('-', $usuario["fecha_nacimiento"]); echo $fechas[2] ." - ". $meses[$fechas[1] - 1] ." - " .$fechas[0]; ?>
					</div>
					<div class="form-group  col-sm-3">
									<label class="control-label">Religión:</label>&nbsp;&nbsp; 
						<?php echo $usuario["religion"]; ?>
					</div>
					<div class="form-group  col-sm-3">
								<label class="control-label">Estado Civil:</label>&nbsp;&nbsp; 
						<?php echo $usuario["estado"]; ?>
					</div>
					<div class="form-group  col-sm-3">
									<label class="control-label">Idioma:</label>&nbsp;&nbsp; 
						<?php echo $usuario["idiomas"]; ?>
					</div>
					<div class="form-group  col-sm-3">
									<label class="control-label">Capacidad Especial:</label>&nbsp;&nbsp; 
					
						<?php echo $usuario["discapacidad"]; ?>
					</div>
					<div class="form-group  col-sm-3">
									<label class="control-label">Descripción Discapacidad:</label>&nbsp;&nbsp; 
						<?php echo $usuario["descripcion_discapacidad"]; ?>
					</div>
					<h4 class="small-title">Títulos</h4>
					<table class="table table-th-block">
					<thead>
						<tr><th style="width: 30px;">No</th><th>Nombre</th><th>Institución</th><th>Registro Senescyt</th><th>Categoría</th><th>Nivel Educación</th><th style="width: 90px;">Acción</th></tr>
						</thead>
						<tbody>
						<?php $i = 1;?>
						<?php foreach ($titulos as $titulo):?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $titulo["nombre"];?></td>
							<td><?php echo $titulo["institucion"];?></td>
							<td><?php echo $titulo["registro_senecyt"];?></td>
							<td><?php echo $titulo["categoria"];?></td>
							<td><?php echo $titulo["nivel"];?></td>
							<td><a href="index.php?action=downloadFile&nameFile=<?php echo $titulo["url"];?>" class="btn btn-info btn-xs">Descargar</a></td>
						</tr>
						<?php endforeach;?>
						</tbody>
						</table>
						<h4 class="small-title">Cursos</h4>
					<table class="table table-th-block">
					<thead>
						<tr><th style="width: 30px;">No</th><th>Nombre</th><th>Horas</th><th>Año</th><th style="width: 90px;">Acción</th></tr>
						</thead>
						<tbody>
						<?php $i = 1;?>
						<?php foreach ($cursos as $curso):?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $curso["nombre"];?></td>
							<td><?php echo $curso["horas"];?></td>
							<td><?php echo $curso["anio"];?></td>
							<td><a href="index.php?action=downloadFile&nameFile=<?php echo $curso["url"];?>" class="btn btn-info btn-xs">Descargar</a></td>
						</tr>
						<?php endforeach;?>
						</tbody>
						</table>
						<h4 class="small-title">Historial Laboral</h4>
					<table class="table table-th-block">
					<thead>
						<tr><th style="width: 30px;">No</th><th>Institución</th><th>Área</th><th>Cargo</th><th>Relación Docencia</th><th>Contacto</th><th style="width: 90px;">Acción</th></tr>
						</thead>
						<tbody>
						<?php $i = 1;?>
						<?php foreach ($historial as $item):?>
						<tr>
							<td><?php echo $i;?></td>
							<td><?php echo $item["institucion"];?></td>
							<td><?php echo $item["area"];?></td>
							<td><?php echo $item["cargo"];?></td>
							<td><?php echo ($item["relacion_docencia"]==1)?"Si":"No";?></td>
							<td><?php echo "Dir: ". $item["direccion"]. ", ".$item["ciudad"]. ". Tel: ".$item["telefono"];?></td>
							<td><a href="index.php?action=downloadFile&nameFile=<?php echo $item["url"];?>" class="btn btn-info btn-xs">Descargar</a></td>
						</tr>
						<?php endforeach;?>
						</tbody>
						</table>
					</td>
					</tr>
				</table>
			
				<div class="the-box rounded">
				<h3>Evaluación de Méritos</h3>
				<form action="index.php?action=saveEvaluacion" method="post" id="frmEvaluacion">
<div class="form-group col-sm-12">				
<div class="form-group col-sm-6" style="padding-left: 0px;">
					<label class="control-label">Calificación</label> <input type='text'
						name='valor' id='valor' class='form-control' >			
				</div>
				<div class="col-sm-6" style="padding-top: 30px;">
                                  Para pasar Siguiente Etapa es necesario tener una evaluación de 8 a 10 puntos. 		
					
				</div>
</div>
				<div class="form-group col-sm-12" >
					<label class="control-label">Observaciones</label> <textarea name='observaciones' id='observaciones' class='form-control' ></textarea>			
				</div>
				
				<div class="form-group ">
		<input type='hidden' name='postulacion_id' class='form-control' value="<?php echo $postulacion; ?>">
		<input type='hidden' name='etapa_id' class='form-control' value="1">
		<button type="submit" class="btn btn-success">Guardar</button>
		
	</div>
				</form>
				
				</div>
				<form action="index.php?action=loadPostulante" method="post">
			<input name="etapa_id" id="etapa_id" value="<?php echo $etapa; ?>" type="hidden">
			<input  name="vacante_id" id="vacante_id" value="<?php echo $vacante; ?>" type="hidden"> 
			<button type="submit" class="btn btn-info">Regresar</button>
		</form>
			</div>
		</div>
	</div>
</div>



<?php include_once PATH_TEMPLATE.'/footer.php';?>
<link
	href="<?php echo PATH_CSS . '/../plugins/datatable/css/bootstrap.datatable.min.css';?>"
	rel="stylesheet">
<script
	src="<?php echo PATH_CSS . '/../plugins/datatable/js/jquery.dataTables.min.js';?>"></script>
<script
	src="<?php echo PATH_CSS . '/../plugins/datatable/js/bootstrap.datatable.js';?>"></script>
<script
	src="<?php echo PATH_CSS . '/../plugins/validator/bootstrapValidator.min.js';?>"></script>
<script src="<?php echo PATH_CSS . '/../js/apps.js';?>"></script>
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
										message: 'Ingrese una Observación válida.'
									}
								}
							},	
						
			
		}
	});

});
</script>
<style>
.rows {
	padding-left: 0px;
}
</style>
</body>
</html>