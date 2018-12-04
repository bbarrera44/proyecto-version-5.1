<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <link rel="icon" href="img/logo.png" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no">
  <title>SABAJ</title>

</head>

<body>
<?php


include('menu.php');
if (isset($_COOKIE['no_reg'])): ?>
  
<script type="text/javascript">
jQuery.noConflict();
  $(function() {

        $('#modare').modal('show');

})(jQuery);
</script>
<?php endif;


include('slider.php');

?>
<br>
<div class="form-group">
      <h1 class="h1"><b><center>SABAJ<br><hr color="#FFFFFF"></center></b></h1>
</div>
<div class="form-row" style="margin-right: 0px; padding-right: 0px;">
  <div class="form-group col-md-4">
        <h1><b><center>Novedades</center></b></h1><br>
          <h5><center>Página web desarrollada para la optimización de cada una de las novedades, con la intención de agilizar cada una de las novedades que se presentan en la Sede Colombia.</center></h5>
  </div>
  <div class="form-group col-md-4">
        <h1><b><center>Alcance</center></b></h1><br>
          <h5><center>El sistema contará con los roles de administrador, apoyo de administración, bienestar e instructor, con los cuales estos podrán gestionar las novedades de los aprendices.</center></h5>
  </div>
  <div class="form-group col-md-4">
        <h1><center><b>Objetivo</b></center></h1><br>
          <h5><center>Diseñar un sistema de información en el cual el usuario pueda realizar de forma fácil y eficiente el registro de novedades.</center></h5><br><br>
  </div>
</div>
<div class="form-group">
  <br><hr color="#FFFFFF"><img src="img/teclado.jpg" width="100%" height="300" alt="SENA CEET" title="SENA CEET"  /> 
</div>
<br>
<br>
<br>
<?php include('pie.php'); ?>
</body>
</html>
