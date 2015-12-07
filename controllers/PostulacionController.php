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

	public function saveData() {
		$pregunta ['id'] = $_POST ['id'];
		$pregunta ['nombre'] = $_POST ['nombre'];
		$pregunta ['descripcion'] = $_POST ['descripcion'];
		$pregunta ['estado'] = 0;
		if (isset($_POST ['estado'])) 
		{	
			$pregunta ['estado'] = $_POST ['estado'];
		}
		$pregunta ['categoria_id'] = $_POST ['categoria'];
		$pregunta ['orden'] = $_POST ['orden'];
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
