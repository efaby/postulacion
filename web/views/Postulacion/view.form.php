<h4 class="small-title"><?php echo $title; ?></h4>
<div class="table-responsive">
	<table class="table table-th-block table-hover">
		<thead>
			<tr>
				<th style="width: 30px;">No</th>
				<th style="width: 110px;">Nombre Etapa</th>
				<th>Fecha de Etapa</th>
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
			<?php if ($contador == 6):?>
			<tr>
				<td colspan="5">
					<div class="alert alert-success fade in alert-dismissable">Usted ha sido ganador del concurso, por favor comuníquese con la institución.</div>
				</td>
			</tr>
			<?php endif;?>
		</tbody>
	</table>
</div>
<!-- /.table-responsive -->