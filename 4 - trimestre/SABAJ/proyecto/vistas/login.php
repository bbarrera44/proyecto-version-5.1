<?php
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">



<head>
	<link rel="icon" href="img/logo.png" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>SABAJ</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/css_login.css">
</head>
<body>
	<?php include('menu.php'); ?>
<br />
<form action="../controladores/logiin.php" method="post">
<div class="login-box">
	<img src="img/avatar.png" class="avatar">
	<h1>Iniciar Sesion</h1>
			<p>Usuario</p>
				<input type="text" name="i_usuario" placeholder="Ingrese su usuario">
					<p>Contraseña</p>
						<input type="password" name="i_contrasena" placeholder="Ingrese su contraseña" autocomplete="off">
					<input type="submit" value="Iniciar Sesion">
				<br>
			<center>
		<a href="recuperarcontrasena.php" style="text-decoration: none;">¿Has olvidado tu contraseña?</a><br>
				<a href="registro.php" style="text-decoration: none;">Crear cuenta</a>
					<?php if (isset($_COOKIE["mal_login"])): ?>
					<h4 style="color: Red;"><?php  echo $_COOKIE["mal_login"];?></h4>
					<?php setcookie("mal_login","",time()-1000,"/"); ?>
			<?php endif; ?>
		</center>

	</div>
</form>

</body>
</html>
