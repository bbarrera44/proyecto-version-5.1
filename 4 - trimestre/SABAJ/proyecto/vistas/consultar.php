<?php
  include 'menu.php';
  if (empty($_COOKIE['usuario'])) {
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
      <link rel="stylesheet" type="text/css" href="css/css_usuario.css">
</head>

<body>
<!--Cuerpo-->
<!---------------------------------------------------------------------------------------------------------->
<?php

if ($_GET['aprendices'] == 'novedades' ||  $_GET['aprendices'] == 'aprendices' ||
      $_GET['aprendices'] == 'consultar_novedad' ||  $_GET['aprendices'] == 'ingresar_aprendiz' ||
      $_GET['aprendices'] == 'info_aprendiz' ||  $_GET['aprendices'] == 'fichas' ||
      $_GET['aprendices'] == 'consultar_fi' ||  $_GET['aprendices'] == 'con_nov_aprendiz' ||
      $_GET['aprendices'] == 'novedades' ||  $_GET['aprendices'] =='con_novedad' ||
      $_GET['aprendices'] =='info_aprendiz' ||  $_GET['aprendices'] =='usuario' ||
      $_GET['aprendices'] =='actualizar' ||  $_GET['aprendices'] =='actualizar' ||
      $_GET['aprendices'] =='modificar_admin' ||  $_GET['aprendices'] =='modificar_usuario' ||
      $_GET['aprendices'] =='modificar_admin' ||  $_GET['aprendices'] =='modificar_apren' ||
      $_GET['aprendices'] =='listado_aprendices')

       {
  		include ("formularios/".$_GET['aprendices'].".php");
  		}elseif (empty($_GET['aprendices'])) {
            header("Location: ../index.php");
      }else{
            header("Location: ../index.php");
      }
  include ("pie.php");
?>
</body>
</html>
