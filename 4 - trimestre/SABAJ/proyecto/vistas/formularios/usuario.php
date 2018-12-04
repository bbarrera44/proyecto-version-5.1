<?php
$cxn=Conexion::conectar('localhost','proyecto','root','');
$usuario=$cxn->prepare("SELECT * FROM usuario LEFT JOIN cargo ON usuario.id_cargo=cargo.id_cargo
											  LEFT JOIN tipo_documento ON usuario.id_tipo_documento=tipo_documento.id_tipo_documento
											  LEFT JOIN genero ON usuario.id_genero=genero.id_genero WHERE usuario.nombre_usuario=:usuario");

$usuario->execute(array(':usuario' => $_COOKIE['usuario']));


while($reg=$usuario->fetch(PDO::FETCH_ASSOC)){ ?>

<br>
<!--Container-->
<!---------------------------------------------------------------------------------->
<div class="container">
		<form action="../controladores/controlar.php?n=actualizarDatos" method="post">
			<div class="form-group">
				<h1>Perfil</h1>
				<center><img src="img/avatar.png" class="avatar" style="width: 200px;"></center>
			</div>
			<div class="form-group">
				<h2>Nombre de usuario<br><label class="nom"><?php echo $reg['nombre_usuario']; ?></h2>
			</div>
		<hr color="#FFFFFF" width="90%" align="center"/>
		<?php if (isset($_COOKIE['no_exist'])): ?>
			<div class="alert alert-danger" role="alert">
  			<?php echo $_COOKIE['no_exist']; ?>
			</div>
		<?php endif; ?>
		<div class="form-row">
			<div class="form-group col-md-6">
				<h3>Nombres<br><label class="nom"><?php echo $reg['primer_nombre']." ".$reg['segundo_nombre'];  ?></h3><hr color="#FFFFFF" width="90%"/></label>
			</div>
			<div class="form-group col-md-6">
				<h3>Apellidos<br><label class="nom"><?php echo $reg['primer_apellido']." ".$reg['segundo_apellido']; ?></h3><hr color="#FFFFFF" width="90%"/></label>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<h3>Cargo<br><label class="nom"><?php echo $reg['cargo']; ?></h3><hr color="#FFFFFF" width="90%"/></label>
			</div>
			<div class="form-group col-md-6">
				<h3>Documento<br><label class="nom"><?php echo $reg['documento']; ?></h3><hr color="#FFFFFF" width="90%"/></label>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<h3>Direccion<br><label class="nom"><?php echo $reg['direccion']; ?></h3><hr color="#FFFFFF" width="90%"/></label>
			</div>
			<div class="form-group col-md-6">
				<h3>Correo<br><label class="nom"><?php echo $reg['correo']; ?></h3><hr color="#FFFFFF" width="90%"/></label>
			</div>
		</div>
		<div class="form-row">
			<div class="form-group col-md-6">
				<h3>Telefono<br><label class="nom"><?php echo $reg['tel_usuario']; ?></h3><hr color="#FFFFFF" width="90%"/></label>
			</div>
			<div class="form-group col-md-6">
				<h3>Celular<br><label class="nom"><?php echo $reg['cel_usuario']; ?></h3><hr color="#FFFFFF" width="90%"/></label>
			</div>
		</div>
			<br>
			<br>
		<?php if ($reg['id_cargo']==1): ?>
			<input type="button" value="Actualizar informacion Usuario" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" data-toggle="modal" data-target="#modalactualizar" data-whatever="@mdo"/>
		<?php endif; ?>
			<div class="form-row">				
			<div class="form-group col-md-6">
				<input type="button" value="Atras" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" onClick="window.location.href='index.php'"/>
			</div>
			<div class="form-group col-md-6">
				<input type="button" value="Actualizar informacion" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;" onclick="window.location.href='../controladores/controlar.php?n=actualizarDatos'">
			</div>
		</div>
	</form>
	<br>
</div>
<br>
<br>
<br>
	<?php } ?>
	<!--Modal Actualizar-->
<div class="modal fade" id="modalactualizar" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalac">Actualizar usuario</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="../controladores/controlar.php?n=mod_us_aparte"  method="post">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Al ser administrador puede actualizar la informacion de un usuario externo.</label>
						</div>
						<div class="form-group">
							<label for="message-text" class="col-form-label">Dijite el numero del documento.</label>
							<input type="text" class="form-control" id="recipient-name-novap" name="documento" style="background-color: #DEE4E4;" required>						
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" style="height: 45px">Cerrar</button>
					<input type="submit" value="Consultar" style="height: 45px" class="btn btn-primary">

					</form>
				</div>
			</div>
		</div>
	</div>
