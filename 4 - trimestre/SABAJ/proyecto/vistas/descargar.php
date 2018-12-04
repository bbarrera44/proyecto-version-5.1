<?php
require_once 'fpdf/fpdf.php';
require_once '../models/administrador.php';
require_once '../models/conexion.php';

$con=Conexion::conectar('localhost','proyecto','root','');


for ($i=1; $i < count($_POST); $i++) {

	if (isset($_POST['documento'.$i])) {

	$reporte=$con->prepare("SELECT documento FROM aprendiz WHERE documento=:documento");
	$reporte->execute(array(':documento' => $_POST['documento'.$i] ));

	if ($ra=$reporte->fetch(PDO::FETCH_ASSOC)) {
		$documento=$ra['documento'];
		}
	} 
}

	$registro=Administrador::consultarNovedad($documento);

foreach ($registro as $row) {

	if ($row['nombre_programa']=='ADSI') $row['nombre_programa']='ANALISIS Y DESARROLLO DE SISTEMAS DE INFORMACION';
	if ($row['nombre_programa']=='TEA') $row['nombre_programa']='TECNICO EN ELABORACION DE AUDIOVISUALES';
	if ($row['nombre_programa']=='DIM') $row['nombre_programa']='DISENO E INTEGRACION DE MULTIMEDIA';
	if ($row['nombre_programa']=='TPS') $row['nombre_programa']='TECNICO EN PROGRAMACION DE SOFTWARE';

	switch ($row['tipo_documento']) {
		
		case 'Cedula de Ciudadania': $row['tipo_documento']="C.C";	break;
		case 'Tarjeta de Identidad': $row['tipo_documento']="T.I";	break;
		case 'Cedula de Extrangeria': $row['tipo_documento']="C.E";	break;
		
		default:
			$row['tipo_documento']="C.C";	
			break;
	}

	$pdf=new fpdf('P','mm','A4');
	$pdf->AddPage();
	$pdf->SetFont('Arial','B','12');

	$pdf->Image('img/Sena.PNG' , 10 ,10, 35 , 38,'PNG', 'http://www.desarrolloweb.com');
	$pdf->Cell(190/*Pixeles de la linea*/,10/*Alto de pixeles*/,utf8_decode('ACTO ACADÉMICO No. '.$row['numero_ficha'].$row['documento'].date("Y").'')/*Contenido*/, 0 /*Borde del texto 1=Si 0=No*/,1/*Salto de linea*/,'C'/*Alineacion*/);
	$pdf->SetX(60);
	$pdf->MultiCell(90,6,utf8_decode('POR EL CUAL SE CANCELA EL REGISTRO DE MATRICULA POR DESERCIÓN'),0,'C',0);
	$pdf->Ln();
	$pdf->Cell(190,6,utf8_decode('PROGRAMA'),0,1,'C');
	$pdf->Cell(190,7,utf8_decode($row['nombre_programa']),0,1,'C');
	$pdf->Cell(190,10,utf8_decode('FICHA '.$row['numero_ficha']),0,1,'C');
	$pdf->MultiCell(190,6,utf8_decode('LA SUBDIRECTORA DEL CENTRO DE ELECTRICIDAD, ELECTRÓNICA Y TELECOMUNICACIONES DE LA REGIONAL DISTRITO CAPITAL DEL SERVICIO NACIONAL DE APRENDIZAJE SENA'),0,'C',0);
	$pdf->Ln();

	$pdf->SetFont('Arial','','12');$pdf->SetX(20);
	$pdf->MultiCell(170,5,utf8_decode('En ejercicio de las funciones delegadas mediante Acuerdo No. 0007 de 2012, con Resolución de Nombramiento No. 00034 de 13 de Enero de 2017 y Acta de Posesión No. 017 del 13 de Enero de 2017, procederá a tomar una decisión conforme a lo señalado en el Capítulo VII, Artículo 22, Numeral 4 del reglamento del Aprendiz, en consideración a los siguientes:'),0,'J',0);
	$pdf->Ln();

	$pdf->SetFont('Arial','B','12'); 
	$pdf->Cell(190,10,utf8_decode('1. HECHOS'),0,1,'C');
	$pdf->SetFont('Arial','','12');$pdf->SetX(20);
	$pdf->MultiCell(170,5,utf8_decode('El Instructor responsable del seguimiento, previa verificación exhaustiva, reportó al Coordinador Académico que el siguiente aprendiz se encuentran incursos en la causal de deserción, de acuerdo a lo señalado en el Capítulo VII, Artículo 22, Numeral 4 del reglamento del Aprendiz.'),0,'J',0);
	$pdf->Ln();$pdf->Ln();

	$header=array('Nombres','Apellidos','Tipo de Documento','N° de Documento');

	$pdf->SetX(20);
	$pdf->TablaBasica($header,$row['primer_nombre_aprendiz']." ".$row['segundo_nombre_aprendiz'],$row['primer_apellido_aprendiz']." ".$row['segundo_apellido_aprendiz'],$row['tipo_documento'],$row['documento']);
	$pdf->Ln();$pdf->Ln();

	$pdf->SetFont('Arial','B','12'); 
	$pdf->Cell(190,10,utf8_decode('2. DESCARGOS'),0,1,'C');
	$pdf->SetFont('Arial','','12');$pdf->SetX(20);
	$pdf->MultiCell(170,5,utf8_decode('El aprendiz, de acuerdo en lo establecido en el Capítulo VII, Artículo 22, Numeral 4, Parágrafo del reglamento del Aprendiz, conto con cinco (5) días hábiles para aportar las evidencias que justificaran su incumplimiento; pero él no dio respuesta ni se presentó; es decir, no hizo los descargos correspondientes.'),0,'J',0);
	$pdf->Ln();

	$pdf->SetFont('Arial','B','12'); 
	$pdf->Cell(190,10,utf8_decode('3. PRUEBAS DOCUMENTALES'),0,1,'C');
	$pdf->SetFont('Arial','','12');
	$pdf->SetX(38);
	$pdf->Cell(190,10,utf8_decode('* Formato Reporte de deserción.'),0,1,'J');
	$pdf->SetX(38);
	$pdf->Cell(190,5,utf8_decode('* Correo electrónico enviado por el Instructor informando la'),0,1,'J');
	$pdf->SetX(41);
	$pdf->Cell(190,5,utf8_decode('novedad a tiempo a la Coordinación Académica.'),0,1,'J');
	$pdf->SetX(38);
	$pdf->Cell(190,10,utf8_decode('* Correo electrónico enviado por el Coordinador Académico al aprendiz.'),0,1,'J');
	$pdf->Ln();

	$pdf->SetFont('Arial','B','12'); 
	$pdf->Cell(190,10,utf8_decode('4. CALIFICACION JURIDICA'),0,1,'C');
	$pdf->SetFont('Arial','','12');$pdf->SetX(20);
	$pdf->Cell(170,10,utf8_decode('Norma infringida en el reglamento del Aprendiz Capitulo VII, Artículo 22, Numeral 4:'),0,1,'J');
	$pdf->SetFont('Arial','B','12');$pdf->SetX(20);
	$pdf->Cell(28,10,utf8_decode('DESERCION: '),0,0,'J');
	$pdf->SetFont('Arial','','12');
	$pdf->Cell(0,10,utf8_decode('Se considera deserción en el proceso de formación: '),0,1,'');
	$pdf->SetX(28);
	$pdf->MultiCell(145,5,utf8_decode('A. Cuando el Aprendiz injustificadamente no se presente por tres (3) días consecutivos al centro de formación o empresa en su proceso de formativo.'),0,'J',0);
	$pdf->Ln();
	$pdf->SetX(28);
	$pdf->MultiCell(145,5,utf8_decode('B. Cuando al terminar el periodo de aplazamiento aprobado por el SENA, el aprendiz no reingresa al programa de formación.'),0,'J',0);
	$pdf->Ln();
	$pdf->SetX(28);
	$pdf->MultiCell(145,5,utf8_decode('C. Cuando transcurrido dos (2) años contados a partir de la fecha de terminación de la etapa lectiva del programa, el aprendiz no ha presentado la evidencia de la realización de la etapa productiva.'),0,'J',0);
	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont('Arial','B','12'); 
	$pdf->Cell(190,10,utf8_decode('5. ANALISIS DEL CASO'),0,1,'C');
	$pdf->SetFont('Arial','','12');$pdf->SetX(20);
	$pdf->MultiCell(170,5,utf8_decode('Es de resaltar que, al ingreso al Centro de Electricidad, Electrónica y Telecomunicaciones de la regional Distrito Capital SENA, los aprendices son conocedores de las reglas de comportamiento, el deber de cumplir con las actividades y compromisos que adquieren e igualmente son conscientes que el no cumplimiento de estos y la no justificación en caso de infringirlos acarrea sanciones; además los aprendices tienen el compromiso de cumplir y hacer cumplir el reglamento del Aprendiz SENA. Con fundamento en las pruebas allegadas y los hechos, una vez analizados en conjunto, se desprende que la conducta del (os) aprendiz (ces) es considerada deserción de acuerdo con lo señalado en el Capítulo VII, Artículo 22, Numeral 4 del reglamento del Aprendiz.'),0,'J',0);
	$pdf->Ln();

	$pdf->SetFont('Arial','B','12'); 
	$pdf->Cell(190,10,utf8_decode('6. RAZONES DE LA DECISIÓN A ADOPTAR'),0,1,'C');
	$pdf->SetFont('Arial','','12');$pdf->SetX(20);
	$pdf->MultiCell(170,5,utf8_decode('El aprendiz relacionado en los hechos es autor de la conducta contenida y tipificada en Capitulo VII, Artículo 22, Numeral 4, Literal (a) siendo esta una falta grave de tipo académico y disciplinaria; puesto que incumplió con las actividades de aprendizaje acordadas y los compromisos como Aprendiz del Sena.'),0,'J',0);
	$pdf->Ln();

	$pdf->SetFont('Arial','B','12'); $pdf->Cell(190,10,utf8_decode('RESUELVE'),0,1,'C');
	$pdf->SetX(20);
	$pdf->Cell(23,10,utf8_decode('PRIMERO: '),0,0,'J');
	$pdf->SetFont('Arial','','12');
	$pdf->Cell(0,10,utf8_decode('CANCELAR la matrícula al aprendiz que se relacionan a continuación. '),0,1,'');
	$pdf->Ln();

	$pdf->SetX(20);
	$pdf->TablaBasica($header,$row['primer_nombre_aprendiz']." ".$row['segundo_nombre_aprendiz'],$row['primer_apellido_aprendiz']." ".$row['segundo_apellido_aprendiz'],$row['tipo_documento'],$row['documento']);
	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont('Arial','B','12'); 
	$pdf->SetX(20);
	$pdf->Cell(24,5,utf8_decode('SEGUNDO: '),0,0,'J');
	$pdf->SetFont('Arial','','12');
	$pdf->MultiCell(145,5,utf8_decode('SANCIONAR al aprendiz relacionado por el término de seis (6) meses de conformidad con lo establecido en el Capítulo VII, Numeral 4, Parágrafo, del reglamento del Aprendiz.'),0,'J',0);
	$pdf->Ln();

	$pdf->SetFont('Arial','B','12'); 
	$pdf->SetX(20);
	$pdf->Cell(24,5,utf8_decode('TERCERO: '),0,0,'J');
	$pdf->SetFont('Arial','','12');
	$pdf->MultiCell(145,5,utf8_decode('TERMINAR el contrato de aprendizaje al aprendiz relacionado.'),0,'J',0);
	$pdf->Ln();

	$pdf->SetFont('Arial','B','12'); 
	$pdf->SetX(20);
	$pdf->Cell(23,5,utf8_decode('CUARTO: '),0,0,'J');
	$pdf->SetFont('Arial','','12');
	$pdf->MultiCell(145,5,utf8_decode('NOTIFICAR el presente Acto Académico a cada uno del aprendiz relacionado, de acuerdo con lo establecido en la Ley 1437 de 2011.'),0,'J',0);
	$pdf->Ln();

	$pdf->SetFont('Arial','B','12'); 
	$pdf->SetX(20);
	$pdf->Cell(23,5,utf8_decode('QUINTO: '),0,0,'J');
	$pdf->SetFont('Arial','','12');
	$pdf->MultiCell(145,5,utf8_decode('Contra el presente acto académico procede únicamente el RECURSO DE REPOSICIÓN, en los términos que dispone el artículo 76 de la Ley 1437 de 2011, dentro del término de diez (10) días hábiles siguientes a la notificación personal, ante la Subdirectora del Centro de Electricidad, Electrónica y Telecomunicaciones de la regional Distrito Capital SENA.'),0,'J',0);
	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont('Arial','B','12'); 
	$pdf->Cell(190,10,utf8_decode('COMUNÍQUESE, NOTIFÍQUESE Y CÚMPLASE'),0,1,'C');
	$pdf->SetFont('Arial','','12');
	$pdf->SetX(20);
	$pdf->Cell(170,10,utf8_decode('Dada en Bogotá, D.C., a los '.date("d").' días del mes de '.date("m").' del '.date("Y")),0,0,'J');
	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont('Arial','B','12'); 
	$pdf->Cell(190,10,utf8_decode('CLAUDIA JANET GÓMEZ LARROTA'),0,1,'C');
	$pdf->SetFont('Arial','','12');
	$pdf->Cell(190,5,utf8_decode('Subdirectora del Centro de Electricidad, Electrónica y Telecomunicaciones '),0,1,'C');
	$pdf->Cell(190,5,utf8_decode('regional Distrito Capital'),0,1,'C');
	$pdf->Ln();
	$pdf->SetX(20);
	$pdf->MultiCell(170,5,utf8_decode('La decisión del Subdirector se notifica el día '.date("d").' de '.date("m").' del año '.date("Y").' a: '.$row['primer_nombre_aprendiz']." ".$row['segundo_nombre_aprendiz']." ".$row['primer_apellido_aprendiz']." ".$row['segundo_apellido_aprendiz'].', identificada con la '.$row['tipo_documento'].' No. '.$row['documento'].', Ficha No. '.$row['numero_ficha'].', del programa '.$row['nombre_programa'].'.'),0,'J',0);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont('Arial','B','12'); 
	$pdf->SetX(35);
	$pdf->Cell(24,5,utf8_decode('EL NOTIFICADOR'),0,0,'J');
	$pdf->SetX(132);
	$pdf->MultiCell(0,5,utf8_decode('EL NOTIFICADO'),0,'J',0);
	$pdf->Ln();
	$pdf->Ln();
	$pdf->Ln();
	$pdf->SetX(23);
	$pdf->Cell(24,5,utf8_decode('_____________________________'),0,0,'J');
	$pdf->SetX(118);
	$pdf->MultiCell(0,5,utf8_decode('_____________________________'),0,'J',0);
	$pdf->Ln();
	$pdf->Ln();

	$pdf->SetFont('Arial','','8');
	$pdf->SetX(20);
	$pdf->Cell(170,3,utf8_decode('V°B°	German Alarcón - Coordinador Académico.'),0,1,'L');
	$pdf->SetX(20);
	$pdf->Cell(170,3,utf8_decode('V°B° 	José Hermes Escobar Sutaneme. - Abogado del Centro.'),0,1,'L');
	$pdf->SetX(20);
	$pdf->Cell(170,3,utf8_decode('Proyectó:  Janeth Rodríguez - Apoyo Coordinación.'),0,1,'L');

	$pdf->Output();
}
?>
