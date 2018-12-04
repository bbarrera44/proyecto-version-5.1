<?php
session_start();
	require '../models/aprendiz.php';

	$registro=Aprendiz::consultarAprendiz($_SESSION['documento']);

	if ($reg=$registro->fetch(PDO::FETCH_ASSOC)){
		//Cuando el aprendiz esta registrado
	?>
<br>
<!--Container-->
<!--===============================================================================================-->
<div class="container">
	<div class="form_group">
		<h1>Informacion del aprendiz</h1>
			<center><img src="img/avatar.png" class="avatar" style="width: 200px;"></center>
		<hr width="80%" color="#ffffff">
	</div>
	<?php if (isset($_COOKIE['com_mod_us'])): ?>
    	<div class="alert alert-primary" role="alert">
  			<?php echo $_COOKIE['com_mod_us']; ?>
		</div>
    		<?php endif ?>
	<div class="form-row">
		<div class="form-group col-md-6">
				<h2>Nombres del aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['primer_nombre_aprendiz']." ".$reg['segundo_nombre_aprendiz'];  ?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
			<div class="form-group col-md-6">
				<h2>Apellidos del aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['primer_apellido_aprendiz']." ".$reg['segundo_apellido_aprendiz'];  ?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<h2>Documento de aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['documento'];  ?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
			<div class="form-group col-md-6">
				<h2>Telefono(s) de aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['tel_aprendiz'];?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<h2>Celular del aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['cel_aprendiz']; ?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
			<div class="form-group col-md-6">
				<h2>Ficha:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo $reg['numero_ficha']; ?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
		</div>
		<div class="form-row">			
			<div class="form-group col-md-6">
				<h2>Estado del aprendiz:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php $es=Aprendiz::estadoAprendiz($_SESSION['documento']); echo $es;?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
			<div class="form-group col-md-6">
				<h2>Competencia:</h2>
					<center>
						<br />
						<div class="nom">
							<h3><?php echo "R"."".$reg['resultado'].$reg['id_resultado']." ".$reg['resultado_aprendizaje'];?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
		</div>
		<div class="form-group col-md-12">
				<h2>Programa de formacion:</h2>
					<center>
						<br />
						<div class="nom" style="width: 900px;">
							<h3><?php echo $reg['nombre_programa'];?>
						</div>
					</center>
				</h3>
				<hr width="80%" color="#ffffff">
			</div>
<?php if (($row['id_cargo']==1) or ($row['id_cargo']==2)): ?>
	<div class="form-row">
    		<div class="form-group col-md-6">
    			<input type="button" value="Nueva consulta" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" data-toggle="modal" data-target="#modalconap" data-whatever="@mdo"/>
    		</div>
    		<div class="form-group col-md-6">
    			<input type="button" value="Modificar" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" onClick="window.location.href='../controladores/controlar.php?n=mod_aprendiz'"/>
    		</div>
    	</div>	
<?php endif ?>  
<?php if (($row['id_cargo']==3) or ($row['id_cargo']==4)): ?>
	<div class="form-row">
    		<div class="form-group col-md-12">
    			<input type="button" value="Nueva consulta" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" data-toggle="modal" data-target="#modalconap" data-whatever="@mdo"/>
    		</div>
	</div>
<?php endif ?>    		
	<br>
</div>
<br>
<br>
<br>
<?php
}else{
//Aprendiz no Registrado
/*=========================================================================================================*/
?>
<br>
	<div class="container">
		<div class="form_group">
        <h1>Informacion del aprendiz</h1>
					<center><img src="img/avatar.png" class="avatar" style="width: 200px;"></center>
				<hr width="80%" color="#FFFFFF" ><br /><br />
		<h2>El aprendiz no se encuentra registrado.<center><br />
</div>
        <input type="button" value="Nueva consulta" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" data-toggle="modal" data-target="#modalconap" data-whatever="@mdo"/>
		<input type="button" value="Finalizar" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" onClick="window.location.href='index.php'"/>
		<br>
	</div>
	<br>
	<br>
<br>
<?php
}
?>
