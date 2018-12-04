<!--Link al ajax web-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--Condicion para entrar al boostrp, ya que no recibe correctamente ninguno de los 2-->
<?php if (empty($_COOKIE['usuario'])): ?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<?php else: ?>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<?php endif; ?>
<!--Link al popper-->
<script scr="https://unpkg.com/popper.js/dist/umd/popper.min.js" integrity="" type="text/javascript" crossOrigin="anonymous"></script>
<!--Link al boostrap-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossOrigin="anonymous">
<!---->
<link rel="stylesheet" href="css/estilomenu.css">
<?php if (empty($_COOKIE['usuario'])): ?>
	<link rel="stylesheet" href="css/modal_login.css">
<?php endif; ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="z-index:10; width: 100%">
	<div class="logo">
		 <a href="../index.php"><img class="navbar-brand" src="img/logo.png" title="SABAJ"></a>
	</div>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <?php
			ob_start();
			require_once '../models/conexion.php';

			if(isset($_COOKIE['usuario'])){
					echo "<li class=\"nav-item active\"><a href=\"\" class=\"nav-link\" data-toggle=\"modal\" data-target=\"#modalusuario\" data-whatever=\"@mdo\">".$_COOKIE['usuario']."</a></li>";
					echo "<li><a href=\"../index.php\" class=\"nav-link\">Inicio</a></li>";
				}else{
					echo "<li class=\"nav-item active\"><a href=\"../index.php\" class=\"nav-link\">Inicio</a></li>";
			}

			if(isset($_COOKIE['usuario'])){

				$cxn=Conexion::conectar('localhost','proyecto','root','');
				$car=$cxn->prepare("SELECT id_cargo FROM usuario WHERE nombre_usuario=:nombre_usuario");
				$car->execute(array(':nombre_usuario' => $_COOKIE['usuario'] ));

				if ($row=$car->fetch(PDO::FETCH_ASSOC)) {

				if (($row['id_cargo']==1) or ($row['id_cargo']==2)) {

					echo "<li class=\"nav-item dropdown\"><a href=\"#\" class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Aprendiz</a>";
						echo "<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">";
							echo "<a class=\"dropdown-item\" href=\"../controladores/controlar.php?n=reg_a\" >Aprendices Registrados</a>";
							echo "<a class=\"dropdown-item\" href=\"../controladores/controlar.php?n=ina\" >Ingresar Aprendiz</a>";
							echo "<a class=\"dropdown-item\" href=\"\" data-toggle=\"modal\" data-target=\"#modalconap\" data-whatever=\"@mdo\">Informacion Aprendiz</a>";
						echo "</div>";
					echo "</li>";
					echo "<li class=\"nav-item dropdown\"><a href=\"#\" class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Novedades</a>";
						echo "<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">";
							echo "<a class=\"dropdown-item\" href=\"\" data-toggle=\"modal\" data-target=\"#modalre\" data-whatever=\"@mdo\">Registrar Novedad</a>";
							echo "<a class=\"dropdown-item\" href=\"\" data-toggle=\"modal\" data-target=\"#modalac_nov\" data-whatever=\"@mdo\">Actualizar Novedad</a>";
							echo "<a class=\"dropdown-item\" href=\"../controladores/controlar.php?n=connov\">Consultar Novedad</a>";
							echo "<a class=\"dropdown-item\" href=\"../controladores/controlar.php?n=fi\">Fichas</a>";
						echo "</div>";
					echo "</li>";
					}
			if (($row['id_cargo']==3) or ($row['id_cargo']==4)){
					echo "<li class=\"nav-item dropdown\"><a href=\"#\" class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Aprendiz</a>";
						echo "<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">";
							echo "<a class=\"dropdown-item\" href=\"../controladores/controlar.php?n=reg_a\" >Aprendices Registrados</a>";
							echo "<a class=\"dropdown-item\" href=\"\" data-toggle=\"modal\" data-target=\"#modalconap\" data-whatever=\"@mdo\">Informacion Aprendiz</a>";
						echo "</div>";
					echo "</li>";
					echo "<li class=\"nav-item dropdown\"><a href=\"#\" class=\"nav-link dropdown-toggle\" id=\"navbarDropdown\" role=\"button\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">Novedades</a>";
						echo "<div class=\"dropdown-menu\" aria-labelledby=\"navbarDropdown\">";
							echo "<a class=\"dropdown-item\" href=\"../controladores/controlar.php?n=connov\">Consultar Novedad</a>";
						echo "</div>";
					echo "</li>";
				}
			}
		}
			?>

      </ul>
    <form class="form-inline my-2 my-lg-0">

			<?php if (isset($_COOKIE['usuario'])): ?>
				<a class="btn btn-danger" href="cerrarsesion.php" role="button">Cerrar Sesion</a>
			<?php else: ?>
				<table>
					<tr>
						<td><a class="btn btn-danger" role="button" onclick="document.getElementById('id01').style.display='block'" style="color: white;">Iniciar sesion</a></td>
						<td><a href="registro.php" class="btn btn-danger" role="button">Crear cuenta</a></td>
					</tr>
				</table>
			<?php endif; ?>
    </form>
  </div>
</nav>
<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

  <!-- Modal Content Iniciar Sesion -->

  <form class="modal-content animate" action="../controladores/logiin.php" style="width: 40%" method="post">
    <div class="imgcontainer">
      <img src="img/avatar.png" alt="Avatar" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Nombre de Usuario</b></label>
      <input type="text" placeholder="Nombre de Usuario" name="i_usuario" required>

      <label for="psw"><b>Contraseña</b></label>
      <input type="password" placeholder="Contraseña" name="i_contrasena" required>

      <input type="submit" value="Iniciar Sesion">
				<?php if (isset($_COOKIE["mal_login"])): ?>
					<div class="alert alert-danger" role="alert" style="width: 100%;">
						<?php
							echo $_COOKIE["mal_login"];
							setcookie("mal_login","",time()-1000,"/");
						?>
					</div>
				<?php endif; ?>
    </div>
    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancelar</button>
      <span class="psw"><a href="recuperarcontrasena.php">¿Olvido su contraseña?</a></span>
    </div>
  </form>
</div>

<!--Modal Usuario-->
<!-------------------------------------------------------------------------------------------------->
<div class="modal fade" id="modalusuario" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalac">Usuario:</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="../controladores/verificarusuario.php" method="post">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label"><?php echo $_COOKIE['usuario']; ?></label>
						</div>
						<div class="form-group">
							<label for="message-text" class="col-form-label">Dijite de nuevo su contraseña para ver sus datos.</label>
							<input type="password" class="form-control" id="recipient-name-regnov" name="contrasena_verificar" style="background-color: #DEE4E4;" required>	
							<?php if (isset($_COOKIE['mal_con'])): ?>
								<label class="alert alert-danger" role="alert" style="width: 100%; bottom: -20px;"><?php echo $_COOKIE["mal_con"]; ?></label> 
							<?php endif ?>						
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" style="height: 45px">Cerrar</button>
					<input type="submit" value="Ingresar" class="btn btn-primary" style="height: 45px">
					</form>
				</div>
			</div>
		</div>
	</div>

<!--Modal Registrar Novedad-->
<!-------------------------------------------------------------------------------------------------->
<div class="modal fade" id="modalre" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalac">Registrar Novedad:</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="../controladores/controlar.php?n=novedad_reg" method="post">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">El aprendiz debe estar registrado para poder registrar la novedad.</label>
						</div>
						<div class="form-group">
							<label for="message-text" class="col-form-label">Digite el numero de documento del aprendiz.</label>
							<input type="text" class="form-control" id="recipient-name-alnov" name="documento" style="background-color: #DEE4E4;" required>	
							<?php if (isset($_COOKIE['no_reg'])): ?>
								<label class="alert alert-danger" role="alert" style="width: 100%; bottom: -20px;"><?php echo $_COOKIE["no_reg"]; ?></label> 
							<?php endif ?>						
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" style="height: 45px">Cerrar</button>
					<input type="submit" value="Registrar Novedad" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
	</div>

<!--Modal Aprendices-->
<!-------------------------------------------------------------------------------------------------->
<div class="modal fade" id="modalconap" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalac">Aprendiz</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="../controladores/controlar.php?n=infnovedad"  method="post">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Puede consultar los datos de un aprendiz con su numero de documento.</label>
						</div>
						<div class="form-group">
							<label for="message-text" class="col-form-label">Dijite el numero del documento del aprendiz.</label>
							<input type="text" class="form-control" id="recipient-name-ap" name="documento" style="background-color: #DEE4E4;" required>	
							<?php if (isset($_COOKIE['no_reg'])): ?>
								<label class="alert alert-danger" role="alert" style="width: 100%; bottom: -20px;"><?php echo $_COOKIE["no_reg"]; ?></label> 
							<?php endif ?>						
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" style="height: 45px">Cerrar</button>
					<input type="submit" value="Consultar Aprendiz" style="height: 45px" class="btn btn-primary">

					</form>
				</div>
			</div>
		</div>
	</div>

<!--Modal Consultar Novedad Aprendiz-->
<!-------------------------------------------------------------------------------------------------->
<div class="modal fade" id="modalcona" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalac">Consultar Novedad</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="../controladores/controlar.php?n=infnovedad"  method="post">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">Puede consultar si un aprendiz presenta alguna novedad.</label>
						</div>
						<div class="form-group">
							<label for="message-text" class="col-form-label">Dijite el numero del documento del aprendiz.</label>
							<input type="text" class="form-control" id="recipient-name-novap" name="documento" style="background-color: #DEE4E4;" required>						
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" style="height: 45px">Cerrar</button>
					<input type="submit" value="Consultar Novedad" style="height: 45px" class="btn btn-primary">

					</form>
				</div>
			</div>
		</div>
	</div>

<!--Modal Actualizar Novedad-->
<!-------------------------------------------------------------------------------------------------->
<div class="modal fade" id="modalac_nov" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalac">Actualizar Novedad:</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="../controladores/controlar.php?n=novedad_actualizar" method="post">
						<div class="form-group">
							<label for="recipient-name" class="col-form-label">El aprendiz debe estar registrado y tener una novedad.</label>
						</div>
						<div class="form-group">
							<label for="message-text" class="col-form-label">Digite el numero de documento del aprendiz.</label>
							<input type="text" class="form-control" id="recipient-name-alnov" name="documento" style="background-color: #DEE4E4;" required>	
							<?php if (isset($_COOKIE['no_reg'])): ?>
								<label class="alert alert-danger" role="alert" style="width: 100%; bottom: -20px;"><?php echo $_COOKIE["no_reg"]; ?></label> 
							<?php endif ?>						
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" style="height: 45px">Cerrar</button>
					<input type="submit" value="Actualizar Novedad" class="btn btn-primary">
					</form>
				</div>
			</div>
		</div>
	</div>

<!--Script jquery web-->
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<!--Script Popper javascript-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossOrigin="anonymous"></script>
<!--Link al javascrpit del boostrap-->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossOrigin="anonymous"></script>
