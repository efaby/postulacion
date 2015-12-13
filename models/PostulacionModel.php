<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class PostulacionModel {

	/**
	 * Obtiene Preguntas
	 */
	public function getPostulacionList($id){
		$model = new model();		
		$sql = "select v.nombre_area, v.titulo , p.fecha, p.id from postulacion as p 
				inner join vacante as v on p.vacante_id = v.id
				where p.postulante_id = ".$id;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}	
	
	public function getEvaluaciones(){
		$id = $_GET['id'];
		return $this->loadEvaluaciones($id);
	}
	
	private function loadEvaluaciones($id){
		$model = new model();
		$sql = "select et.nombre, e.valor, e.fecha, e.observacion, e.url  from evaluacion as e
				inner join etapa et on e.etapa_id = et.id
				where postulacion_id = ".$id;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function getEtapas(){
		$model = new model();
		return $model->getCatalog("etapa");
	}
	
	public function getVacantes($sufix){

		$model = new model();	
		$sql = "select v.id, v.titulo  from vacante as v				
				where now() between fecha_inicio".$sufix." and fecha_fin".$sufix;		
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function getPostulantes($etapa, $vacante){
		
		$sql1 = " select p.id, u.nombres, u.apellidos, u.numero_identificacion, '' as valor, '' as observacion from vacante as v ";
		$sql = "	inner join postulacion as p on p.vacante_id =  v.id
					inner join usuario as u on p.postulante_id =  u.id ";
		$where = " and p.id not in (select postulacion_id from evaluacion where etapa_id = ".$etapa.")";
		if($etapa > 1){	
			$etapa = $etapa - 1;
			$sql1 = " select p.id, u.nombres, u.apellidos, u.numero_identificacion, e.valor, e.observacion from vacante as v ";
			$sql .= " inner join evaluacion as e on (e.postulacion_id = p.id and e.activo = 1 and e.aprobado = 1 and etapa_id = ".$etapa.")";
			$where = "";				
		}		
		$sql .= " where v.id = ".$vacante. $where;
		$model = new model();
		
		$result = $model->runSql($sql1.$sql);
		return $model->getRows($result);
	}
	
	public function getPostulante(){
		$id  = $_POST["id"];
		$sql = "Select u.*, d.nombre as discapacidad, e.nombre as estado from usuario as u 
				inner join postulacion as p on p.postulante_id = u.id
				inner join capacidad_especial as d on d.id = u.capacidad_especial_id
				inner join estado_civil as e on e.id = u.estado_civil_id
				where p.id = ".$id;
		$model = new model();
		$result = $model->runSql($sql);
		$resultArray = $model->getRows($result);
		return $resultArray[0];
	}
	
	public function getCursos($id){
		$model = new model();
		$sql = "select * from curso where postulante_id = ".$id;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function getTitulos($id){
		$model = new model();
		$sql = "select t.*, c.nombre as categoria, n.nombre as nivel from titulo as t
				inner join categoria_titulo as c on c.id = t.categoria_titulo_id
				inner join nivel_educacion as n on n.id = t.nivel_educacion_id
				where t.postulante_id = ".$id;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function getHistorial($id){
		$model = new model();
		$sql = "select h.*, c.nombre as ciudad from historial as h
				inner join ciudad as c on c.id = h.ciudad_id
				where h.postulante_id = ".$id;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function saveEvaluacion($objeto){
		$model = new model();
		$sql = "update evaluacion set activo = 0 where postulacion_id = ".$objeto["postulacion_id"];
		$result = $model->runSql($sql);
		return $model->saveData($objeto, 'evaluacion');
	}
	
	public function getEvaluacionesListado($id){
		return $this->loadEvaluaciones($id);
	}
}
