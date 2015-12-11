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
				<div class="form-group col-sm-12 rows">
				<form action="index.php?action=loadPostulante" method="post">
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
						<label class="control-label">Vacantes: </label> <select
							class='form-control' name="vacante_id" id="vacante_id">
							<option value="">Seleccione</option>
							<?php foreach ($vacantes as $dato) { ?>
									<option value="<?php echo $dato['id'];?>" <?php if($vacante==$dato['id']):echo "selected"; endif;?>><?php echo $dato['titulo'];?></option>
									<?php }?>
								</select>							
							</select>
					</div>
					<div class="form-group  col-sm-4">					
						<button type="submit" class="btn btn-success" style="margin-top: 25px;"><i
									class="fa fa-search"></i> Buscar</button>
					</div>
					</form>
				</div>

				<table class="table table-striped table-hover"
					id="datatable-example">
					<thead class="the-box dark full">
						<tr>
							<th>Vacante</th>
							<th>Area</th>
							<th>Fecha Aplicación</th>
							<th style="text-align: center">Acciones</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($datos1 as $dato): ?>
						<tr>
							<td><?php echo $dato["titulo"]; ?></td>
							<td><?php echo $dato["nombre_area"]; ?></td>
							<td><?php echo $dato["fecha"]; ?></td>
							<td align="center"><a href="#"
								onclick="javascript: loadModal(<?php echo $dato["id"]; ?>,'<?php $title = str_replace(' ', '/-/', $dato["titulo"]); echo $title; ?>');"><span
									class="label label-primary">Detalle</span></a></td>
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
				<h3>Etapas de Postulación</h3>
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
function loadModal(id,title){
	$('.modal-body').load('index.php?action=loadForm&id=' + id + '&title=' + title,function(result){
	    $('#confirm-submit').modal({show:true});
	});
}

$(document).ready(function(){
	   $("#etapa_id").change(function () {
	           $("#etapa_id option:selected").each(function () {
	            opcion=$(this).val();
	            $.post("index.php?action=loadVacante", { opcion: opcion }, function(data){
	            $("#vacante_id").html(data);
	            });            
	        });
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