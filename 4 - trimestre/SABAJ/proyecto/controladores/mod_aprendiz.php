<?php
require_once '../includes/security.php';
require_once '../includes/DB.php';

Security::permisos();

$conexion=new Database('localhost','proyecto','root','');
$conexion->actualizarAprendiz($_POST['nombres'],$_POST['apellidos'],$_POST['documento'],$_POST['telefono'],$_POST['celular'],$_POST['ficha'],$_COOKIE['documento']);

header("location: controlar.php?n=completado");

?>