<?php
require_once(PATH_MODELS."/model.php");

/**
 * Modelo para modulo de Usuarios
 * 
 *
 */
class VacanteModel {

	/**
	 * Obtiene Vacantes
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
			$resultArray = Array ( 'id' => '' ,'nombre_area' => '','titulo' => '','numero_vacantes' => '','experiencia_requerida' => '', 'fecha_inicio' => '','fecha_fin' => '','fecha_inicio_postulacion' => '','fecha_fin_postulacion' => '','fecha_inicio_calificacion' => '', 'fecha_fin_calificacion' => '','fecha_inicio_test' => '', 'fecha_fin_test' => '','fecha_inicio_clase' => '', 'fecha_fin_clase' => '','fecha_inicio_entrevista' => '', 'fecha_fin_entrevista' => '','caracteristicas' => '', 'habilidades' => '');	
		}
		return $resultArray;
	}
	
	public function saveVacante($vacante)
	{
		if($vacante['id'] > 0){
			$sql = "update vacante set nombre_area =  '".$vacante['nombre_area']."', titulo = '".$vacante['titulo']."', numero_vacantes= ".$vacante['numero_vacantes'].", experiencia_requerida=".$vacante['experiencia_requerida'].", fecha_inicio = '".$vacante['fecha_inicio']."', fecha_fin = '".$vacante['fecha_fin']."', fecha_inicio_postulacion = '".$vacante['fecha_inicio_postulacion']."', fecha_fin_postulacion = '".$vacante['fecha_fin_postulacion']."', fecha_inicio_calificacion = '".$vacante['fecha_inicio_calificacion']."', fecha_fin_calificacion = '".$vacante['fecha_fin_calificacion']."', fecha_inicio_test = '".$vacante['fecha_inicio_test']."', fecha_fin_test = '".$vacante['fecha_fin_test']."', fecha_inicio_clase = '".$vacante['fecha_inicio_clase']."', fecha_fin_clase = '".$vacante['fecha_fin_clase']."', fecha_inicio_entrevista = '".$vacante['fecha_inicio_entrevista']."', fecha_fin_entrevista = '".$vacante['fecha_fin_entrevista']."', caracteristicas = '".$vacante['caracteristicas']."', habilidades = '".$vacante['habilidades']."' where id = ".$vacante['id'];
		} else {
			$sql = "insert into vacante(nombre_area, titulo, numero_vacantes, experiencia_requerida, fecha_inicio, fecha_fin, fecha_inicio_postulacion, fecha_fin_postulacion, fecha_inicio_calificacion, fecha_fin_calificacion, fecha_inicio_test, fecha_fin_test, fecha_inicio_clase, fecha_fin_clase, fecha_inicio_entrevista, fecha_fin_entrevista, caracteristicas, habilidades) values ('".$vacante['nombre_area']."','".$vacante['titulo']."','".$vacante['numero_vacantes']."','".$vacante['experiencia_requerida']."','".$vacante['fecha_inicio']."','".$vacante['fecha_fin']."','".$vacante['fecha_inicio_postulacion']."','".$vacante['fecha_fin_postulacion']."','".$vacante['fecha_inicio_calificacion']."','".$vacante['fecha_fin_calificacion']."','".$vacante['fecha_inicio_test']."','".$vacante['fecha_fin_test']."','".$vacante['fecha_inicio_clase']."','".$vacante['fecha_fin_clase']."','".$vacante['fecha_inicio_entrevista']."','".$vacante['fecha_fin_entrevista']."','".$vacante['caracteristicas']."','".$vacante['habilidades']."')";
		}
		$model =  new model();
		$result = $model->runSql($sql);
	}

	public function deleteVacante(){
		$vacante = $_GET['id'];
		$sql = "delete from vacante where id = ".$vacante;
		$model =  new model();
		$result = $model->runSql($sql);
	}	
	
	/////// vacantes para aplicar
	
	public function getVacantesList($opcion){
		$model = new model();
		$sql = "select * from vacante where CURDATE() between fecha_inicio".$opcion." and fecha_fin".$opcion . " and
				id not in (select vacante_id from postulacion where postulante_id = ".$_SESSION['SESSION_USER']['id'].")";
		$result = $model->runSql($sql);
		return $model->getRows($result);
	}
	
	public function savePostulacion(){
		$vacante = $_POST['id'];
		$sql = "Insert into postulacion (fecha, postulante_id, vacante_id) values (CURDATE(),".$_SESSION['SESSION_USER']['id'].", ".$vacante.")";
		$model =  new model();
		$result = $model->runSql($sql);
	}
}
