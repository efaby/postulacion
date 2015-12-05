<form id="frmHistorial" method="post" action="index.php?action=saveData">

	<div class="form-group col-sm-12">
		<label class="control-label">Institución</label> <input type='text'
			name='institucion' class='form-control'
			value="<?php echo $historial['institucion']; ?>">

	</div>
	<div class="form-group col-sm-4">
		<label class="control-label">Area</label> <input type='text'
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
			<option value="1"  <?php if($historial['genero']=='1'):echo "selected"; endif;?>>Si</option>
			<option value="0" <?php if($historial['genero']=='0'):echo "selected"; endif;?>>No</option>
		</select>

	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Telefono</label>
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

	
	<div class="form-group  col-sm-4">
		<label class="control-label">Pais</label>
		<select class='form-control' name="pais" id="pais">
			<option value="" >Seleccione</option>
		<?php foreach ($paises as $dato) { ?>
			<option value="<?php echo $dato['id'];?>"  <?php if($historial['pais']==$dato['id']):echo "selected"; endif;?>><?php echo $dato['nombre'];?></option>
		<?php }?>
		</select>

	</div>

		<div class="form-group  col-sm-4"> 
			<label class="control-label">Provincia</label>
			<select class='form-control' name="provincia" id="cbProvincia">		
			<option value="" >Seleccione</option>	
			</select>
		</div>
		<div class="form-group  col-sm-4" >
			<label class="control-label">Ciudad</label>
			<select class='form-control' name="ciudad" id="ciudadId">
			<option value="" >Seleccione</option>
				
			</select>
	
		</div>

	<div class="form-group col-sm-12">
		<label class="control-label">Respado Digital</label> 
		<input type='file' name='url' id="url" class="file">
	</div>
	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $historial['id']; ?>">
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
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ \.]+$/,
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
										regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ \.]+$/,
										message: 'Ingrese un Nombre del Área válido.'
									}
								}
							},
			cargo: {
						message: 'El Nombre del cargo no es válido',
						validators: {
								notEmpty: {
								message: 'El Nombre del Nombre del Cargo no puede ser vacío.'
							},					
							regexp: {
									regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ \.]+$/,
									message: 'Ingrese un Nombre del Nombre del Cargo válido.'
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
			pais: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Tipo de País.'
					}
				}
			},
			provincia: {
				validators: {
					notEmpty: {
						message: 'Seleccione una Provincia'
					}
				}
			},	
			ciudad: {
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
							regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ \.]+$/,
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
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ \.]+$/,
								message: 'El Teléfono no es válido.'
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

$(document).ready(function(){
	   $("#pais").change(function () {
	           $("#pais option:selected").each(function () {
	            opcion=$(this).val();
	            $.post("index.php?action=loadProvincia", { opcion: opcion }, function(data){
	            $("#cbProvincia").html(data);
	            });            
	        });
	   });

	   $("#cbProvincia").change(function () {
	           $("#cbProvincia option:selected").each(function () {
	            opcion=$(this).val();
	            $.post("index.php?action=loadCiudad", { opcion: opcion }, function(data){
	            $("#ciudadId").html(data);
	            });            
	        });
	   })
	   
	});

</script>
<style>
.col-sm-6, .col-sm-12 {
	padding-right: 0px;
}
</style>