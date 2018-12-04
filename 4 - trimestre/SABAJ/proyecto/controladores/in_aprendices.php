<?php 

//require_once '../models/security.php';
require_once '../models/aprendiz.php';

//Security::permisos();


$aprendiz=new Aprendiz();
$aprendiz->trimestre=$_POST['resultado'];
$aprendiz->ingresarAprendiz($_POST['primer_nombre'],$_POST['segundo_nombre'],$_POST['primer_apellido'],$_POST['segundo_apellido'],$_POST['tipo_documento'],$_POST['documento'],$_POST['telefono'],$_POST['celular'],$_POST['ficha'],$_POST['genero']);



?>
