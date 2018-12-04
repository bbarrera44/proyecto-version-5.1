<?php
//Clase Conexion
/*=============================================================================================*/
class Conexion{

//Metodo para la conexion Global
/*=============================================================================================*/
	public static function conectar($host,$database,$user,$password){
		$cxn = new PDO('mysql:host='.$host.';dbname='.$database, $user, $password);

		return $cxn;
	}
}
?>
