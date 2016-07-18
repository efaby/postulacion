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
		$sql = "select a.nombre as nombre_area, v.titulo , p.fecha, p.id from postulacion as p 
				inner join vacante as v on p.vacante_id = v.id
				left join area as a on v.area_id =  a.id
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
		$sql = "select et.nombre, e.valor, e.fecha, e.observacion, e.url, e.postulacion_id, e.etapa_id  from evaluacion as e
				inner join etapa et on e.etapa_id = et.id
				where postulacion_id = ".$id;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function getEtapas(){
		$model = new model();
		return $model->getCatalog("etapa");
	}
	
	public function getVacantes(){

		$model = new model();	
		$sql = "select v.id, v.titulo  from vacante as v where eliminado = 0";		
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function getPostulantes($etapa, $vacante, $sufix){
		
		$sql1 = " select p.id, u.nombres, u.apellidos, u.numero_identificacion, (select (valor) from evaluacion where postulacion_id =p.id and etapa_id = ".$etapa.") as valor, (select (observacion) from evaluacion where postulacion_id =p.id and etapa_id = ".$etapa.") as observacion, if((select count(postulacion_id) from evaluacion where postulacion_id =p.id and etapa_id = ".$etapa.")>0,0,1) as activo 
				, if((select count(v1.id) from vacante as v1 where v1.id = v.id and CURDATE() between v1.fecha_inicio".$sufix." and v1.fecha_fin".$sufix. ")>0,1,0) as activar, (select (url) from evaluacion where postulacion_id =p.id and etapa_id = ".$etapa.") as url  
				from vacante as v ";
		$sql = "	inner join postulacion as p on p.vacante_id =  v.id
					inner join usuario as u on p.postulante_id =  u.id ";
		$where = " ";
		if($etapa > 1){	
			$etapa = $etapa - 1;
			$sql .= " inner join evaluacion as e on (e.postulacion_id = p.id and e.aprobado = 1 and etapa_id = ".$etapa.")";
			$where = "";				
		}		
		$sql .= " where v.id = ".$vacante. $where;
		$model = new model();	
	//print_r($sql1.$sql);
//exit();
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
	
	public function getPostulanteByPostulancion($id){
		$sql = "Select u.id, u.nombres, u.apellidos, u.numero_identificacion, u.email from usuario as u
				inner join postulacion as p on p.postulante_id = u.id				
				where p.id = ".$id;
		$model = new model();
		$result = $model->runSql($sql);
		$resultArray = $model->getRows($result);
		return $resultArray[0];
	}
	
	public function getVacanteByPostulancion($id){
		$sql = "Select v.id, v.nombre_vacante from vacante as v
				inner join postulacion as p on p.vacante_id = v.id				
				where p.id = ".$id;
		$model = new model();
		$result = $model->runSql($sql);
		$resultArray = $model->getRows($result);
		return $resultArray[0];
	}
	
	public function getEtapaById($id){
		$model = new model();
		$sql = "select * from etapa where id = ".$id;
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
}