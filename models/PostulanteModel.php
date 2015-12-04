<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class PostulanteModel {
	
	private $patron = "_-_-";
	

	/**
	 * Gestion de Titulos
	 */
	public function getTitulo()
	{
		$titulo = $_GET['id'];
		$model =  new model();
		if($titulo > 0){
			$sql = "select * from titulo where id = ".$usuario; // poner inner joins
			$result = $model->runSql($sql);
			$resultArray = $model->getRows($result);
			$resultArray = $resultArray[0];
				
		} else {
			$resultArray = Array ( 'id' => '' ,'nombre' => '','nombres' => '','institucion' => '','registro_senecyt' => '','nivel' => 0,'pais' => '', 'url' => '','categoria'=>0);
		}
		return $resultArray;
	}
	
	public function getPaises(){
		$model = new model();
		return $model->getCatalog("pais");		
	}
	
	public function getNiveles(){
		$model = new model();
		return $model->getCatalog("nivel_educacion");
	}
	
	public function getCategorias(){
		$model = new model();
		return $model->getCatalog("categoria_titulo");
	}
	
	/*
	 * GEstion Curso
	 */
	
	public function getCurso()
	{
		$curso = $_GET['id'];
		$model =  new model();
		if($titulo > 0){
			$sql = "select * from curso where id = ".$curso; // poner inner joins
			$result = $model->runSql($sql);
			$resultArray = $model->getRows($result);
			$resultArray = $resultArray[0];	
		} else {
			$resultArray = Array ( 'id' => '' ,'nombre' => '','anio' => '','horas' => '','url' => '','categoria'=>0);
		}
		return $resultArray;
	}
	
	/**
	 * Gestion Historial
	 */
	public function getHistorial()
	{
		$historial = $_GET['id'];
		$model =  new model();
		if($titulo > 0){
			$sql = "select * from titulo where id = ".$usuario; // poner inner joins
			$result = $model->runSql($sql);
			$resultArray = $model->getRows($result);
			$resultArray = $resultArray[0];
	
		} else {
			$resultArray = Array ( 'id' => '' ,'institucion' => '','area' => '','cargo' => '','relacion_docencia' => '','telefono' => '','pais' => 0, 'url' => '','provincia'=>0,'ciudad'=>0,'direccion'=>'');
		}
		return $resultArray;
	}
	
	public function getProvincias($pais_id){
		$model = new model();
		$sql = "select * from provincia where pais_id = ".$pais_id;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function getCiudades($provincia_id){
		$model = new model();
		$sql = "select * from ciudad where provincia_id = ".$provincia_id;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	
	
	
	
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
		if($usuario['id'] > 0){
			$sql = "update usuario set numero_identificacion = '".$usuario['numero_identificacion']."', nombres = '".$usuario['nombres']."', apellidos = '".$usuario['apellidos']."', email = '".$usuario['email']."', genero = '".$usuario['genero']."', estado_civil_id = ".$usuario['estado_civil_id'].", tipo_usuario_id = ".$usuario['tipo_usuario_id'].", capacidad_especial_id = ".$usuario['capacidad_especial_id'] ." , username = '".$usuario['numero_identificacion']."'";
			if($usuario['password'] != $this->patron){
				$sql .= " password  = '".$password."'";
			}
			$sql .= " where id = ".$usuario['id'];
		} else {
			$sql = "insert into usuario(numero_identificacion, nombres, apellidos,email,genero,estado_civil_id,tipo_usuario_id,capacidad_especial_id, password,username) 
					values ('".$usuario['numero_identificacion']."','".$usuario['nombres']."','".$usuario['apellidos']."','".$usuario['email']."','".$usuario['genero']."',".$usuario['estado_civil_id'].",".$usuario['tipo_usuario_id'].",".$usuario['capacidad_especial_id'].",'".$password."','".$usuario['numero_identificacion']."')";
		}

		$model =  new model();
		$result = $model->runSql($sql);
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
