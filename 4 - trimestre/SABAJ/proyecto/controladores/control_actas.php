<?php  
require_once "../models/reporte.php";
require_once '../models/conexion.php';

$con=Conexion::conectar('localhost','proyecto','root','');
	$document=0;
	$i=0;
	while ($document==0) { 
		$i+=1;
		if (isset($_POST['documento'.$i])) {

			$reporte=$con->prepare("SELECT documento FROM aprendiz WHERE documento=:documento");
			$reporte->execute(array(':documento' => $_POST['documento'.$i] ));

		if ($ra=$reporte->fetch(PDO::FETCH_ASSOC)) {
			$document=$ra['documento'];
			}
		}
	}

$registro=Reporte::generarReporte($document);

?>