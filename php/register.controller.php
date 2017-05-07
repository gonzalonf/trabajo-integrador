<?php

session_start();

include('../php/register.helpers.php');

$errores = validacionRegistro();
$error=emailExistente();
// guardarUsuario()

// lo logeo...
// $_SESSION['login']['id'];
// $_SESSION['login']['avatar'];



// guardarImagen();


if (count($errores)) {
	$_SESSION['errores'] = $errores;
	header('Location: ../html/registro.php');

}elseif (count($error)) {
	$_SESSION['emailExistente'] = $error;
	header('Location: ../html/registro.php');
	exit;
}else {
	guardarUsuario();
	header('Location: ../html/perfil.php');
	exit();

}
