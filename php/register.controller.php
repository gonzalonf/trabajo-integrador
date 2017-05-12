<?php

session_start();

include('../php/register.helpers.php');

$errores = validacionRegistro();
$error = emailExistente();
$error_avatar = guardarAvatar(); 

// lo logeo...
// $_SESSION['login']['id'];
// $_SESSION['login']['avatar'];

if (count($errorAvatar)) {
	$_SESSION['errorAvatar'] = $error_avatar;
	header('Location: ../html/registro.php');
}

if (count($errores)) {
	$_SESSION['errores'] = $errores;
	header('Location: ../html/registro.php');

} elseif (count($error)) {
	$_SESSION['emailExistente'] = $error;
	header('Location: ../html/registro.php');
	exit();

} else {
	guardarUsuario();
	header('Location: ../html/perfil.php');
	exit();
}
