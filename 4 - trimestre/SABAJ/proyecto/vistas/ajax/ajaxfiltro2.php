<?php  

require_once '../../models/usuario.php';
require_once '../../models/conexion.php';

class Ajaxsi
{
	public $ba1;
	public $ba2;

	public function filtro2(){

		$aplicar = "";
		$bad = $this->ba1;
		if ($this->ba1 == "programa_formacion") {$bad =  "programa";}

		$cxn = Conexion::conectar('localhost','proyecto','root','');

		$fil = $cxn->prepare("SELECT * FROM aprendiz LEFT JOIN ficha ON aprendiz.id_ficha=ficha.id_ficha 
                                                   LEFT JOIN trimestre ON ficha.id_trimestre=trimestre.id_trimestre
                                                   LEFT JOIN etapa ON ficha.id_etapa=etapa.id_etapa                                                      
                                                   LEFT JOIN jornada ON ficha.id_jornada=jornada.id_jornada
												   LEFT JOIN tipo_formacion ON ficha.id_tipo_formacion=tipo_formacion.id_tipo_formacion
												   LEFT JOIN programa_formacion ON ficha.id_programa=programa_formacion.id_programa WHERE $this->ba1.id_$bad = $this->ba2");
		$fil->execute();

		while ($row = $fil->fetch(PDO::FETCH_ASSOC)) {

			$aplicar .= "<tr bgcolor= '#FFF' >
								<th scope='row' > $row[id_aprendiz] </th>
								<td> $row[primer_nombre_aprendiz]  $row[segundo_nombre_aprendiz]</td>
								<td> $row[primer_apellido_aprendiz] $row[segundo_apellido_aprendiz]</td>
								<td> $row[numero_ficha]</td>
								<td> $row[nombre_programa]</td>
								<td> $row[trimestre]</td>
								<td> $row[etapa]</td>
							</tr>";
		}

		return $aplicar;

	}
}

$aj = new Ajaxsi();
$aj->ba2 = $_POST['filtro2'];
$aj->ba1 = $_POST['filtro1'];
echo $aj->filtro2();

?>