<form id="frmHistorial" method="post" action="index.php?action=saveData" enctype="multipart/form-data">

	<div class="form-group col-sm-12">
		<label class="control-label">Institución</label> <input type='text'
			name='institucion' class='form-control'
			value="<?php echo $historial['institucion']; ?>">

	</div>
	<div class="form-group col-sm-12 rows">
		<div class="form-group col-sm-4">
			<label class="control-label">Área</label> <input type='text'
				name='area' class='form-control'
				value="<?php echo $historial['area']; ?>">
	
		</div>
		<div class="form-group col-sm-4">
			<label class="control-label">Cargo</label> <input type='text'
				name='cargo' class='form-control'
				value="<?php echo $historial['cargo']; ?>">
	
		</div>
		<div class="form-group col-sm-4">
			<label class="control-label">Relación Docencia</label>
			<select class='form-control' name="relacion_docencia">
				<option value="" >Seleccione</option>
				<option value="1"  <?php if($historial['relacion_docencia']=='1'):echo "selected"; endif;?>>Si</option>
				<option value="2" <?php if($historial['relacion_docencia']=='2'):echo "selected"; endif;?>>No</option>
			</select>
	
		</div>
	</div>
	<div class="form-group col-sm-12 rows">
		<div class="form-group col-sm-6">
			<label class="control-label">Teléfono</label>
			<input type='text'
				name='telefono' class='form-control'
				value="<?php echo $historial['telefono']; ?>">
	
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label">Dirección</label>
			<input type='text'
				name='direccion' class='form-control'
				value="<?php echo $historial['direccion']; ?>">
	
		</div>

	</div>
	<div class="form-group col-sm-12 rows">
		<div class="form-group  col-sm-4">
			<label class="control-label">País</label>
			<select class='form-control' name="pais_id" id="pais_id">
				<option value="" >Seleccione</option>
			<?php foreach ($paises as $dato) { ?>
				<option value="<?php echo $dato['id'];?>"  <?php if($historial['pais_id']==$dato['id']):echo "selected"; endif;?>><?php echo $dato['nombre'];?></option>
			<?php }?>
			</select>
	
		</div>
	
			<div class="form-group  col-sm-4"> 
				<label class="control-label">Provincia</label>
				<select class='form-control' name="provincia_id" id="provincia_id">		
				<option value="" >Seleccione</option>	
				<?php foreach ($provincias as $dato) { ?>
					<option value="<?php echo $dato['id'];?>"  <?php if($historial['provincia_id']==$dato['id']):echo "selected"; endif;?>><?php echo $dato['nombre'];?></option>
				<?php }?>
				</select>
			</div>
			<div class="form-group  col-sm-4" >
				<label class="control-label">Ciudad</label>
				<select class='form-control' name="ciudad_id" id="ciudad_id">
				<option value="" >Seleccione</option>
				<?php foreach ($ciudades as $dato) { ?>
					<option value="<?php echo $dato['id'];?>"  <?php if($historial['ciudad_id']==$dato['id']):echo "selected"; endif;?>><?php echo $dato['nombre'];?></option>
				<?php }?>
				</select>
		
			</div>
	</div>
	<div class="form-group col-sm-12">
		<label class="control-label">Respado Digital</label> 
		
		<?php if($historial['url']!= ''):?>
			<input type='file' name='url1' id="url1" class="file">		
			<a href="index.php?action=downloadFile&nameFile=<?php echo $historial["url"];?>">Descargar</a>
			<input type="hidden" name="fileName" value="<?php echo $historial["url"];?>">
		<?php else :?>
			<input type='file' name='url' id="url" class="file">	
		<?php endif;?>
	</div>
	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $historial['id']; ?>">
	<input type='hidden' name='opcion' class='form-control'
			value="3">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>

</form>

<script type="text/javascript">

$(document).ready(function() {
    $('#frmHistorial').bootstrapValidator({
    	message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {			
			institucion: {
				message: 'El Nombre de la Institución no es válido',
				validators: {
							notEmpty: {
								message: 'El Nombre de la Institución no puede ser vacío.'
							},					
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ \.]+$/,
								message: 'Ingrese un Nombre de la Institución válido.'
							}
						}
					},
			area: {
						message: 'El Nombre del Área no es válido',
						validators: {
									notEmpty: {
										message: 'El Nombre del Nombre del Área no puede ser vacío.'
									},					
									regexp: {
										regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ \.]+$/,
										message: 'Ingrese un Nombre del Área válido.'
									}
								}
							},
			cargo: {
						message: 'El Nombre del Cargo no es válido',
						validators: {
								notEmpty: {
								message: 'El Nombre del Nombre del Cargo no puede ser vacío.'
							},					
							regexp: {
									regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ \.]+$/,
									message: 'Ingrese un Nombre del Cargo válido.'
								}
							}
						},
			relacion_docencia: {
				validators: {
					notEmpty: {
						message: 'Seleccione la Relación con la Docencia'
					}
				}
			},
			pais_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Tipo de País.'
					}
				}
			},
			provincia_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione una Provincia'
					}
				}
			},	
			ciudad_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione una Ciudad'
					}
				}
			},	
			
			direccion: {
				message: 'La Dirección no es válida.',
				validators: {
						notEmpty: {
						message: 'La Dirección no puede ser vacía.'
					},					
					regexp: {
							regexp: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ \.]+$/,
							message: 'La Dirección no válida.'
						}
					}
				},
			telefono: {
					message: 'El Teléfono no es válido.',
					validators: {
							notEmpty: {
							message: 'El Teléfono no puede ser vacío.'
						},					
					regexp: {
								regexp: /^(?:\+)?\d{9}$/,
								message: 'El Teléfono no es válido.'
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
					url1: {
						validators: {							
							file: {
			                    extension: 'pdf,docx,doc',
			                    message: 'Seleccione un archivo válido. (pdf, doc, docx)'
			                }
						}
					}		
		}
	});

});

$(document).ready(function(){
	   $("#pais_id").change(function () {
	           $("#pais_id option:selected").each(function () {
	            opcion=$(this).val();
	            $.post("index.php?action=loadProvincia", { opcion: opcion }, function(data){
	            $("#provincia_id").html(data);
	            });            
	        });
	   });

	   $("#provincia_id").change(function () {
	           $("#provincia_id option:selected").each(function () {
	            opcion=$(this).val();
	            $.post("index.php?action=loadCiudad", { opcion: opcion }, function(data){
	            $("#ciudad_id").html(data);
	            });            
	        });
	   })
	   
	});

</script>
<style>
.col-sm-6, .col-sm-4 {
	padding-left: 0px;
}
.rows{
	padding-right: 0px;
	}
</style>