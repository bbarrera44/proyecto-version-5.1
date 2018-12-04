<?php include('menu.php'); 
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
	<title>SABAJ/Registro</title>
	<link rel="stylesheet" type="text/css" href="css/css_usuario.css">
</head>

<body>
	<br>
	<br>
	<br>
<!--Container-->
<!---------------------------------------------------------------------------------------------------------->
<div class="container">
<?php if (isset($_COOKIE['correcto'])){ ?>

	<h1>Perfecto</h1>
		<hr style="color: #000">
			<center><h2>El usuario fue registrado correctamente</h2></center><br />
		<input type="submit" class="formulario__submit" value="Iniciar Sesion" onclick="document.getElementById('id01').style.display='block'"/>
	<input type="submit" class="formulario__submit" value="Finalizar" onClick=" window.location.href='../index.php' "/>

<?php }else { ?>

	<h1>Ops !</h4><br><br><br>
	<input type="submit" class="formulario__submit" value="Volver al Inicio" onClick=" window.location.href='../registro.php' "/>

<?php } ?>

</div>
	<br>
	<?php include 'pie.php'; ?>
</body>
</html>
