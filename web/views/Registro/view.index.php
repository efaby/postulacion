<?php $title = "Activación de Cuenta";?>
<?php include_once PATH_TEMPLATE.'/header.public.php';?>

<div class="section">
<div class="content">
<div class="container">

<div class="title-home">
	<?php if($activo):?>
	<?php $boton = "Iniciar Sesión";  
	if($usuario['tipo_usuario_id']==3){
		echo "Su Usuario ha sido Activado. Por favor inicie sesión en el sitema para que complete sus datos y pueda postular por alguna vacante.";
	} else {
	echo "Su Usuario ha sido Activado. Por favor inicie sesión en el sitema para que pueda ejecutar sus Tareas.";
	}
	?>
<?php else:?>
<?php $boton = "Regresar"; echo "Su registro ha sido procesado con éxito. Por favor revice su correo electrónico para que pueda activar su cuenta.";?>
<?php endif;?>	
	<p>
	<br>
	<a href="../../index.php" class="btn btn-info btn-learn-more"><?php echo $boton; ?></a></p>
</div>


</div>
</div>
</div>
<?php include_once PATH_TEMPLATE.'/footer.php';?>
</body>
</html>