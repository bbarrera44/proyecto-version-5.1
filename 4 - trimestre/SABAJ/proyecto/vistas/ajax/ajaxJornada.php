<?php  

require_once '../../models/usuario.php';
require_once '../../models/conexion.php';

class AjaxJornada
{
	public $jornada;

	public function jornada(){

		$datos=$this->jornada;
		$jornada="<option value='' disabled selected>Trimestre</option>";

		$con=Conexion::conectar('localhost','proyecto','root','');
		
		if ($datos!=1) {
			
    		$jorn=$con->prepare("SELECT * FROM trimestre");
    		$jorn->execute();

    		while ($row=$jorn->fetch(PDO::FETCH_ASSOC)) {
    			
    			$jornada .= "<option value='$row[id_trimestre]'>$row[trimestre]</option>";
    		}
		}

		if ($datos==1) {
			
    		$jorn=$con->prepare("SELECT * FROM trimestre LIMIT 6");
    		$jorn->execute();

    		while ($row=$jorn->fetch(PDO::FETCH_ASSOC)) {
    			
    			$jornada .= "<option value='$row[id_trimestre]'>$row[trimestre]</option>";
    		}
		}

		return $jornada;
	}
}

$aj=new AjaxJornada();
$aj->jornada=$_POST['jornada'];
echo $aj->jornada();

?>