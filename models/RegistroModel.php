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

	
	public function activarCuenta($user){
		$model =  new model();
		$sql = "Update usuario set activo = 1 where username = ".$user;
		$result = $model->runSql($sql);		
		return null;
	}
}
