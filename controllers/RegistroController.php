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
		$usuario = array('numero_identificacion' => '','nombres'=>'','apellidos'=>'','email'=>'');
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
		if($model->verificarUsuario($usuario ['numero_identificacion'])){
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
			exit();
		} else {
			$_SESSION ['message'] = "Ya éxiste un usuario con el Número de Identificacion ingresado. Por favor revise sus datos.";
			require_once "view.form.php";
		}
		
	}
	
	public function activarCuenta(){
		$encode = $_GET["tc"];
		$user_id = base64_decode($encode);
		if(strlen($user_id)>=10){
			$model = new RegistroModel();
			$user = $model->activarCuenta($user_id);
			$usuario = $model->obtenerUsuario($user_id);
			$activo = 1;
			require_once "view.index.php";
		} else {
			header ( "Location: ../../index.php" );
		}
			
	}

}
