<?php
session_start();
require_once '../models/novedad.php';


if (isset($_POST['ficha_anterior'])) {
	$ficha_anterior=$_POST['ficha_anterior'];
	Novedad::ingresarNovedad($_POST['tipo_novedad'],$_POST['fecha_novedad'],$_SESSION['documento'],$_POST['motivo'],$_POST['descripcion'],$ficha_anterior);	
}

if (empty($_POST['ficha_anterior'])) {
	$ficha_anterior=0;
	Novedad::ingresarNovedad($_POST['tipo_novedad'],$_POST['fecha_novedad'],$_SESSION['documento'],$_POST['motivo'],$_POST['descripcion'],$ficha_anterior);	
}

?>