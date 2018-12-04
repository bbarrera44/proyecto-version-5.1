<?php
require 'usuario.php';

//Clase Apoyo Administracion
/*=============================================================================================*/
class Apoyo_administracion extends Usuario{

    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $tipo_documento;
    public $documento;
    public $ficha;
    public $telefono;
    public $celular;

//Metodo para consultar las novedades de los aprendices
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

      if ($aprendiz != 0 && $documento != 0) {
        
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

      }elseif ($aprendiz == 0 && $documento == 0) {

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
    }
//Metodo para ingresar las novedades de los aprendices
/*=============================================================================================*/
    public static function ingresarNovedad($primer_nombre, $segundo_nombre,
                                    $primer_apellido, $segundo_apellido,
                                    $tipo_documento, $documento, $ficha,
                                    $telefono, $celular){

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

      setcookie("nov","El aprendiz ya una novedad.",time()+10,"/");
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

      }elseif ($ficha_reingreso!=0) {

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

//Metodo para consultar fichas
/*=============================================================================================*/
    public static function consultarFicha($ficha){

    $fic=Conexion::conectar('localhost','proyecto','root','');

    $ficha=$fic->prepare("SELECT * FROM ficha");
    $ficha->execute();

    return $ficha;
    }

//Metodo para ingresar fichas
/*=============================================================================================*/
    public static function ingresarFicha($ficha){

      $fic=Conexion::conectar('localhost','proyecto','root','');

      $fich=$fic->prepare("SELECT * FROM ficha WHERE numero_ficha=:numero");
      $fich->execute(array(':numero' => $ficha ));

      if ($row=$fich->fetch(PDO::FETCH_ASSOC)) {

        setcookie("ficha","<div class=\"alert alert-danger\" role=\"alert\">
                              La ficha ya se encuentra registrada.
                          </div>",time()+10,"/");
        header("Location: ../vistas/consultar.php?aprendices=fichas");
        
      }else{

      $fichaa=$fic->prepare("INSERT INTO ficha (id_ficha,numero_ficha,id_programa) VALUES (NULL, :numero_ficha, :programa)");
      $fichaa->execute(array(':numero_ficha' => $ficha, ':programa' => $this->ficha));

      setcookie("ficha","<div class=\"alert alert-primary\" role=\"alert\">
                            La ficha fue registrada correctamente.
                </div>",time()+10,"/");
        header("Location: ../vistas/consultar.php?aprendices=fichas");
      } 
    }
//Metodo para modificar la novedad de los aprendices
/*=============================================================================================*/
    public static function modificarNovedad($primer_nombre, $segundo_nombre,
                                     $primer_apellido, $segundo_apellido,
                                     $tipo_documento, $documento, $ficha,
                                     $telefono, $celular){


    }
}

?>
