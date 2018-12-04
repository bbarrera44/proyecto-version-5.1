<?php
	include ('menu.php');
	require_once '../models/conexion.php';

  if (empty($_COOKIE['usuario'])) {
    header('Location: index.php');
  }

if(isset($_GET['aprendices'])) $dato=$_GET['aprendices'];
if(isset($_GET['usuario'])) $dato=$_GET['usuario'];

?>
<!--Pagina de contenido-->
<!---------------------------------------------------------------------------------->
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="icon" href="img/logo.png" />
	<title>SABAJ</title>
<link rel="stylesheet" type="text/css" href="css/css_usuario.css">
<script type="text/javascript">
	function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;

        return /\d/.test(String.fromCharCode(keynum));
        }
</script>
</head>
<body>
<!--Contenedor-->
<?php

if (isset($_GET['aprendices'])) {


if ($_GET['aprendices'] == 'novedades' ||  $_GET['aprendices'] == 'aprendices' ||
      $_GET['aprendices'] == 'consultar_novedad' ||  $_GET['aprendices'] == 'ingresar_aprendiz' ||
      $_GET['aprendices'] == 'info_aprendiz' ||  $_GET['aprendices'] == 'fichas' ||
      $_GET['aprendices'] == 'consultar_fi' ||  $_GET['aprendices'] == 'con_nov_aprendiz' ||
      $_GET['aprendices'] == 'novedades' ||  $_GET['aprendices'] =='con_novedad' ||
      $_GET['aprendices'] =='info_aprendiz' ||  $_GET['aprendices'] =='listado_aprendices')

      {	include ("formularios/".$dato.".php");

          }elseif (empty($_GET['aprendices']) || empty($_GET['usuario'])) { header("Location: ../index.php"); }else{ header("Location: ../index.php"); }

    }elseif (isset($_GET['usuario'])) {
      if ($_GET['usuario'] =='usuario' ||
      $_GET['usuario'] =='actualizar' ||  $_GET['usuario'] =='actualizar' ||
      $_GET['usuario'] =='modificar_admin' ||  $_GET['usuario'] =='modificar_usuario' ||
      $_GET['usuario'] =='modificar_admin' ||  $_GET['usuario'] =='modificar_apren') {

       include ("formularios/".$dato.".php");

      }elseif (empty($_GET['aprendices']) || empty($_GET['usuario'])) { header("Location: ../index.php"); }else{ header("Location: ../index.php"); }
    }
	include ("pie.php");
?>
</body>
</html>
