<?php  

require_once '../../models/usuario.php';
require_once '../../models/conexion.php';

class AjaxDocumento
{
	public $valDocumento;

	public function valDocumento(){
		
		$datos=$this->valDocumento;

		$cxn=Conexion::conectar('localhost','proyecto','root','');

          $sel=$cxn->prepare("SELECT documento FROM usuario WHERE documento=:documento");
          $sel->execute(array(':documento' => $this->valDocumento ));


		if ($sel->fetch(PDO::FETCH_ASSOC)) {
			
			echo 0;
		}else{

			echo 1;
		}
	}
}

$aj=new AjaxDocumento();
$aj->valDocumento=$_POST['documento'];
$aj->valDocumento();

?>