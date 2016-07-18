<h4 class="small-title"><?php echo $vacante['titulo']; ?></h4>
<div class="table-responsive">
	<div class="form-group col-sm-12">
		<label class="control-label">Área: </label> <?php echo $vacante['area']; ?>
	</div>
		<div class="form-group col-sm-6">
		<label class="control-label">Fecha de Inicio de Postulación: </label> <?php $fechas = explode('-', $vacante["fecha_inicio_postulacion"]); echo $fechas[2] ." - ". $meses[$fechas[1] - 1] ." - " .$fechas[0]; ?>
	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Fecha de Fin de Postulación: </label> <?php $fechas = explode('-', $vacante["fecha_fin_postulacion"]); echo $fechas[2] ." - ". $meses[$fechas[1] - 1] ." - " .$fechas[0]; ?>
	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Número de Vacantes: </label> <?php echo $vacante['numero_vacantes']; ?>
	</div>
	<div class="form-group col-sm-6">
		<label class="control-label">Años de Experiencia: </label> <?php echo $vacante['experiencia_requerida']; ?>
	</div>
	<div class="form-group col-sm-12">
		<label class="control-label">Características Requerídas: </label> <?php echo $vacante['caracteristicas']; ?>
	</div>
	<div class="form-group col-sm-12">
		<label class="control-label">Habilidades Requerídas: </label> <?php echo $vacante['habilidades']; ?>
	</div>
	<div class="form-group col-sm-12">
		<form action="index.php?action=savePostulacion" id="frmVacante" method="post">
			<button type="submit" class="btn btn-success">Aplicar a Vacante</button>
			<input type="hidden" name="id" value="<?php echo $vacante["id"];?>">
		</form>
	</div>
	
</div>
<!-- /.table-responsive -->