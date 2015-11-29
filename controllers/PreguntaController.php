<?php
require_once (PATH_PAGINATOR . "/paginator.php");
require_once (PATH_MODELS . "/PreguntaModel.php");
/**
 * Controlador de Usuarios
 */
class PreguntaController {
	public function display() {
		$model = new PreguntaModel ();
		$datos = $model->getPreguntaList ();
		$message = "";
		require_once "view.listado.php";
	}
	
	public function loadForm() {
		$model = new PreguntaModel ();
		$pregunta = $model->getPregunta ();
		$categoria = $model->getCategoriaList();
		$message = "";
		require_once "view.form.php";
	}

	public function saveData() {
		$pregunta ['id'] = $_POST ['id'];
		$pregunta ['nombre'] = $_POST ['nombre'];
		$pregunta ['descripcion'] = $_POST ['descripcion'];
		$pregunta ['estado'] = 0;
		if (isset($_POST ['estado'])) 
		{	
			$pregunta ['estado'] = $_POST ['estado'];
		}
		$pregunta ['categoria'] = $_POST ['categoria'];
		$model = new PreguntaModel ();
		try {
			$datos = $model->savePregunta ( $pregunta );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}
	
	public function deleteData() {
		$model = new PreguntaModel();
		try {
			$datos = $model->deletePregunta ();
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}

}
