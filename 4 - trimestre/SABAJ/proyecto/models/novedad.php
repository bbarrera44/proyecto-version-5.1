<?php

require_once 'aprendiz.php';
require_once 'conexion.php';

//Clase Novedad
/*=============================================================================================*/
class Novedad extends Aprendiz{

//Atributos
/*=============================================================================================*/
  public $tipo_novedad;
  public $fecha_novedad;
  public $ficha_reingreso;
  public $documento;
  public $motivo;
  public $descripcion;

//Metodo para ingresar la novedad
/*=============================================================================================*/
  public static function ingresarNovedad($tipo_novedad, $fecha_novedad, $documento,
                                         $motivo, $descripcion, $ficha_reingreso){

    $con=Conexion::conectar('localhost','proyecto','root','');

    $aprendiz=$con->prepare("SELECT id_aprendiz FROM aprendiz WHERE documento=:documento");
    $aprendiz->execute(array(':documento' =>  $documento));

    if ($row=$aprendiz->fetch(PDO::FETCH_ASSOC)) {  

      if ($ficha_reingreso==0) {

        $apren=$con->prepare("SELECT novedad.id_aprendiz,id_tipo_novedad FROM novedad 
                                    INNER JOIN aprendiz ON novedad.id_aprendiz=aprendiz.id_aprendiz 
                                    WHERE aprendiz.documento = :aprendiz");
        $apren->execute(array(':aprendiz' =>  $documento));

    if($raw=$apren->fetch(PDO::FETCH_ASSOC)){

      setcookie("nov","El aprendiz ya presenta una novedad.",time()+10,"/");
      header("Location: ../vistas/novedades.php?novedad=novedades");

      }else{
        $in_nov=$con->prepare("INSERT INTO novedad (id_aprendiz,fecha,id_tipo_novedad,ficha_ingresar,motivo,descripcion) 
                               VALUES (:aprendiz, :fecha, :id_tipo_novedad, NULL, :motivo, :descripcion)");
        $in_nov->execute(array(':aprendiz' => $row['id_aprendiz'], ':fecha' => $fecha_novedad, 
                               ':id_tipo_novedad' => $tipo_novedad, ':motivo' => $motivo, 
                               ':descripcion' => $descripcion));

        if ($in_nov) {
          setcookie("nov","Se registro la novedad correctamente.",time()+10,"/");
          header("Location: ../vistas/novedades.php?novedad=novedades");
        }else {
          setcookie("nov","Ocurrio un error, por favor intentar de nuevo.",time()+10,"/");
          header("Location: ../vistas/novedades.php?novedad=novedades");
        }
      }      
    }
  }

  if ($ficha_reingreso!=0) {



    $apren=$con->prepare("SELECT novedad.id_aprendiz,id_tipo_novedad FROM novedad 
                                INNER JOIN aprendiz ON novedad.id_aprendiz=aprendiz.id_aprendiz 
                                WHERE aprendiz.documento = :aprendiz");
    $apren->execute(array(':aprendiz' =>  $row['documento']));
    $raw=$apren->fetch(PDO::FETCH_ASSOC);

      if($raw=$apren->fetch(PDO::FETCH_ASSOC)){

      setcookie("nov","El aprendiz ya una novedad.",time()+10,"/");
      header("Location: ../vistas/novedades.php?novedad=novedades");

      }else{

        $in_nov=$con->prepare("INSERT INTO novedad (id_aprendiz,fecha,id_tipo_novedad,ficha_ingresar,motivo,descripcion) 
                               VALUES (:aprendiz, :fecha, :id_tipo_novedad, :ficha_ingresar, :motivo, :descripcion)");
        $in_nov->execute(array(':aprendiz' => $row['id_aprendiz'], ':fecha' => $fecha_novedad, 
                               ':id_tipo_novedad' => $tipo_novedad, ':ficha_ingresar' => $ficha_reingreso, 
                               ':motivo' => $motivo, ':descripcion' => $descripcion));

        if ($in_nov) {
          setcookie("nov","Se registro la novedad correctamente.",time()+10,"/");
          header("Location: ../vistas/novedades.php?novedad=novedades");
        }else {
          setcookie("nov","Ocurrio un error, por favor intentar de nuevo.",time()+10,"/");
          header("Location: ../vistas/novedades.php?novedad=novedades");
        }
      }
    }
  }

//Metodo para consultar la novedad de un aprendiz
/*=============================================================================================*/
  public static function consultarNovedad($documento){

    $con=Conexion::conectar('localhost','proyecto','root','');
        
    $report_apren=$con->prepare("SELECT * FROM novedad LEFT JOIN aprendiz ON novedad.id_aprendiz=aprendiz.id_aprendiz
                                                      LEFT JOIN ficha ON aprendiz.id_ficha=ficha.id_ficha 
                                                      LEFT JOIN tipo_novedad ON novedad.id_tipo_novedad=tipo_novedad.id_tipo_novedad 
                                                      LEFT JOIN trimestre ON ficha.id_trimestre=trimestre.id_trimestre
                                                      LEFT JOIN etapa ON ficha.id_etapa=etapa.id_etapa                                                      
                                                      LEFT JOIN jornada ON ficha.id_jornada=jornada.id_jornada
                                                      LEFT JOIN tipo_documento ON aprendiz.id_tipo_documento=tipo_documento.id_tipo_documento
                                                      LEFT JOIN tipo_formacion ON ficha.id_tipo_formacion=tipo_formacion.id_tipo_formacion
                                                      LEFT JOIN programa_formacion ON ficha.id_programa=programa_formacion.id_programa
                                                      LEFT JOIN resultados_aprendizaje as ra ON aprendiz.id_resultado=ra.id_resultado
                                                      WHERE aprendiz.documento=:documento ");
        $report_apren->execute(array(':documento' => $documento));

    return $report_apren;
  }

//Metodo para modificar la novedad de un aprendiz
/*=============================================================================================*/
  public static function modificarNovedad($documento){

    $con=Conexion::conectar('localhost','proyecto','root','');

    $act=$con->prepare("SELECT * FROM novedad LEFT JOIN aprendiz ON novedad.id_aprendiz=aprendiz.id_aprendiz
                                              LEFT JOIN ficha ON aprendiz.id_ficha=ficha.id_ficha 
                                              LEFT JOIN tipo_novedad ON novedad.id_tipo_novedad=tipo_novedad.id_tipo_novedad 
                                              LEFT JOIN trimestre ON ficha.id_trimestre=trimestre.id_trimestre
                                              LEFT JOIN etapa ON ficha.id_etapa=etapa.id_etapa                                                      
                                              LEFT JOIN jornada ON ficha.id_jornada=jornada.id_jornada
                                              LEFT JOIN tipo_documento ON aprendiz.id_tipo_documento=tipo_documento.id_tipo_documento
                                              LEFT JOIN tipo_formacion ON ficha.id_tipo_formacion=tipo_formacion.id_tipo_formacion
                                              LEFT JOIN programa_formacion ON ficha.id_programa=programa_formacion.id_programa
                                              LEFT JOIN resultados_aprendizaje as ra ON aprendiz.id_resultado=ra.id_resultado");
    $act->execute();

    return $act;

  }

//Metodo para ver el tipo de novedad
/*=============================================================================================*/
  public static function tipoNovedad(){

    $cxn=Conexion::conectar('localhost','proyecto','root','');

    $nov=$cxn->prepare("SELECT * FROM tipo_novedad");
    $nov->execute();

    return $nov;
  }
}
?>
