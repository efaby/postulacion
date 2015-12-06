<?php 	
	define('HOSTNAME_DATABASE', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', 'sistemas');
	define('DATABASE', 'postulacion_docente');
	define('PATH_MODELS', PATH_ROOT."/models");
	define('PATH_CONTROLLERS', PATH_ROOT."/controllers");
	define('PATH_VIEWS', PATH_ROOT."/web/views");
	define('PATH_IMAGES',  "../../images");
	define('PATH_IMAGES_USER',  "../../assets/images/users/");
	define('PATH_FILES_USER',  "../../files/");
	define('PATH_JS',  "../../js");
	define('PATH_CSS', "../../assets/css");
	define('PATH_TEMPLATE', "../../template");
	define('PATH_FILES', PATH_ROOT."/web/files/");
	define('PATH_FILES_IMAGE', PATH_ROOT."/web/assets/images/users/");
	define('PATH_HELPERS', PATH_ROOT."/helpers");		
	define('PUBLIC_URLS', serialize(array('/index.php','Register/index.php','Register/index.php?action=register','Secure/index.php','Secure/index.php?action=validationUser','Secure/index.php?action=recoverPassword','Secure/index.php?action=recoverPass','Secure/index.php?action=resetPassword','Secure/index.php?action=resetPass', 'Register/index.php?action=loadCity', 'Register/index.php?action=saveData', 'Secure/index.php?action=download','.php')));
	
?>