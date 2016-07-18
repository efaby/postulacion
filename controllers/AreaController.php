<?php
require_once (PATH_MODELS . "/AreaModel.php");
/**
 * Controlador de Usuarios
 */
class AreaController {
	public function display() {
		$model = new AreaModel ();
		$datos = $model->getAreaList ();
		$message = "";
		require_once "view.listado.php";
	}
	
	public function loadForm() {
		$model = new AreaModel ();
		$area = $model->getArea ();
		$message = "";
		$opcion = $_GET['opcion'];
		require_once "view.form.php";
	}

	public function saveData() {
		$area ['id'] = $_POST ['id'];
		$area ['nombre'] = $_POST ['nombre'];
		$area ['descripcion'] = $_POST ['descripcion'];
		$opcion = $_POST ['opcion'];

		$model = new AreaModel ();
		try {
			$datos = $model->saveArea ( $area );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		if($opcion == 1){
			header ( "Location: ../Vacante/index.php?action=insertData" );
		} else {
			header ( "Location: index.php" );
		}
	}
	
	public function deleteData() {
		$model = new AreaModel();
		try {
			$datos = $model->deleteArea ();
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}

}
