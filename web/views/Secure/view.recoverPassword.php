<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
<head>
<link rel="shortcut icon" href="<?php echo PATH_IMAGES; ?>/favicon.ico">
<meta charset="UTF-8" />
<title>Reestablecer Contraseña</title>
<link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS . '/style.css'; ?>" media="screen" />
<script type="text/javascript" src="<?php echo PATH_JS.'/jquery.js'; ?>"></script>
<script type="text/javascript" src="<?php echo PATH_JS.'/jquery.validate.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo PATH_JS.'/recover.js'; ?>"></script>
</head>
<body>
<?php include_once PATH_TEMPLATE.'/header.php';?>
<section>
<div class="content">
	<h2>Recuperar Contraseña</h2>
	<?php if (isset($_SESSION['message'])&& ($_SESSION['message'] != '')):?>
<div class="message">
	<?php echo $_SESSION['message'];$_SESSION['message'] = ''?>
</div>
<?php endif;?>
	<form method="post" action="index.php?action=recoverPass" id="recover" name="recover">
		<table border="0" align="center" cellpadding="2" cellspacing="0" class="table" style="width: 100%;">
			<tr>
				<td>
					<b>Usuario:</b>
				</td>
				<td>
					<input id="identity_card" name="identity_card" type="text" />
				</td>
	    	</tr>
			<tr>
	    		<td colspan="2" align="center">
	      			<input type="submit" name="Ingresar" value="Enviar" class="buttom-inside"/>	      	
	      		</td>
	    	</tr>
		</table>
	</form>
</div>
	</section>
<?php include_once PATH_TEMPLATE.'/footer.php';?>
</body>
</html>