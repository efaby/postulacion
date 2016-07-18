<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class ReporteModel {
	public function getPostulantesByVacante($vacante){
		
		$sql1 = " select u.nombres, u.apellidos, u.numero_identificacion, v.titulo
				from vacante as v 
				inner join postulacion as p on p.vacante_id =  v.id
				inner join usuario as u on p.postulante_id =  u.id 
		 where v.id = $vacante or 999 = $vacante order by v.id";		
		$model = new model();
		$result = $model->runSql($sql1);
		return $model->getRows($result);
	}
	
	public function getPostulantesEvaluacionByVacante($vacante){
	
	$sql = "select u.id as usuario_id, v.id as vacante_id , et.id as etapa_id, u.nombres, u.apellidos, u.numero_identificacion, v.titulo, et.nombre as etapa, e.valor, e.observacion
				from vacante as v 
				inner join postulacion as p on p.vacante_id =  v.id
				inner join usuario as u on p.postulante_id =  u.id 
				inner join evaluacion as e on e.postulacion_id = p.id
				inner join etapa as et on et.id = e.etapa_id
			where v.id = $vacante or 999 = $vacante
		order by u.id, v.id, et.id";
		$model = new model();
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	
}