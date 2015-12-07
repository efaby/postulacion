<?php $title = "Bienvenida"?>
<?php include_once PATH_TEMPLATE.'/header.php';?>

<div class="section">
<div class="content">
<div class="container">

<div class="title-home">Bienvenido <?php echo "Usuario ".$_SESSION['SESSION_USER']['nombres'];?></div>


</div>
</div>
</div>
<?php include_once PATH_TEMPLATE.'/footer.php';?>
</body>
</html>