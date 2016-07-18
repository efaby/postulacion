<?php $title = "Evaluación al Desempeño Docente";?>
<?php include_once PATH_TEMPLATE.'/header.php';?>
<div class="section">
<div class="divHeader" style="display: none;">
<table style="width: 100%">
  <tbody><tr><td width="8%"><img width="60px" src="<?php echo PATH_IMAGES . '/iso9001.gif';?>" ></td>
  <td width="82%" align="center"><b>UNIDAD EDUCATIVA "SANTAMARIANA DE JESUS"<br>GUARANDA - ECUADOR</b></td>
  <td width="5%"><img width="50px" src="<?php echo PATH_IMAGES . '/../img/logo_SM.png';?>" ></td></tr>
</tbody></table>
<hr style="margin-top: 5px">
</div>
	<div class="content">
		<div class="container">
		<?php if (isset($_SESSION['message'])&& ($_SESSION['message'] != '')):?>
		<div class="alert alert-success fade in alert-dismissable">
				<button type="button" class="close" data-dismiss="alert"
					aria-hidden="true">&times;</button>
								  <?php echo $_SESSION['message'];$_SESSION['message'] = ''?>
								</div>
		<?php endif;?>
		
			<div class="the-box" id="imprimir">
					<div class="col-sm-12 rows" style="text-align: right;">
				<a href="#" class="btn btn-primary btn-xs" onclick="javascript:window.print();">Imprimir</a>								
			</div>
						<div class="form-group col-sm-6">
							<label class="control-label">Nombre del Docente</label>
							<div><?php echo $postulante["nombres"]. " ". $postulante["apellidos"]?></div>
						</div>
						
						<div class="form-group col-sm-6">
							<label class="control-label">Nombre del Observador</label>
							<div><?php echo $usuario["nombres"]. " ". $usuario["apellidos"]?></div>							
						</div>	
						<div class="form-group col-sm-6">
							<label class="control-label">Grado/Curso</label> 
							<div><?php echo $desempenio['nivel'];?></div>
						</div>					
						
						<div class="form-group col-sm-6">
							<label class="control-label">Fecha</label>
							<div class="input-group input-daterange">
					    		<div><?php echo $desempenio['fecha'];?></div>
							</div>	
						</div>
						<div class="form-group col-sm-12">
							<label class="control-label">Tema</label>
							<div><?php echo $desempenio['tema'];?></div>
						</div>
						
						<div class="form-group col-sm-6">
							<label class="control-label">Asignatura</label>
							<div><?php echo $desempenio['asiganatura'];?></div>
						</div>					
						
						<div class="form-group col-sm-6">
							<label class="control-label">Período Académico</label>
							<div><?php echo $desempenio['periodo'];?></div>	
						</div>	
						
						<div class="form-group col-sm-12">
							<div class="panel panel-info">
							  <div class="panel-heading">
								<h3 class="panel-title">OBJETIVO</h3>
							  </div>
							  <div class="panel-body">
								  	<label class="control-label">Reflexionar sobre el desarrollo del desempeño docente con el fin de mejorar la práctica en el aula.</label> 
							 	  	<br>							 	  						 	  	
							</div>
							</div>
						</div>		
						<div class="form-group col-sm-12">
								<?php $estado=""; $id=1;?>
								<?php foreach ($preguntas as $pregunta): ?>
									<input type="hidden" name="pregunta<?php echo $id; ?>" value="<?php echo $pregunta["id"]; ?>">
									<?php if ($estado != $pregunta['categoria_id']):?>
										<?php if ($estado !=""):?>
											</tbody>
											</table>
										</div>
										</div>						
										<?php endif;?>
										<div class="the-box full no-border">
											<div class="table-responsive">
											<table class="table table-th-block table-info">
												<thead>
											<tr>
												<th rowspan="2" style="width: 85%; vertical-align: middle;"><?php echo $pregunta["nombre_categoria"]; ?></th>
												<th colspan="3" style="text-align:center">VALORACIÓN</th>
											</tr>
											
										</thead>
										<tbody>
										<tr><td><?php echo $pregunta["nombre_pregunta"];?></td>
											<td  style="text-align: center;" colspan="3">
												<label>
													<?php echo $respuestasArray[$pregunta["id"]];?>
												</label>												
											</td>											
										</tr>
										<?php $estado = $pregunta['categoria_id'];  ?>
										<?php else:?>
										<tr>
											<td><?php echo $pregunta["nombre_pregunta"];?></td>
											<td  style="text-align: center;" colspan="3">
												<label>
													<?php echo $respuestasArray[$pregunta["id"]];?>
												</label>												
											</td>	
										</tr>	
										<?php endif;?>		
										<?php $id++;?>																
								<?php endforeach;?>			
								</tbody>
								</table>			
								</div>
								</div>		
						</div>						
						<div class="form-group col-sm-12">
							<label class="control-label">Fortalezas</label> 					
							<div><?php echo $desempenio['fortalezas'];?></div>
						</div>
											
						<div class="form-group col-sm-12">
							<label class="control-label">Debilidades</label> 
							<div><?php echo $desempenio['debilidades'];?></div>
						</div>

						<div class="form-group col-sm-12">
							<label class="control-label">Observaciones</label> 
							<div><?php echo $desempenio['observaciones'];?></div>
						</div>
															
						<div class="form-group" style="padding-left: 15px;">
						<form action="../Postulacion/index.php?action=loadPostulante" method="post">
							<input name="etapa_id" id="etapa_id" value="3" type="hidden">
							<input  name="vacante_id" id="vacante_id" value="<?php echo $vacante; ?>" type="hidden"> 
							<button type="submit" class="btn btn-info">Regresar</button>
							
							</form>
						</div>					
					
			</div>
		</div>
	</div>
</div>

<?php include_once PATH_TEMPLATE.'/footer.php';?>
<link
	href="<?php echo PATH_CSS . '/../plugins/datatable/css/bootstrap.datatable.min.css';?>"
	rel="stylesheet">
<link href="<?php echo PATH_CSS . '/../plugins/datepicker/datepicker.min.css';?>" rel="stylesheet">

<script
	src="<?php echo PATH_CSS . '/../plugins/datatable/js/jquery.dataTables.min.js';?>"></script>
<script
	src="<?php echo PATH_CSS . '/../plugins/datatable/js/bootstrap.datatable.js';?>"></script>

<style type="text/css" media="print">
@media print {
    .top-navbar, #footer_page, .page-title-wrap, .btn-primary, .btn-info { display: none !important; }
    #imprimir{
    	border: none !important;
    }
    body{
    padding-top: 0px!important;
    }
    div.divFooter {
            position: fixed;
            display: block !important;
            bottom: 0;
        }
        div.divHeader {            
            display: block !important;
            position: fixed;
            top: 0px;           
        }
}
@page{
        size: auto A4 landscape;
        margin: 3mm;
     }
</style>
<link
	href="<?php echo PATH_CSS . '/../plugins/datatable/css/bootstrap.datatable.min.css';?>"
	rel="stylesheet">
<div class="divFooter" style="display: none;">
<hr style="margin-bottom: 5px">
<table style="width: 100%">
  <tbody><tr><td width="85%"><b>Dirección:</b> 7 de Mayo 709 y Azuay<br><b>Email:</b> uesmj1898guaranda@gmail.com</td><td><b>Tel:</b> (03)2980978<br><b>Fax:</b> (03)2981411</td></tr>
</tbody></table>
</div>

</body>
</html>