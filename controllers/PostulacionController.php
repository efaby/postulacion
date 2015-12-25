<?php
require_once (PATH_MODELS . "/PostulacionModel.php");
require_once (PATH_HELPERS. "/File.php");

/**
 * Controlador de Usuarios
 */
class PostulacionController {
	public function display() {
		$model = new PostulacionModel ();
		$datos = $model->getPostulacionList ($_SESSION['SESSION_USER']['id']);
		$message = "";
		require_once "view.listado.php";
	}
	
	public function loadForm() {
		$model = new PostulacionModel ();
		$evaluaciones = $model->getEvaluaciones ();
		$title = str_replace('/-/', ' ', $_GET["title"]);
		$message = "";
		require_once "view.form.php";
	}

	public function loadPostulante() {
		$etapa = isset($_POST ['etapa_id'])?$_POST ['etapa_id']:0;
		$vacante = isset($_POST ['vacante_id'])?$_POST ['vacante_id']:0;
		$model = new PostulacionModel ();
		$etapas = $model->getEtapas();
		$vacantes = $model->getVacantes();		
		$datos =  array();
		if($etapa>0){
			$prefix = $this->getOpcion($etapa);
			$datos = $model->getPostulantes($etapa,$vacante,$prefix);
		}
			
		$message = "";
		require_once "view.listadopostulantesetapa.php";
	}
	
	private function getOpcion($opcion){
		switch ($opcion){
			case 1: $prefix = "_calificacion";
			break;
			case 2: $prefix = "_test";
			break;
			case 3: $prefix = "_clase";
			break;
			case 4: $prefix = "_entrevista";
			break;
			case 5: $prefix = "_entrevista";
			break;
		}
		return $prefix;
	}
	
	/*
	 * Meritos
	 */

	public function meritos(){
		$postulacion  = $_POST["id"];
		$etapa  = $_POST["etapa"];
		$vacante  = $_POST["vacante"];
		$model = new PostulacionModel();
		$usuario = $model->getPostulante();
		$cursos = $model->getCursos($usuario["id"]);
		$titulos = $model->getTitulos($usuario["id"]);
		$historial = $model->getHistorial($usuario["id"]);
		$meses = array("Ene","Feb","Mar","Abr","May","Ju","Jul","Ago","Sep","Oct","Nov","Dic");
		require_once "view.meritos.php";
	}
	
	public function downloadFile(){
		$nombre = $_GET['nameFile'];
		$upload = new File();
		return $upload->download($nombre);
	}
	
	public function saveEvaluacion(){
		$objeto["id"] = 0;
		$objeto["postulacion_id"] = $_POST["postulacion_id"];
		$objeto["valor"] = $_POST["valor"];
		$objeto["observacion"] = $_POST["observaciones"];
		$objeto["aprobado"] = $_POST["aprobado"];
		$objeto["activo"] = 1;
		$objeto["fecha"] = date('Y-m-d');
		$objeto["id_usuario"] = $_SESSION['SESSION_USER']['id'];
		$objeto["etapa_id"] = $_POST["etapa_id"];
		$objeto ['url'] = '';
		if(isset($_FILES['url'])&&($_FILES['url']['name']!='')){
			$upload = new File();
			$objeto ['url'] = $upload->uploadFile('evaluacion'.$objeto["etapa_id"]."_");
		}
		try {
			$model = new PostulacionModel();
			$objeto = $model->saveEvaluacion($objeto);
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php?action=loadPostulante" );
	}
	
	public function loadFormEvaluacion(){
		$opcion = $_GET["opcion"];
		$postulacion = $_GET["id"];
		$model = new PostulacionModel();
		$evaluaciones = $model->getEvaluaciones($postulacion);
		$usuario = $model->getPostulanteByPostulancion($postulacion);
		if($opcion == 5){
			
			require_once "view.formEvaluaciones.php";
		} else {
			require_once "view.formEvaluacion.php";
		}
		
	}
	
	public function loadImprimir(){
		$etapa = isset($_GET['etapa_id'])?$_GET ['etapa_id']:0;
		$vacante = isset($_GET ['vacante_id'])?$_GET ['vacante_id']:0;
		$model = new PostulacionModel ();
		$datos =  array();
		if($etapa>0){
			$prefix = $this->getOpcion($etapa);
			$datos = $model->getPostulantes($etapa,$vacante,$prefix);
		}
		require_once "view.imprimir.php";
	}
}
