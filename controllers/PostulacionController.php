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
		$vacantes =  $datos = array();		
		
		if($etapa>0){
			$sufix = $this->getOpcion($etapa);
			$vacantes = $model->getVacantes($sufix);
			$datos = $model->getPostulantes($etapa,$vacante);
		}		
		$message = "";
		require_once "view.listadopostulantesetapa.php";
	}
	
	public function loadVacante(){
		$opcion = $_POST ['opcion'];
		$prefix = $this->getOpcion($opcion);
		$model = new PostulacionModel ();
		$vacantes = $model->getVacantes($prefix);
		$html ='<option value="" >Seleccione</option>';
		foreach ($vacantes as $dato) {
			$html .='<option value="'.$dato["id"].'" >'.$dato["titulo"].'</option>';
		}
		$html .='</select>';
		echo $html;
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
		}
		return $prefix;
	}
	
	/*
	 * Meritos
	 */

	public function meritos(){
		$postulacion  = $_POST["id"];
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
}
