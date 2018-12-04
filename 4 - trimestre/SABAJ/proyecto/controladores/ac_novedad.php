<?php  
session_start();
require_once '../models/administrador.php';

Administrador::modificarNovedad("0","0","0","0","0",$_SESSION['documento'],"0","0","0",$_POST['motivo'],$_POST['descripcion']);



?>