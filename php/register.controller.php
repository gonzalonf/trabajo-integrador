<?php 

session_start();

include('../php/register.helpers.php');

$errores = validacionRegistro();

if (count($errores)) {
	$_SESSION['errores'] = $errores;
	header('Location: ../html/registro.php');
	exit();
} else {
	header('Location: ../html/perfil.php');
	exit();
}