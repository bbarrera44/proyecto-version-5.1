<?php 
require_once '../models/ficha.php';

$trimestre = isset($_POST['trimestre']) ? $_POST['trimestre'] : "";
$jornada = isset($_POST['jornada']) ? $_POST['jornada'] : "";
$tipo = isset($_POST['tipo_formacion']) ? $_POST['tipo_formacion'] : "";

Ficha::ingresarFicha($_POST['n_ficha'],$_POST['programa'],$_POST['etapa'],$trimestre,$jornada,$tipo);
?>