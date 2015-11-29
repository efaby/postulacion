<?php 
define("PATH_ROOT", $_SERVER['DOCUMENT_ROOT']."/bolsa");
require_once(PATH_ROOT . "/config/config.inc");
?>
<!DOCTYPE html>
<html lang="es">
<head>
<link rel="shortcut icon" href="<?php echo $urlWeb; ?>images/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Error 404</title>
<link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS . '/style.css'; ?>" media="screen" />
</head>
<body>
<?php include_once 'header.php';?>
<section>
<div class="content">
<h2>Página no Encontrada</h2>
<div style="text-align: center; width: 980px; margin: 20px;">
<img src="<?php echo PATH_IMAGES. "/404.png"; ?>" >
</div>
</div>
</section>
<?php include_once 'footer.php';?>
</body>
</html>