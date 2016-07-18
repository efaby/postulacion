<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
	<link href="<?php echo PATH_CSS . '/bootstrap.min.css';?>" rel="stylesheet">
	<link href="<?php echo PATH_CSS . '/style.css';?>" rel="stylesheet">
		</head>
 
	<body class="tooltips" style="padding-top: 0px;">
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
			<h3>Reporte Evaluaciones Postulantes</h3>
			<table class="table table-th-block">
				<?php $band = 0; $user = 0; ?>
				<?php foreach ($datos as $dato): ?>
				<?php if($dato['usuario_id'] != $user): ?>
					<?php echo ($user != 0)?'</div></td></tr>':'';?>
					<?php $user = $dato['usuario_id']; $band = 0;?>												  
					<tr><td>
					<h4><?php echo $dato["nombres"]; ?> <?php echo $dato["apellidos"]; ?></h4>						
				<?php endif;?>
					<?php if($dato['vacante_id'] != $band): ?>
						<?php echo ($user != 0)?'</div>':'';?>
					<?php $band = $dato['vacante_id']; ?>	
					<div class="the-box rounded">			
					<h4><?php echo $dato["titulo"]; ?>&nbsp;&nbsp;<i class="fa fa-pencil"></i></h4>
					<?php endif;?>
					<h4><?php echo $dato["etapa"]; ?></h4>
					<strong>Calificación:</strong> <?php echo $dato["valor"]; ?><br>
					<strong>Observaciones:</strong> <?php echo $dato["observacion"]; ?><br>			
				<?php endforeach; ?>
				</td></tr>
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
            width:100%;
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

		