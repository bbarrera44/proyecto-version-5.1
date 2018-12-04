<br>
<!--Scripts-->
<!--=====================================================================================================-->
<script type="text/javascript">
	function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 46))
        return true;

        return /\d/.test(String.fromCharCode(keynum));
        }
</script>
<script type="text/javascript">

	var id = 1;

  function mostrarEtapa(id) {

	if (id==2) {

      window.setTimeout(function(){$('#estapa').addClass('form-group col-md-12');},800);
      window.setTimeout(function(){$('#estapa').removeClass('form-group col-md-6');},800);
      $("#demasCosas").hide(800);
      $("#demasCosas2").hide(800);
      $("#demasCosas3").hide(800);

    }

    if (id==1) { 
      window.setTimeout(function(){$('#estapa').addClass('form-group col-md-6');},800);
      window.setTimeout(function(){$('#estapa').removeClass('form-group col-md-12');},800);
      $("#demasCosas").show(800);
      $("#demasCosas2").show(800);
      $("#demasCosas3").show(800);

    }
    
  }
</script>
<?php require_once '../models/ficha.php'; ?>
<!--Container-->
<!--=====================================================================================================-->
<div class="container">
	<div class="form-group">
	<h2 class="formulario__titulo" style="color:#FFF; top:50%;">
		<b>Fichas</b>
		<br/>
	</h2>
	<h5 class="fin">
		<center>Aqui podra ver toda la informacion sobre las fichas</center>
	</h5>
	</div>
	<hr color="#999999">
	<form action="../controladores/fichas_.php" method="post">
	<div class="form-row">
		<div class="form-group col-md-6">
		<h3><p>Numero de la ficha</p></h3>
			<input type="text" name="n_ficha" onkeypress="return justNumbers(event);" class="input_reg" placeholder="Ficha" style="background-color: #999999" required>
		</div>
		<div class="form-group col-md-6">
			<h3>
				<p>Nombre del programa</p>
			</h3>
		<select name="programa" class="select_reg">
			<option value="" disabled required>Nombre del Programa</option>
			<?php
				require_once '../models/conexion.php';
				$fic=Conexion::conectar('localhost','proyecto','root','');
				$fi=$fic->query("SELECT * from programa_formacion");
				while ($row=$fi->fetch(PDO::FETCH_ASSOC)) {

					echo "<option value=\"$row[id_programa]\">$row[nombre_programa]</option>";
				}
			?>				
			</select>
		</div>
	</div>
<div class="form-row">
	<div class="form-group col-md-6" id="estapa">
		<h3>Etapa:</h3>
			<select name="etapa" class="select_reg" id="etapa" onchange="mostrarEtapa(this.value)" required>
				<option value="" disabled selected>Etapa</option>
					<?php  
						$etp=Ficha::verEtapa();

						foreach ($etp as $row) {
								
							echo "<option value='$row[id_etapa]'>$row[etapa]</option>";
						}
					?>
			</select>			
		</div>	
	<div class="form-group col-md-6">
		<div id="demasCosas">
			<h3>Jornada:</h3>
				<select name="jornada" class="select_reg" id="jornada">
					<option value="" disabled selected>Jornada</option>
						<?php  
							$jor=Aprendiz::verJornada();

							foreach ($jor as $row) {
								
								echo "<option value='$row[id_jornada]'>$row[jornada]</option>";
							}
						?>
				</select>			
			</div>
		</div>
	</div>
<div class="form-row">
	<div class="form-group col-md-6">
		<div id="demasCosas2">
			<h3>Trimestre:</h3>
				<select name="trimestre" class="select_reg" id="trimestre">
					<option value="" disabled selected>Trimestre</option>
						<?php  
							$trim=Ficha::verTrimestre();

							foreach ($trim as $row) {
								
								echo "<option value='$row[id_trimestre]'>$row[trimestre]</option>";
							}
						?>
				</select>
			</div>
		</div>
	<div class="form-group col-md-6">
		<div id="demasCosas3">
			<h3>Tipo Formacion:
				<select name="tipo_formacion" class="select_reg">
					<option value="" disabled selected>Tipo Formacion</option>
						<?php  
							$tip=Aprendiz::verTipoFormacion();

							foreach ($tip as $row) {
								
								echo "<option value='$row[id_tipo_formacion]'>$row[tipo_formacion]</option>";
							}
						?>
				</select>
			</h3>
		</div>
	</div>	
</div>	
	<div class="form-group">
		<?php if (isset($_COOKIE['ficha'])): ?>
			<?php echo $_COOKIE['ficha']; ?>
		<?php endif ?>		
	</div>		
	<div class="form-group">
		<table align="center">
			<tr>
				<td><?php  $ficha=Ficha::verFicha(); ?></td>
			</tr>
		</table>
	</div>
<!--Tabla de las fichas-->
<table class="table">
			<thead class="thead-dark">
				<th>ID ficha</th>
				<th>Numero Ficha</th>
				<th>Programa Formacion</th>
			</thead>
<?php foreach ($ficha as $row): ?>
	<tbody>
		<tr bgcolor= "#FFF" >
			<td><?php echo $row['id_ficha'];?></td>
			<td><?php echo $row['numero_ficha'];?></td>
			<td>
				<?php
				 	echo $row['nombre_programa'];
				 ?>					
			</td>
		</tr>
	</tbody>
<?php endforeach ?>
</table>
	<?php $ficha ?>
		<div class="form-group">
			<input type="submit" value="Guardar" class="btn btn-primary btn-lg btn-block">
		</div>
		</form>
	<br>
<script type="text/javascript" src="js/buscador.js"></script>
</div>
<br>
<br>
<br>