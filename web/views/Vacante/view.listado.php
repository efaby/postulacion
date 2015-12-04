<?php $title = "Vacantes";?>
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
					<button class="btn btn-large btn-info" onclick="javascript:location.href='index.php?action=insertData'">
						<i class="glyphicon glyphicon-plus"></i> &nbsp; Add Records
					</button>
				</p>

				<table class="table table-striped table-hover"
					id="datatable-example">
					<thead class="the-box dark full">
						<tr>
							<th style="text-align: center">ID</th>
							<th>Nombre del Área</th>
							<th>Título</th>
							<th>Número de Vacantes</th>
							<th>Años de Experiencia</th>
							<th>F.Inicio Concurso</th>
							<th>F. Fin Concurso</th>
							<th style="text-align: center">Acciones</th>
						</tr>
					</thead>
					<tbody>
							<?php foreach ($datos as $dato): ?>
<tr>
							<td align="center"><?php echo $dato["id"]; ?></td>
							<td><?php echo $dato["nombre_area"]; ?></td>
							<td><?php echo $dato["titulo"]; ?></td>
							<td><?php echo $dato["numero_vacantes"]; ?></td>
							<td><?php echo $dato["experiencia_requerida"]; ?></td>
							<td><?php echo $dato["fecha_inicio"]; ?></td>
							<td><?php echo $dato["fecha_fin"]; ?></td>
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

<script src="<?php echo PATH_CSS . '/../plugins/datepicker/bootstrap-datepicker.js';?>"></script>
<link href="<?php echo PATH_CSS . '/../plugins/datepicker/datepicker.min.css';?>" rel="stylesheet">	
<script src="<?php echo PATH_CSS . '/../js/apps.js';?>"></script>
<script src="<?php echo PATH_CSS . '/../js/listados.js';?>"></script>
</body>
</html>