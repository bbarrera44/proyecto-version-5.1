<?php
require_once 'aprendiz.php';
require_once 'conexion.php';

//Clase ficha
/*=============================================================================================*/
class Ficha extends Aprendiz
{
//Atributos
/*=============================================================================================*/
  public $ficha;
  public $programa_formacion;

//Metodo para ingresar ficha
/*=============================================================================================*/
  public static function ingresarFicha($ficha,$programa_formacion,$etapa,$trimestre,$jornada,$tipo){

      $fic=Conexion::conectar('localhost','proyecto','root','');

      $fich=$fic->prepare("SELECT * FROM ficha WHERE numero_ficha=:numero");
      $fich->execute(array(':numero' => $ficha ));

      if ($row=$fich->fetch(PDO::FETCH_ASSOC)) {

        setcookie("ficha","<div class=\"alert alert-danger\" role=\"alert\">
                              La ficha ya se encuentra registrada.
                          </div>",time()+10,"/");
        header("Location: ../vistas/consultar.php?aprendices=fichas");
        
      }else{

        switch ($etapa) {
          case 1:
            $fichaa=$fic->prepare("INSERT INTO ficha (id_ficha,numero_ficha,id_programa,id_jornada,id_trimestre,id_etapa,id_tipo_formacion) 
                                            VALUES (NULL, :numero_ficha, :programa, :etapa, :trimestre, :jornada, :tipo)");
            $fichaa->execute(array(':numero_ficha' => $ficha, 
                                 ':programa' => $programa_formacion, 
                                 ':etapa' => $etapa, 
                                 ':trimestre' => $trimestre, 
                                 ':jornada' => $jornada, 
                                 ':tipo' => $tipo));
            echo $ficha." ".$programa_formacion." ".$etapa." ".$trimestre." ".$jornada." ".$tipo;
            break;

          case 2:
            $fichaa=$fic->prepare("INSERT INTO ficha (id_ficha,numero_ficha,id_programa,id_jornada,id_trimestre,id_etapa,id_tipo_formacion) 
                                            VALUES (NULL, :numero_ficha, :programa, :etapa, NULL, NULL, NULL)");
            $fichaa->execute(array(':numero_ficha' => $ficha, 
                                 ':programa' => $programa_formacion, 
                                 ':etapa' => $etapa));
            break;
        }

      setcookie("ficha","<div class=\"alert alert-primary\" role=\"alert\">
                            La ficha fue registrada correctamente.
                </div>",time()+10,"/");
        header("Location: ../vistas/consultar.php?aprendices=fichas");
      }   
  }

//Metodo para consultar las fichas
/*=============================================================================================*/
  public static function consultarFicha($ficha){

    $fic=Conexion::conectar('localhost','proyecto','root','');
    $ficha=$fic->prepare("SELECT * FROM ficha");
    $ficha->execute();

    return $ficha;
  }

//Ver las fichas registradas en el sistema
/*=============================================================================================*/
  public static function verFicha(){

    session_start();

      require_once '../controladores/Zebra_Pagination-master/Zebra_Pagination.php';

      $fic=Conexion::conectar('localhost','proyecto','root','');
      $that=$fic->prepare("SELECT COUNT(*) as cantidad FROM ficha");
      $that->execute();

      $t=$that->fetch(PDO::FETCH_ASSOC);
       
      $result=9;

      $paginacion=new Zebra_Pagination();
      $paginacion->records($t['cantidad']);
      $paginacion->records_per_page($result);

  	
  	$ficha=$fic->prepare("SELECT * FROM ficha INNER JOIN programa_formacion ON ficha.id_programa=programa_formacion.id_programa
                                              ORDER BY id_ficha ASC LIMIT " . (($paginacion->get_page() - 1) * $result).",". $result);
  	$ficha->execute();

    $_SESSION["pag"]=$paginacion->render();

  	return $ficha;
  }

//Ver los trimestres registrados
/*=============================================================================================*/
  public static function verTrimestre(){

    $trim=Conexion::conectar('localhost','proyecto','root','');
    $trimestre=$trim->prepare("SELECT * FROM trimestre");
    $trimestre->execute();

    return $trimestre;
  }

//Ver etapas 
/*=============================================================================================*/
  public static function verEtapa(){

    $etp=Conexion::conectar('localhost','proyecto','root','');
    $etapa=$etp->prepare("SELECT * FROM etapa");
    $etapa->execute();

    return $etapa;
  }

//Ver las competencias
/*=============================================================================================*/
  public static function verCompetencia(){

    $rel=Conexion::conectar('localhost','proyecto','root','');
    $resultado=$rel->prepare("SELECT * FROM resultados_aprendizaje");
    $resultado->execute();

    return $resultado;
  }
}

?>
