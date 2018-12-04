<br>
<!--Pagina-->
<!--======================================================================================================================-->
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.1/css/all.css' integrity='sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz' crossorigin='anonymous'>
<!--Scripts-->
<!--======================================================================================================================-->
<script type="text/javascript">
	function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;

        return /\d/.test(String.fromCharCode(keynum));
        }
</script>
<?php 
require_once '../models/usuario.php'; 

$tip=Usuario::tipoDocumento();
?>
<!--Container-->
<!--======================================================================================================================-->
<div class="container">
	<form action="../controladores/consultarfichas.php" method="post">
 		<div class="form-group" >
			<h1 class="formulario__titulo" style="color:#FFF;"><b>Consultar</b><br/></h1> 
		<center><h3 class="fin">Digite el numero de documento para ver si el aprendiz tiene alguna novedad</h3></center></div>
	<hr color="#999999">
<div class="form-row">
	<div class="form-group col-md-12">
		<h5><p>Numero de documento:</p></h5>
	</div>
</div>
<div class="form-row">
	<div class="form-group col-md-4">	  
		<input type="text" name="documento_aprendiz" class="form-control input-lg" placeholder="Buscar" style="background: #fff" style="height: 55px">
	</div>
	<div class="form-group col-md-4">
		<button type="submit" class="btn btn-primary" style="height: 40px"><i class='fas fa-search'></i></button>
	</div>
</form>
<div class="form-group col-md-9">
<table align="right">
	<tr>
		<td>
			<?php
			$cont=0;
				require_once '../controladores/consultarnovedad.php';
					if (isset($_COOKIE['pag'])) if ($_COOKIE['pag'] > 10) {echo "<h5><p style='color: #fff'>Paginas: </p></h5>";}
			?>
		</td>
	</tr>
</table>
</div>
</div>
<?php
	if ($aprendiz):
?>
<!--Registro-->
<!--======================================================================================================================-->
	<center>
		<table class="table">
			<thead class="thead-dark">
				<th>ID</th>
				<th>Nombres</th>
				<th>Apellidos</th>
				<th>Fecha</th>
				<th>Ficha</th>
				<th>Mas...</th>
			</thead>
			<tbody>

			<?php 
			
			while ($row=$aprendiz->fetch(PDO::FETCH_ASSOC)){ 
				$cont=$cont+1;?>

				<form action="actas.php" method="post">
				<tr bgcolor= "#FFF" >
					<th scope="row"><?php echo $row['id_aprendiz'];?></th>
					<td><?php echo $row['primer_nombre_aprendiz']." ".$row['segundo_nombre_aprendiz']; ?></td>
					<td><?php echo $row['primer_apellido_aprendiz']." ".$row['segundo_apellido_aprendiz']; ?></td>
					<td><?php echo $row['fecha']; ?></td>
					<td><?php echo $row['numero_ficha']; ?></td>
					<input type="hidden" name="documento<?php echo $row['id_novedad'];?>" value="<?php echo $row['documento']; ?>">
					<td><button type="button" data-toggle="modal" data-target="#<?php echo trim($row['primer_nombre_aprendiz']).$row['id_novedad']; ?>" data-whatever="@mdo" style="height: 28px; padding-top: 1px;" class="btn btn-primary">Ver</button></td>
				</tr>
				<div class="modal fade" id="<?php echo trim($row['primer_nombre_aprendiz']).$row['id_novedad']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog modal-lg modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="modalac" style="color: #000;">Novedad Numero: <?php echo $row['id_novedad']; ?></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
									</div>
									<div style="width: 100%; height: 600px; overflow-y: scroll;">
										<div class="card" style="width: 100%;">
  											<ul class="list-group list-group-flush">
    											<li class="list-group-item" ><h3 style="color: #000">Nombres: <?php echo $row['primer_nombre_aprendiz']." ".$row['segundo_nombre_aprendiz']; ?></h3></li>
    											<li class="list-group-item" ><h3 style="color: #000">Apellidos: <?php echo $row['primer_apellido_aprendiz']." ".$row['segundo_apellido_aprendiz']; ?></h3></li>
    											<li class="list-group-item" ><h3 style="color: #000">Fecha Novedad: <?php echo $row['fecha']; ?></h3></li>
    											<li class="list-group-item" ><h3 style="color: #000">Tipo Novedad: <?php echo $row['novedad']; ?></h3></li>
    											<?php if ($row['id_tipo_novedad']==3){ 
													$con=Conexion::conectar('localhost','proyecto','root','');
													$fic=$con->prepare("SELECT * FROM novedad INNER JOIN ficha ON novedad.ficha_ingresar=ficha.id_ficha WHERE id_ficha=:fic");
													$fic->execute(array(':fic' => $row['ficha_ingresar'] ));
													$role=$fic->fetch(PDO::FETCH_ASSOC);?>
    											<li class="list-group-item" ><h3 style="color: #000">Ficha ingresar: <?php echo $role['numero_ficha']; ?></h3></li>
    											<?php } ?>
    											<li class="list-group-item" ><h3 style="color: #000">Ficha: <?php echo $row['numero_ficha']; ?></h3></li>
    											<li class="list-group-item" ><h3 style="color: #000">Programa: <?php echo $row['nombre_programa']; ?></h3></li>
    											<li class="list-group-item" ><h3 style="color: #000">Trimestre: <?php echo $row['trimestre']; ?></h3></li>
    											<li class="list-group-item" ><h3 style="color: #000">Etapa: <?php echo $row['etapa']; ?></h3></li>
    											<li class="list-group-item" ><h3 style="color: #000">Jornada: <?php echo $row['jornada']; ?></h3></li>
    											<li class="list-group-item" ><h3 style="color: #000">Tipo formacion: <?php echo $row['tipo_formacion']; ?></h3></li>
    											<li class="list-group-item" ><h3 style="color: #000">Motivo: <?php echo $row['motivo']; ?></h3></li>
    											<li class="list-group-item" ><h3 style="color: #000">Descripcion: <?php echo $row['descripcion']; ?></h3></li>
  											</ul>
										</div>
									</div>
										<!--<div class="form-row">
												<div class="form-group col-md-6">
													<h3 style="color: #000">Motivo:</h3>
												</div>
												<div class="form-group col-md-6">
													<h4 style="color: #000"><?php echo $row['motivo']; ?></h4> 				
												</div>
											</div>
											<div class="form-row">
												<div class="form-group col-md-6">
													<h3 style="color: #000">Descripcion:</h3>
												</div>
												<div class="form-group col-md-6">
													<h4 style="color: #000"><?php echo $row['descripcion']; ?></h4> 				
												</div>
											</div>
										</div>-->
									<div class="modal-footer">
        								<button type="button" class="btn btn-secondary" data-dismiss="modal" style="height: 45;">Cerrar</button>
        								<input type="submit" value="Generar Reporte" class="btn btn-primary">
      								</div>
									</div>
								</div>
							</div>
						</div>
					</form>
					<?php setcookie("aprendiz","",time()-20,"/");} ?>				
			</tbody>
		</table>
	</center> 
<?php else: ?>
		<center>
		<div class="form-row">
			<div class="form-group col-md-3">
				No hay registros.
			</div>
		</div>
	</center> 		
	<?php endif ?>
<?php if ($cont == 0): ?>
			<center>
		<div class="form-row">
			<div class="form-group col-md-3">
				No hay registros.
			</div>
		</div>
	</center> 
<?php endif; ?>
<br>
</div>
<br>
<br>
<br>