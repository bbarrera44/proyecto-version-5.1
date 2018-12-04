<?php
require 'usuario.php';

//Clase Bienestar
/*=============================================================================================*/
class Bienestar extends Usuario{

//Atributos
/*=============================================================================================*/
    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $tipo_documento;
    public $documento;

//Metodo para consultar novedad
/*=============================================================================================*/
    public static function consultarNovedad($documento){

          require_once '../controladores/Zebra_Pagination-master/Zebra_Pagination.php';

      $con=Conexion::conectar('localhost','proyecto','root','');

      $that=$con->prepare("SELECT COUNT(*) as cantidad FROM aprendiz");
      $that->execute();

      $t=$that->fetch(PDO::FETCH_ASSOC);
       
      $result=10;

      $paginacion=new Zebra_Pagination();
      $paginacion->records($t['cantidad']);
      $paginacion->records_per_page($result);

      if ($documento != 0) {
        
        $con_ap=$con->prepare("SELECT * FROM novedad LEFT JOIN aprendiz ON aprendiz.id_aprendiz=novedad.id_aprendiz
                                                      LEFT JOIN tipo_novedad ON novedad.id_tipo_novedad=tipo_novedad.id_novedad 
                                                      LEFT JOIN trimestre ON aprendiz.id_trimestre=trimestre.id_trimestre
                                                      LEFT JOIN etapa ON aprendiz.id_etapa=etapa.id_etapa                                                      
                                                      LEFT JOIN jornada ON aprendiz.id_jornada=jornada.id_jornada
                                                      LEFT JOIN tipo_formacion ON aprendiz.id_tipo_formacion=tipo_formacion.id_tipo_formacion
                                                      LEFT JOIN ficha ON aprendiz.id_ficha=ficha.id_ficha 
                                                      LEFT JOIN programa_formacion ON ficha.id_programa=programa_formacion.id_programa
                                                      WHERE aprendiz.documento=:documento");
        $con_ap->execute(array(':aprendiz' => $aprendiz, ':documento' => $documento));

      }elseif ($documento == 0) {

        $con_ap=$con->prepare("SELECT * FROM novedad LEFT JOIN aprendiz ON aprendiz.id_aprendiz=novedad.id_aprendiz
                                                      LEFT JOIN tipo_novedad ON novedad.id_tipo_novedad=tipo_novedad.id_novedad 
                                                      LEFT JOIN trimestre ON aprendiz.id_trimestre=trimestre.id_trimestre
                                                      LEFT JOIN etapa ON aprendiz.id_etapa=etapa.id_etapa                                                      
                                                      LEFT JOIN jornada ON aprendiz.id_jornada=jornada.id_jornada
                                                      LEFT JOIN tipo_formacion ON aprendiz.id_tipo_formacion=tipo_formacion.id_tipo_formacion
                                                      LEFT JOIN ficha ON aprendiz.id_ficha=ficha.id_ficha 
                                                      LEFT JOIN programa_formacion ON ficha.id_programa=programa_formacion.id_programa
                                                      LIMIT " . (($paginacion->get_page() - 1) * $result).",". $result );
        $con_ap->execute();
      }

      setcookie("pagination",$paginacion->render(),time()+1000*1000,"/");
      setcookie("pag",$paginacion->render(),time()+1000*1000,"/");

      return $con_ap;
    }
}
?>
