<?php $title = "Evaluación al Desempeño Docente";?>
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
					<form id="frmEvaluacion" name="frmEvaluacion" method="post" action="index.php?action=saveData">
						<div class="form-group col-sm-6">
							<label class="control-label">Nombre del Docente</label>
							<?php echo $postulante["nombres"]. " ". $postulante["apellidos"]?>
						</div>
						
						<div class="form-group col-sm-6">
							<label class="control-label">Nombre del Observador</label>
							<?php echo $usuario["nombres"]. " ". $usuario["apellidos"]?>							
						</div>	
						<div class="form-group col-sm-6">
							<label class="control-label">Grado/Curso</label> <input type='text'
								name='curso' class='form-control'
								value="">
						</div>					
						
						<div class="form-group col-sm-6">
							<label class="control-label">Fecha</label>
							<div class="input-group input-daterange">
					    		<input id="fecha_evaluacion" name="fecha_evaluacion" type="text" class="form-control" value="">					    		
							</div>	
						</div>
						<div class="form-group col-sm-12">
							<label class="control-label">Tema</label>
							<input type='text'
								name='tema' class='form-control'
								value="">
						</div>
						
						<div class="form-group col-sm-6">
							<label class="control-label">Asignatura</label>
							<input type='text'
								name='asignatura' class='form-control'
								value="">
						</div>					
						
						<div class="form-group col-sm-6">
							<label class="control-label">Período Académico</label>
							<input type='text'
								name='periodo_academico' class='form-control'
								value="">	
						</div>	
						
						<div class="form-group col-sm-12">
							<div class="panel panel-info">
							  <div class="panel-heading">
								<h3 class="panel-title">OBJETIVO</h3>
							  </div>
							  <div class="panel-body">
								  	<label class="control-label">Reflexionar sobre el desarrollo del desempeño docente con el fin de mejorar la práctica en el aula.</label> 
							 	  	<br>
							 	  	<p><strong>INSTRUCCIONES</strong></p>
							 	  	<label class="control-label">
							 	  	<ul>
						 			  	<li>Lea detenidamente cada enunciado del cuestionario y conteste con honestidad en el casillero a la alternativa correspondiente.</li>
						 	  			<li>Utilice la siguiente tabla de valoración.</li>
						 	  			<li>Marque con un (X) la alternativa correspondiente.</li>
						 			</ul>
					 	  			</label>					 	  	
							</div>
							</div>
						</div>		
						<div class="form-group col-sm-12">
								<?php $estado=""; $id=1;?>
								<?php foreach ($preguntas as $pregunta): ?>
									<input type="hidden" name="pregunta<?php echo $id; ?>" value="<?php echo $pregunta["id"]; ?>">
									<?php if ($estado != $pregunta['categoria_id']):?>
										<?php if ($estado !=""):?>
											</tbody>
											</table>
										</div>
										</div>						
										<?php endif;?>
										<div class="the-box full no-border">
											<div class="table-responsive">
											<table class="table table-th-block table-info">
												<thead>
											<tr>
												<th rowspan="2" style="width: 85%; vertical-align: middle;"><?php echo $pregunta["nombre_categoria"]; ?></th>
												<th colspan="3" style="text-align:center">VALORACIÓN</th>
											</tr>
											<tr>
												<th  style=" width:5%; text-align:center">1</th><th style=" width:5%; text-align:center">2</th><th style=" width:5%; text-align:center">3</th>
											</tr>
										</thead>
										<tbody>
										<tr><td><?php echo $pregunta["nombre_pregunta"];?></td>
											<td  style="text-align: center;">
												<label>
													<input type="radio" name="respuesta<?php echo $id;?>" value="1" required data-bv-notempty-message="El campo es requerido" />
												</label>												
											</td>
											<td  style="text-align: center;">
												<label>
													<input type="radio" name="respuesta<?php echo $id;?>" value="2" />
												</label>													
											</td>
											<td  style="text-align: center;">
												<label>
													<input type="radio" name="respuesta<?php echo $id;?>" value="3" />
												</label>
											</td>
										</tr>
										<?php $estado = $pregunta['categoria_id'];  ?>
										<?php else:?>
										<tr>
											<td><?php echo $pregunta["nombre_pregunta"];?></td>
											<td style="text-align: center;">
												<label>
													<input type="radio" name="respuesta<?php echo $id;?>" value="1" required data-bv-notempty-message="El campo es requiredo" />
												</label>												
											</td>
											<td  style="text-align: center;">							
												<label>
													<input type="radio" name="respuesta<?php echo $id;?>" value="2" />
												</label>												
											</td>
											<td  style="text-align: center;">
												<label>
													<input type="radio" name="respuesta<?php echo $id;?>" value="3" />
												</label>												
											</td>
										</tr>	
										<?php endif;?>		
										<?php $id++;?>																
								<?php endforeach;?>			
								</tbody>
								</table>			
								</div>
								</div>		
						</div>						
						<div class="form-group col-sm-12">
							<label class="control-label">Fortalezas</label> 
							
							
							<textarea name='fortalezas' class='form-control'> </textarea>
						</div>
											
						<div class="form-group col-sm-12">
							<label class="control-label">Debilidades</label> 
							<textarea name='debilidades' class='form-control'></textarea>
						</div>

						<div class="form-group col-sm-12">
							<label class="control-label">Observaciones</label> 
							<textarea name='observaciones' class='form-control'></textarea>
						</div>
															
						<div class="form-group" style="padding-left: 15px;">
						<input type='hidden' name='postulacion_id' class='form-control' value="<?php echo $postulacion_id; ?>">
						<input type='hidden' name='contador' class='form-control' value="<?php echo $id-1;?>">
							<button type="submit" class="btn btn-success">Guardar</button>
						</div>					
					</form>
			</div>
		</div>
	</div>
</div>

<?php include_once PATH_TEMPLATE.'/footer.php';?>
<link
	href="<?php echo PATH_CSS . '/../plugins/datatable/css/bootstrap.datatable.min.css';?>"
	rel="stylesheet">
<link href="<?php echo PATH_CSS . '/../plugins/datepicker/datepicker.min.css';?>" rel="stylesheet">

<script
	src="<?php echo PATH_CSS . '/../plugins/datatable/js/jquery.dataTables.min.js';?>"></script>
<script
	src="<?php echo PATH_CSS . '/../plugins/datatable/js/bootstrap.datatable.js';?>"></script>
<script
	src="<?php echo PATH_CSS . '/../plugins/validator/bootstrapValidator.min.js';?>"></script>

<script src="<?php echo PATH_CSS . '/../plugins/datepicker/bootstrap-datepicker.js';?>"></script>


<script>

$(document).ready(function() {
	$('#frmEvaluacion').bootstrapValidator({
		    	message: 'This value is not valid',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'						
				},
				fields: {
					curso: {
						message: 'El nombre del curso no es válido',
						validators: {
							notEmpty: {
								message: 'El nombre del curso no puede ser vacío.'
							},					
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9-_ \.]+$/,
								message: 'Ingrese un nombre del curso no es válido.'
							}
						}
					},
					nombre_docente: {
						validators: {
							notEmpty: {
								message: 'El nombre del docente no puede ser vacía.'
							},					
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9_ ,-\.]+$/,
								message: 'Ingrese el nombre del docente válido.'
							}
						}
					},
					 fecha_evaluacion: {
						 validators: {
							 notEmpty: {
								 message: 'La fecha de evaluacion es requerida y no puede ser vacia'
							 },
							 date:{	 
								    format: 'YYYY-MM-DD',
				                    message: 'La fecha de evaluacion del concurso no es válida.'				                    
							 }							 
						 }
					 },
					asignatura: {
						validators: {
							notEmpty: {
								message: 'La asignatura no puede ser vacía'							
						},
						regexp: {
							regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9_ ,-\.]+$/,
							message: 'Ingrese una asignatura válido.'
						}
						}
					},	
					tema: {
						validators: {
							notEmpty: {
								message: 'El tema no puede ser vacío'							
						},
						regexp: {
							regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9_ ,-\.]+$/,
							message: 'Ingrese un tema válidos.'
						}
						}
					},
					nombre_observador: {
						validators: {
							notEmpty: {
								message: 'El nombre del observador no puede ser vacío'							
						},
						regexp: {
							regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9_ ,-\.]+$/,
							message: 'Ingrese un nombre de observador válidos.'
						}
						}
					},
					periodo_academico: {
			        	validators: {
							notEmpty: {
								message: 'Las habilidades no pueden ser vacía'							
						},
						regexp: {
							regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9_ ,-\.]+$/,
							message: 'Ingrese habilidades válidos.'
							}
			        	}
					},
					fortalezas: {
			        	validators: {
							notEmpty: {
								message: 'Las fortalezas no pueden ser vacías'							
						},
						regexp: {
							regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9_ ,-\.]+$/,
							message: 'Ingrese fortalezas válidas.'
							}
			        	}
					},
					debilidades: {
			        	validators: {
							notEmpty: {
								message: 'Las debilidades no pueden ser vacías'							
						},
						regexp: {
							regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9_ ,-\.]+$/,
							message: 'Ingrese debilidades válidas.'
							}
			        	}
					},
					observaciones: {
			        	validators: {
							notEmpty: {
								message: 'Las observaciones no pueden ser vacías'							
						},
						regexp: {
							regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9_ ,-\.]+$/,
							message: 'Ingrese observaciones válidas.'
							}
			        	}
					}
			  	}
			});
});		

</script>
<link rel="stylesheet" href="<?php echo PATH_CSS . '/../css/bootstrapValidator.min.css';?>">
<link rel="stylesheet" href="<?php echo PATH_CSS . '/../css/bootstrap-datetimepicker.min.css';?>">
<link
	href="<?php echo PATH_CSS . '/../plugins/datatable/css/bootstrap.datatable.min.css';?>"
	rel="stylesheet">

<script src="<?php echo PATH_CSS . '/../js/bootstrapValidator.min.js';?>"></script>
<script src="<?php echo PATH_CSS . '/../js/moment.min.js';?>"></script>
<script src="<?php echo PATH_CSS . '/../js/bootstrap-datetimepicker.min.js';?>"></script>  
<script src="<?php echo PATH_CSS . '/../js/validacionfecha.js';?>"></script>
<script
	src="<?php echo PATH_CSS . '/../plugins/datatable/js/bootstrap.datatable.js';?>"></script>
<script
	src="<?php echo PATH_CSS . '/../plugins/datatable/js/jquery.dataTables.min.js';?>"></script>        
</body>
</html>