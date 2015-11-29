<!DOCTYPE html>
<html lang="es">
<head>
<link rel="shortcut icon" href="<?php echo PATH_IMAGES; ?>/favicon.ico">
<meta charset="UTF-8" />
<title>Areas Profesionales</title>
<link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS . '/style.css'; ?>" media="screen" />
<script type="text/javascript" src="<?php echo PATH_JS . '/jquery.js'; ?>"></script>
<script type="text/javascript" src="<?php echo PATH_JS . '/jquery.validate.min.js'; ?>"></script>
<script type="text/javascript" src="<?php echo PATH_JS . '/area.js'; ?>"></script>
</head>
<body>
<?php include_once PATH_TEMPLATE.'/header.php';?>
<section>
<div class="content">	
<h2>Insertar Area</h2>
<?php if ($message != '') : ?>
<div class="message">
	<?php echo $message; ?>
</div>
<?php endif; ?>

<form action="index.php?action=saveData" method="post" id="editArea" name="editArea">
<table class="table" style="width: 400px;">
<tr>
	<td valign="top">Nombre:</td>
	<td><input name="name" type="text" value="<?php echo $area['name']; ?>"></td>	
</tr>
<tr>
	<td valign="top">Descripción:</td>
	<td><input name="description" type="text" value="<?php echo $area['description']; ?>"></td>	
</tr>
<tr>
	<td>Estado:</td>
	<td><input type="checkbox" name="is_active" value="1" <?php if ($area['is_active']) :
	echo 'checked';
endif; ?>></td>	
</tr>

<tr><td colspan="2"align="center">
<input type="hidden" name="id" value="<?php echo $area['id']; ?>">
<input type="submit" value="Guardar" class="buttom-inside"/>
<input type="button" name="cancel" value="Cancelar" id="button_icancel" onclick="javascript:location.href='index.php';" class="buttom-inside"/>
</td></tr>

</table>
</form>
</div>
</section>
<?php include_once PATH_TEMPLATE.'/footer.php';?>
</body>
</html>
