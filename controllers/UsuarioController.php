<?php
require_once (PATH_MODELS . "/UsuarioModel.php");
/**
 * Controlador de Usuarios
 */
class UsuarioController {
	public function display() {
		$model = new UsuarioModel ();
		$datos = $model->getUsuarioList ();
		$message = "";
		require_once "view.listado.php";
	}
	
	public function loadForm() {
		$model = new UsuarioModel ();
		$usuario = $model->getUsuario ();
		$tipos = $model->getTipoUsuario();
		$capacidades = $model->getCapacidadEspecial();
		$estados = $model->getEstadoCivil();
		$message = "";
		require_once "view.form.php";
	}

	public function saveData() {
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
