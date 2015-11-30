<?php
require_once (PATH_PAGINATOR . "/paginator.php");
require_once (PATH_MODELS . "/VacanteModel.php");
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
	
	public function loadForm() {
		$model = new VacanteModel ();
		$vacante = $model->getVacante ();
		$message = "";
		require_once "view.form.php";
	}

	public function saveData() {
		$vacante ['id'] = $_POST ['id'];
		$vacante ['nombre'] = $_POST ['nombre'];
		$vacante ['descripcion'] = $_POST ['descripcion'];
		
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
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}
}