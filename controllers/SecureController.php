<?php
require_once(PATH_MODELS."/SecureModel.php");
require_once(PATH_PAGINATOR."/paginator.php");

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
		$flag = false;
		$model = new SecureModel();
		
		$login = $model->clean($_POST['login']);
		$password = $model->clean($_POST['password']);

		if($login == '')
		{
			$message[] = 'Por favor ingrese un usuario.';
			$flag = true;
		} else {
			$reg_exp_login = "/^[0-9]+$/";
			if (!preg_match($reg_exp_login, $login))
			{
				$message[] = 'Por favor ingrese sólo números.';
				$flag = true;
			}
		}		
		if($password == '')
		{
			$message[] = 'Por favor ingrese una contraseña.';			
			$flag = true;
		} else {
			$reg_exp_password = "/^[a-zA-ZáéíóúÁÉÍÓÚñÑ0-9\s\.\_\-\$\#\&\*\+\=\?\¿]+$/";
			if (!preg_match($reg_exp_password, $password)){
				$message[] = 'Por favor ingrese un contraseña coherente.';
				$flag = true;
			}
		}		
		
		
		if(!$flag){
			$result= $model->validationUser($login, $password);
			if($result)
			{
				session_regenerate_id();
				$result['urls'] = $model->getUrlsAccess($result["user_type_id"]);
				$_SESSION['SESSION_USER'] = $result;			
				session_write_close();
				$urlWeb = $this->getPrefixUrl();
				header("location: ".$urlWeb."views/Secure/index.php?action=welcome");
				exit();
			} else {
				$message[] = 'Credenciales Inválidas.';
			}			
		}		
		$_SESSION['message'] = $message;
		session_write_close();
		header("location: index.php");
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
	
	public function insertData(){
		$user =  Array ( 'id' => '' ,'identity_card' => '','names' => '','lastnames' => '','name_user' => '');
		$model = new SecureModel();
		$userType = $model->getCatalog("user_type");
		$cities = $model->getCatalog("city");
		require_once "view.insertar.php";
	}
	
	public function editData(){
		$model = new SecureModel();
		$user = $model->getUser();
		$model = new model();
		$userType = $model->getCatalog("user_type");
		$cities = $model->getCatalog("city");
		require_once "view.insertar.php";
	}
	
	public function saveData(){
		$model = new SecureModel();
		$datos = $model->saveUser();
		header('Location: index.php');
	}
	
	public function deleteData(){
		$model = new SecureModel();
		$datos = $model->deleteUser();
		header('Location: index.php');
	}
	
	private function getPrefixUrl(){
		$url = $_SERVER['REQUEST_URI'];
		$urlWeb = '';
		if(strpos($url, "/views/")){
			$urlWeb = "../../";
		}
		return $urlWeb;
	}
	
	public function editActive(){
		$model = new SecureModel();
		try{
			$datos = $model->editActive();		
			$_SESSION['message'] = "Se ha cambiado el estado satisfactoriamente.";
		}
		catch (Exception $e){
			$_SESSION['message'] = $e->getMessage();
		}
		header('Location: index.php?action=displayList');
	}
	
	public function changePasswordData(){
		$passwd["p1"] = $_POST['password'];
		$passwd["p2"] = $_POST['passwordNew'];
		$passwd["p3"] = $_POST['repeatPasswordNew'];
		$user = $_SESSION['SESSION_USER']['id'];
		$message = $this->validate($passwd,$user);		
		if($message == ''){
			$model = new SecureModel();
			try {
				$model->changePassword($passwd["p2"],$user);
				$_SESSION['message'] = "Su contraseña ha sido cambiada éxitosamente.";
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
			$_SESSION['message'] = "Por favor revice su Email. Se ha enviado un link para resetear su contraseña.";
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
	
	private function sendMail($user,$token){
		$email_to  = $user["email"]; // atención a la coma
		$email_subject = 'Reseteo de Password.';
		$email_from = EMAIL;
		// mensaje
		$message = '<table>
					    <tr>
					      <td>Estimado '.$user["names"].',</td>
					    </tr>
					    <tr>
					      <td> Para resetear su contrase&ntilde;a por favor ingrese <a href="http://dominio/web/views/Secure/index.php?action=resetPassword&tc='.$token.'">aqui</a>
					      	<br><br>
					      	La Administraci&oacute;n.
					      </td>
					    </tr>
					  </table>';
	
		// Para enviar un correo HTML, debe establecerse la cabecera Content-type
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
	
		$headers .= 'From: Bolsa de Empleo Dominio <'.$email_from.">\r\n".
				'Reply-To: '.$email_from."\r\n" .
				'X-Mailer: PHP/' . phpversion();
		@mail($email_to, $email_subject, $message, $headers);
	}
	
	public function download(){
	
		if (!isset($_GET['file']) || empty($_GET['file'])) {
			exit();
		}
		$root = PATH_FILES;
		$file = basename($_GET['file']);
		$path = $root.$file;
		$type = '';
	
		if (is_file($path)) {
			$size = filesize($path);
			if (function_exists('mime_content_type')) {
				$type = mime_content_type($path);
			} else if (function_exists('finfo_file')) {
				$info = finfo_open(FILEINFO_MIME);
				$type = finfo_file($info, $path);
				finfo_close($info);
			}
			if ($type == '') {
				$type = "application/force-download";
			}
			
			header("Content-Type: $type");
			header("Content-Disposition: attachment; filename=$file");
			header("Content-Transfer-Encoding: binary");
			header("Content-Length: " . $size);
			print($file);
			exit();
			readfile($path);
		} else {
			die("El archivo no existe.");
		}
	}
}