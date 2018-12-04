<?php

require_once 'conexion.php';
//Clase Seguridad
/*=============================================================================================*/
class Seguridad
{

//Atributos
/*=============================================================================================*/
  public $contrasena;

//Constructor
/*=============================================================================================*/
  function __construct($contrasena){
    $this->contrasena=$contrasena;
  }

//Metodo para encriptar la contraseña
/*=============================================================================================*/
  public function encriptarContrasena(){

  $con_encryp=password_hash($this->contrasena, PASSWORD_BCRYPT, array("cost" => 15));

  return $con_encryp;
  }
//Metodo para verrificar la contraseña
/*=============================================================================================*/
  public function verificar(){

  	$con=Conexion::conectar('localhost','proyecto','root','');

  	$contrasena=$con->prepare("SELECT contrasena FROM usuario WHERE nombre_usuario=:nombre_usuario");
  	$contrasena->execute(array(':nombre_usuario' => $_COOKIE['usuario']));

  	if ($row=$contrasena->fetch(PDO::FETCH_ASSOC)) {
  		
  		if (password_verify($this->contrasena,$row['contrasena'])) {
  			header("Location: ../controladores/controlar.php?n=usuario");
  		}else{
  			setcookie("mal_con","Contraseña incorrecta",time()+30,"/");
  			header("Location: ../vistas/index.php");
  		}
  	}
  }
}
?>
