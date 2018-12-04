<?php
require_once 'novedad.php';


//Clase Reporte
/*=============================================================================================*/
class Reporte extends Novedad{

//Atributos
/*=============================================================================================*/
  public $documento;
  public $tipo_reporte;
  public $usuario_reporte;

//Metodo para generar el reporte
/*=============================================================================================*/
  public static function generarReporte($documento){	

	 $dmto=Novedad::consultarNovedad($documento);

	 return $dmto;
  }
}
?>
