<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class EvaluacionModel {

	/**
	 * Obtiene Evaluaciones
	 */
	public function getEvaluacionList(){
		$model = new model();		
		$sql = "select * from vacante ";		
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}	
	
	public function getEvaluacion()
	{
		$vacante = $_GET['id'];
		$model =  new model();
		if($vacante > 0){
			$sql = "select * from vacante where id = ".$vacante;
			$result = $model->runSql($sql);
			$resultArray = $model->getRows($result);
			$resultArray = $resultArray[0];
		} else {
			$resultArray = Array ( 'id' => '' ,'nombre_area' => '','titulo' => '','numero_vacantes' => '','experiencia_requerida' => '', 'fecha_inicio' => '','fecha_fin' => '','fecha_inicio_postulacion' => '','fecha_fin_postulacion' => '','fecha_inicio_calificacion' => '', 'fecha_fin_calificacion' => '','fecha_inicio_test' => '', 'fecha_fin_test' => '','fecha_inicio_clase' => '', 'fecha_fin_clase' => '','fecha_inicio_entrevista' => '', 'fecha_fin_entrevista' => '','caracteristicas' => '', 'habilidades' => '');	
		}
		return $resultArray;
	}
	
	public function saveEvaluacion($objeto)
	{
		$model = new model();
		$sql = "update evaluacion set activo = 0 where postulacion_id = ".$objeto[0]["postulacion_id"];
		$result = $model->runSql($sql);
		$evaluacion_id = $model->saveData($objeto[0], 'evaluacion');
		$objeto[1]["evaluacion_id"] = $evaluacion_id;	
		$respuesta["desempenio_id"] =  $model->saveData($objeto[1], 'desempenio');
		$respuesta["id"] = 0;
		foreach ($objeto[2] as $item){
			$respuesta["valor"] = $item["valor"]; 
			$respuesta["pregunta_id"] = $item["pregunta_id"];
			$valor = $model->saveData($respuesta, 'respuesta');
		}	
		return $evaluacion_id;
	}
	
	public function getPreguntas(){
		$model = new model();
		$sql = "SELECT categoria.id as categoria_id, categoria.nombre as nombre_categoria, pregunta.id, pregunta.nombre as nombre_pregunta FROM pregunta inner join categoria on pregunta.categoria_id = categoria.id order by categoria.id";
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function getPostulante($id){
		$model = new model();
		$sql = " select postulante_id from postulacion where id = ".$id;
		$result = $model->runSql($sql);
		$resultArray =  $model->getRows($result);
		return $resultArray[0]["postulante_id"];
	}
	
	public function getUsuario($id){
		$model = new model();
		$sql = " select nombres, apellidos from usuario where id = ".$id;
		$result = $model->runSql($sql);
		$resultArray =  $model->getRows($result);
		return $resultArray[0];
	}
	
}
