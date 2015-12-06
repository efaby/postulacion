<?php
require_once (PATH_MODELS . "/RegistroModel.php");
/**
 * Controlador de Usuarios
 */
class RegistroController {
	
	public function display() {
		$model = new RegistroModel ();
		$capacidades = $model->getCapacidadEspecial();
		$estados = $model->getEstadoCivil();
		$message = "";
		require_once "view.form.php";
	}
	
	public function saveData() { 
		$usuario ['id'] = $_POST ['id'];
		$usuario ['numero_identificacion'] = $usuario ['username'] = $_POST ['numero_identificacion'];
		$usuario ['nombres'] = $_POST ['nombres'];
		$usuario ['apellidos'] = $_POST ['apellidos'];
		$usuario ['genero'] = $_POST ['genero'];
		$usuario ['tipo_usuario_id'] = 3;
		$usuario ['capacidad_especial_id'] = $_POST ['capacidad_especial_id'];
		$usuario ['password'] = $_POST ['password'];
		$usuario ['email'] = $_POST ['email'];
		$usuario ['estado_civil_id'] = $_POST ['estado_civil_id'];
		
		$model = new RegistroModel ();
		try {
			$datos = $model->saveUsuario ( $usuario );
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		require_once "view.index.php";
	}

}
