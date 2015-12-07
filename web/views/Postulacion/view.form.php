<h4 class="small-title"><?php echo $title; ?></h4>
<div class="table-responsive">
	<table class="table table-th-block table-hover">
		<thead>
			<tr>
				<th style="width: 30px;">No</th>
				<th style="width: 110px;">Nombre Etapa</th>
				<th>Fecha</th>
				<th>Calificación</th>
				<th>Observaciones</th>
			</tr>
		</thead>
		<tbody>
			<?php $contador = 1;?>
			<?php foreach ($evaluaciones as $dato): ?>
			<tr>
				<td><?php echo $contador; ?></td>
				<td><?php echo $dato["nombre"]; ?></td>
				<td><?php echo $dato["fecha"]; ?></td>
				<td align="center"><?php echo $dato["valor"]; ?></td>
				<td><?php echo $dato["observacion"]; ?></td>
				<?php $contador++;?>
			</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>
<!-- /.table-responsive -->