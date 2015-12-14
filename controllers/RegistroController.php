<?php
require_once (PATH_MODELS . "/RegistroModel.php");
require_once (PATH_HELPERS. "/Email.php");
/**
 * Controlador de Usuarios
 */
class RegistroController {
	
	public function display() {
		$model = new RegistroModel ();
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
		// enviar email
		$token = base64_encode($usuario ['numero_identificacion']);
		$email = new Email();
		$email->sendNotificacionRegistro($usuario ['nombres'],$usuario ['email'] , $token);
		$activo = 0;
		require_once "view.index.php";
	}
	
	public function activarCuenta(){
		$encode = $_GET["tc"];
		$user_id = base64_decode($encode);
		if(strlen($user_id)>=10){
			$model = new RegistroModel();
			$user = $model->activarCuenta($user_id);
			$activo = 1;
			require_once "view.index.php";
		} else {
			header ( "Location: ../../index.php" );
		}
			
	}

}
