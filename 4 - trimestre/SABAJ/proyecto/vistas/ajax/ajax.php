<?php  

require_once '../../models/usuario.php';

class AjaxUsuario
{
	public $valiUs;

	public function valUsuario(){
		
		$datos=$this->valiUs;

		$resp = Usuario::getNombreUsuario($datos);

		if ($resp) {
			
			echo 0;
		}else{

			echo 1;
		}
	}
}

$aj=new AjaxUsuario();
$aj->valiUs=$_POST['valUs'];
$aj->valUsuario();

?>