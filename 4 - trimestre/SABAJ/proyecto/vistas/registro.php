<?php
if (isset($_COOKIE['usuario'])) {
    header('Location: index.php');
  }
	//require '../models/security.php';
	require_once '../models/conexion.php';
	//Security::permisosdispersos();
    include('menu.php');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="img/logo.png" />
	<title>SABAJ</title>
	<link rel="stylesheet" type="text/css" href="css/cl.css">
<!--Scripts-->
<!---------------------------------------------------------------------------------------------------------->
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
function validarCon(){
	var p1 = document.getElementById("con1").value;
	var p2 = document.getElementById("con2").value;
	var cor1 = document.getElementById("cor1").value;
	var cor2 = document.getElementById("cor2").value;

	if (p1 != p2) {

  	alert("El correo o la contraseña no coinciden, Por favor intentelo de nuevo.");
		return false;
	} else {
  	return true;
	}

	if (cor1 != cor2) {

		alert("El correo o la contraseña no coinciden, Por favor intentelo de nuevo.");
		return false;
	} else {
		return true;
	}
}
</script>

</head>
<body>
	<br><br>
	<br><br><br>
<!--Container-->
<!--=====================================================================================-->
<div class="formulario">
<form action="../controladores/registro_.php" method="post" onSubmit="return validarCon()" >

<h1 class="formulario__titulo"><b style="color:#000";>Datos de identificacion</b></h1>
<h4 class="formulario__titulo" style="color:#000;">Bienvenido, aqui podras registrarte en nuestro programa.</h4>
<?php
if(isset($_COOKIE['apren_exist'])){
	echo "<center><p style='color: red;'>".$_COOKIE['apren_exist']."</p></center>";
	setcookie("apren_exist","",time()-1000,"/");
}
if(isset($_COOKIE['us_inco'])){
	echo "<center><p style='color: red;'>".$_COOKIE['us_inco']."</p></center>";
	setcookie("us_inco","",time()-1000,"/");
}
if(isset($_COOKIE['no_con'])){
	echo "<center><p style='color: red;'>".$_COOKIE['no_con']."</p></center>";
	setcookie("no_con","",time()-1000,"/");
}
if(isset($_COOKIE['registro'])){
	echo "<center><p style='color: red;'>".$_COOKIE['registro']."</p></center>";
	setcookie("no_con","",time()-1000,"/");
}
?>
<hr></hr>
<br />
<!--Informacion-->
<!--=====================================================================================-->
<div class="form-group">
<label for="n_usuario" class="formulario__label">Nombre de usuario<span></span></label>
	<input type="text" class="formulario__input" name="n_usuario" id="n_usuario" required>
</div>
<div class="form-group">
<label for="cargo" class="formulario__label">Cargo</label>
	<select  name="cargo" class="formulario__iinput" id="cargo">
		<option value="Cargo" selected="selected" disabled>Cargo</option>

		<?php
			$cxn=Conexion::conectar('localhost','proyecto','root','');

			$reg=$cxn->query("SELECT id_cargo FROM usuario WHERE id_cargo=1");

			$car=$cxn->query("SELECT * FROM cargo");

			if(!$reg->fetch(PDO::FETCH_ASSOC)) {
					while ($row=$car->fetch(PDO::FETCH_ASSOC)) {
									echo "<option value=\"$row[id_cargo]\">$row[cargo]</option>";
						}
			}
			else{
					while ($row=$car->fetch(PDO::FETCH_ASSOC)) {
							if ($row['id_cargo']!=1) {
									echo "<option value=\"$row[id_cargo]\">$row[cargo]</option>";
							}
				}
		}
		?>
</select>
</div>
<div class="form-group">
<label for="primer_nombre" class="formulario__label">Primer Nombre</label>
	<input type="text" class="formulario__input" name="primer_nombre" id="primer_nombre" required>
</div>
<div class="form-group">
<label for="segundo_nombre" class="formulario__label">Segundo Nombre</label>
	<input type="text" class="formulario__input" name="segundo_nombre" id="segundo_nombre" required>
</div>
<div class="form-group">
<label for="primer_apellido" class="formulario__label">Primer Apellido</label>
	<input type="text" class="formulario__input" name="primer_apellido" id="primer_apellido" required>
</div>
<div class="form-group">
<label for="segundo_apellido" class="formulario__label">Segundo Apellido</label>
	<input type="text" class="formulario__input" name="segundo_apellido" id="segundo_apellido" required>
</div>
<div class="form-group">
<label for="tipo_documento" class="formulario__label">Tipo de Documento</label>
	<select  name="tipo_documento" class="formulario__iinput" id="tipo_documento">
  		<option value="tipo_documento" selected="selected" disabled>Tipo de Documento</option>
				<?php
					$tip=$cxn->query("SELECT * FROM tipo_documento");
					while ($has=$tip->fetch(PDO::FETCH_ASSOC)) {
						echo "<option value=\"$has[id_tipo_documento]\">$has[tipo_documento]</option>";
					}
				?>
 		</select>
</div>
<div class="form-group">
<label for="n_documento" class="formulario__label">No. de documento <span></span></label>
	<input type="text" class="formulario__input" name="n_documento" onkeypress="return justNumbers(event);" id="n_documento" required>
</div>
<div class="form-group">
<label for="con1" class="formulario__label">Contraseña</label>
	<input type="password" class="formulario__input" name="con1" id="con1" required>
</div>
<div class="form-group">
<label for="con2" class="formulario__label">Confirmar contraseña<span></span></label>
	<input type="password" class="formulario__input" name="con2" id="con2" required>
</div>
<div class="form-group">
<label for="Direccion" class="formulario__label">Direccion</label>
	<input type="text" class="formulario__input" name="direccion" id="direccion" required>
</div>
<div class="form-group">
<label for="genero" class="formulario__label">Genero</label>
	<select name="genero" class="formulario__iinput" id="genero">
			<option value="genero" selected="selected" disabled>Genero</option>
				<?php
				$gnn=$cxn->query("SELECT * FROM genero");
				while ($gen=$gnn->fetch(PDO::FETCH_ASSOC)) {
					echo "<option value=\"$gen[id_genero]\">$gen[genero]</option>";
				}
				?>
		</select>
</div>
<?php if(isset($_COOKIE['correo_in'])){
			echo "<center><p style='color: red;'>".$_COOKIE['correo_in']."</p></center>";
			setcookie("correo_in","",time()-1000,"/");}
?>
<div class="form-group">
<label for="correo" class="formulario__label">Correo electronico</label>
	<input type="text" class="formulario__input" name="correo" id="correo" required="@">
</div>
<div class="form-group">
<label for="cocorreo" class="formulario__label">Confirmar correo<span></span></label>
	<input type="text" autocomplete="off" class="formulario__input" name="cocorreo" id="cocorreo" required="@">
</div>
<div class="form-group">
<label for="telefono" class="formulario__label">Telefono</label>
	<input type="text" class="formulario__input" name="telefono" onkeypress="return justNumbers(event);" id="telefono" required>
</div>
<div class="form-group">
<label for="celular" class="formulario__label">Celular</label>
	<input type="text" class="formulario__input" name="celular" onkeypress="return justNumbers(event);" id="celular" required>
</div>
<div class="form-group">
<input type="submit" value="Finalizar">
</div>
</form>
</div>
<?php include 'pie.php'; ?>
<script src="js/validacion.js"></script>
</body>
</html>
