<?php  

class FiltroAprendices{

	public $filtro;
		
	public function Filtrar(){

		require_once '../../models/conexion.php';

		$aprendices = "<select name=\"filtro2\" class=\"select_reg\" onchange=\"select_fil2(this.value)\">";
		$filtro = "";
		$mayus = $this->filtro;

		$cxn=Conexion::conectar('localhost','proyecto','root','');

		$fil=$cxn->prepare("SELECT * FROM $this->filtro");
		$fil->execute();

		if ($this->filtro == "programa_formacion") {$this->filtro =  "programa"; $mayus = "nombre_".$this->filtro;}
		if ($this->filtro == "ficha") {$mayus = "numero_".$this->filtro;}

		$vary = ucwords($this->filtro);
		$aprendices .= "<option value='' selected disabled>$vary</option>";

		while ($row=$fil->fetch(PDO::FETCH_ASSOC)) {

			$filtro = "id_".$this->filtro;

			$aprendices .= "<option value='$row[$filtro]'>$row[$mayus]</option>";
		}	

		return $aprendices;
	}
}

$aprendiz=new FiltroAprendices();
$aprendiz->filtro=$_POST['dam'];
echo $aprendiz->Filtrar();
?>