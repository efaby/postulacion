<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class VacanteModel {

	/**
	 * Obtiene Categorias
	 */
	public function getVacanteList(){
		$model = new model();		
		$sql = "select * from vacante ";		
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}	
	
	public function getVacante()
	{
		$vacante = $_GET['id'];
		$model =  new model();
		if($vacante > 0){
			$sql = "select * from vacante where id = ".$vacante;
			$result = $model->runSql($sql);
			$resultArray = $model->getRows($result);
			$resultArray = $resultArray[0];
		} else {
			$resultArray = Array ( 'id' => '' ,'nombre' => '','descripcion' => '');	
		}
		return $resultArray;
	}
	
	public function saveVacante($vacante)
	{
		if($vacante['id'] > 0){
	//		$sql = "update vacante set nombre = '".vacante['nombre']."', descripcion = '".$vacante['descripcion']."' where id = ".$vacante['id'];
		} else {
			$sql = "insert into vacante(nombre, descripcion) values ('".$vacante['nombre']."','".$vacante['description']."')";
		}
		$model =  new model();
		$result = $model->runSql($sql);
	}

	public function deleteCategoria(){
		$categoria = $_GET['id'];
		$sql = "delete from vacante where id = ".$vacante;
		$model =  new model();
		$result = $model->runSql($sql);
	}	
}
