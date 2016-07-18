<?php $title = "Mis Postulaciones";?>
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
							<th>Área</th>
							<th>Fecha Aplicación</th>
							<th style="text-align: center">Seguimiento</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($datos as $dato): ?>
<tr>
							
							<td><?php echo $dato["titulo"]; ?></td>
							<td><?php echo $dato["nombre_area"]; ?></td>						
							<td><?php echo $dato["fecha"]; ?></td>														
							<td align="center">							
							<a href="#"
								onclick="javascript: loadModal(<?php echo $dato["id"]; ?>,'<?php $title = str_replace(' ', '/-/', $dato["titulo"]); echo $title; ?>');" class="btn btn-info btn-xs">Detalle</a> </td>
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
	<div class="modal-dialog" style="width: 700px;">
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

</script>
<style>
<!--
@media print {
    
    body.modal-open {
        visibility: hidden;
    }

    body.modal-open .modal .modal-header,
    body.modal-open .modal .modal-body {
        visibility: visible; /* make visible modal body and header */
    }
}
-->
</style>

</body>
</html>