<?php
require_once (PATH_MODELS . "/PostulacionModel.php");
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
		$vacantes =  array();
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

}
