<?php 	
	define('HOSTNAME_DATABASE', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', 'sistemas');
	define('DATABASE', 'postulacion_docente'); 
	
	/*define('USERNAME', 'm1to148_postula');
	define('PASSWORD', 'postulante_123');
	define('DATABASE', 'm1to148_postulante');*/
	 
	define('PATH_MODELS', PATH_ROOT."/models");
	define('PATH_CONTROLLERS', PATH_ROOT."/controllers");
	define('PATH_VIEWS', PATH_ROOT."/web/views");
	define('PATH_IMAGES',  "../../assets/images");
	define('PATH_IMAGES_USER',  "../../assets/images/users/");
	define('PATH_FILES_USER',  "../../files/");
	define('PATH_JS',  "../../js");
	define('PATH_CSS', "../../assets/css");
	define('PATH_TEMPLATE', "../../template");
	define('PATH_FILES', PATH_ROOT."/web/files/");
	define('PATH_FILES_IMAGE', PATH_ROOT."/web/assets/images/users/");
	define('PATH_HELPERS', PATH_ROOT."/helpers");	
	define('EMAIL', "no-reply@merito.online");
	define('PUBLIC_URLS', serialize(array('/index.php','index.php?action=validationUser','Registro/index.php','Registro/index.php?action=saveData','Registro/index.php?action=activarCuenta','Secure/index.php?action=closeSession','Secure/index.php?action=recoverPassword','Secure/index.php?action=recoverPass','Secure/index.php?action=resetPassword','Secure/index.php?action=resetPass', 'Register/index.php?action=loadCity', 'Register/index.php?action=saveData','.php')));
	
?>