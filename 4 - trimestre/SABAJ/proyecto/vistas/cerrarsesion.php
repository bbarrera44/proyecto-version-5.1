<?php
//Cierre de Sesion
/*==========================================================================*/
if (empty($_COOKIE['usuario'])) {
    header('Location: index.php');
  }
	setcookie("usuario","",time()-1000,"/");

	header("location: index.php")
?>
