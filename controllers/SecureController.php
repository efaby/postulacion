<?php
require_once(PATH_MODELS."/SecureModel.php");

/**
 * Controlador de Usuarios
 *
 */
class SecureController {

	public function display()
	{	
		$urlWeb = $this->getPrefixUrl();
		require_once PATH_VIEWS."/Secure/view.login.php";
	}
	
	public function validationUser()
	{
		$model = new SecureModel();
		$login = $model->clean($_POST['username']);
		$password = $model->clean($_POST['password']);		
		$result= $model->validationUser($login, $password);
		$response['band'] = 0;
		if($result)
		{
			if($result["activo"]){
				session_regenerate_id();
				$result['urls'] = $model->getUrlsAccess($result["tipo_usuario_id"]);
				$_SESSION['SESSION_USER'] = $result;
				session_write_close();
				$urlWeb = $this->getPrefixUrl();
				$response['data'] = $urlWeb."views/Secure/index.php?action=welcome";
			}else {
				$response['data'] = 'Usuario no Activo.';
				$response['band'] = 1;
			}					
		} else {
				$response['data'] = 'Credenciales Inválidas.';
				$response['band'] = 1;
		}	
		echo json_encode($response);		
		exit();				
	}
	
	public function welcome(){
		require_once "view.welcome.php";
	}
	
	public function changePassword(){
		require_once "view.change.php";
	}
	
	public function error403(){
		require_once PATH_VIEWS."/Secure/view.error403.php";
	}
	
	public function closeSession(){
		session_start();
		unset($_SESSION["SESSION_USER"]);
		session_destroy();
		header("Location: ../../index.php");
	}
	
	public function displayList()
	{
		$model = new SecureModel();
		$offset = 1;
		if(isset($_POST['listForm_offset'])){
			$offset = $_POST['listForm_offset'];
		}
		$totalItems = $model->getUsersListCount();
		$paginator = new paginator("listForm", $totalItems, $offset, LIMIT_PAGE);
		$datos = $model->getUsersList($offset, LIMIT_PAGE);
		require_once "view.listado.php";
	}	
	
	private function getPrefixUrl(){
		$url = $_SERVER['REQUEST_URI'];
		$urlWeb = '';
		if(strpos($url, "/views/")){
			$urlWeb = "../../";
		}
		return $urlWeb;
	}
	
		
	public function changePasswordData(){
		$passwd["p1"] = $_POST['passwordAnterior'];
		$passwd["p2"] = $_POST['password'];
		$passwd["p3"] = $_POST['password1'];
		$user = $_SESSION['SESSION_USER']['id'];
		$message = $this->validate($passwd,$user);		
		if($message == ''){
			$model = new SecureModel();
			try {
				$model->changePassword($passwd["p2"],$user);
				$_SESSION['message'] = "Su contraseña ha sido cambiada exitosamente.";
			}
			catch (Exception $e){
				$_SESSION['message'] = $e->getMessage();
			}
		} else {
			$_SESSION['message'] = $message;
		}
		
		header("Location: index.php?action=changePassword");
	}
	
	private function validate($passwd,$user,$band = true){
		$model = new SecureModel();
		
		if($band){
			if($model->verifyPass($passwd["p1"],$user)==0){
				return 'La contraseña actual no coincide.';
			}
		}
		
		if ($passwd["p2"] == ''){
			return 'Por favor ingrese un Password';
		}
		if ($passwd["p3"] == '') {
			return 'Por favor ingrese nuevamente un Password';
		}
		if ($passwd["p2"] != $passwd["p3"]){
			return 'Las contraseñas no coinciden';
		}
		return "";
	}
	
	public function recoverPassword(){
		require_once "view.recoverPassword.php";
	}
	
	public function recoverPass(){
		$user_id = $_POST["identity_card"];
		$model = new SecureModel();
		$user = $model->getEmailByCI($user_id);
		if($user != null){
			$token = base64_encode($user_id);
			$this->sendMail($user, $token);
			$_SESSION['message'] = "Por favor revise su Email. Se ha enviado un link para resetear su contraseña.";
		} else {
			$_SESSION['message'] = "El usuario no existe.";
		}
		header("Location: index.php?action=recoverPassword");
	}
	
	public function resetPassword(){
		$encode = $_GET["tc"];
		$user_id = base64_decode($encode);
		$model = new SecureModel();
		$user = $model->getEmailByCI($user_id);
		if($user == null){
			$_SESSION['message'] = "El usuario no existe.";
		}
		require_once "view.reset.php";
	}
	
	public function resetPass(){

		$user_id = $_POST["identity_card"];
		$model = new SecureModel();
		$user = $model->getEmailByCI($user_id);
		if($user != null){
			$passwd["p2"] = $_POST['passwordNew'];
			$passwd["p3"] = $_POST['repeatPasswordNew'];
			$message = $this->validate($passwd,$user,false);
			if($message == ''){				
				try {
					$model->changePassword($passwd["p2"],$user["id"]);
					$_SESSION['message'] = "Su contraseña ha sido cambiada éxitosamente.";
				}
				catch (Exception $e){
					$_SESSION['message'] = $e->getMessage();
				}
			} else {
				$_SESSION['message'] = $message;
			}
			
		} else {
			$_SESSION['message'] = "El usuario no existe.";
		}
		$token = base64_encode($user_id);
		header("Location: index.php?action=resetPassword&tc=".$token);
	}
	
}