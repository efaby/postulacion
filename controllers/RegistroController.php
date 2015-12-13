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
		$usuario ['tipo_usuario_id'] = 3;		
		$usuario ['password'] = $_POST ['password'];
		$usuario ['email'] = $_POST ['email'];
		$usuario ['activo'] = 0;
		
		$model = new RegistroModel ();
		try {
			$datos = $model->saveUsuario ( $usuario );
		} catch ( Exception $e ) {
			$_SESSION ['message'] = $e->getMessage ();
		}
		require_once "view.index.php";
	}

}
