<?php
session_start();
require_once '../models/conexion.php';
require_once '../models/administrador.php';

if (empty($_SESSION['documento'])) {
	header("Location: ../index.php");
}
$con=Conexion::conectar('localhost','proyecto','root','');

$mod_us=Administrador::getUsuarioAdministrador($_SESSION['documento']);

if ($reg=$mod_us->fetch(PDO::FETCH_ASSOC)) {
?>
<br>
<!--Container-->
<!--============================================================================================================================-->
<div class="container">
<br>
<h1>Actualizar datos</h1>
<form action="../controladores/modificar_us.php" method="post">
	<center><img src="img/avatar.png" class="avatar" style="width: 200px;"></center><br>
<?php if (isset($_COOKIE['ac_admin'])): ?>
	<div class="alert alert-primary" role="alert">
<?php echo $_COOKIE['ac_admin']; ?>
	</div>
<?php endif; ?>
<?php if (isset($_COOKIE['ac_admin_bad'])): ?>
	<div class="alert alert-danger" role="alert">
<?php echo $_COOKIE['ac_admin_bad']; ?>
	</div>
<?php endif; ?>
	<div class="form-group">
		<h3>Nombre de usuario:</h3>
			<center>
				<div class="nom">
					<input type="text" name="us_nombre_usuario" value="<?php echo $reg['nombre_usuario'];?>">
				</div>
				<hr color="#FFFFFF" width="45%"/>
			</center>

		</div>
		<div class="form-row">
		 <div class="form-group col-md-6">
			<h3>Primer Nombre:</h3>
				<center><div class="nom">
					<input type="text" name="us_primer_nombre" value="<?php echo $reg['primer_nombre'];?>">
				</div>
				<hr color="#FFFFFF" width="90%"/>
			</center>
			</div>
			<div class="form-group col-md-6">
			<h3>Segundo Nombre:</h3>
				<center><div class="nom">
					<input type="text" name="us_segundo_nombre" value="<?php echo $reg['segundo_nombre'];?>">
				</div>
				<hr color="#FFFFFF" width="90%"/>
				</center>
			</div>
			</div>
			<div class="form-row">
			 <div class="form-group col-md-6">
				<h3>Primer Apellido:</h3>
					<center><div class="nom">
						<input type="text" name="us_primer_apellido" value="<?php echo $reg['primer_apellido'];?>">
					</div>
					<hr color="#FFFFFF" width="90%"/>
					</center>
				</div>
					<div class="form-group col-md-6">
				<h3>Segundo Apellido:</h3>
					<center><div class="nom">
						<input type="text" name="us_segundo_apellido" value="<?php echo $reg['segundo_apellido'];?>">
					</div>
					<hr color="#FFFFFF" width="90%"/>
					</center>
				</div>
			</div>
			<div class="form-row">
			<div class="form-group col-md-6">
			<h3>Cargo</h3>
				<center><div class="nom">
					<select name="us_cargo" class="select">
						<?php
						$sel=$con->query("SELECT * from cargo");
						$sell=$con->prepare("SELECT id_cargo,documento from usuario WHERE documento=:documento");
						$sell->execute(array(':documento' => $reg['documento']));
						$raw=$sell->fetch(PDO::FETCH_ASSOC);

						echo "<option value=\"3\" disabled>Cargo</option>";				

								while ($row=$sel->fetch(PDO::FETCH_ASSOC)) {

									if ($raw["id_cargo"]==$row["id_cargo"]) {
										
										echo "<option value=\"$row[id_cargo]\" selected>$row[cargo]</option>";
									}else if($raw["id_cargo"]!=$row["id_cargo"]){

										echo "<option value=\"$row[id_cargo]\">$row[cargo]</option>";
									}
								}			
						?>
					</select>
				</div>
				<hr color="#FFFFFF" width="90%"/>
				</center>
			</div>
			<div class="form-group col-md-6">
				<h3>Documento:</h3>
					<center><div class="nom">
						<input type="text" name="us_documento" value="<?php echo $reg['documento']; ?>" onkeypress="return justNumbers(event);">
					</div>
					<hr color="#FFFFFF" width="90%"/>
					</center>
				</div>
			</div>
			<div class="form-row">
			 <div class="form-group col-md-6">
			<h3>Direccion:</h3>
				<center><div class="nom">
					<input type="text" name="us_direccion" value="<?php echo $reg['direccion'];?>">
				</div>
				<hr color="#FFFFFF" width="90%"/>
				</center>
			</div>
				<div class="form-group col-md-6">
			<h3>Correo:</h3>
				<center><div class="nom">
					<input type="text" name="us_correo" value="<?php echo $reg['correo'];?>">
				</div>
				<hr color="#FFFFFF" width="90%"/>
				</center>
			</div>
		</div>
		<div class="form-row">
		 <div class="form-group col-md-6">
			<h3>Telefono:</h3>
				<center><div class="nom">
					<input type="text" name="us_telefono" value="<?php echo $reg['tel_usuario'];?>" onkeypress="return justNumbers(event);">
				</div>
				<hr color="#FFFFFF" width="90%"/>
				</center>
			</div>
			<div class="form-group col-md-6">
			<h3>Celular: </h3>
				<center><div class="nom">
					<input type="text" name="us_celular" value="<?php echo $reg['cel_usuario'];?>" onkeypress="return justNumbers(event);">
				</div>
				<hr color="#FFFFFF" width="90%"/>
				</center>
			</div>
		</div>
			<br>
			<input type="submit" value="Finalizar" class="btn btn-primary btn-lg btn-block" style="border-radius: 12px;">
			</form>
			<br>
	</div>
	<br>
	<br>
<br>
<?php
}else {
	setcookie("no_exist","Usuario no valido.",time()+10,"/");
	header("Location: usuario.php?usuario=usuario");
}

?>
