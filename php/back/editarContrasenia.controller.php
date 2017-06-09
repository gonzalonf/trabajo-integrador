<?php
session_start();
include('login.helpers.php');
include 'perfilEditar.helpers.php';

$id = $_SESSION['login']['id'];
$psw = $_POST['psw'];
$psw2 = $_POST['psw2'];
$ruta='../users/users.json';

// validar password:
$errores = validarCambioPass($psw,$psw2);

$_SESSION['error_psw'] = $errores;

// guardar cambios, si no hay error:
if ($errores==''){
    cambiarPassword($id,$psw2,$ruta);
    header('Location: ../html/perfil.php'); exit;

}

header('Location: ../html/perfilEditarContrasenia.php'); exit;
