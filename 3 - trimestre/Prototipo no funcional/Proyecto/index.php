<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <link rel="icon" href="img/logo.png" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no">
  <title>SABAJ</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/estilomenu.css">

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">
$(window).on('scroll', function(){
	if($(window).scrollTop()){
		$('nav').addClass('black');
		}
		else
		{
			$('nav').removeClass('black');
			}
    })
	
$(document).ready(function(){
		$(".menu h4").click(function(){
			$(".nav ul li").toggleClass("active");
			
			});
    });
</script>

</head>

<body>

<div class="responsive-bar">
  <div class="logo">
    <img src="img/logo.png">
  </div>
</div>

<?php 

include('menu.php'); 

include('slider.php'); 

?>
<section class="sec2">
<div class="todo">


<table width="900" border="1" align="center" class="table">
  <tbody>
    <tr>
      <td height="198" colspan="5">
        <br>
          <br>
            <h1 class="h1"><b><center>SABAJ<br><hr color="#FFFFFF"></center></b></h1>
          <br>
        <br>
      </td>
    </tr>
    <tr>
      <td width="33%">
        <h1><b><center>Novedades</center></b></h1><br>
          <h5><center>Página web desarrollada para la optimización de cada una de las novedades, con la intención de agilizar cada una de las novedades que se presentan en la Sede Colombia.</center></h5>
      </td>
      <td width="33%">
        <h1><b><center>Novedades</center></b></h1><br>
          <h5><center>Página web desarrollada para la optimización de cada una de las novedades, con la intención de agilizar cada una de las novedades que se presentan en la Sede Colombia.</center></h5>
      </td>     
      <td width="33%">
        <h1><center><b>Novedades</b></center></h1><br>
          <h5><center>Página web desarrollada para la optimización de cada una de las novedades, con la intención de agilizar cada una de las novedades que se presentan en la Sede Colombia.</center></h5><br><br>
      </td>
    </tr>
    <tr>
      <td colspan="5"><br><br><hr color="#FFFFFF"><img src="img/teclado.jpg" width="100%" height="300" alt="SENA CEET" title="SENA CEET"  /> </td>
    </tr>
  </tbody>
</table>

</h5>
</p>
</div>
</section>

<script src="../js/jquery.js"></script>
<script src="../js/jquery.js"></script>
<?php include('pie.php'); ?>
</body>
</html>