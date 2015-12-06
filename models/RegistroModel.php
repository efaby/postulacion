<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class RegistroModel {
	
	private $patron = "";

	/**
	 * Obtiene Usuarios
	 */

	
	public function saveUsuario($usuario)
	{		
		$usuario['password'] =  md5($usuario['password']);
		$model = new model();
		return $model->saveData($usuario, 'usuario');
	}

	
	public function getCapacidadEspecial(){
		$model = new model();
		$sql = "select * from capacidad_especial";
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function getEstadoCivil(){
		$model = new model();
		$sql = "select * from estado_civil";
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
}
