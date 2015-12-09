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
	
	
	
}
