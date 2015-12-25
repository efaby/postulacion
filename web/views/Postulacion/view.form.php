<script type="text/javascript">
function imprimir(){
	var ficha = document.getElementById("imprimir");
	  var ventimp = window.open(' ', 'popimpr');
	  ventimp.document.write( ficha.innerHTML );
	  ventimp.document.close();
	  ventimp.print( );
	  ventimp.close();
}
</script>

<div class="col-sm-12 hidden-print" style="text-align: right;">
	<a href="javascript:imprimir()"> <span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</a>								
</div>	
<div id="imprimir">
<link href="<?php echo PATH_CSS . '/bootstrap.min.css';?>" rel="stylesheet">
<h4 class="small-title"><?php echo $title; ?></h4>
<div class="table-responsive" >
	<table class="table table-th-block table-hover">
		<thead>
			<tr>
				<th style="width: 5%;">No</th>
				<th style="width: 30%;">Nombre Etapa</th>
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
</div>