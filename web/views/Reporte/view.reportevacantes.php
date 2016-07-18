<?php $title = "Reportes";?>
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
							<li class="<?php echo ($opcion==1)?'active':'';?>"><a
								href="#wizard-1-step1" data-toggle="tab"><i class="fa fa-user"></i>
									 Postulantes por Vacante</a></li>
							<li class="<?php echo ($opcion==2)?'active':'';?>"><a
								href="#wizard-1-step2" data-toggle="tab"><i
									class="fa fa-pencil-square-o"></i> Evaluaciones Postulantes</a></li>
						</ul>
					</div>
			<div id="panel-collapse-1" class="collapse in">
						<div class="tab-content">
							
							<div class="tab-pane fade <?php echo ($opcion==1)?'in active':'';?>"
								id="wizard-1-step1">
								<div class="panel-body">			
			<div class="col-sm-12 rows" style="text-align: right;">
				<a href="#" class="btn btn-primary btn-xs" onclick="javascript: imprimir();">Imprimir</a>								
			</div>
				<div class="form-group col-sm-12 rows">
				<form action="index.php" method="post" id="frmBuscar">
					<div class="form-group  col-sm-4">
						<label class="control-label">Vacantes: </label> <select
							class='form-control' name="vacante_id" id="vacante_id">
							<option value="">Seleccione</option>
							<?php foreach ($vacantes as $dato) { ?>
									<option value="<?php echo $dato['id'];?>" <?php if($vacante==$dato['id']):echo "selected"; endif;?>><?php echo $dato['titulo'];?></option>
									<?php }?>
								</select>							
					</div>					
					
					<div class="form-group  col-sm-4">	
					<input type="hidden" value="1" name="opcion">				
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
							<th>Vacante</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($datos as $dato): ?>
						<tr>
							<td><?php echo $dato["numero_identificacion"]; ?></td>
							<td><?php echo $dato["nombres"]; ?> <?php echo $dato["apellidos"]; ?></td>
							<td><?php echo $dato["titulo"]; ?></td>											
						</tr>
								<?php endforeach;?>
							</tbody>
				</table>
				
				</div>
				</div>
				<div
								class="tab-pane fade <?php echo ($opcion==2)?'in active':'';?>"
								id="wizard-1-step2">
								<div class="panel-body">
								<!-- inicio segundo reporte -->
								<div class="col-sm-12 rows" style="text-align: right;">
				<a href="#" class="btn btn-primary btn-xs" onclick="javascript: imprimirEvaluaciones();">Imprimir</a>								
			</div>
				<div class="form-group col-sm-12 rows">
				<form action="index.php" method="post" id="frmBuscar2">
					<div class="form-group  col-sm-4">
						<label class="control-label">Vacantes: </label> <select
							class='form-control' name="vacante_id2" id="vacante_id2">
							<option value="">Seleccione</option>
							<?php foreach ($vacantes as $dato) { ?>
									<option value="<?php echo $dato['id'];?>" <?php if($vacante2==$dato['id']):echo "selected"; endif;?>><?php echo $dato['titulo'];?></option>
									<?php }?>
								</select>						
					</div>					
					
					<div class="form-group  col-sm-4">
					<input type="hidden" value="2" name="opcion">					
						<button type="submit" class="btn btn-success" style="margin-top: 25px;"><i
									class="fa fa-search"></i> Buscar</button>
					</div>
					</form>
				</div>
				<table class="table table-th-block">
				<?php $band = 0; $user = 0; ?>
				<?php foreach ($datos2 as $dato): ?>
				<?php if($dato['usuario_id'] != $user): ?>
					<?php echo ($user != 0)?'</div></td></tr>':'';?>
					<?php $user = $dato['usuario_id']; $band = 0;?>												  
					<tr><td>
					<h3><?php echo $dato["nombres"]; ?> <?php echo $dato["apellidos"]; ?></h3>						
				<?php endif;?>
					<?php if($dato['vacante_id'] != $band): ?>
						<?php echo ($user != 0)?'</div>':'';?>
					<?php $band = $dato['vacante_id']; ?>	
					<div class="the-box rounded">			
					<h4><?php echo $dato["titulo"]; ?>&nbsp;&nbsp;<i class="fa fa-pencil"></i></h4>
					<?php endif;?>
					<h4><?php echo $dato["etapa"]; ?></h4>
					<strong>Calificación:</strong> <?php echo $dato["valor"]; ?><br>
					<strong>Observaciones:</strong> <?php echo $dato["observacion"]; ?><br>			
				<?php endforeach; ?>
				</td></tr>
				</table>
								<!-- fin segundo reporte -->
								</div>
								</div>
								
				</div>
				</div>
				
				
				
				
				</div>
				
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
function imprimir(){
	var posicion_x; 
	var posicion_y; 
	var ancho = 800;
	var alto = 450;
	posicion_x=(screen.width/2)-(ancho/2); 
	posicion_y=(screen.height/2)-(alto/2); 
	var accion = "index.php?action=loadImprimir&vacante_id=" + $("#vacante_id").val();
	var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width="+ancho+",height="+alto+",left="+posicion_x+",top="+posicion_y;
	window.open(accion,"",opciones);
}

function imprimirEvaluaciones(){
	var posicion_x; 
	var posicion_y; 
	var ancho = 800;
	var alto = 450;
	posicion_x=(screen.width/2)-(ancho/2); 
	posicion_y=(screen.height/2)-(alto/2); 
	var accion = "index.php?action=loadImprimirEvaluaciones&vacante_id=" + $("#vacante_id2").val();
	var opciones="toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=yes,width="+ancho+",height="+alto+",left="+posicion_x+",top="+posicion_y;
	window.open(accion,"",opciones);
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
			vacante_id: {
				validators: {
					notEmpty: {
						message: 'Seleccione una vacante.'
					}
				}
			}
		}
	});

    $('#frmBuscar2').bootstrapValidator({
    	message: 'This value is not valid',
		feedbackIcons: {
			valid: 'glyphicon glyphicon-ok',
			invalid: 'glyphicon glyphicon-remove',
			validating: 'glyphicon glyphicon-refresh'
		},
		fields: {
			vacante_id2: {
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