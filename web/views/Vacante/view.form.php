<<?php $title = "Vacante";?>
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
					<form id="frmVacante" name="frmVacante" method="post" action="index.php?action=saveData">
						<div class="form-group">
							<label class="control-label">Nombre del Área</label> <input type='text'
								name='nombre_area' class='form-control'
								value="<?php echo $vacante['nombre_area']; ?>">
						</div>
					
						<div class="form-group">
							<label class="control-label">Título</label>
							<input type='text'
								name='titulo' class='form-control'
								value="<?php echo $vacante['titulo']; ?>">
						</div>
						
						<div class="form-group">
							<label class="control-label">Número de Vacantes</label>
							<input type='text'
								name='numero_vacantes' class='form-control'
								value="<?php echo $vacante['numero_vacantes']; ?>">
						</div>
						
						<div class="form-group">
							<label class="control-label">Años de Experiencia</label>
							<input type='text'
								name='experiencia_requerida' class='form-control'
								value="<?php echo $vacante['experiencia_requerida']; ?>">
						</div>
						
						<div class="form-group">
							<label class="control-label">Fecha de Inicio y Fin de Concurso</label>
							<div class="input-group input-daterange">
					    		<input id="fecha_inicio" name="fecha_inicio" type="text" class="form-control" value="<?php echo $vacante['fecha_inicio']; ?>">
					    		<span class="input-group-addon">to</span>
					   			<input id="fecha_fin" name="fecha_fin" type="text" class="form-control" value="<?php echo $vacante['fecha_fin']; ?>">
							</div>									
						</div>	
						
						<div class="form-group">
							<label class="control-label">Fecha de Inicio y Fin de Postulación</label>
							<div class="input-group input-daterange">
					    		<input type="text" class="form-control" name="fecha_inicio_postulacion" id="fecha_inicio_postulacion" value="<?php echo $vacante['fecha_inicio_postulacion'];?>">
					    		<span class="input-group-addon">to</span>
					   			 <input type="text" class="form-control" name="fecha_fin_postulacion" id="fecha_fin_postulacion" value="<?php echo $vacante['fecha_fin_postulacion'];?>">
							</div>		
						</div>	
						
						<div class="form-group">
							<label class="control-label">Fecha de Inicio y Fin de Calificación de Méritos</label>
							<div class="input-group input-daterange">
					    		<input type="text" class="form-control" name="fecha_inicio_calificacion" id="fecha_inicio_calificacion" value="<?php echo $vacante['fecha_inicio_calificacion'];?>">
					    		<span class="input-group-addon">to</span>
					   			 <input type="text" class="form-control" name="fecha_fin_calificacion" id="fecha_fin_calificacion" value="<?php echo $vacante['fecha_fin_calificacion'];?>">
							</div>		
						</div>	
						
						<div class="form-group">
							<label class="control-label">Fecha de Inicio y Fin de Examen de Conocimiento</label>
							<div class="input-group input-daterange">
					    		<input type="text" class="form-control" name="fecha_inicio_test" id="fecha_inicio_test" value="<?php echo $vacante['fecha_inicio_test'];?>">
					    		<span class="input-group-addon">to</span>
					   			 <input type="text" class="form-control" name="fecha_fin_test" id="fecha_fin_test" value="<?php echo $vacante['fecha_inicio_test'];?>">
							</div>		
						</div>	
						
						<div class="form-group">
							<label class="control-label">Fecha de Inicio y Fin de Clase Demostrativa</label>
							<div class="input-group input-daterange">
					    		<input type="text" class="form-control" name="fecha_inicio_clase" id="fecha_inicio_clase" value="<?php echo $vacante['fecha_inicio_clase'];?>">
					    		<span class="input-group-addon">to</span>
					   			 <input type="text" class="form-control" name="fecha_fin_clase" id="fecha_fin_clase" value="<?php echo $vacante['fecha_fin_clase'];?>">
							</div>		
						</div>	
						
						<div class="form-group">
							<label class="control-label">Fecha de Inicio y Fin de Entrevista</label>
							<div class="input-group input-daterange">
					    		<input type="text" class="form-control" name="fecha_inicio_entrevista" id="fecha_inicio_entrevista" value="<?php echo $vacante['fecha_inicio_entrevista'];?>">
					    		<span class="input-group-addon">to</span>
					   			 <input type="text" class="form-control" name="fecha_fin_entrevista" id="fecha_fin_entrevista" value="<?php echo $vacante['fecha_fin_entrevista'];?>">
							</div>		
						</div>	
						
						<div class="form-group">
							<label class="control-label">Características</label> <input type='text'
								name='caracteristicas' class='form-control'
								value="<?php echo $vacante['caracteristicas']; ?>">
						</div>
											
						<div class="form-group">
							<label class="control-label">Habilidades</label> <input type='text'
								name='habilidades' class='form-control'
								value="<?php echo $vacante['habilidades']; ?>">
						</div>
					
											
						<div class="form-group">
						<input type='hidden' name='id' class='form-control' value="<?php echo $vacante['id']; ?>">
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
	$('#frmVacante').bootstrapValidator({
		    	message: 'This value is not valid',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'						
				},
				fields: {
					nombre_area: {
						message: 'El nombre del área no es válido',
						validators: {
							notEmpty: {
								message: 'El nombre del área no puede ser vacío.'
							},					
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9-_ \.]+$/,
								message: 'Ingrese un nombre del área no es válido.'
							}
						}
					},
					titulo: {
						validators: {
							notEmpty: {
								message: 'El título no puede ser vacía.'
							},					
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9_ ,-\.]+$/,
								message: 'Ingrese un título válido.'
							}
						}
					},
					numero_vacantes: {
						validators: {
							notEmpty: {
								message: 'El número de vacantes no puede ser vacía'							
						},
						regexp: {
							regexp: /^[0-9]+$/,
							message: 'Ingrese un número de vacantes válido.'
						}
						}
					},	

					experiencia_requerida: {
						validators: {
							notEmpty: {
								message: 'Los años de experiencia no puede ser vacía'							
						},
						regexp: {
							regexp: /^[0-9]+$/,
							message: 'Ingrese los años de experiencia válidos.'
						}
						}
					},
					 
			        fecha_inicio: {
						 validators: {
							 notEmpty: {
								 message: 'La fecha de inicio de concurso es requerida y no puede ser vacia'
							 },
							 date:{	 
								    format: 'YYYY-MM-DD',
				                    message: 'La fecha de inicio del concurso no es válida.'				                    
							 }							 
						 }
					 },
					 
			        fecha_fin: {
			        	 validators: {
							 notEmpty: {
								 message: 'La fecha de fin de concurso es requerida y no puede ser vacia'
							 },
							 date: {
								 format: 'YYYY-MM-DD',
				                 message: 'La fecha de fin del concurso no es válida.'
							 }							 
						 }
			        },

			        fecha_inicio_postulacion: {
						 validators: {
							 notEmpty: {
								 message: 'La fecha de inicio de concurso es requerida y no puede ser vacía'
							 },
							
							 date: {
								 format: 'YYYY-MM-DD',
				                 message: 'La fecha de fin del concurso no es válida.'
							 }													
						 }
					 },
					 
			        fecha_fin_postulacion: {
			        	 validators: {
							 notEmpty: {
								 message: 'La fecha de fin de postulación es requerida y no puede ser vacía'
							 },
							 date: {
								 format: 'YYYY-MM-DD',
				                 message: 'La fecha de fin del concurso no es válida.'
							 }	
						 }
			        },

			        fecha_inicio_calificacion: {
						 validators: {
							 notEmpty: {
								 message: 'La fecha de inicio de calificación es requerida y no puede ser vacía'
							 },
							 date:{	 
								 	format: 'YYYY-MM-DD',
				                    message: 'La fecha de inicio del calificación no es válida.'
				                    
							 }							 
						 }
					 },
					 
			        fecha_fin_calificacion: {
			        	 validators: {
							 notEmpty: {
								 message: 'La fecha de fin de calificación es requerida y no puede ser vacía'
							 },
							 date: {
								 format: 'YYYY-MM-DD',
				                 message: 'La fecha de fin de calificación no es válida.'
							 }
							 
						 }
			        },
			        
			        caracteristicas: {
			        	validators: {
							notEmpty: {
								message: 'Las características no pueden ser vacía'							
						},
						regexp: {
							regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9_ ,-\.]+$/,
							message: 'Ingrese características válidas.'
							}
			        	}
			        },
			        habilidades: {
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
			  	}
			});
});		

</script>
<link rel="stylesheet" href="<?php echo PATH_CSS . '/../css/bootstrapValidator.min.css';?>">
<link rel="stylesheet" href="<?php echo PATH_CSS . '/../css/bootstrap-datetimepicker.min.css';?>">

<script src="<?php echo PATH_CSS . '/../js/bootstrapValidator.min.js';?>"></script>
<script src="<?php echo PATH_CSS . '/../js/moment.min.js';?>"></script>
<script src="<?php echo PATH_CSS . '/../js/bootstrap-datetimepicker.min.js';?>"></script>  
<script src="<?php echo PATH_CSS . '/../js/validacionfecha.js';?>"></script>        
</body>
</html>