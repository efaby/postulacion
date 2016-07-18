<?php $title = "Evaluar Postulaciones";?>
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
			<div class="col-sm-12 rows" style="text-align: right;">
				<a href="#" class="btn btn-primary btn-xs" onclick="javascript: imprimir();">Imprimir</a>								
			</div>
				<div class="form-group col-sm-12 rows">
				<form action="index.php?action=loadPostulante" method="post" id="frmBuscar">
					<div class="form-group  col-sm-4">
						<label class="control-label">Vacantes: </label> <select
							class='form-control' name="vacante_id" id="vacante_id">
							<option value="">Seleccione</option>
							<?php foreach ($vacantes as $dato) { ?>
									<option value="<?php echo $dato['id'];?>" <?php if($vacante==$dato['id']):echo "selected"; endif;?>><?php echo $dato['titulo'];?></option>
									<?php }?>
								</select>							
							</select>
					</div>
					<div class="form-group  col-sm-4 rows">
						<label class="control-label">Etapa : </label> <select
							class='form-control' name="etapa_id" id="etapa_id">
							<option value="">Seleccione</option>
								<?php foreach ($etapas as $dato) { ?>
									<option value="<?php echo $dato['id'];?>" <?php if($etapa==$dato['id']):echo "selected"; endif;?>><?php echo $dato['nombre'];?></option>
									<?php }?>
								</select>
					</div>
					
					<div class="form-group  col-sm-4">	
					<input type="hidden" value="1" name="band" id="band">				
						<button type="submit" class="btn btn-success" style="margin-top: 25px;"><i
									class="fa fa-search"></i> Buscar</button>
					</div>
					</form>
				</div>
				
				<table class="table table-striped table-hover"
					id="datatable-example">
					<thead class="the-box dark full">
						<tr>
							<th>Cedula Identidad</th>
							<th>Nombre Postulante</th>
							<th>Calificación</th>							
							<th>Observación</th>
							<?php echo (($etapa==2)||($etapa==4))?'<th>Archivo</th>':''; ?>
							<th style="text-align: center">Acciones</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($datos as $dato): ?>
						<tr>
							<td><?php echo $dato["numero_identificacion"]; ?></td>
							<td><?php echo $dato["nombres"]; ?> <?php echo $dato["apellidos"]; ?></td>
							<td><?php echo ($dato["valor"]>0)?$dato["valor"]:0; ?></td>
							<td><?php echo $dato["observacion"]; ?></td>
							<?php if(($etapa==2)||($etapa==4)):
								echo '<td>';
								if($dato["url"]!=''): 
									echo '<a href="index.php?action=downloadFile&nameFile='.$dato["url"].'" class="btn btn-info btn-xs">Descargar</a>';
								endif;
								echo '</td>'; 
								endif; ?>
							<td align="center">								
								<a href="#" class="btn btn-info btn-xs <?php $activo = $dato["activo"]; if(is_null($dato["activo"])): $activo = 1; endif; echo (($dato["activar"]==0)||($activo==0))?"disabled":"";?>"
									onclick="javascript: loadPage(<?php echo $dato["id"]; ?>);">Evaluar</a>
									<?php if(($etapa == 3)&&($dato["valor"]>0)):?>
										<a href="#" class="btn btn-info btn-xs "
										onclick="javascript: loadPage1(<?php echo $dato["id"]; ?>);">Ver</a>								
									<?php endif;?>								
							</td>
						</tr>
								<?php endforeach;?>
							</tbody>
				</table>
				<form method="post" id="frmAccion">
					<input name="id" id="id" value="" type="hidden">
					<input name="etapa" id="etapa" value="<?php echo $etapa; ?>" type="hidden">
					<input  name="vacante" id="vacante" value="<?php echo $vacante; ?>" type="hidden">
				</form> 
				
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" style="width: 800px;">
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
<script
	src="<?php echo PATH_CSS . '/../plugins/datatable/js/jquery.dataTables.min.js';?>"></script>
<script
	src="<?php echo PATH_CSS . '/../plugins/datatable/js/bootstrap.datatable.js';?>"></script>
<script
	src="<?php echo PATH_CSS . '/../plugins/validator/bootstrapValidator.min.js';?>"></script>
<script src="<?php echo PATH_CSS . '/../js/apps.js';?>"></script>
<script type="text/javascript">
function imprimir(){
	var posicion_x; 
	var posicion_y; 
	var ancho = 800;
	var alto = 450;
	posicion_x=(screen.width/2)-(ancho/2); 
	posicion_y=(screen.height/2)-(alto/2); 
	var accion = "index.php?action=loadImprimir&etapa_id=" + $("#etapa_id").val() + "&vacante_id=" + $("#vacante_id").val();
	var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,width="+ancho+",height="+alto+",left="+posicion_x+",top="+posicion_y;
	window.open(accion,"",opciones);
}
function loadPage(id){
	var opcion  = $("#etapa").val();
	var vacante  = $("#vacante").val();
	$("#id").val(id);
	if(opcion == 1){
		var accion = "index.php?action=meritos"
		
		$("#frmAccion").attr('action', accion);
		$("#frmAccion").submit();
	} else {
		if(opcion==3){
			var accion = "../Evaluacion/index.php";
			$("#frmAccion").attr('action', accion);
			$("#frmAccion").submit();
		} else {
			
			var title = "Evaluación Entrevista";
			if(opcion==2){
				title = "Evaluación Conocimientos";
			}
			if(opcion==5){
				title = "Designación de Ganador";
			}
			
			$(".modal-header h3").html(title);
			
			$('.modal-body').load('index.php?action=loadFormEvaluacion&id=' + id + '&opcion=' + opcion + '&vacante=' + vacante,function(result){
			    $('#confirm-submit').modal({show:true});
			});
		}
		
	}
}

function loadPage1(id){
	$("#id").val(id);
	var accion = "../Evaluacion/index.php?action=imprimir";
	$("#frmAccion").attr('action', accion);
	$("#frmAccion").submit();
}

$(document).ready(function() {
    $('#frmBuscar').bootstrapValidator({
    	message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			
			etapa_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione una etapa.'
					}
				}
			},
			vacante_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione una vacante.'
					}
				}
			}
		}
	});

});
</script>
<style>
.rows{
padding-left: 0px;
}
</style>
</body>
</html>