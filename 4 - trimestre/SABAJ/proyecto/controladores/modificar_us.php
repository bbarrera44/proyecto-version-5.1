<?php
session_start();
//require_once '../controladores/consultar.php';
require_once '../models/usuario.php';

//Security::permisos();

Usuario::modificarUsuarioAdministrador($_POST['us_nombre_usuario'],$_POST['us_cargo'],$_POST['us_documento'],
                                       $_POST['us_primer_nombre'],$_POST['us_segundo_nombre'],
                                       $_POST['us_primer_apellido'],$_POST['us_segundo_apellido'],
                                       $_POST['us_correo'],$_POST['us_telefono'],$_POST['us_celular'],$_POST['us_direccion']);

header("Location: controlar.php?n=completado_ac")
?>
