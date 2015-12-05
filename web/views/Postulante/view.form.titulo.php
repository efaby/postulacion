<form id="frmTitulo" method="post" action="index.php?action=saveData" enctype="multipart/form-data">

	<div class="form-group col-sm-12">
		<label class="control-label">Institución</label> <input type='text'
			name='institucion' class='form-control'
			value="<?php echo $titulo['institucion']; ?>">

	</div>
	
	<div class="form-group col-sm-12">
		<label class="control-label">Nombre Título</label> <input type='text'
			name='nombre' class='form-control'
			value="<?php echo $titulo['nombre']; ?>">

	</div>	
	<div class="form-group col-sm-12 rows">
		<div class="form-group col-sm-6">
			<label class="control-label">Registro Senescyt</label> <input type='text'
				name='registro_senecyt' class='form-control'
				value="<?php echo $titulo['registro_senecyt']; ?>">
	
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label">Nivel de Educación</label>
			<select class='form-control' name="nivel_educacion_id">
				<option value="" >Seleccione</option>
			<?php foreach ($niveles as $dato) { ?>
				<option value="<?php echo $dato['id'];?>"  <?php if($titulo['nivel_educacion_id']==$dato['id']):echo "selected"; endif;?>><?php echo $dato['nombre'];?></option>
			<?php }?>
			</select>
	
		</div>
	</div>
	<div class="form-group col-sm-12 rows">
		<div class="form-group col-sm-6">
			<label class="control-label">Categoría</label>
			<select class='form-control' name="categoria_titulo_id">
				<option value="" >Seleccione</option>
			<?php foreach ($categorias as $dato) { ?>
				<option value="<?php echo $dato['id'];?>"  <?php if($titulo['categoria_titulo_id']==$dato['id']):echo "selected"; endif;?>><?php echo $dato['nombre'];?></option>
			<?php }?>
			</select>
	
		</div>
		<div class="form-group  col-sm-6">
			<label class="control-label">País</label>
			<select class='form-control' name="id_pais">
				<option value="" >Seleccione</option>
			<?php foreach ($paises as $dato) { ?>
				<option value="<?php echo $dato['id'];?>"  <?php if($titulo['id_pais']==$dato['id']):echo "selected"; endif;?>><?php echo $dato['nombre'];?></option>
			<?php }?>
			</select>
	
		</div>
	</div>	
	<div class="form-group col-sm-12">
		<label class="control-label">Respado Digital</label> 
		
		<?php if($titulo['url']!= ''):?>
			<input type='file' name='url1' id="url1" class="file">		
			<a href="index.php?action=downloadFile&nameFile=<?php echo $titulo["url"];?>">Descargar</a>
			<input type="hidden" name="fileName" value="<?php echo $titulo["url"];?>">
		<?php else :?>
			<input type='file' name='url' id="url" class="file">	
		<?php endif;?>
	</div>
	
	<div class="form-group">
	<input type='hidden' name='id' class='form-control' value="<?php echo $titulo['id']; ?>">
	<input type='hidden' name='opcion' class='form-control'
			value="1">
		<button type="submit" class="btn btn-success">Guardar</button>
	</div>

</form>

<script type="text/javascript">

$(document).ready(function() {
    $('#frmTitulo').bootstrapValidator({
    	message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {			
			nombre: {
				message: 'El Nombre del Título no es válido',
				validators: {
							notEmpty: {
								message: 'El Nombre del Título no puede ser vacío.'
							},					
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ \.]+$/,
								message: 'Ingrese un Nombre del Título válido.'
							}
						}
					},
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
			registro_senecyt: {
				message: 'El Registro del Senescyt no es válido',
				validators: {
					notEmpty: {
						message: 'El Registro del Senescyt no puede ser vacío.'
					},					
					regexp: {
						regexp: /^[0-9- ]+$/,
						message: 'Ingrese el Registro del Senescyt válido.'
					}
				}
			},
			nivel_educacion_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Nivel de Educación.'
					}
				}
			},
			categoria_titulo_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione un Categoría.'
					}
				}
			},
			id_pais: {
				validators: {
					notEmpty: {
						message: 'Seleccione un País.'
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

</script>
<style>
.col-sm-6, .col-sm-4 {
	padding-left: 0px;
}
.rows{
	padding-right: 0px;
	}
</style>