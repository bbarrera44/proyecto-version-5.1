<?php 
	setcookie("aprendiz",$_REQUEST['documento_aprendiz'],time()+20,"/");
	header("Location: ../vistas/consultar.php?aprendices=consultar_novedad");
?>