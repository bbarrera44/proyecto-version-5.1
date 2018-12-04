<?php
require '../models/usuario.php';

	Usuario::iniciarSesion($_POST["i_usuario"],$_POST["i_contrasena"]);

?>
