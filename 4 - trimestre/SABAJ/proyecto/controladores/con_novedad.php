<?php  

require_once '../models/administrador.php';

$documento=$_SESSION['documento'];
$filtro=$_SESSION['fil'];
	$aprendiz=Administrador::consultarNovedad($filtro,$documento);

setcookie("aprendiz",$aprendiz,time()+30,"/");
header("Location:../vistas/consultar.php?aprendices=consultar_novedad")
?>