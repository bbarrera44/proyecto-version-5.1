<?php 
	if (isset($_COOKIE['usuario'])) {
    header('Location: index.php');
  }
?>
<!--Pagina-->
<!---------------------------------------------------------------------------------------------------------->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<link rel="icon" href="img/logo.png" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>SABAJ</title>
	<link rel="stylesheet" type="text/css" href="css/usuario.css">
</head>

<body>
<!--Container-->
<!---------------------------------------------------------------------------------------------------------->
<?php 
include('menu.php');
?>
<br><br><br>
<div class="container">
	<h2 style="color:#FFF;"><b>Recuperar Contraseña</b></h2><br />
	<h5 class="fin">Para recuperar su contraseña porfavor dijite el correo con la que creo su usuario.</h5>
	<h5 class="fin">Solo se recibe @gmail.com (Temporal).</h5>
	<hr color="#999999">
	<br />
	<br />

<form action="../controladores/recuperar_.php" method="post">
<p>Correo</p>
<input type="text" name="correo" placeholder="Correo" required="@">
<br />

  <input type="submit" value="Finalizar">
  
<?php if (isset($_COOKIE['correoo'])) {
	echo $_COOKIE['correoo'];
	setcookie('correoo',"",time()-1000,"/");
} ?>
</form>

</div>
<?php include 'pie.php'; ?>
</body>
</html>