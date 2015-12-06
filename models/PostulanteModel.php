<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class PostulanteModel {
	
	/*
	 * GEstion de Usuario
	 */
	
	public function getUsuario($usuario)
	{
		$model =  new model();		
		$sql = "select * from usuario where id = ".$usuario; // poner inner joins
		$result = $model->runSql($sql);
		$resultArray = $model->getRows($result);
		$resultArray = $resultArray[0];			
		return $resultArray;
	}

	public function updateFiles($field, $nombre,$usuario){
		$sql = "Update usuario set ".$field." = '".$nombre."' where id = ".$usuario;
		$model =  new model();
		$result = $model->runSql($sql);
	}
	
	public function getCapacidades(){
		$model = new model();
		return $model->getCatalog("capacidad_especial");
	}
	
	public function getEstados(){
		$model = new model();
		return $model->getCatalog("estado_civil");
	}
	
	/**
	 * Gestion de Titulos
	 */
	public function getTitulos($id){
		$model = new model();
		$sql = "select t.institucion, t.url, t.nombre, t.id, t.registro_senecyt, ne.nombre as nivel, p.nombre as pais 
				from titulo as t inner join nivel_educacion as ne on t.nivel_educacion_id = ne.id 
				inner join pais as p on t.id_pais = p.id where postulante_id = ".$id;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function getTitulo()
	{
		$titulo = isset($_GET['id'])?$_GET['id']:0;
		$model =  new model();
		if($titulo > 0){
			$sql = "select * from titulo where id = ".$titulo; // poner inner joins
			$result = $model->runSql($sql);
			$resultArray = $model->getRows($result);
			$resultArray = $resultArray[0];
				
		} else {
			$resultArray = Array ( 'id' => 0 ,'nombre' => '','institucion' => '','registro_senecyt' => '','nivel_educacion_id' => 0,'id_pais' => 0, 'url' => '','categoria_titulo_id'=>0);
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
	
	public function getCursos($id){
		$model = new model();
		$sql = "select * from curso where postulante_id = ".$id;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	
	public function getCurso()
	{
		$curso = isset($_GET['id'])?$_GET['id']:0;
		$model =  new model();
		if($curso > 0){
			$sql = "select * from curso where id = ".$curso; // poner inner joins
			$result = $model->runSql($sql);
			$resultArray = $model->getRows($result);
			$resultArray = $resultArray[0];	
		} else {
			$resultArray = Array ( 'id' => 0 ,'nombre' => '','anio' => '','horas' => '','url' => '','categoria'=>0);
		}
		return $resultArray;
	}
	
	/**
	 * Gestion Historial
	 */
	
	public function getHistoriales($id){
		$model = new model();
		$sql = "select h.id, h.institucion, h.url, h.area, h.cargo, c.nombre as ciudad
				from historial as h inner join ciudad as c on h.ciudad_id = c.id
				where postulante_id = ".$id;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function getHistorial()
	{
		$historial = isset($_GET['id'])?$_GET['id']:0;
		$model =  new model();
		if($historial > 0){
			$sql = "select h.*, p.pais_id as pais_id , p.id as provincia_id  from historial as h 
					inner join ciudad as c on h.ciudad_id = c.id
					inner join provincia as p on c.provincia_id = p.id
					where h.id = ".$historial; 
			$result = $model->runSql($sql);
			$resultArray = $model->getRows($result);
			$resultArray = $resultArray[0];
	
		} else {
			$resultArray = Array ( 'id' => 0 ,'institucion' => '','area' => '','cargo' => '','relacion_docencia' => '','telefono' => '','pais_id' => 0, 'url' => '','provincia_id'=>0,'ciudad_id'=>0,'direccion'=>'');
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
	
	public function saveData($objeto, $table){
		$model = new model();
		return $model->saveData($objeto, $table);
	}
	
	public function deleteItem($table){
		$item = $_GET['id'];
		$sql = "delete from ".$table." where id = ".$item;
		$model =  new model();
		$result = $model->runSql($sql);
	}
	
	public function getUrl($table){
		$item = $_GET['id'];
		$model = new model();
		$sql = "select url from $table where id = ".$item;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	
}
