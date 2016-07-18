<?php
require_once (PATH_MODELS . "/UsuarioModel.php");
require_once (PATH_HELPERS. "/Email.php");
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
		$usuario ['numero_identificacion'] = $usuario ['username'] = $_POST ['numero_identificacion'];
		$usuario ['nombres'] = $_POST ['nombres'];
		$usuario ['apellidos'] = $_POST ['apellidos'];
		$usuario ['genero'] = $_POST ['genero'];
		$usuario ['tipo_usuario_id'] = $_POST ['tipo_usuario_id'];
		$usuario ['capacidad_especial_id'] = $_POST ['capacidad_especial_id'];
		$usuario ['password'] = $_POST ['password'];
		$usuario ['email'] = $_POST ['email'];
		$usuario ['estado_civil_id'] = $_POST ['estado_civil_id'];
		$mail = 0;
		if($usuario ['id']==0){
			$usuario ['activo'] = 0;	
			$mail = 1;
		}
		
		$model = new UsuarioModel ();
		try {
			$datos = $model->saveUsuario ( $usuario );
			$_SESSION ['message'] = "Datos almacenados correctamente.";
			if($mail == 1){
				$token = base64_encode($usuario ['numero_identificacion']);
				$email = new Email();
				$email->sendNotificacionRegistro($usuario ['nombres'],$usuario ['email'] , $token);
			}
			
			
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
	
	public function verificarUsuario() {
		$cedula = $_POST ['numero_identificacion'];
		$usuario = 0;
		if(strlen($cedula)>9){
			$model = new UsuarioModel();
			$usuario = $model->getUsuarioByCedula($cedula);
		}
		//print_r($usuario);
		echo json_encode ((is_array($usuario))?array('valid'=>false):array('valid'=>true));
	}

}
