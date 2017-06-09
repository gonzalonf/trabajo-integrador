<?php

session_start();

include('../php/register.helpers.php');
include '../php/login.helpers.php';

$errores = validacionRegistro();
$error = emailExistente();


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
// no es redundante el código? se soluciona con un ||


} else {
	guardarUsuario();
	// lo logeo...x|
	logearDesdeRegistro($_POST['email'],'../users/users.json');
	header('Location: ../html/perfil.php');
	exit();
}


