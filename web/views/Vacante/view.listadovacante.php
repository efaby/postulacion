<?php $title = "Postulaciones";?>
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
				
				<table class="table table-striped table-hover"
					id="datatable-example">
					<thead class="the-box dark full">
						<tr>
							
							<th>Vacante</th>
							<th>Area</th>
							<th style="text-align: center">Número Vacantes</th>
							<th style="text-align: center">Experiencia Años</th>
							<th style="text-align: center">Fecha Postulación</th>
							<th style="text-align: center">Acciones</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($datos as $dato): ?>
<tr>
							
							<td><?php echo $dato["titulo"]; ?></td>
							<td><?php echo $dato["nombre_area"]; ?></td>						
							<td style="text-align: center"><?php echo $dato["numero_vacantes"]; ?></td>	
							<td style="text-align: center"><?php echo $dato["experiencia_requerida"]; ?></td>	
							<td style="text-align: center"><?php $fechas = explode('-', $dato["fecha_inicio_postulacion"]); echo $fechas[2] ." - ". $meses[$fechas[1] - 1] ." - " .$fechas[0]; ?> / <?php $fechas = explode('-', $dato["fecha_fin_postulacion"]); echo $fechas[2] ." - ". $meses[$fechas[1] - 1] ." - " .$fechas[0]; ?></td>														
							<td align="center">							
							<a href="#"
								onclick="javascript: loadModal(<?php echo $dato["id"]; ?>);" class="btn btn-info btn-xs">Aplicar</a> </td>
						</tr>
								<?php endforeach;?>
							</tbody>
				</table>
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
				<h3>Vacante</h3>
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
function loadModal(id){
	$('.modal-body').load('index.php?action=loadFormVacante&id=' + id ,function(result){
	    $('#confirm-submit').modal({show:true});
	});
}

</script>

</body>
</html>