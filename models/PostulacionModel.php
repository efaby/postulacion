<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class PostulacionModel {

	/**
	 * Obtiene Preguntas
	 */
	public function getPostulacionList($id){
		$model = new model();		
		$sql = "select v.nombre_area, v.titulo , p.fecha, p.id from postulacion as p 
				inner join vacante as v on p.vacante_id = v.id
				where p.postulante_id = ".$id;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}	
	
	public function getEvaluaciones(){
		$id = $_GET['id'];
		$model = new model();
		$sql = "select et.nombre, e.valor, e.fecha, e.observacion  from evaluacion as e 
				inner join etapa et on e.etapa_id = et.id
				where postulacion_id = ".$id;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function getEtapas(){
		$model = new model();
		return $model->getCatalog("etapa");
	}
	
	public function getVacantes($sufix){

		$model = new model();	
		$sql = "select v.id, v.titulo  from vacante as v				
				where now() between fecha_inicio".$sufix." and fecha_fin".$sufix;		
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function getPostulantes($etapa, $vacante){
		
		$sql = "select u.nombres, u.apellidos, u.numero_identificacion, '' as valor, '' as observacion from vacante as v
					inner join postulacion as p on p.vacante_id =  v.id
					inner join usuario as u on p.postulante_id =  u.id ";
	
		if($etapa > 1){	
			$sql .= " inner join evaluacion as e on (e.postulacion_id = p.id and e.activo = 1 and e.aprobado = 1)";				
		}		
		$sql .= " where v.id = ".$vacate;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
}
