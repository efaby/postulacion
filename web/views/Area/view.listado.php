<!DOCTYPE html>
<html lang="es">
<head>
<link rel="shortcut icon" href="<?php echo PATH_IMAGES; ?>/favicon.ico">
<meta charset="UTF-8" />
<title>Areas Profesionales</title>
<link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS.'/area.css'; ?>" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo PATH_CSS.'/style.css'; ?>" media="screen" />
<script type="text/javascript">
function redirect(id){
	var url = 'index.php?action=deleteData&id=' + id;
	location.href = url;
}
</script>
</head>
<body>
<?php include_once PATH_TEMPLATE.'/header.php';?>
<section>
<div class="content">
<h2>Listado de Areas</h2>
<?php if (isset($_SESSION['message'])&& ($_SESSION['message'] != '')):?>
<div class="message">
	<?php echo $_SESSION['message'];$_SESSION['message'] = ''?>
</div>
<?php endif;?>
<button onclick="javascript:location.href='index.php?action=insertData'" class="buttom-inside" style="float: right; margin-bottom: 10px; margin-right: 10px;">Nuevo</button>
<table class="table">
<tr><th width="25%">Nombre</th><th>Descripción</th><th width="7%">Estado</th><th width="18%">Acciones</th></tr>
<?php foreach ($datos as $dato) { ?>
<tr>
	<td><?php echo $dato["name"]; ?></td>
	<td><?php echo $dato["description"]; ?></td>
	<td align="center"><?php if($dato["is_active"]==1): ?><img src="<?php echo PATH_IMAGES.'/accept.png'; ?>"><?php else: ?><img src="<?php echo PATH_IMAGES.'/cancel.png'; ?>"><?php endif;?></td>	
	<td align="center">
		<button onclick="javascript:location.href='index.php?action=editData&id=<?php echo $dato['id'];?>'" class="buttom-inside">Editar</button>
		<button onclick="javascript:if(confirm('Est\xE1 seguro que desea eliminar el elemento seleccionado?')){redirect(<?php echo $dato['id'];?>);}" class="buttom-inside">Eliminar</button>
	</td>	
	
</tr>
<?php }?>
<?php if((isset($paginator))and ($totalItems>0)):?>
<tr>
<td colspan="4" align="center">
<?php $paginator->viewPaginator();?>
</td>
</tr>
<?php endif;?>
</table>
<form action="index.php" method="post" id="listForm" name="listForm" >
<input type="hidden" name="listForm_offset" id="listForm_offset" value="1">
</form>
</div>
</section>
<?php include_once PATH_TEMPLATE.'/footer.php';?>
</body>
</html>
