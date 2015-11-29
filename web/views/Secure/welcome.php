<?php ?>
<!DOCTYPE html>
<html lang="es">
<head>
<link rel="shortcut icon" href="<?php echo PATH_IMAGES; ?>/favicon.ico">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Bienvenido</title>
<link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS . '/style.css'; ?>" media="screen" />
</head>
<body>
<?php include_once PATH_TEMPLATE.'/header.php';?>
<section>
<h2>Bienvenido<?php echo $_SESSION['SESSION_USER']['names'];?></h2>
</section>
<?php include_once PATH_TEMPLATE.'/footer.php';?>
</body>
</html>