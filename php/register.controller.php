<?php

session_start();

include('../php/register.helpers.php');

$errores = validacionRegistro();
$error = emailExistente();

// lo logeo...
// $_SESSION['login']['id'];
// $_SESSION['login']['avatar'];

/*
var_dump(validacionRegistro());
var_dump(recuperarAvatar());
exit();
*/

if ($error_avatar = guardarAvatar()) {
		$_SESSION['errorAvatar'] = $error_avatar;
		header('Location: ../html/registro.php');
}

if (count($errores)) {
	$_SESSION['errores'] = $errores;
	header('Location: ../html/registro.php');

} elseif (count($error)) {
	$_SESSION['emailExistente'] = $error;
	header('Location: ../html/registro.php');

} else {
	guardarUsuario();
	header('Location: ../html/perfil.php');
	exit();
}


