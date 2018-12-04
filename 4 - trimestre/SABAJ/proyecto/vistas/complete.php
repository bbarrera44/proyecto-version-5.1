<?php 
require '../includes/security.php';
if (empty($_COOKIE['usuario'])) {
    header('Location: index.php');
  }
$complete=new Security();
$complete->permisos();
?>
<!--Pagina-->
<!---------------------------------------------------------------------------------------------------------->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="icon" href="img/logo.png" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>SABAJ</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/css_de_consultar_.css" />
</head>

<body>
<?php include('menu.php');?>
<!--Container-->
<!---------------------------------------------------------------------------------------------------------->
<div class="sino">
<br /><br />
	

<?php

if (isset($_COOKIE['novedad'])) {
	?>
	<h1><b>Ops!</b></h1>
		<h3 style="color:#fff"><?php echo $_COOKIE['novedad']?></h3 ><hr color="#FFFFFF" width="90%">	<br>
		<center>
			<input type="submit" class="submit"  value="Volver"  onclick="javascript:history.back(-1);" />
			<input type="submit" class="submit"  value="Inicio"  onclick="window.location.href='../index.php'" />
		</center>
<?php
setcookie("novedad","",time()-1000,"/");
}else{
?>
<h1>
	<b>Perfecto</b></h1>
	<h5 style="color:#fff; text-align: center;">Se realizo el registro de la novedad correctamente</h5 ><hr color="#FFFFFF" width="90%">	<br>
	<center>
		<input type="submit" class="submit"  value="Inicio"  onclick="window.location.href='../index.php'" />
	</center>
<?php
}
?>

</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>