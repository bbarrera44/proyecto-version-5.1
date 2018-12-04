<?php 
	require_once '../models/administrador.php';
	require_once '../models/conexion.php';

	if(empty($_COOKIE['aprendiz'])){
		$aprendiz=Administrador::consultarNovedad(0);
	}else{
		$aprendiz=Administrador::consultarNovedad($_COOKIE['aprendiz']);
		}

?>	