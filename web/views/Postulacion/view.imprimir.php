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
			<div class="divHeader" style="display: none;">
<table style="width: 100%">
  <tbody><tr><td width="8%"><img width="60px" src="<?php echo PATH_IMAGES . '/iso9001.gif';?>" ></td>
  <td width="82%" align="center"><b>UNIDAD EDUCATIVA "SANTAMARIANA DE JESUS"<br>GUARANDA - ECUADOR</b></td>
  <td width="5%"><img width="50px" src="<?php echo PATH_IMAGES . '/../img/logo_SM.png';?>" ></td></tr>
</tbody></table>
<hr>
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
<div class="divFooter" style="display: none;">
<hr style="margin-bottom: 5px">
<table style="width: 100%">
  <tbody><tr><td width="85%"><b>Dirección:</b> 7 de Mayo 709 y Azuay<br><b>Email:</b> uesmj1898guaranda@gmail.com</td><td><b>Tel:</b> (03)2980978<br><b>Fax:</b> (03)2981411</td></tr>
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
}

@page{
        size: auto A4 landscape;
        margin: 5mm;
     }
</style>
</body>
</html>

		