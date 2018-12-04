<?php
require_once 'conexion.php';
//require_once 'usuario.php';

//Clase Administrador
/*=============================================================================================*/
class Administrador /*extends Usuario*/{

//Atributos
/*=============================================================================================*/
    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $tipo_documento;
    public $documento;
    public $ficha;
    public $telefono;
    public $celular;

//Metodo para consultar las novedades
/*=============================================================================================*/

    public static function consultarNovedad($documento){

      session_start();

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
        
        $con_ap=$con->prepare("SELECT * FROM novedad  LEFT JOIN aprendiz ON novedad.id_aprendiz=aprendiz.id_aprendiz
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
        $con_ap->execute(array(':documento' => $documento));

      }
      if ($documento == 0) {

        $con_ap=$con->prepare("SELECT * FROM novedad  LEFT JOIN aprendiz ON novedad.id_aprendiz=aprendiz.id_aprendiz
                                                      LEFT JOIN ficha ON aprendiz.id_ficha=ficha.id_ficha 
                                                      LEFT JOIN tipo_novedad ON novedad.id_tipo_novedad=tipo_novedad.id_tipo_novedad 
                                                      LEFT JOIN trimestre ON ficha.id_trimestre=trimestre.id_trimestre
                                                      LEFT JOIN etapa ON ficha.id_etapa=etapa.id_etapa                                                      
                                                      LEFT JOIN jornada ON ficha.id_jornada=jornada.id_jornada
                                                      LEFT JOIN tipo_documento ON aprendiz.id_tipo_documento=tipo_documento.id_tipo_documento
                                                      LEFT JOIN tipo_formacion ON ficha.id_tipo_formacion=tipo_formacion.id_tipo_formacion
                                                      LEFT JOIN programa_formacion ON ficha.id_programa=programa_formacion.id_programa
                                                      LEFT JOIN resultados_aprendizaje as ra ON aprendiz.id_resultado=ra.id_resultado ORDER BY aprendiz.id_aprendiz ASC
                                                      LIMIT " . (($paginacion->get_page() - 1) * $result).",". $result );
        $con_ap->execute();
        $_SESSION["pagination"]=$paginacion->render();
      }

      setcookie("pag",$t['cantidad'],time()+1000*1000,"/");     

      return $con_ap;
    }

//Metodo para consultar las fichas
/*=============================================================================================*/
    public static function consultarFicha($ficha){

    $fic=Conexion::conectar('localhost','proyecto','root','');

    $ficha=$fic->prepare("SELECT * FROM ficha");
    $ficha->execute();

    return $ficha;

    }

//Metodo para ingresar nuevas fichas al aplicativo
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

//Metodo para obtener el administrador y que no sea el que esta en sesion en ese momento
/*=============================================================================================*/
    public static function getUsuarioAdministrador($documento){

      $con=Conexion::conectar('localhost','proyecto','root','');
      $doca=$con->prepare("SELECT documento from usuario WHERE nombre_usuario=:nombre_usuario");
        $doca->execute(array(':nombre_usuario' => $_COOKIE['usuario']));

      $mento=$doca->fetch(PDO::FETCH_ASSOC);

      if ($documento!=$mento['documento']) {

        $doc=$con->prepare("SELECT * from usuario WHERE documento=:documento");
        $doc->execute(array(':documento' => $documento));
        
        return $doc;

      }elseif ($documento==$mento['documento']) {
        setcookie("no_exist","Usuario no valido.",time()+10,"/");
        header("Location: usuario.php?usuario=usuario");
      }      
    }

//Metodo para modificar el rol
/*=============================================================================================*/
    public static function modificarRol($documento){

      $con=Conexion::conectar('localhost','proyecto','root','');

      $upt=$con->prepare("UPDATE usuario SET id_cargo=:cargo WHERE documento=:documento");
      $upt->execute(array(':cargo' => $cargo, ':documento' => $documento));

      return $upt;
    }

//Metodo para modificar las novedades de los aprendices
/*=============================================================================================*/
    public static function modificarNovedad($primer_nombre, $segundo_nombre,
                                     $primer_apellido, $segundo_apellido,
                                     $tipo_documento, $documento, $ficha,
                                     $telefono, $celular, $motivo, $descripcion){

       $con=Conexion::conectar('localhost','proyecto','root','');

       $ap=$con->prepare("SELECT id_aprendiz FROM aprendiz WHERE documento=:documento");
       $ap->execute(array(':documento' => $documento ));

       $row=$ap->fetch(PDO::FETCH_ASSOC);

       $mn=$con->prepare("UPDATE novedad SET motivo=:motivo, descripcion=:descripcion WHERE id_aprendiz=:aprendiz");
       $mn->execute(array(':motivo' => $motivo,
                          ':descripcion' => $descripcion,
                          ':aprendiz' => $row['id_aprendiz']));

       if ($mn) {
        
        setcookie("act_nov","<div class=\"alert alert-primary\" role=\"alert\">
                                Se actualizo la novedad correctamente
                            </div>",time()+10,"/");
       }else{

        setcookie("act_nov","<div class=\"alert alert-danger\" role=\"alert\">
                                Hubo un error intentar nuevamente
                            </div>",time()+10,"/");
       }       

       header("Location: ../vistas/novedades.php?novedad=actu_nov");

    }
}

?>
