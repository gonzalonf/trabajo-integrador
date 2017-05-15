<?php
session_start();
include('register.helpers.php');
include('perfilEditar.helpers.php');

$id=$_SESSION['login']['id'];
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$ruta='../users/users.json';
$errores=validacionEditarNombre();
if (count($errores)) {
	$_SESSION['errores'] = $errores;
	header('Location: ../html/perfilEditarApelido.php');
}else {
    cambiarNombre($id, $nombre, $apellido ,$ruta);
    header('Location: ../html/perfil.php');
}





 ?>
