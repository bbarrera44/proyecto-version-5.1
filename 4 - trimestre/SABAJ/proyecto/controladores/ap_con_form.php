<?php 
		require_once '../models/conexion.php'; 
		require_once '../controladores/Zebra_Pagination-master/Zebra_Pagination.php';

		$apren=Conexion::conectar('localhost','proyecto','root','');
      	$tall=$apren->prepare("SELECT COUNT(*) as cantidad FROM aprendiz");
      	$tall->execute();

      	$bob=$tall->fetch(PDO::FETCH_ASSOC);
       
      	$result=10;

     	$paginacion_ap=new Zebra_Pagination();
      	$paginacion_ap->records($bob['cantidad']);
      	$paginacion_ap->records_per_page($result);
      	$paginacion_ap->base_url();


					$cxn=Conexion::conectar('localhost','proyecto','root','');

		$fil=$cxn->prepare("SELECT * FROM aprendiz LEFT JOIN ficha ON aprendiz.id_ficha=ficha.id_ficha 
                                                   LEFT JOIN trimestre ON ficha.id_trimestre=trimestre.id_trimestre
                                                   LEFT JOIN etapa ON ficha.id_etapa=etapa.id_etapa                                                      
                                                   LEFT JOIN jornada ON ficha.id_jornada=jornada.id_jornada
												   LEFT JOIN tipo_formacion ON ficha.id_tipo_formacion=tipo_formacion.id_tipo_formacion
												   LEFT JOIN programa_formacion ON ficha.id_programa=programa_formacion.id_programa
												   ORDER BY id_aprendiz ASC LIMIT " . (($paginacion_ap->get_page() - 1) * $result).",". $result);
		$fil->execute();		

		while ($row=$fil->fetch(PDO::FETCH_ASSOC)) {

			echo "<tr bgcolor= '#FFF' >
								<th scope='row' > $row[id_aprendiz] </th>
								<td> $row[primer_nombre_aprendiz]  $row[segundo_nombre_aprendiz]</td>
								<td> $row[primer_apellido_aprendiz] $row[segundo_apellido_aprendiz]</td>
								<td> $row[numero_ficha]</td>
								<td> $row[nombre_programa]</td>
								<td> $row[trimestre]</td>
								<td> $row[etapa]</td>
							</tr>";
		}
			
?>