<?php
session_start();

switch ($_GET['n']) {

	case 'reg_novedad':

		$_GET['novedad']='novedades';
		header("Location: ../vistas/novedades.php?novedad=".$_GET['novedad']."");

		break;

	case 'con':

		$_GET['aprendices']='aprendices';
		header("Location: ../vistas/consultar.php?aprendices=".$_GET['aprendices']."");

		break;

	case 'connov':

		$_GET['aprendices']='consultar_novedad';
		header("Location: ../vistas/consultar.php?aprendices=".$_GET['aprendices']."");

		break;

	case 'ina':

		$_GET['aprendices']='ingresar_aprendiz';
		header("Location: ../vistas/consultar.php?aprendices=".$_GET['aprendices']."");

		break;

	case 'completado_mod_us':

		$_GET['aprendices']='info_aprendiz';
		header("Location: ../vistas/usuario.php?aprendices=".$_GET['aprendices']."");

		break;

	case 'fi':

		$_GET['fichas']='fichas';
		header("Location: ../vistas/consultar.php?aprendices=".$_GET['fichas']."");

		break;

	case 'ficon':

		$_GET['fichas']='consultar_fi';
		header("Location: ../vistas/consultar.php?aprendices=".$_GET['fichas']."");

		break;

	case 'consulnov':

		$_GET['aprendices']='con_nov_aprendiz';
		header("Location: ../vistas/consultar.php?aprendices=".$_GET['aprendices']."");

		break;

	case 'novedad_reg':

		$_GET['novedad']='novedades';
		$_SESSION['documento']=$_POST['documento'];
		header("Location: ../vistas/novedades.php?novedad=".$_GET['novedad']."");

		break;

	case 'novdoc':

		$_GET['aprendices']='con_novedad';
		$_SESSION['documento']=$_POST['documento'];
		$_SESSION['fil']=$_POST['fil'];
		header("Location: ../vistas/usuario.php?aprendices=".$_GET['aprendices']."");

		break;

	case 'infnovedad':

		$_GET['aprendices']='info_aprendiz';
		$_SESSION['documento']=$_POST['documento'];
		header("Location: ../vistas/usuario.php?aprendices=".$_GET['aprendices']."");

		break;

	case 'usuario':

		$_GET['usuario']='usuario';
		header("Location: ../vistas/usuario.php?usuario=".$_GET['usuario']."");

		break;

	case 'actualizarDatos':

		$_GET['usuario']='actualizar';
		header("Location: ../vistas/usuario.php?usuario=".$_GET['usuario']."");

		break;

	case 'completado':

		$_GET['usuario']='actualizar';
		header("Location: ../vistas/usuario.php?usuario=".$_GET['usuario']."");

		break;

	case 'completado_ac':

		$_GET['usuario']='modificar_admin';
		header("Location: ../vistas/usuario.php?usuario=".$_GET['usuario']."");

		break;

	case 'mod_us':

		$_GET['usuario']='modificar_usuario';
		header("Location: ../vistas/usuario.php?usuario=".$_GET['usuario']."");

		break;

	case 'mod_us_aparte':

		$_GET['usuario']='modificar_admin';
		$_SESSION['documento']=$_POST['documento'];
		header("Location: ../vistas/usuario.php?usuario=".$_GET['usuario']."");

		break;

	case 'mod_aprendiz':

		$_GET['usuario']='modificar_apren';
		header("Location: ../vistas/usuario.php?usuario=".$_GET['usuario']."");

		break;

	case 'reg_a':

		$_GET['novedad']='listado_aprendices';
		header("Location: ../vistas/usuario.php?aprendices=".$_GET['novedad']."");

		break;

	case 'novedad_actualizar':

		$_GET['novedad']='actu_nov';
		$_SESSION['documento']=$_POST['documento'];
		header("Location: ../vistas/novedades.php?novedad=".$_GET['novedad']."");

		break;		

	default:

		header("Location: ../index.php");

		break;
}

?>
