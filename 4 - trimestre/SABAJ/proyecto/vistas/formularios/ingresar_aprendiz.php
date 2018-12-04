<br>
<!--Scripts-->
<!--========================================================================================================================-->
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
	require_once '../models/ficha.php';
?>
<!--Container-->
<!--========================================================================================================================-->
<div class="container" >
<form action="../controladores/in_aprendices.php" method="post">
	<div class="form-group">
		<h1>Ingresar Aprendiz</h1>
		<center>
			<img src="img/avatar.png" class="avatar" style="width: 200px;">
		</center>
	</div>
	<?php 
if(isset($_COOKIE['novedad_aprendiz'])){ 
		echo $_COOKIE['novedad_aprendiz'];
	setcookie("novedad_aprendiz","",time()-1000,"/");
} 
	?>
	<hr color="#FFFFFF" width="90%" align="center"/>
<!--Primera fila-->
	<div class="form-row">
		<div class="form-group col-md-6">
			<h3>Primer Nombre:
			<center>
				<br>
				<div class="nom">
					<input type="text" name="primer_nombre" required>
				</div>
			</center>
			</h3>
				<hr color="#FFFFFF" width="70%" align="center"/>
		</div>
		<div class="form-group col-md-6">
			<h3>Segundo Nombre:
				<center>
				<br>
				<div class="nom">
					<input type="text" name="segundo_nombre" required>
				</div>
			</center>
			</h3>
				<hr color="#FFFFFF" width="70%" align="center"/>
		</div>	
	</div>
<!--Segunda fila-->
	<div class="form-row">
		<div class="form-group col-md-6">
			<h3>Primer Apellido:
				<center>
					<br>
					<div class="nom">
						<input type="text" name="primer_apellido" required>
					</div>
				</center>
			</h3>
			<hr color="#FFFFFF" width="70%" align="center"/>
		</div>
		<div class="form-group col-md-6">
			<h3>Segundo Apellido:
				<center>
					<br>
					<div class="nom">
						<input type="text" name="segundo_apellido" required>
					</div>
				</center>
			</h3>
			<hr color="#FFFFFF" width="70%" align="center"/>
		</div>	
	</div>	
<!--Tercera fila-->		
	<div class="form-row">
		<div class="form-group col-md-6">
			<h3>Tipo de Documento:
			</h3>
			<center>
				<br>
				<div class="nom">
				<select name="tipo_documento" class="select" required>
					<option value="" disabled selected>Tipo de Documento</option>
						<?php  
							$tipo=Usuario::tipoDocumento();

							foreach ($tipo as $row) {
								
								echo "<option value='$row[id_tipo_documento]'>$row[tipo_documento]</option>";
							}
						?>
				</select>
			</div>
		</center>
		<hr color="#FFFFFF" width="70%" align="center"/>
		</div>
		<div class="form-group col-md-6">
			<h3>Documento:
				<center>
					<br>
					<div class="nom">
						<input type="text" name="documento" onkeypress="return justNumbers(event);" required>
					</div>
				</center>
			</h3>
			<hr color="#FFFFFF" width="70%" align="center"/>
		</div>	
	</div>
<!--Cuarta fila-->	
	<div class="form-row">
		<div class="form-group col-md-6">
			<h3>Telefono:
				<center>
					<br>
					<div class="nom">
						<input type="text" name="telefono" onkeypress="return justNumbers(event);" required>
					</div>
				</center>
			</h3>
			<hr color="#FFFFFF" width="70%" align="center"/>
		</div>
		<div class="form-group col-md-6">
			<h3>Celular:
				<center>
					<br>
					<div class="nom">
						<input type="text" name="celular" onkeypress="return justNumbers(event);" required>
					</div>
				</center>
			</h3>
			<hr color="#FFFFFF" width="70%" align="center"/>
		</div>	
	</div>
<!--Quinta fila-->
	<div class="form-row">
		<div class="form-group col-md-6">
			<h3>Ficha:</h3><center><br><div class="nom">
				<div style="width: 150px; overflow-x: scroll;">
				<select name="ficha" class="select" required>
					<option value="" disabled selected>Ficha</option>
						<?php  
							$ficha=Ficha::verFicha();

							foreach ($ficha as $row) {
								
								echo "<option value='$row[id_ficha]'>$row[numero_ficha] - $row[nombre_programa]</option>";
							}
						?>
				</select>
				</div>
			</div></center><hr color="#FFFFFF" width="70%" align="center"/>
		</div>
		<div class="form-group col-md-6">
			<h3>Genero:<center><br><div class="nom">
				<select name="genero" class="select" required>
					<option value="" disabled selected>Genero</option>
						<?php  
							$gen=Usuario::verGenero();

							foreach ($gen as $row) {
								
								echo "<option value='$row[id_genero]'>$row[genero]</option>";
							}
						?>
				</select>
			</div></center></h3><hr color="#FFFFFF" width="70%" align="center"/>
		</div>	
	</div>
	<div class="form-row">
		<div class="form-group col-md-12">
   			<h3><p>Ultima competencia aprobada</p></h3><center><br><div class="nom">
       			<select name="resultado" class="select" required>
        			 <option value="" selected disabled>Competencia</option>
         				<?php  
          					$com=Ficha::verCompetencia();
          						while ($row=$com->fetch(PDO::FETCH_ASSOC)) {            
            			echo "<option value='$row[id_resultado]'>RAE-$row[id_resultado] $row[resultado]</option>";      
         		 	}
          			?>
       			</select>
       		</div></center></h3><hr color="#FFFFFF" width="70%" align="center"/>
  		</div>
	</div>
	<div class="form-group">
			<input type="submit" value="Guardar" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;">
		</div>
	<br>
</div >
<br>
<br>
<br>