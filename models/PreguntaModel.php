<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class PreguntaModel {

	/**
	 * Obtiene Preguntas
	 */
	public function getPreguntaList(){
		$model = new model();		
		$sql = "select pregunta.id, pregunta.nombre, pregunta. descripcion, pregunta.estado, pregunta.calificacion, pregunta.orden,categoria.nombre as categoria_nombre from pregunta inner join categoria on pregunta.categoria_id = categoria.id order by categoria.id";		
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}	
	
	public function getPregunta()
	{
		$pregunta = $_GET['id'];
		$model =  new model();
		if($pregunta > 0){
			$sql = "select * from pregunta where id = ".$pregunta;
			$result = $model->runSql($sql);
			$resultArray = $model->getRows($result);
			$resultArray = $resultArray[0];
		} else {
			$resultArray = Array ( 'id' => '' ,'nombre' => '','descripcion' => '', 'estado' => '', 'categoria' => '', 'calificacion' => '', 'orden' => '');	
		}
		return $resultArray;
	}
	
	public function savePregunta($pregunta)
	{
		$model = new model();
		return $model->saveData($usuario, 'usuario');
	}

	public function deletePregunta(){
		$pregunta = $_GET['id'];
		$sql = "delete from pregunta where id = ".$pregunta;
		$model =  new model();
		$result = $model->runSql($sql);
	}
	
	/**
	 * Obtiene Categorias
	 */
	public function getCategoriaList(){
		$model = new model();
		$sql = "select * from categoria ";
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
}
