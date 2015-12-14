<?php $title = "Usuarios";?>
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
				<p>
					<button class="btn btn-large btn-info" id="modalOpen">
						<i class="glyphicon glyphicon-plus"></i> &nbsp; Añadir
					</button>
				</p>

				<table class="table table-striped table-hover"
					id="datatable-example">
					<thead class="the-box dark full">
						<tr>
							<th style="text-align: center">ID</th>
							<th>Número Identificación</th>
							<th>Nombre</th>
							<th>Email</th>
							<th>Tipo Usuario</th>
							<th style="text-align: center">Acciones</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($datos as $dato): ?>
<tr>
							<td align="center"><?php echo $dato["id"]; ?></td>
							<td><?php echo $dato["numero_identificacion"]; ?></td>
							<td><?php echo $dato["nombres"]." ".$dato["apellidos"]; ?></td>
							<td><?php echo $dato["email"]; ?></td>
							<td><?php echo $dato["tipo_usuario"]; ?></td>
							<td align="center"><a href="#"
								onclick="javascript: loadModal(<?php echo $dato["id"]; ?>);"><i
									class="glyphicon glyphicon-edit"></i></a> &nbsp;&nbsp; <a
								href="#" onclick="javascript:if(confirm('Est\xE1 seguro que desea eliminar el elemento seleccionado?')){redirect(<?php echo $dato['id'];?>);}"><i
									class="glyphicon glyphicon-remove-circle"></i></a></td>
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
	<div class="modal-dialog" >
		<div class="modal-content">
			<div class="modal-header">
				<a class="close" data-dismiss="modal">×</a>
				<h3>Usuario</h3>
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
<script src="<?php echo PATH_CSS . '/../js/listados.js';?>"></script>
</body>
</html>
