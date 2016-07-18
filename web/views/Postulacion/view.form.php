			<div class="divHeader" style="display: none;">
<table style="width: 100%">
  <tbody><tr><td width="8%"><img width="60px" src="<?php echo PATH_IMAGES . '/iso9001.gif';?>" ></td>
  <td width="82%" align="center"><b>UNIDAD EDUCATIVA "SANTAMARIANA DE JESUS"<br>GUARANDA - ECUADOR</b></td>
  <td width="5%"><img width="50px" src="<?php echo PATH_IMAGES . '/../img/logo_SM.png';?>" ></td></tr>
</tbody></table>
<hr>
</div>
<div class="col-sm-12 hidden-print" style="text-align: right;">
	<a href="javascript:window.print()"> <span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</a>								
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
			<?php if (($contador == 6)&&($dato["observacion"]!='Designado No Ganador!')):?>
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
<div class="divFooter" style="display: none;">
<hr style="margin-bottom: 5px">
<table style="width: 100%">
  <tbody><tr><td width="85%"><b>Dirección:</b> 7 de Mayo 709 y Azuay<br><b>Email:</b> uesmj1898guaranda@gmail.com</td><td><b>Tel:</b> (03)2980978<br><b>Fax:</b> (03)2981411</td></td></tr>
</tbody></table>
</div>
<style type="text/css" media="print">


@media print {
    div.divFooter {
            position: fixed;
            display: block !important;
            bottom: 0;
        }
        div.divHeader {            
            display: block !important;           
        }
        .modal-header {
        	display: none;
        }
}

@page{
        size: auto A4 landscape;
        margin: 5mm;
     }
</style>