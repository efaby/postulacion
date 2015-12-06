<?php
require_once (PATH_MODELS . "/CategoriaModel.php");
/**
 * Controlador de Usuarios
 */
class CategoriaController {
	public function display() {
		$model = new CategoriaModel ();
		$datos = $model->getCategoriaList ();
		$message = "";
		require_once "view.listado.php";
	}
	
	public function loadForm() {
		$model = new CategoriaModel ();
		$categoria = $model->getCategoria ();
		$message = "";
		require_once "view.form.php";
	}

	public function saveData() {
		$categoria ['id'] = $_POST ['id'];
		$categoria ['nombre'] = $_POST ['nombre'];
		$categoria ['descripcion'] = $_POST ['descripcion'];
		
		$model = new CategoriaModel ();
		try {
			$datos = $model->saveCategoria ( $categoria );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}
	
	public function deleteData() {
		$model = new CategoriaModel();
		try {
			$datos = $model->deleteCategoria ();
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}

}
