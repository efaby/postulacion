<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class CategoriaModel {

	/**
	 * Obtiene Categorias
	 */
	public function getCategoriaList(){
		$model = new model();		
		$sql = "select * from categoria ";		
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}	
	
	public function getCategoria()
	{
		$categoria = $_GET['id'];
		$model =  new model();
		if($categoria > 0){
			$sql = "select * from categoria where id = ".$categoria;
			$result = $model->runSql($sql);
			$resultArray = $model->getRows($result);
			$resultArray = $resultArray[0];
		} else {
			$resultArray = Array ( 'id' => '' ,'nombre' => '','descripcion' => '', 'orden' =>'');	
		}
		return $resultArray;
	}
	
	public function saveCategoria($categoria)
	{
		if($categoria['id'] > 0){
			$sql = "update categoria set nombre = '".$categoria['nombre']."', descripcion = '".$categoria['descripcion']."', orden = ".$categoria['orden']." where id = ".$categoria['id'];			
		} else {
			$sql = "insert into categoria(nombre, descripcion, orden) values ('".$categoria['nombre']."','".$categoria['description']."',".$categoria['orden'].")";			
		}
		$model =  new model();
		$result = $model->runSql($sql);
	}

	public function deleteCategoria(){
		$categoria = $_GET['id'];
		$sql = "delete from categoria where id = ".$categoria;
		$model =  new model();
		$result = $model->runSql($sql);
	}
	
	
}
