<?php
require_once (PATH_MODELS . "/VacanteModel.php");
require_once (PATH_MODELS . "/PostulacionModel.php");
require_once (PATH_HELPERS. "/Email.php");

/**
 * Controlador de Usuarios
 */
class VacanteController {
	public function display() {
		$model = new VacanteModel ();
		$datos = $model->getVacanteList ();
		
		$message = "";
		require_once "view.listado.php";
	}
	
	public function insertData(){
		$_SESSION['session'] = 2;
		$vacante =  Array ( 'id' => '' ,'area_id' => '','titulo' => '','numero_vacantes' => '','experiencia_requerida' => '','fecha_inicio' => '','fecha_fin' => '', 'fecha_inicio_postulacion' => '', 'fecha_fin_postulacion' => '', 'fecha_inicio_calificacion' => '','fecha_fin_calificacion' => '','fecha_inicio_test' => '', 'fecha_fin_test' => '', 'fecha_inicio_clase' => '','fecha_fin_clase' => '', 'fecha_inicio_entrevista' => '','fecha_fin_entrevista' => '', 'caracteristicas' => '', 'habilidades' => '');
		$message = "";
		$model = new VacanteModel ();
		$areas = $model->getAreas();
		require_once "view.form.php";
	}
	
	public function editData(){
		$model = new VacanteModel();
		$vacante = $model->getVacante();
		$areas = $model->getAreas();
		$message = "";
		require_once "view.form.php";
	}
	
	public function loadForm() {
		$model = new VacanteModel ();
		$vacante = $model->getVacante ();
		$message = "";
		require_once "view.form.php";
	}

	public function saveData() {
		$vacante ['id'] = $_POST ['id'];
		$vacante ['area_id'] = $_POST ['area_id'];
		$vacante ['titulo'] = $_POST ['titulo'];
		$vacante ['numero_vacantes'] = $_POST ['numero_vacantes'];
		$vacante ['experiencia_requerida'] = $_POST ['experiencia_requerida'];
		$vacante ['fecha_inicio'] = $_POST ['fecha_inicio'];
		$vacante ['fecha_fin'] = $_POST ['fecha_fin'];
		$vacante ['fecha_inicio_postulacion'] = $_POST ['fecha_inicio_postulacion'];
		$vacante ['fecha_fin_postulacion'] = $_POST ['fecha_fin_postulacion'];
		$vacante ['fecha_inicio_calificacion'] = $_POST ['fecha_inicio_calificacion'];
		$vacante ['fecha_fin_calificacion'] = $_POST ['fecha_fin_calificacion'];
		$vacante ['fecha_inicio_test'] = $_POST ['fecha_inicio_test'];
		$vacante ['fecha_fin_test'] = $_POST ['fecha_fin_test'];
		$vacante ['fecha_inicio_clase'] = $_POST ['fecha_inicio_clase'];
		$vacante ['fecha_fin_clase'] = $_POST ['fecha_fin_clase'];
		$vacante ['fecha_inicio_entrevista'] = $_POST ['fecha_inicio_entrevista'];
		$vacante ['fecha_fin_entrevista'] = $_POST ['fecha_fin_entrevista'];
		$vacante ['caracteristicas'] = $_POST ['caracteristicas'];
		$vacante ['habilidades'] = $_POST ['habilidades'];
                $vacante ['nombre_vacante'] = $_POST ['nombre_vacante'];
		$model = new VacanteModel ();
		try {
			$datos = $model->saveVacante ( $vacante );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}
	
	public function deleteData() {
		$model = new VacanteModel();
		try {
			$datos = $model->deleteVacante ();
			$_SESSION ['message'] = $datos;
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}
	
	//////////// vacantes 
	
	public function vacantes() {
		$model = new VacanteModel ();
		$datos = $model->getVacantesList ('_postulacion');
		$meses = array("Ene","Feb","Mar","Abr","May","Ju","Jul","Ago","Sep","Oct","Nov","Dic");
		$message = "";
		require_once "view.listadovacante.php";
	}
	
	public function loadFormVacante() {
		$model = new VacanteModel ();
		$vacante = $model->getVacante ();
		$meses = array("Ene","Feb","Mar","Abr","May","Ju","Jul","Ago","Sep","Oct","Nov","Dic");
		require_once "view.formvacante.php";
	}
	
	public function savePostulacion(){
		$model = new VacanteModel();
		try {
			$vacante_id = $_POST['id'];
			$datos = $model->savePostulacion();
			// enviar correo electronico
		
			$modelPostulacion = new PostulacionModel();
			$user = $modelPostulacion->getPostulanteByPostulancion($datos);
			$name = $user["nombres"] . " " . $user["apellidos"];
			
			$vacante = $model->getVacanteById($vacante_id);
			
			$email = new Email();
			$email->sendNotificacionPostulacionInicial($name, $vacante["titulo"], $user["email"]);
			
			$_SESSION ['message'] = "Su postulación ha realizado con éxito.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: ../Postulacion/index.php" );
	}
	
}