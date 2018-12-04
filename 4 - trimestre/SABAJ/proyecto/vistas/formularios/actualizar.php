<?php
$cxn=Conexion::conectar('localhost','proyecto','root','');
$usuario=$cxn->prepare("SELECT * FROM usuario LEFT JOIN cargo ON usuario.id_cargo=cargo.id_cargo
											  LEFT JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento
											  LEFT JOIN genero ON usuario.id_genero=genero.id_genero WHERE usuario.nombre_usuario=:usuario");

$usuario->execute(array(':usuario' => $_COOKIE['usuario']));

while($row=$usuario->fetch(PDO::FETCH_ASSOC)){ ?>
<br>
<!--Container-->
<!---------------------------------------------------------------------------------------------------------->
<div class="container">
<form action="../controladores/actualizar_.php" method="post" >
	<div class="form-group" >
		<h1><b>Actualizacion de Datos</b></h1>
		<center><img src="img/avatar.png" class="avatar" style="width: 200px;"></center>
	</div>
	<?php if (isset($_COOKIE['actualizar'])): ?>
				<div class="alert alert-primary" role="alert">
  				<center>
						<?php
							echo $_COOKIE['actualizar'];
					 	?>
				 </center>
				</div>
			<?php endif; ?>
			<?php if (isset($_COOKIE['actualizar_no'])): ?>
				<div class="alert alert-danger" role="alert">
  				<center>
						<?php
							echo $_COOKIE['actualizar_no'];
					 	?>
				 </center>
				</div>
			<?php endif; ?>
	<div class="form-row">
		<div class="form-group col-md-6">
			<h3>Primer Nombre:</h3><center><br><div class="nom"><input type="text" name="primer_nombre_ac" value="<?php echo $row['primer_nombre'];?>"></div></center><hr color="#FFFFFF" width="90%"/>
		</div>
		<div class="form-group col-md-6">
			<h3>Segundo Nombre:</h3><center><br><div class="nom"><input type="text" name="segundo_nombre_ac" value="<?php echo $row['segundo_nombre'];?>"></div></center><hr color="#FFFFFF" width="90%"/>
		</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<h3>Primer Apellido:</h3><center><br><div class="nom"><input type="text" name="primer_apellido_ac" value="<?php echo $row['primer_apellido'];?>"></div></center><hr color="#FFFFFF" width="90%"/>
			</div>
			<div class="form-group col-md-6">
				<h3>Segundo Apellido:</h3><center><br><div class="nom"><input type="text" name="segundo_apellido_ac" value="<?php echo $row['segundo_apellido'];?>"></div></center><hr color="#FFFFFF" width="90%"/>
			</div>
			</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			<h3>Documento:</h3><center><br><div class="nom"><input type="text" name="documento_ac" onkeypress="return justNumbers(event);" value="<?php echo $row['documento'];?>"></div></center><hr color="#FFFFFF" width="90%"/>
		</div>
		<div class="form-group col-md-6">
			<h3>Direccion:</h3><center><br><div class="nom"><input type="text" name="direccion_ac" value="<?php echo $row['direccion'];?>"></div></center><hr color="#FFFFFF" width="90%"/>
		</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			<h3>Correo:</h3><center><br><div class="nom"><input type="text" name="correo_ac" value="<?php echo $row['correo'];?>"></div></center><hr color="#FFFFFF" width="90%"/>
		</div>
		<div class="form-group col-md-6">
			<h3>Nombre de usuario:</h3><center><br><div class="nom"><input type="text" name="usuario_ac" value="<?php echo $row['nombre_usuario'];?>"></div></center><hr color="#FFFFFF" width="90%"/>
		</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
			<h3>Celular:</h3><center><br><div class="nom"><input type="text" name="celular_ac" onkeypress="return justNumbers(event);" value="<?php echo $row['cel_usuario'];?>"></div></center><hr color="#FFFFFF" width="90%"/>
		</div>
		<div class="form-group col-md-6">
			<h3>Telefono:</h3><center><br><div class="nom"><input type="text" name="telefono_ac" onkeypress="return justNumbers(event);" value="<?php echo $row['tel_usuario'];?>"></div></center><hr color="#FFFFFF" width="90%"/>
		</div>
		</div>
		<div class="form-group col-md-12">
      		<h3>Contraseña(Opcional):</h3><center><br><div class="nom"><input type="password" name="contrasena_ac"></div></center>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<input type="button" value="Atras" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" formaction="javascript:window.history.back();">
			</div>
			<div class="form-group col-md-6">
				<input type="submit" value="Actualizar" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;">
			</div>			
		</div>	        
		</form>
	<?php } ?>
<br>
</div>
<br>
<br>
<br>
