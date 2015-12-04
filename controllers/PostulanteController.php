<?php
require_once (PATH_PAGINATOR . "/paginator.php");
require_once (PATH_MODELS . "/PostulanteModel.php");
/**
 * Controlador de Usuarios
 */
class PostulanteController {
	public function display() {
		$model = new PostulanteModel ();
		//$datos = $model->getUsuarioList ();
		$datos = array();
		$message = "";
		require_once "view.listado.php";
	}
	
	public function loadForm() {
		$opcion = $_GET['opcion'];
		$model = new PostulanteModel ();
		$message = "";
		switch ($opcion){
			case 1: $titulo = $model->getTitulo();
				$paises = $model->getPaises();
				$niveles = $model->getNiveles();
				$categorias = $model->getCategorias();
				require_once "view.form.titulo.php";
				break;
			case 2: 
				require_once "view.form.curso.php";
				break;
			case 3: 
				require_once "view.form.historial.php";
				break;
		}
		
	}

	public function saveData() {
		
		print("llego");
		exit();
		$usuario ['id'] = $_POST ['id'];
		$usuario ['numero_identificacion'] = $_POST ['numero_identificacion'];
		$usuario ['nombres'] = $_POST ['nombres'];
		$usuario ['apellidos'] = $_POST ['apellidos'];
		$usuario ['genero'] = $_POST ['genero'];
		$usuario ['tipo_usuario_id'] = $_POST ['tipo_usuario_id'];
		$usuario ['capacidad_especial_id'] = $_POST ['capacidad_especial_id'];
		$usuario ['password'] = $_POST ['password'];
		$usuario ['email'] = $_POST ['email'];
		$usuario ['estado_civil_id'] = $_POST ['estado_civil_id'];
		
		$model = new UsuarioModel ();
		try {
			$datos = $model->saveUsuario ( $usuario );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}
	
	public function deleteData() {
		$model = new UsuarioModel();
		try {
			$datos = $model->deleteUsuario ();
			$_SESSION ['message'] = "Datos eliminados correctamente.";
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		header ( "Location: index.php" );
	}

}
