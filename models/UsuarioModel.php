<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class UsuarioModel {
	
	private $patron = "_-_-";

	/**
	 * Obtiene Usuarios
	 */
	public function getUsuarioList(){
		$model = new model();		
		$sql = "select u.id, u.numero_identificacion, u.nombres, u.apellidos, u.email, t.nombre as tipo_usuario from usuario as u inner join tipo_usuario as t on  u.tipo_usuario_id = t.id";		
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}	
	
	public function getUsuario()
	{
		$usuario = $_GET['id'];
		$model =  new model();
		if($usuario > 0){
			$sql = "select * from usuario where id = ".$usuario;
			$result = $model->runSql($sql);
			$resultArray = $model->getRows($result);
			$resultArray = $resultArray[0];
			
		} else {
			$resultArray = Array ( 'id' => '' ,'numero_identificacion' => '','nombres' => '','apellidos' => '','email' => '','genero' => '','password' => '', 'tipo_usuario_id' => '0','capacidad_especial_id' => '0', 'estado_civil_id' => '0','password1' => '');	
		}
		$resultArray['password'] = $resultArray['password1'] = $this->patron;
		return $resultArray;
	}
	
	public function saveUsuario($usuario)
	{		
		$password =  md5($usuario['password']);
		$model = new model();
		return $model->saveData($usuario, 'usuario');	
	}

	public function deleteUsuario(){
		$Usuario = $_GET['id'];
		$sql = "delete from usuario where id = ".$Usuario;
		$model =  new model();
		$result = $model->runSql($sql);
	}
	
	public function getTipoUsuario(){
		$model = new model();
		$sql = "select * from tipo_usuario";
		$result = $model->runSql($sql);
		return $model->getRows($result);
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
