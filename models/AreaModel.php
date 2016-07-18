<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class AreaModel {

	/**
	 * Obtiene Categorias
	 */
	public function getAreaList(){
		$model = new model();		
		$sql = "select * from area where eliminado = 0";		
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}	
	
	public function getArea()
	{
		$area = $_GET['id'];
		$model =  new model();
		if($area > 0){
			$sql = "select * from area where id = ".$area;
			$result = $model->runSql($sql);
			$resultArray = $model->getRows($result);
			$resultArray = $resultArray[0];
		} else {
			$resultArray = Array ( 'id' => '' ,'nombre' => '','descripcion' => '');	
		}
		return $resultArray;
	}
	
	public function saveArea($area)
	{
		if($area['id'] > 0){
			$sql = "update area set nombre = '".$area['nombre']."', descripcion = '".$area['descripcion']."' where id = ".$area['id'];			
		} else {
			$sql = "insert into area(nombre, descripcion) values ('".$area['nombre']."','".$area['descripcion']."')";			
		}
		$model =  new model();
		$result = $model->runSql($sql);
	}

	public function deleteArea(){
		$area = $_GET['id'];
		$sql = "update area set eliminado = 1 where id = ".$area;
		$model =  new model();
		$result = $model->runSql($sql);
	}
	
	
}
