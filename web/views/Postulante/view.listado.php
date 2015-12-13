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
		<?php $opcion = (isset($_SESSION['opcion']))?$_SESSION['opcion']:0; ?>
			<div class="the-box">
				<div class="panel with-nav-tabs panel-info">
					<div class="panel-heading">
						<ul class="nav nav-tabs">
							<li class="<?php echo ($opcion==0)?'active':'';?>"><a
								href="#wizard-1-step1" data-toggle="tab"><i class="fa fa-user"></i>
									Información Personal</a></li>
							<li class="<?php echo ($opcion==1)?'active':'';?>"><a
								href="#wizard-1-step2" data-toggle="tab"><i
									class="fa fa-graduation-cap"></i> Instruccion Formal</a></li>
							<li class="<?php echo ($opcion==2)?'active':'';?>"><a
								href="#wizard-1-step3" data-toggle="tab"><i
									class="fa fa-briefcase"></i> Capacitación</a></li>
							<li class="<?php echo ($opcion==3)?'active':'';?>"><a
								href="#wizard-1-step4" data-toggle="tab"><i
									class="fa fa-pencil-square-o"></i> Experiencia</a></li>
						</ul>
					</div>
					<div id="panel-collapse-1" class="collapse in">
						<div class="tab-content">
							<div
								class="tab-pane fade <?php echo ($opcion==0)?'in active':'';?>"
								id="wizard-1-step1">
								<div class="panel-body">
									<h4>Datos Generales</h4>
									<div class="col-lg-3 ">
										<form class="text-center" action="index.php?action=saveFile"
											method="post" enctype="multipart/form-data">
											<div id="kv-avatar-errors" class="center-block"
												style="width: 200px; display: none"></div>
											<div class="kv-avatar center-block" style="width: 200px">
												<input type='file' name='url_foto' id="url_foto"
													class="file"> <input type="hidden" name="fileName"
													value="<?php echo $usuario['url_foto'];?>"> <input
													type="hidden" name="opcion" value="1">
											</div>

											<!-- include other inputs if needed and include a form submit (save) button -->
										</form>
									</div>

									<div class="col-lg-3 ">
										<form method="post" action="index.php?action=saveFile"
											enctype="multipart/form-data">
											<label class="control-label">Cédula</label>
											<div id="file-errors-cedula" class="center-block"
												style="width: 220px; display: none"></div>
											<input id="url_cedula" name="url_cedula" type="file"
												class="file-loading"> <input type="hidden" name="fileName"
												value="<?php echo $usuario['url_cedula'];?>"> <input
												type="hidden" name="opcion" value="2">
											<?php if($usuario['url_cedula']!=''):?>
											<br>
												<a
												href="index.php?action=downloadFile&nameFile=<?php echo $usuario['url_cedula'];?>" class="btn btn-info btn-xs">Descargar</a>
											<?php endif;?>
											</form>
									</div>
									<div class="col-lg-3 ">
										<form method="post" action="index.php?action=saveFile"
											enctype="multipart/form-data">
											<label class="control-label">Papeleta Votación</label>
											<div id="file-errors-papeleta" class="center-block"
												style="width: 220px; display: none"></div>
											<input id="url_papeleta" name="url_papeleta" type="file"
												class="file-loading"> <input type="hidden" name="fileName"
												value="<?php echo $usuario['url_papeleta'];?>"> <input
												type="hidden" name="opcion" value="3">
												<?php if($usuario['url_papeleta']!=''):?>
												<br>
													<a class="btn btn-info btn-xs"
												href="index.php?action=downloadFile&nameFile=<?php echo $usuario['url_papeleta'];?>">Descargar</a>
												<?php endif;?>
											</form>
									</div>
									<div class="col-lg-3 ">
										<form method="post" action="index.php?action=saveFile"
											enctype="multipart/form-data">
											<label class="control-label">Hoja de Vida</label>
											<div id="file-errors-hoja" class="center-block"
												style="width: 220px; display: none"></div>
											<input id="url_hoja" name="url_hoja" type="file"
												class="file-loading"> <input type="hidden" name="fileName"
												value="<?php echo $usuario['url_hoja'];?>"> <input
												type="hidden" name="opcion" value="4">
												<?php if($usuario['url_hoja']!=''):?>
												<br>
													<a class="btn btn-info btn-xs"
												href="index.php?action=downloadFile&nameFile=<?php echo $usuario['url_hoja'];?>">Descargar</a>
												<?php endif;?>	
											</form>
									</div>


								</div>
								<!-- /.panel-body -->
								<div id="formulario">
									<form id="frmUsuario" method="post" 
										action="index.php?action=saveUser">
										<div class="form-group col-sm-12 rows">
										<div class="form-group col-sm-6">
											<label class="control-label">Número de Identificación</label>
											<input type='text' name='numero_identificacion'
												class='form-control'
												value="<?php echo $usuario['numero_identificacion']; ?>">

										</div>
										<div class="form-group col-sm-6"></div>
										</div>
										<div class="form-group col-sm-12 rows">
										<div class="form-group col-sm-6">
											<label class="control-label">Nombres</label> <input
												type='text' name='nombres' class='form-control'
												value="<?php echo $usuario['nombres']; ?>">

										</div>
										<div class="form-group col-sm-6">
											<label class="control-label">Apellidos</label> <input
												type='text' name='apellidos' class='form-control'
												value="<?php echo $usuario['apellidos']; ?>">

										</div>
										</div>
										<div class="form-group col-sm-12">
											<label class="control-label">Email</label> <input type='text'
												name='email' class='form-control'
												value="<?php echo $usuario['email']; ?>">

										</div>
										<div class="form-group col-sm-12 rows">
										<div class="form-group col-sm-6">
											<label class="control-label">Género</label> <select
												class='form-control' name="genero">
												<option value="">Seleccione</option>
												<option value="f"
													<?php if($usuario['genero']=='f'):echo "selected"; endif;?>>Femenino</option>
												<option value="m"
													<?php if($usuario['genero']=='m'):echo "selected"; endif;?>>Masculino</option>
											</select>

										</div>
										<div class="form-group  col-sm-6">
											<label class="control-label">Estado Civil</label> <select
												class='form-control' name="estado_civil_id">
												<option value="">Seleccione</option>
		<?php foreach ($estados as $dato) { ?>
			<option value="<?php echo $dato['id'];?>"
													<?php if($usuario['estado_civil_id']==$dato['id']):echo "selected"; endif;?>><?php echo $dato['nombre'];?></option>
		<?php }?>
		</select>

										</div>
									</div>
									
								<div class="form-group col-sm-12 rows">
										<div class="form-group  col-sm-6">
										
											<label class="control-label">Lugar de Nacimiento</label> 
											<input type='text'
												name='lugar_nacimiento' class='form-control'
												value="<?php echo $usuario['lugar_nacimiento']; ?>">
										</div>
										<div class="form-group  col-sm-6">
										
											<label class="control-label">Fecha de Nacimiento</label> 
											<input type='text' id='fecha_nacimiento'
												name='fecha_nacimiento' class='form-control'
												value="<?php echo $usuario['fecha_nacimiento']; ?>">
										</div>
										</div>
										<div class="form-group col-sm-12">
											<label class="control-label">Dirección</label> <input type='text'
												name='direccion' class='form-control'
												value="<?php echo $usuario['direccion']; ?>">

										</div>
									<div class="form-group col-sm-12 rows">
										<div class="form-group col-sm-6">
											<label class="control-label">Telefono</label> <input
												type='text' name='telefono' class='form-control'
												value="<?php echo $usuario['telefono']; ?>">

										</div>
										<div class="form-group col-sm-6">
											<label class="control-label">Celular</label> <input
												type='text' name='celular' class='form-control'
												value="<?php echo $usuario['celular']; ?>">

										</div>
										</div>
										<div class="form-group col-sm-12 rows">
										<div class="form-group  col-sm-6">
										
											<label class="control-label">Capacidad Especial</label> <select
												class='form-control' name="capacidad_especial_id">
												<option value="">Seleccione</option>
		<?php foreach ($capacidades as $dato) { ?>
			<option value="<?php echo $dato['id'];?>"
													<?php if($usuario['capacidad_especial_id']==$dato['id']):echo "selected"; endif;?>><?php echo $dato['nombre'];?></option>
		<?php }?>
		</select>

										</div>
										<div class="form-group  col-sm-6">
										
											<label class="control-label">Descripcion Discapacidad</label> 
											<input type='text'
												name='descripcion_discapacidad' class='form-control'
												value="<?php echo $usuario['descripcion_discapacidad']; ?>">
										</div>
										
										</div>
										<div class="form-group col-sm-12 rows">
										<div class="form-group col-sm-6">
											<label class="control-label">Religion</label> <input
												type='text' name='religion' class='form-control'
												value="<?php echo $usuario['religion']; ?>">

										</div>
										<div class="form-group col-sm-6">
											<label class="control-label">Idiomas</label> <input
												type='text' name='idiomas' class='form-control'
												value="<?php echo $usuario['idiomas']; ?>">

										</div>
										</div>
										<div class="form-group rowBottom">
											<input type='hidden' name='id' class='form-control'
												value="<?php echo $usuario['id']; ?>">
											<button type="submit" class="btn btn-success">Guardar</button>
										</div>

									</form>
								</div>
							</div>
							<div
								class="tab-pane fade <?php echo ($opcion==1)?'in active':'';?>"
								id="wizard-1-step2">
								<div class="panel-body">
									<h4>Registros de Títulos</h4>
									<p>
										<button class="btn btn-large btn-info" id="modalOpen">
											<i class="glyphicon glyphicon-plus"></i> &nbsp; Añadir
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
							<?php foreach ($titulos as $dato): ?>
<tr>
												<td align="center"><?php echo $dato["id"]; ?></td>
												<td><?php echo $dato["nombre"]; ?></td>
												<td><?php echo $dato["institucion"]; ?></td>
												<td><?php echo $dato["nivel"]; ?></td>
												<td><?php echo $dato["registro_senecyt"]; ?></td>
												<td><?php echo $dato["pais"]; ?></td>
												<td><a
													href="index.php?action=downloadFile&nameFile=<?php echo $dato["url"];?>" class="btn btn-info btn-xs">Descargar</a></td>
												<td align="center"><a href="#"
													onclick="javascript: loadModal(<?php echo $dato["id"]; ?>,'Registro Título',1);"><i
														class="glyphicon glyphicon-edit"></i></a> &nbsp;&nbsp; <a
													href="#"
													onclick="javascript:if(confirm('Est\xE1 seguro que desea eliminar el elemento seleccionado?')){redirect(<?php echo $dato['id'];?>,1);}"><i
														class="glyphicon glyphicon-remove-circle"></i></a></td>
											</tr>
								<?php endforeach;?>
							</tbody>
									</table>
								</div>
								<!-- /.panel-body -->

							</div>
							<div
								class="tab-pane fade <?php echo ($opcion==2)?'in active':'';?>"
								id="wizard-1-step3">
								<div class="panel-body">
									<h4>Registros de Cursos</h4>
									<p>
										<button class="btn btn-large btn-info" id="modalOpen1">
											<i class="glyphicon glyphicon-plus"></i> &nbsp; Añadir
										</button>

									</p>

									<table class="table table-striped table-hover"
										id="datatable-example1">
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
							<?php foreach ($cursos as $dato): ?>
<tr>
												<td align="center"><?php echo $dato["id"]; ?></td>
												<td><?php echo $dato["nombre"]; ?></td>
												<td><?php echo $dato["horas"]; ?></td>
												<td><?php echo $dato["anio"]; ?></td>
												<td><a
													href="index.php?action=downloadFile&nameFile=<?php echo $dato["url"];?>" class="btn btn-info btn-xs">Descargar</a></td>
												<td align="center"><a href="#"
													onclick="javascript: loadModal(<?php echo $dato["id"]; ?>,'Registro Curso',2);"><i
														class="glyphicon glyphicon-edit"></i></a> &nbsp;&nbsp; <a
													href="#"
													onclick="javascript:if(confirm('Est\xE1 seguro que desea eliminar el elemento seleccionado?')){redirect(<?php echo $dato['id'];?>,2);}"><i
														class="glyphicon glyphicon-remove-circle"></i></a></td>
											</tr>
								<?php endforeach;?>
							</tbody>
									</table>
								</div>
								<!-- /.panel-body -->

							</div>
							<div
								class="tab-pane fade <?php echo ($opcion==3)?'in active':'';?>"
								id="wizard-1-step4">
								<div class="panel-body">
									<h4>Registros de Historial Laboral</h4>
									<p>
										<button class="btn btn-large btn-info" id="modalOpen2">
											<i class="glyphicon glyphicon-plus"></i> &nbsp; Añadir
										</button>

									</p>

									<table class="table table-striped table-hover"
										id="datatable-example2">
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
							<?php foreach ($historiales as $dato): ?>
<tr>
												<td align="center"><?php echo $dato["id"]; ?></td>
												<td><?php echo $dato["institucion"]; ?></td>
												<td><?php echo $dato["area"]; ?></td>
												<td><?php echo $dato["cargo"]; ?></td>
												<td><?php echo $dato["ciudad"]; ?></td>
												<td><a
													href="index.php?action=downloadFile&nameFile=<?php echo $dato["url"];?>" class="btn btn-info btn-xs">Descargar</a></td>
												<td align="center"><a href="#"
													onclick="javascript: loadModal(<?php echo $dato["id"]; ?>,'Registro Historial Laboral',3);"><i
														class="glyphicon glyphicon-edit"></i></a> &nbsp;&nbsp; <a
													href="#"
													onclick="javascript:if(confirm('Est\xE1 seguro que desea eliminar el elemento seleccionado?')){redirect(<?php echo $dato['id'];?>,3);}"><i
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

<link rel="stylesheet" href="<?php echo PATH_CSS . '/../css/bootstrapValidator.min.css';?>">
<link rel="stylesheet" href="<?php echo PATH_CSS . '/../css/bootstrap-datetimepicker.min.css';?>">

<script src="<?php echo PATH_CSS . '/../js/bootstrapValidator.min.js';?>"></script>
<script src="<?php echo PATH_CSS . '/../js/moment.min.js';?>"></script>
<script src="<?php echo PATH_CSS . '/../js/bootstrap-datetimepicker.min.js';?>"></script>  

<style>
.kv-avatar .file-preview-frame,.kv-avatar .file-preview-frame:hover {
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

$("#url_cedula").fileinput({showCaption: false,elErrorContainer: '#file-errors-cedula',allowedFileExtensions: ["jpg", "png", "pdf"]});
$("#url_papeleta").fileinput({showCaption: false,elErrorContainer: '#file-errors-papeleta',allowedFileExtensions: ["jpg", "png", "pdf"]});
$("#url_hoja").fileinput({showCaption: false,elErrorContainer: '#file-errors-hoja',allowedFileExtensions: ["jpg", "png", "pdf"]});

var btnCust = '<button  type="submit" class="btn btn-default " title="Guardar" >' +
'<i class="glyphicon glyphicon-floppy-disk"></i>' +
'</button>'; 
$("#url_foto").fileinput({
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
    defaultPreviewContent: '<img src="<?php echo PATH_IMAGES_USER . $usuario['url_foto_view']; ?>" alt="Your Avatar" style="width:160px">',
    layoutTemplates: {main2: '{preview} {remove} {browse} ' +  btnCust},
    allowedFileExtensions: ["jpg", "png", "gif"]
});

$(function () {
  
    $('#fecha_nacimiento').datetimepicker({ 
      pickTime: false, 
      format: "YYYY-MM-DD", 
      viewMode: 'years'
    });
});

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
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ \.]+$/,
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
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ \.]+$/,
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
			capacidad_especial_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Capacidad Especial'
					}
				}
			},	
			estado_civil_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Estado Civil'
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
			},
			lugar_nacimiento: {
				message: 'El Lugar de Nacimiento no es válido',
				validators: {	
					notEmpty: {
						message: 'El Lugar de Nacimiento no puede ser vacío.'
					},				
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ \.]+$/,
						message: 'Ingrese el Lugar de Nacimiento válido.'
					}
				}
			},
			direccion: {
				message: 'La Dirección no es válida',
				validators: {	
					notEmpty: {
						message: 'La Dirección no puede ser vacía.'
					},			
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9 \.-]+$/,
						message: 'Ingrese una Direccion válida.'
					}
				}
			},
			religion: {
				message: 'La Religión no es válida',
				validators: {	
					notEmpty: {
						message: 'La Religión no puede ser vacía.'
					},			
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ \.]+$/,
						message: 'Ingrese una Religión válido.'
					}
				}
			},
			idiomas: {
				message: 'Los Idiomas no son válidos',
				validators: {	
					notEmpty: {
						message: 'Los Idiomas no puede ser vacío.'
					},			
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ, \.]+$/,
						message: 'Ingrese Idiomas válidos.'
					}
				}
			},
			descripcion_discapacidad: {
				message: 'La Descripción de Discapacidad no es válida',
				validators: 	{			
					regexp: {
						regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ \.]+$/,
						message: 'Ingrese una Descripción de Discapacidad válida.'
					}
				}
			},
			fecha_nacimiento: {
				 validators: {
					 notEmpty: {
						 message: 'La Fecha de Nacimiento es requerida y no puede ser vacía'
					 },
					 date:{	 									
		                    format: 'YYYY-MM-DD',
		                    message: 'La Fecha de Nacimiento no es válida.'
		                    
					 }							 
				 }
			 },
			 telefono: {
					message: 'El Teléfono no es válido',
					validators: {
						notEmpty: {
							message: 'El Teléfono no puede ser vacío.'
						},					
						regexp: {
							regexp: /^(?:\+)?\d{9}$/,
							message: 'Ingrese un Teléfono válido.'
						}
					}
				},
				celular: {
					message: 'El Celular no es válido',
					validators: {
						notEmpty: {
							message: 'El Celular no puede ser vacío.'
						},					
						regexp: {
							regexp: /^(?:\+)?\d{10}$/,
							message: 'Ingrese un Celular válido.'
						}
					}
				},
		}
	});

});

if ($('#datatable-example1').length > 0){
	$('#datatable-example1').dataTable();
}

if ($('#datatable-example2').length > 0){
	$('#datatable-example2').dataTable();
}
</script>


<style>
.col-sm-6, .col-sm-4 {
	padding-left: 0px;
}
.rows{
	padding-right: 0px;
	}
	.rowBottom{
		
		padding-left: 15px;
	}
.dataTables_wrapper .row{
	padding-left: 15px;
}
</style>
</body>
</html>
