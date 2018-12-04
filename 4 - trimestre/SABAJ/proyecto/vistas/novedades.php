<?php 
if (empty($_COOKIE['usuario'])) {
    header('Location: index.php');
  }
  include('menu.php');

?>
<!--Pagina-->
<!---------------------------------------------------------------------------------------------------------->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="icon" href="img/logo.png" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>SABAJ</title>  
  <link rel="stylesheet" type="text/css" href="css/css_novedad.css">
<!--Scripts-->
<!---------------------------------------------------------------------------------------------------------->
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
<!--Container-->
<!---------------------------------------------------------------------------------------------------------->

  <?php
  if ($_GET['novedad'] == 'novedades' ||   $_GET['novedad'] == 'aprendices' ||
      $_GET['novedad'] == 'consultar_novedad' ||  $_GET['novedad'] == 'ingresar_aprendiz' ||
      $_GET['novedad'] == 'info_aprendiz' ||  $_GET['novedad'] == 'fichas' ||
      $_GET['novedad'] == 'consultar_fi' ||  $_GET['novedad'] == 'con_nov_aprendiz' ||
      $_GET['novedad'] == 'novedades' ||  $_GET['novedad'] =='con_novedad' ||
      $_GET['novedad'] =='info_aprendiz' ||  $_GET['novedad'] =='usuario' ||
      $_GET['novedad'] =='actualizar' ||  $_GET['novedad'] =='actualizar' ||
      $_GET['novedad'] =='modificar_admin' ||  $_GET['novedad'] =='modificar_usuario' ||
      $_GET['novedad'] =='modificar_admin' ||  $_GET['novedad'] =='modificar_apren' ||
      $_GET['novedad'] =='listado_aprendices' || $_GET['novedad'] =='actu_nov')

       {   

        include("formularios/".$_GET['novedad'].".php");  
      }elseif (empty($_GET['novedad'])) {
            header("Location: ../index.php");
      }else{
            header("Location: ../index.php");
      }

  include('pie.php');

  ?>
</body>
</html>

