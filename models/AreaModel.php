<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class AreaModel {

	/**
	 * Obtiene Usuarios
	 */
	public function getAreaList($offset, $limit){
		$model = new model();
		$offset = (($offset - 1) * $limit);
		$sql = $this->getSql(true);
		$sql .= " limit ".$offset.",".$limit;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}	
	
	public function getAreaListCount(){
		$model =  new model();
		$sql = $this->getSql(false);
		$result = $model->runSql($sql);
		$result = $model->getRows($result);
		return $result[0]["total"];
	}
	
	private function getSql($type){
		if($type){
			$sql = "select * from area ";
		} else {
			$sql = "select count(id) as total from area";
		}		
		return $sql;
	}
	
	public function getArea()
	{
		$area = $_GET['id'];
		$model =  new model();
		$sql = "select * from area where id = ".$area;
		$result = $model->runSql($sql);
		$resultArray = $model->getRows($result);
		return $resultArray[0];
	}
	
	public function saveArea($area)
	{		
		if($area['id'] > 0){
			$sql = "update area set name = '".$area['name']."', description = '".$area['description']."', is_active = ".$area['is_active']." where id = ".$area['id'];
		} else {
			$sql = "insert into area(name, description,is_active) values ('".$area['name']."','".$area['description']."',".$area['is_active'].")";
		}	
		$model =  new model();
		$result = $model->runSql($sql);
	}
	
	public function deleteArea(){
		$area = $_GET['id'];
		$sql = "update area set is_active = 0 where id = ".$area;
		$model =  new model();
		$result = $model->runSql($sql);
	}
	
	
}
