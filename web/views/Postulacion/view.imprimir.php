<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
	<link href="<?php echo PATH_CSS . '/bootstrap.min.css';?>" rel="stylesheet">
		</head>
 
	<body class="tooltips">
<div class="table-responsive">
<div class="col-sm-12 hidden-print" style="text-align: right;">
				<a href="javascript:window.print()"> <span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</a>								
			</div>	
			<div class="col-sm-12 rows">	
	<table class="table table-th-block table-hover">
		<thead class="the-box dark full">
						<tr>
							<th>Cedula Identidad</th>
							<th>Nombre Postulante</th>
							<th>Calificación</th>
							<th>Observación</th>
							
						</tr>
					</thead>
					<tbody>
							<?php foreach ($datos as $dato): ?>
						<tr>
							<td><?php echo $dato["numero_identificacion"]; ?></td>
							<td><?php echo $dato["nombres"]; ?> <?php echo $dato["apellidos"]; ?></td>
							<td><?php echo $dato["valor"]; ?></td>
							<td><?php echo $dato["observacion"]; ?></td>
							
						</tr>
								<?php endforeach;?>
							</tbody>
	</table>
	</div>
</div>
<!-- /.table-responsive -->
</body>
</html>

		