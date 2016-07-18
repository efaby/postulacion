<?php
require_once (PATH_MODELS . "/ReporteModel.php");
require_once (PATH_MODELS . "/PostulacionModel.php");


/**
 * Controlador de Reportes
 */
class ReporteController {
	
	public function display() {	
			
		$vacante = isset($_POST ['vacante_id'])?$_POST ['vacante_id']:0;
		$vacante2 = isset($_POST ['vacante_id2'])?$_POST ['vacante_id2']:0;
		$model = new PostulacionModel ();
		$vacantes = $model->getVacantes();	
		$vacantes[] = array("id" => 999, "titulo" => "Todas");
		$opcion = isset($_POST ['opcion'])?$_POST ['opcion']:1;
		$datos =  array();
		if($vacante>0){
			$modelReporte = new ReporteModel();
			$datos = $modelReporte->getPostulantesByVacante($vacante);	
		}	
		$datos2 =  array();
		
		if($vacante2>0){
			$modelReporte = new ReporteModel();
			$datos2 = $modelReporte->getPostulantesEvaluacionByVacante($vacante2);
		}	
		$message = "";
		require_once "view.reportevacantes.php";
	}
	
		
	public function loadImprimir(){
		$vacante = isset($_GET ['vacante_id'])?$_GET ['vacante_id']:0;		
		$datos =  array();
		if($vacante>0){
			$modelReporte = new ReporteModel();
			$datos = $modelReporte->getPostulantesByVacante($vacante);
		}
		require_once "view.imprimirvacante.php";
	}
	
	public function loadImprimirEvaluaciones(){
		$vacante = isset($_GET ['vacante_id'])?$_GET ['vacante_id']:0;
		$datos =  array();
		if($vacante>0){
			$modelReporte = new ReporteModel();
			$datos = $modelReporte->getPostulantesEvaluacionByVacante($vacante);
		}
		require_once "view.imprimirvacanteevaluacion.php";
	}
	
	
	
}