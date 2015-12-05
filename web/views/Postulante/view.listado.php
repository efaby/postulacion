<?php $title = "Postulantes";?>
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


				<div class="panel with-nav-tabs panel-info">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#wizard-1-step1" data-toggle="tab"><i
									class="fa fa-user"></i> Informacion Personal</a></li>
							<li><a href="#wizard-1-step2" data-toggle="tab"><i
									class="fa fa-graduation-cap"></i> Instruccion Formal</a></li>
							<li><a href="#wizard-1-step3" data-toggle="tab"><i
									class="fa fa-briefcase"></i> Capacitación</a></li>
							<li><a href="#wizard-1-step4" data-toggle="tab"><i
									class="fa fa-pencil-square-o"></i> Experiencia</a></li>
						</ul>
					</div>
					<div id="panel-collapse-1" class="collapse in">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="wizard-1-step1">
								<div class="panel-body">
									<h4>Datos Generales</h4>
									<div class="col-lg-3 ">
									<div id="kv-avatar-errors" class="center-block"
										style="width: 800px; display: none"></div>
									<form class="text-center" action="/avatar_upload.php"
										method="post" enctype="multipart/form-data">
										<div class="kv-avatar center-block" style="width: 200px">
											<input id="avatar" name="avatar" type="file">											
										</div>
										
										<!-- include other inputs if needed and include a form submit (save) button -->
									</form>
									</div>
									
										<div class="col-lg-3 ">
										<form method="post" action="index.php?action=saveData" >
											<label class="control-label">Cédula</label>
											<input id="cedula" name="cedula" type="file" class="file-loading">
											</form>											
										</div>
										<div class="col-lg-3 ">
											<label class="control-label">Papeleta Votación</label>
											<input id="papeleta" name="papeleta" type="file" class="file-loading">											
										</div>
										<div class="col-lg-3 ">
											<label class="control-label">Hoja de Vida</label>				
											<input id="hoja" name="hoja" type="file" class="file-loading">											
										</div>
									

								</div>
								<!-- /.panel-body -->
								
							</div>
							<div class="tab-pane fade" id="wizard-1-step2">
								<div class="panel-body">
									<h4>Registros de Títulos</h4>
									<p>
										<button class="btn btn-large btn-info" id="modalOpen">
											<i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records
										</button>
									</p>

									<table class="table table-striped table-hover"
										id="datatable-example">
										<thead class="the-box dark full">
											<tr>
												<th style="text-align: center">ID</th>
												<th>Título</th>
												<th>Institución</th>
												<th>Nivel de Educación</th>
												<th>Registro SENESCYT</th>
												<th>País</th>
												<th>Archivo</th>
												<th style="text-align: center">Acciones</th>
											</tr>
										</thead>
										<tbody>
							<?php foreach ($datos as $dato): ?>
<tr>
												<td align="center"><?php echo $dato["id"]; ?></td>
												<td><?php echo $dato["nombre"]; ?></td>
												<td><?php echo $dato["institucion"]; ?></td>
												<td><?php echo $dato["nivel"]; ?></td>
												<td><?php echo $dato["registro_senecyt"]; ?></td>
												<td><?php echo $dato["pais"]; ?></td>
												<td>Descargar</td>
												<td align="center"><a href="#"
													onclick="javascript: loadModal(<?php echo $dato["id"]; ?>);"><i
														class="glyphicon glyphicon-edit"></i></a> &nbsp;&nbsp; <a
													href="#"
													onclick="javascript:if(confirm('Est\xE1 seguro que desea eliminar el elemento seleccionado?')){redirect(<?php echo $dato['id'];?>);}"><i
														class="glyphicon glyphicon-remove-circle"></i></a></td>
											</tr>
								<?php endforeach;?>
							</tbody>
									</table>
								</div>
								<!-- /.panel-body -->
								
							</div>
							<div class="tab-pane fade" id="wizard-1-step3">
								<div class="panel-body">
									<h4>Registros de Cursos</h4>
									<p>
										<button class="btn btn-large btn-info" id="modalOpen1">
											<i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records
										</button>
										
									</p>

									<table class="table table-striped table-hover"
										id="datatable-example">
										<thead class="the-box dark full">
											<tr>
												<th style="text-align: center">ID</th>
												<th>Nombre</th>
												<th>Horas</th>
												<th>Año</th>	
												<th>Archivo</th>											
												<th style="text-align: center">Acciones</th>
											</tr>
										</thead>
										<tbody>
							<?php foreach ($datos as $dato): ?>
<tr>
												<td align="center"><?php echo $dato["id"]; ?></td>
												<td><?php echo $dato["nombre"]; ?></td>
												<td><?php echo $dato["horas"]; ?></td>
												<td><?php echo $dato["anio"]; ?></td>
												<td>Descargar</td>												
												<td align="center"><a href="#"
													onclick="javascript: loadModal(<?php echo $dato["id"]; ?>);"><i
														class="glyphicon glyphicon-edit"></i></a> &nbsp;&nbsp; <a
													href="#"
													onclick="javascript:if(confirm('Est\xE1 seguro que desea eliminar el elemento seleccionado?')){redirect(<?php echo $dato['id'];?>);}"><i
														class="glyphicon glyphicon-remove-circle"></i></a></td>
											</tr>
								<?php endforeach;?>
							</tbody>
									</table>
								</div>
								<!-- /.panel-body -->
								
							</div>
														<div class="tab-pane fade" id="wizard-1-step4">
								<div class="panel-body">
									<h4>Registros de Historial Laboral</h4>
									<p>
										<button class="btn btn-large btn-info" id="modalOpen2">
											<i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records
										</button>
										
									</p>

									<table class="table table-striped table-hover"
										id="datatable-example">
										<thead class="the-box dark full">
											<tr>
												<th style="text-align: center">ID</th>
												<th>Institución</th>
												<th>Area</th>
												<th>Cargo</th>	
												<th>Ciudad</th>
												<th>Archivo</th>											
												<th style="text-align: center">Acciones</th>
											</tr>
										</thead>
										<tbody>
							<?php foreach ($datos as $dato): ?>
<tr>
												<td align="center"><?php echo $dato["id"]; ?></td>
												<td><?php echo $dato["institucion"]; ?></td>
												<td><?php echo $dato["area"]; ?></td>
												<td><?php echo $dato["cargo"]; ?></td>
												<td><?php echo $dato["ciudad"]; ?></td>
												<td>Descargar</td>												
												<td align="center"><a href="#"
													onclick="javascript: loadModal(<?php echo $dato["id"]; ?>);"><i
														class="glyphicon glyphicon-edit"></i></a> &nbsp;&nbsp; <a
													href="#"
													onclick="javascript:if(confirm('Est\xE1 seguro que desea eliminar el elemento seleccionado?')){redirect(<?php echo $dato['id'];?>);}"><i
														class="glyphicon glyphicon-remove-circle"></i></a></td>
											</tr>
								<?php endforeach;?>
							</tbody>
									</table>
								</div>
								<!-- /.panel-body -->
								</div>
						</div>
						<!-- /.tab-content -->
					</div>
					<!-- /.collapse in -->
				</div>






			</div>

		</div>
	</div>
</div>

<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3></h3>
			</div>

			<div class="modal-body"></div>

		</div>

	</div>
</div>


<?php include_once PATH_TEMPLATE.'/footer.php';?>
<link
	href="<?php echo PATH_CSS . '/../plugins/datatable/css/bootstrap.datatable.min.css';?>"
	rel="stylesheet">
<link href="<?php echo PATH_CSS . '/fileinput.min.css';?>"
	rel="stylesheet">
<script
	src="<?php echo PATH_CSS . '/../plugins/datatable/js/jquery.dataTables.min.js';?>"></script>
<script
	src="<?php echo PATH_CSS . '/../plugins/datatable/js/bootstrap.datatable.js';?>"></script>
<script
	src="<?php echo PATH_CSS . '/../plugins/validator/bootstrapValidator.min.js';?>"></script>
<script src="<?php echo PATH_CSS . '/../js/apps.js';?>"></script>
<script src="<?php echo PATH_CSS . '/../js/listadosMultiple.js';?>"></script>
<script src="<?php echo PATH_CSS . '/../js/fileinput.js';?>"></script>

<style>
.kv-avatar .file-preview-frame, .kv-avatar .file-preview-frame:hover {
	margin: 0;
	padding: 0;
	border: none;
	box-shadow: none;
	text-align: center;
}

.kv-avatar .file-input {
	display: table-cell;
	max-width: 220px;
}
</style>
<script>

$("#cedula").fileinput({showCaption: false});
$("#papeleta").fileinput({showCaption: false});
$("#hoja").fileinput({showCaption: false});

var btnCust = '<button type="button" class="btn btn-default " title="Guardar" ' + 
'onclick="alert(\'Call your custom code here.\')">' +
'<i class="glyphicon glyphicon-floppy-disk"></i>' +
'</button>'; 
$("#avatar").fileinput({
    overwriteInitial: true,
    maxFileSize: 1500,
    showClose: false,
    showCaption: false,
    browseLabel: '',
    removeLabel: '',
    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="<?php echo PATH_CSS . '\/../images/default_avatar_male.jpg';?>" alt="Your Avatar" style="width:160px">',
    layoutTemplates: {main2: '{preview} {remove} {browse} ' +  btnCust},
    allowedFileExtensions: ["jpg", "png", "gif"]
});




</script>


</body>
</html>