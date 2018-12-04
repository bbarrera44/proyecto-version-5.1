<?php
	//require_once '../models/security.php';
	require_once '../models/usuario.php';

	Usuario::modificarUsuario($_POST['usuario_ac'], $_POST['documento_ac'], $_POST['primer_nombre_ac'],
														$_POST['segundo_nombre_ac'], $_POST['primer_apellido_ac'], $_POST['segundo_apellido_ac'],
														$_POST['direccion_ac'] ,$_POST['correo_ac'] ,$_POST['telefono_ac'],$_POST['celular_ac'],$_POST['contrasena_ac']);

	header("Location: controlar.php?n=completado");

?>
