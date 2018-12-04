<?php  
	require_once '../models/seguridad.php';

	$seguridad=new Seguridad($_POST['contrasena_verificar']);
	$seguridad->verificar();
?>