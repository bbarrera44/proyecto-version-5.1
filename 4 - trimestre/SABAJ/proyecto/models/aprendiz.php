<?php

require_once 'conexion.php';

//Clase Aprendiz
/*=============================================================================================*/
class Aprendiz{

//Atributos
/*=============================================================================================*/
    public $primer_nombre;
    public $segundo_nombre;
    public $primer_apellido;
    public $segundo_apellido;
    public $tipo_documento;
    public $documento;
    public $telefono;
    public $celular;
    public $ficha;
    public $genero;

//Metodo para ingresar un aprendiz
/*=============================================================================================*/
    public function ingresarAprendiz($primer_nombre, $segundo_nombre,
                                     $primer_apellido, $segundo_apellido,
                                     $tipo_documento, $documento, $telefono,
                                     $celular, $ficha, $genero){

      $con=Conexion::conectar('localhost','proyecto','root','');

      $sel=$con->prepare("SELECT documento FROM aprendiz WHERE documento=:documento");
      $sel->execute(array(':documento' => $documento));

      if ($row=$sel->fetch(PDO::FETCH_ASSOC)) {
        setcookie("novedad_aprendiz","<div class=\"alert alert-danger\" role=\"alert\">
                                        El aprendiz ya se encuentra registrado.
                                   </div>",time()+1000,"/");
        header("Location: ../vistas/consultar.php?aprendices=ingresar_aprendiz");
      }else {

      $aprendiz=$con->prepare("INSERT INTO aprendiz (id_aprendiz,primer_nombre_aprendiz,segundo_nombre_aprendiz,primer_apellido_aprendiz,
                                                    segundo_apellido_aprendiz, id_tipo_documento,documento,correo,tel_aprendiz,cel_aprendiz,
                                                    id_ficha,id_resultado,id_genero) 
                                                    VALUES 
                                                    (NULL,:primer_nombre,:segundo_nombre,:primer_apellido,:segundo_apellido,:tipo_documento,
                                                    :documento,:correo,:telefono,:celular,:ficha,:resultado,:genero)");

      $aprendiz->execute(array(':primer_nombre' => $primer_nombre, 
                               ':segundo_nombre' => $segundo_nombre, 
                               ':primer_apellido' => $primer_apellido, 
                               ':segundo_apellido' => $segundo_apellido, 
                               ':tipo_documento' => $tipo_documento, 
                               ':documento' => $documento, 
                               ':telefono' => $telefono, 
                               ':celular' => $celular,
                               'correo' => "sena@sena.edu.co", 
                               ':ficha' => $ficha, 
                               ':resultado' => $this->trimestre, 
                               ':genero' => $genero,
                             ));

      setcookie("novedad_aprendiz","<div class=\"alert alert-info\" role=\"alert\">
                                        Se registro al aprendiz correctamente.
                                   </div>"
      ,time()+1000,"/");
      header("Location: ../vistas/consultar.php?aprendices=ingresar_aprendiz");
      }
    }

//Metodo para modificar un aprendiz
/*=============================================================================================*/
    public function modificarAprendiz($primer_nombre, $segundo_nombre,
                                     $primer_apellido, $segundo_apellido,
                                     $tipo_documento, $documento, $telefono,
                                     $celular, $ficha){

      $con=Conexion::conectar('localhost','proyecto','root','');

      $upd=$con->prepare("UPDATE aprendiz SET primer_nombre_aprendiz=:primer_nombre, segundo_nombre_aprendiz=:segundo_nombre, primer_apellido_aprendiz=:primer_apellido, segundo_apellido_aprendiz=:segundo_apellido, id_tipo_documento=:tipo_documento, documento=:documento, tel_aprendiz=:telefono, cel_aprendiz=:celular, id_ficha=:ficha, id_resultado=:resultado WHERE documento=:ses_documento");

      $upd->execute(array(':primer_nombre' => $primer_nombre, ':segundo_nombre' => $segundo_nombre, ':primer_apellido' => $primer_apellido, ':segundo_apellido' => $segundo_apellido, ':tipo_documento' => $tipo_documento, ':documento' => $documento, ':telefono' => $telefono, ':celular' => $celular, ':ficha' => $ficha, ':resultado' => $this->genero, ':ses_documento' => $_SESSION['documento']));


    }

//Metodo para consultar la informacion de un aprendiz
/*=============================================================================================*/
    public static function consultarAprendiz($documento){

      $conA=Conexion::conectar('localhost','proyecto','root','');

      $ap=$conA->prepare("SELECT * FROM aprendiz INNER JOIN ficha ON aprendiz.id_ficha=ficha.id_ficha
                                                 INNER JOIN programa_formacion ON ficha.id_programa=programa_formacion.id_programa
                                                 INNER JOIN resultados_aprendizaje ON aprendiz.id_resultado=resultados_aprendizaje.id_resultado
                                                 WHERE aprendiz.documento=:documento");
      $ap->execute(array(':documento' => $documento ));

      return $ap;

    }

//Metodo para saber el estado de un aprendiz
/*=============================================================================================*/

    public static function estadoAprendiz($documento){

      $con=Conexion::conectar('localhost','proyecto','root','');

      $esA=$con->prepare("SELECT * FROM novedad LEFT JOIN aprendiz ON novedad.id_aprendiz=aprendiz.id_aprendiz
                                                LEFT JOIN tipo_novedad ON novedad.id_tipo_novedad=tipo_novedad.id_tipo_novedad
                                                WHERE aprendiz.documento=:documento");
      $esA->execute(array(':documento' => $documento ));

      if ($row=$esA->fetch(PDO::FETCH_ASSOC)) {

        $that=$row['novedad'];
      }else {
        $that="En formacion";
      }

      return $that;
    }

//Metodo para ver la jornada
/*=============================================================================================*/
    public static function verJornada(){

      $cxn=Conexion::conectar('localhost','proyecto','root','');

      $jor=$cxn->prepare("SELECT * FROM jornada");
      $jor->execute();

      return $jor;
    }

//Metodo para ver el tipo de formacion
/*=============================================================================================*/
    public static function verTipoFormacion(){

      $cxn=Conexion::conectar('localhost','proyecto','root','');

      $tip_for=$cxn->prepare("SELECT * FROM tipo_formacion");
      $tip_for->execute();

      return $tip_for;
    }
}
?>
