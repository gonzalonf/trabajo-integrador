<?php
session_start();
 
include 'perfilEditar.helpers.php';

$id = $_SESSION['login']['id'];
$ruta = '../users/users.json';

if ($error_avatar = guardarCambioAvatar()) {
		$_SESSION['errorAvatar'] = $error_avatar;
		header('Location: ../html/perfilEditarAvatar.php');
} else {
	$nuevo_avatar = recuperarCambioAvatar();
    cambiarAvatar($id, $nuevo_avatar ,$ruta);
    header('Location: ../html/perfil.php');
}

?>
